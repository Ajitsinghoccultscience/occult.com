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
            'event_date'    => 'Sat, 2nd May 2026',
            'event_date_short' => 'May 2nd',
            'event_time'    => '1:00 PM – 3:00 PM IST',
            'zoho_form'     => 'https://forms.zohopublic.in/allindiainstituteofoccultsci1/form/AstrologyWebinar/formperma/u5xhvCVVKohScA-mli9GWsWCKu3-geIGBrn83l2vn-Q',
            'form_height'   => '950px',
            'alumni_path'   => 'image/astrology%20assests/',
            'alumni_files'  => ['alumni%201.jpg', 'alumni%202.jpg', 'alumni%203.jpg', 'alumni%204.jpg'],
            'whatsapp'      => 'https://chat.whatsapp.com/IslmJOLfx8c52q2YOvVG2Y',
            'attend_date'   => 'May 2nd',
            'description'   => 'decode your cosmic blueprint',
            'timer_key'     => 'astrology_offer_timer_end',
        ],
        'graphology' => [
            'name'          => 'Graphology',
            'webinar_name'  => 'Mega Graphology Webinar',
            'logo'          => 'image/compressed-images/logo300x111-removebg-preview.webp',
            'event_date'    => 'Sun, 3rd May 2026',
            'event_date_short' => 'May 3rd',
            'event_time'    => '1:00 PM – 3:00 PM IST',
            'zoho_form'     => 'https://forms.zohopublic.in/allindiainstituteofoccultsci1/form/MegaGraphologyWebinar/formperma/syGbeX5Uekmsro9yiDvTz842piWRQ-_mWlNvTiakKYM',
            'form_height'   => '850px',
            'alumni_path'   => 'image/graphology assests/',
            'alumni_files'  => ['alumni 1.jpg', 'alumni 2.jpg', 'alumni 3.jpg', 'alumni 4.jpg'],
            'whatsapp'      => 'https://chat.whatsapp.com/KcB0JS5eso8EDCYTLhmYGx',
            'attend_date'   => 'May 3rd',
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
         return view('pages.astrology.pages.astrology-webinar3');
       
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
