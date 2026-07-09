<?php

namespace App\Services;

class CertificateGenerator
{
    private const TEXT_COLOR = '#30251d';

    private const TEMPLATES = [
        'graphology' => [
            'label' => 'Graphology',
            'image' => 'images/certificate/Graphology_Webinar_Certificate.jpg',
            'name' => [
                'font' => 'cormorant_garamond_semibold',
                'color' => self::TEXT_COLOR,
                'xPercent' => 50,
                'yPercent' => 53,
                'anchor' => 'middle',
                'maxWidthPercent' => 72,
                'fontSizePercentOfWidth' => 4.2,
                'lineHeight' => 1.15,
                'letterSpacing' => 0.02,
            ],
            'date' => [
                'font' => 'libre_baskerville_regular',
                'color' => self::TEXT_COLOR,
                'xPercent' => 22,
                'yPercent' => 81.5,
                'anchor' => 'start',
                'fontSizePercentOfWidth' => 1.85,
                'lineHeight' => 1,
                'letterSpacing' => 0,
            ],
        ],
        'astrology' => [
            'label' => 'Astrology',
            'image' => 'images/certificate/Astrology_Webinar_Certificate.jpg',
            'name' => [
                'font' => 'cormorant_garamond_semibold',
                'color' => self::TEXT_COLOR,
                'xPercent' => 50,
                'yPercent' => 49,
                'anchor' => 'middle',
                'maxWidthPercent' => 70,
                'fontSizePercentOfWidth' => 5,
                'lineHeight' => 1.12,
                'letterSpacing' => 0.015,
            ],
            'date' => [
                'font' => 'libre_baskerville_regular',
                'color' => self::TEXT_COLOR,
                'xPercent' => 18,
                'yPercent' => 86.8,
                'anchor' => 'start',
                'fontSizePercentOfWidth' => 1.75,
                'lineHeight' => 1,
                'letterSpacing' => 0,
            ],
        ],
    ];

    public function types(): array
    {
        return collect(self::TEMPLATES)
            ->map(fn (array $template) => $template['label'])
            ->all();
    }

    public function generatePdf(string $type, string $name, ?string $date = null): string
    {
        $jpeg = $this->generateJpeg($type, $name, $date);
        [$width, $height] = getimagesizefromstring($jpeg);

        return $this->jpegToPdf($jpeg, $width, $height);
    }

    public function generateJpeg(string $type, string $name, ?string $date = null): string
    {
        $template = self::TEMPLATES[$type] ?? self::TEMPLATES['graphology'];
        $imagePath = public_path($template['image']);
        $image = imagecreatefromjpeg($imagePath);
        $width = imagesx($image);
        $height = imagesy($image);
        $dateText = $date ?: now()->format('d M Y');

        imagealphablending($image, true);
        imagesavealpha($image, true);

        $this->drawText($image, $name, $template['name'], $width, $height, true);
        $this->drawText($image, $dateText, $template['date'], $width, $height);

        ob_start();
        imagejpeg($image, null, 95);
        $jpeg = (string) ob_get_clean();
        imagedestroy($image);

        return $jpeg;
    }

    private function drawText($image, string $text, array $layout, int $width, int $height, bool $wrap = false): void
    {
        $font = $this->fontPath($layout['font'] ?? 'serif');
        $fontSize = $width * ($layout['fontSizePercentOfWidth'] / 100);
        $lineHeight = $fontSize * ($layout['lineHeight'] ?? 1.15);
        $letterSpacing = $fontSize * ($layout['letterSpacing'] ?? 0);
        $x = $width * ($layout['xPercent'] / 100);
        $y = $height * ($layout['yPercent'] / 100);
        $color = $this->allocateColor($image, $layout['color'] ?? self::TEXT_COLOR);
        $lines = [$text];

        if ($wrap) {
            $maxWidth = $width * (($layout['maxWidthPercent'] ?? 70) / 100);
            $lines = $this->wrapText($text, $font, $fontSize, $maxWidth, $letterSpacing);
        }

        $startY = $y - ((count($lines) - 1) * $lineHeight / 2);

        foreach ($lines as $index => $line) {
            $lineY = $startY + ($index * $lineHeight);
            $lineWidth = $this->textWidth($line, $font, $fontSize, $letterSpacing);
            $lineX = ($layout['anchor'] ?? 'start') === 'middle' ? $x - ($lineWidth / 2) : $x;

            $this->drawLine($image, $line, $font, $fontSize, (int) round($lineX), (int) round($lineY), $color, $letterSpacing);
        }
    }

