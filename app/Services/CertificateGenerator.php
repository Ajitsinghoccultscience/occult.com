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
                'fontFamily' => 'Cormorant Garamond, Georgia, serif',
                'fontWeight' => '600',
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
                'fontFamily' => 'Libre Baskerville, Georgia, serif',
                'fontWeight' => '400',
                'color' => self::TEXT_COLOR,
                'xPercent' => 22,
                'yPercent' => 81.5,
                'anchor' => 'start',
                'fontSizePercentOfWidth' => 1.85,
                'letterSpacing' => 0,
            ],
        ],
        'astrology' => [
            'label' => 'Astrology',
            'image' => 'images/certificate/Astrology_Webinar_Certificate.jpg',
            'name' => [
                'fontFamily' => 'Cormorant Garamond, Georgia, serif',
                'fontWeight' => '600',
                'color' => self::TEXT_COLOR,
                'xPercent' => 50,
                'yPercent' => 49,
                'anchor' => 'middle',
                'maxWidthPercent' => 70,
                'fontSizePercentOfWidth' => 4,
                'lineHeight' => 1.12,
                'letterSpacing' => 0.015,
            ],
            'date' => [
                'fontFamily' => 'Libre Baskerville, Georgia, serif',
                'fontWeight' => '400',
                'color' => self::TEXT_COLOR,
                'xPercent' => 18,
                'yPercent' => 86.8,
                'anchor' => 'start',
                'fontSizePercentOfWidth' => 1.75,
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

    public function generateSvg(string $type, string $name, ?string $date = null): string
    {
        $template = self::TEMPLATES[$type] ?? self::TEMPLATES['graphology'];
        $imagePath = public_path($template['image']);
        [$width, $height] = getimagesize($imagePath);

        $imageData = base64_encode(file_get_contents($imagePath));
        $dateText = $date ?: now()->format('d M Y');

        $nameSvg = $this->textSvg($name, $template['name'], $width, $height, true);
        $dateSvg = $this->textSvg($dateText, $template['date'], $width, $height);

        return <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="{$width}" height="{$height}" viewBox="0 0 {$width} {$height}">
  <image href="data:image/jpeg;base64,{$imageData}" width="{$width}" height="{$height}" preserveAspectRatio="xMidYMid meet"/>
  {$nameSvg}
  {$dateSvg}
</svg>
SVG;
    }

    private function textSvg(string $text, array $layout, int $width, int $height, bool $wrap = false): string
    {
        $x = $width * ($layout['xPercent'] / 100);
        $y = $height * ($layout['yPercent'] / 100);
        $fontSize = $width * ($layout['fontSizePercentOfWidth'] / 100);
        $letterSpacing = $fontSize * ($layout['letterSpacing'] ?? 0);
        $lineHeight = $fontSize * ($layout['lineHeight'] ?? 1.15);
        $anchor = $layout['anchor'] ?? 'start';
        $lines = [$text];

        if ($wrap) {
            $maxWidth = $width * (($layout['maxWidthPercent'] ?? 70) / 100);
            $charsPerLine = max(12, (int) floor($maxWidth / ($fontSize * 0.52)));
            $lines = explode("\n", wordwrap($text, $charsPerLine, "\n", false));
        }

        $startY = $y - ((count($lines) - 1) * $lineHeight / 2);
        $tspans = [];

        foreach ($lines as $index => $line) {
            $dy = $index === 0 ? 0 : $lineHeight;
            $safeLine = e($line);
            $tspans[] = "<tspan x=\"{$x}\" dy=\"{$dy}\">{$safeLine}</tspan>";
        }

        $fontFamily = e($layout['fontFamily']);
        $fontWeight = e($layout['fontWeight'] ?? '400');
        $color = e($layout['color'] ?? self::TEXT_COLOR);

        return '<text x="'.$x.'" y="'.$startY.'" text-anchor="'.$anchor.'" dominant-baseline="middle" '
            .'font-family="'.$fontFamily.'" font-weight="'.$fontWeight.'" font-size="'.$fontSize.'" '
            .'letter-spacing="'.$letterSpacing.'" fill="'.$color.'">'.implode('', $tspans).'</text>';
    }
}
