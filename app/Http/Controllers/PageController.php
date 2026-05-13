<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('pages.astrology.pages.astrology-webinar');
    }

    public function graphologyWebinar()
    {
        return view('pages.graphology.pages.graphology-webinar');
    }

    public function graphologyWebinarlvl1()
    {
        return view('pages.graphology.pages.graphology-webinar1');
    }

    public function astrologyWebinar()
    {
        return view('pages.astrology.pages.astrology-webinar1');
    }

    public function astrologyWebinar3()
    {
         return view('pages.astrology.pages.astrology-webinar6');
       
    }

    public function checkout(Request $request)
    {
        $product = $request->query('product', '');
        if (!array_key_exists($product, $this->products)) {
            abort(404);
        }
        return view('pages.checkout', ['product' => $product, 'config' => $this->products[$product]]);
    }

    public function thankyou(Request $request)
    {
        $product = $request->query('product', '');
        if (!array_key_exists($product, $this->products)) {
            abort(404);
        }
        return view('pages.thankyou', ['product' => $product, 'config' => $this->products[$product]]);
    }
}