    private function drawLine($image, string $text, string $font, float $fontSize, int $x, int $y, int $color, float $letterSpacing): void
    {
        if (! function_exists('imagettftext') || ! is_file($font)) {
            $this->drawScaledBuiltInText($image, $text, $fontSize, $x, $y, $color);
            return;
        }

        if ($letterSpacing <= 0) {
            imagettftext($image, $fontSize, 0, $x, $y, $color, $font, $text);
            return;
        }

        foreach (preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY) as $char) {
            imagettftext($image, $fontSize, 0, $x, $y, $color, $font, $char);
            $x += (int) round($this->textWidth($char, $font, $fontSize, 0) + $letterSpacing);
        }
    }

    private function wrapText(string $text, string $font, float $fontSize, float $maxWidth, float $letterSpacing): array
    {
        $words = preg_split('/\s+/', trim($text)) ?: [];
        $lines = [];
        $line = '';

        foreach ($words as $word) {
            $candidate = trim($line.' '.$word);
            if ($line !== '' && $this->textWidth($candidate, $font, $fontSize, $letterSpacing) > $maxWidth) {
                $lines[] = $line;
                $line = $word;
            } else {
                $line = $candidate;
            }
        }

        if ($line !== '') {
            $lines[] = $line;
        }

        return $lines ?: [$text];
    }

    private function textWidth(string $text, string $font, float $fontSize, float $letterSpacing): float
    {
        if (! function_exists('imagettfbbox') || ! is_file($font)) {
            $scale = $this->builtInFontScale($fontSize);

            return strlen($text) * imagefontwidth(5) * $scale;
        }

        $box = imagettfbbox($fontSize, 0, $font, $text);
        $width = abs(($box[2] ?? 0) - ($box[0] ?? 0));

        return $width + (max(0, mb_strlen($text) - 1) * $letterSpacing);
    }

    private function drawScaledBuiltInText($image, string $text, float $fontSize, int $x, int $y, int $color): void
    {
        $font = 5;
        $sourceWidth = max(1, strlen($text) * imagefontwidth($font));
        $sourceHeight = imagefontheight($font);
        $scale = $this->builtInFontScale($fontSize);
        $targetWidth = (int) round($sourceWidth * $scale);
        $targetHeight = (int) round($sourceHeight * $scale);
        $source = imagecreatetruecolor($sourceWidth, $sourceHeight);

        imagealphablending($source, false);
        imagesavealpha($source, true);

        $transparent = imagecolorallocatealpha($source, 0, 0, 0, 127);
        imagefill($source, 0, 0, $transparent);

        $rgb = imagecolorsforindex($image, $color);
        $sourceColor = imagecolorallocate($source, $rgb['red'], $rgb['green'], $rgb['blue']);
        imagestring($source, $font, 0, 0, $text, $sourceColor);

        imagecopyresampled($image, $source, $x, $y - $targetHeight, 0, 0, $targetWidth, $targetHeight, $sourceWidth, $sourceHeight);
        imagedestroy($source);
    }

    private function builtInFontScale(float $fontSize): float
    {
        return max(2.5, $fontSize / imagefontheight(5));
    }

    private function allocateColor($image, string $hex): int
    {
        $hex = ltrim($hex, '#');
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));

        return imagecolorallocate($image, $r, $g, $b);
    }

    private function fontPath(string $font): string
    {
        $fonts = [
            'cormorant_garamond_semibold' => [
                storage_path('app/private/certificate-fonts/CormorantGaramond-SemiBold.ttf'),
                storage_path('app/private/certificate-fonts/CormorantGaramond-SemiBold.otf'),
                storage_path('app/private/certificate-fonts/Cormorant-Garamond-SemiBold.ttf'),
                storage_path('app/private/certificate-fonts/Cormorant-Garamond-SemiBold.otf'),
                'C:/Windows/Fonts/CormorantGaramond-SemiBold.ttf',
                'C:/Windows/Fonts/CormorantGaramond-SemiBold.otf',
                'C:/Windows/Fonts/georgia.ttf',
                'C:/Windows/Fonts/times.ttf',
            ],
            'libre_baskerville_regular' => [
                storage_path('app/private/certificate-fonts/LibreBaskerville-Regular.ttf'),
                storage_path('app/private/certificate-fonts/LibreBaskerville-Regular.otf'),
                storage_path('app/private/certificate-fonts/Libre-Baskerville-Regular.ttf'),
                storage_path('app/private/certificate-fonts/Libre-Baskerville-Regular.otf'),
                'C:/Windows/Fonts/LibreBaskerville-Regular.ttf',
                'C:/Windows/Fonts/LibreBaskerville-Regular.otf',
                'C:/Windows/Fonts/georgia.ttf',
                'C:/Windows/Fonts/times.ttf',
            ],
            'serif_bold' => [
                'C:/Windows/Fonts/georgiab.ttf',
                'C:/Windows/Fonts/timesbd.ttf',
            ],
            'serif' => [
                'C:/Windows/Fonts/georgia.ttf',
                'C:/Windows/Fonts/times.ttf',
            ],
        ];

        foreach ($fonts[$font] ?? $fonts['serif'] as $path) {
            if (is_file($path)) {
                return $path;
            }
        }

        return '';
    }

    private function jpegToPdf(string $jpeg, int $imageWidth, int $imageHeight): string
    {
        $pageWidth = 842;
        $pageHeight = $pageWidth * ($imageHeight / $imageWidth);
        $objects = [];

        $objects[] = "<< /Type /Catalog /Pages 2 0 R >>";
        $objects[] = "<< /Type /Pages /Kids [3 0 R] /Count 1 >>";
        $objects[] = "<< /Type /Page /Parent 2 0 R /MediaBox [0 0 {$pageWidth} {$pageHeight}] /Resources << /XObject << /Im0 4 0 R >> >> /Contents 5 0 R >>";
        $objects[] = "<< /Type /XObject /Subtype /Image /Width {$imageWidth} /Height {$imageHeight} /ColorSpace /DeviceRGB /BitsPerComponent 8 /Filter /DCTDecode /Length ".strlen($jpeg)." >>\nstream\n{$jpeg}\nendstream";

        $content = "q\n{$pageWidth} 0 0 {$pageHeight} 0 0 cm\n/Im0 Do\nQ";
        $objects[] = "<< /Length ".strlen($content)." >>\nstream\n{$content}\nendstream";

        $pdf = "%PDF-1.4\n";
        $offsets = [0];

        foreach ($objects as $index => $object) {
            $offsets[] = strlen($pdf);
            $number = $index + 1;
            $pdf .= "{$number} 0 obj\n{$object}\nendobj\n";
        }

        $xrefOffset = strlen($pdf);
        $pdf .= "xref\n0 ".(count($objects) + 1)."\n";
        $pdf .= "0000000000 65535 f \n";

        for ($i = 1; $i <= count($objects); $i++) {
            $pdf .= sprintf("%010d 00000 n \n", $offsets[$i]);
        }

        $pdf .= "trailer\n<< /Size ".(count($objects) + 1)." /Root 1 0 R >>\n";
        $pdf .= "startxref\n{$xrefOffset}\n%%EOF";

        return $pdf;
    }
}
