<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebinarSetting;
use App\Models\AdminUser;
use App\Models\LandingPage;

class PageController extends Controller
{
    private array $products = [
        'astrology' => [
            'name'          => 'Astrology',
            'webinar_name'  => 'Mega Astrology Webinar',
            'logo'          => 'image/compressed-images/logo300x111-removebg-preview.webp',
            'event_date'    => 'Sat, 16th May 2026',
            'event_date_short' => 'May 16th',
            'event_time'    => '2:00 PM – 4:00 PM IST',
            'zoho_form'     => 'https://forms.zohopublic.in/allindiainstituteofoccultsci1/form/AstrologyWebinar/formperma/u5xhvCVVKohScA-mli9GWsWCKu3-geIGBrn83l2vn-Q',
            'form_height'   => '950px',
            'alumni_path'   => 'image/astrology%20assests/',
            'alumni_files'  => ['alumni%201.jpg', 'alumni%202.jpg', 'alumni%203.jpg', 'alumni%204.jpg'],
            'whatsapp'      => 'https://chat.whatsapp.com/KyIhA0PgjCiBZ1IAIQretG',
            'attend_date'   => 'May 16th',
            'description'   => 'decode your cosmic blueprint',
            'timer_key'     => 'astrology_offer_timer_end',
        ],
        'graphology' => [
            'name'          => 'Graphology',
            'webinar_name'  => 'Mega Graphology Webinar',
            'logo'          => 'image/compressed-images/logo300x111-removebg-preview.webp',
            'event_date'    => 'Wed, 20th May 2026',
            'event_date_short' => 'May 20th',
            'event_time'    => '11:00 AM – 1:00 PM IST',
            'zoho_form'     => 'https://forms.zohopublic.in/allindiainstituteofoccultsci1/form/MegaGraphologyWebinar/formperma/syGbeX5Uekmsro9yiDvTz842piWRQ-_mWlNvTiakKYM',
            'form_height'   => '850px',
            'alumni_path'   => 'image/graphology assests/',
            'alumni_files'  => ['alumni 1.jpg', 'alumni 2.jpg', 'alumni 3.jpg', 'alumni 4.jpg'],
            'whatsapp'      => 'https://chat.whatsapp.com/I2CkgB7cf2O64vPoV6KXbC',
            'attend_date'   => 'May 20th',
            'description'   => 'decode personalities through handwriting',
            'timer_key'     => 'graphology_offer_timer_end',
        ],
    ];

    public function index()
    {
        $webinar = WebinarSetting::forKey('astrology');
        return view('pages.astrology.pages.astrology-webinar', compact('webinar'));
    }

    public function graphologyWebinar()
    {
        $webinar = WebinarSetting::forKey('graphology');
        return view('pages.graphology.pages.graphology-webinar', compact('webinar'));
    }

    public function graphologyWebinarlvl1()
    {
        $webinar = WebinarSetting::forKey('graphology');
        return view('pages.graphology.pages.graphology-webinar1', compact('webinar'));
    }

    public function graphologyWebinar4()
    {
        $webinar = WebinarSetting::forKey('graphology');
        return view('pages.graphology.pages.graphology-webinar4', compact('webinar'));
    }

    public function astrologyWebinar()
    {
        $webinar = WebinarSetting::forKey('astrology');
        return view('pages.astrology.pages.astrology-webinar1', compact('webinar'));
    }

    public function astrologyWebinar3()
    {
        $webinar = WebinarSetting::forKey('astrology');
        return view('pages.astrology.pages.astrology-webinar6', compact('webinar'));
    }

    private function resolvedConfig(string $product): array
    {
        $base   = $this->products[$product];
        $db     = WebinarSetting::forKey($product);
        return $db ? array_merge($base, $db->toConfig()) : $base;
    }

    public function checkout(Request $request)
    {
        $product = $request->query('product', '');
        if (!array_key_exists($product, $this->products)) abort(404);
        return view('pages.checkout', ['product' => $product, 'config' => $this->resolvedConfig($product)]);
    }

    public function thankyou(Request $request)
    {
        $product = $request->query('product', '');
        if (!array_key_exists($product, $this->products)) abort(404);
        return view('pages.thankyou', ['product' => $product, 'config' => $this->resolvedConfig($product)]);
    }

    public function astrologyCourse(Request $request)
    {
        // Per-counsellor landing: /admission-2026?counsler=reena-astrology (course-agnostic)
        $slug = $request->query('counsler');

        // New: many links per counsellor (landing_pages). Fallback: legacy single slug on admin_users.
        $source = LandingPage::forSlug($slug) ?: AdminUser::forSlug($slug);

        $offer = null;

        if ($source && (
            $source->lp_price ||
            $source->lp_old_price ||
            $source->lp_discount ||
            $source->lp_timer_minutes ||
            $source->lp_course_name ||
            $source->lp_enrolled ||
            $source->lp_rating ||
            $source->lp_seats
        )) {
            $offer = [
                'slug'         => $source->slug,
                'name'         => $source->label ?? $source->name ?? null,
                'courseName'   => $source->lp_course_name ?: 'Astrology Certificate Course',
                'enrolled'     => $source->lp_enrolled ?: '50,000+ enrolled',
                'rating'       => $source->lp_rating ?: '4.9',
                'seats'        => $source->lp_seats ?: 'Limited seats left',
                'price'        => $source->lp_price ? $this->inr((int) $source->lp_price) : null,
                'oldPrice'     => $source->lp_old_price ? $this->inr((int) $source->lp_old_price) : null,
                'discount'     => $source->lp_discount,
                'timerMinutes' => (int) ($source->lp_timer_minutes ?: 0),
                'updatedAt'    => $source->updated_at?->timestamp ?: time(),
            ];
        }

        return view('direct-admission.pages.astrology-course', compact('offer'));
    }

    /**
     * Format a number with the Indian grouping system, prefixed with ₹ (e.g. 192000 → ₹1,92,000).
     */
    private function inr(int $n): string
    {
        $num = (string) $n;
        if (strlen($num) <= 3) {
            return '₹' . $num;
        }
        $last3 = substr($num, -3);
        $rest  = preg_replace('/\B(?=(\d{2})+(?!\d))/', ',', substr($num, 0, -3));
        return '₹' . $rest . ',' . $last3;
    }

}
