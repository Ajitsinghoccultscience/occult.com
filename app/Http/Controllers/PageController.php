<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private array $products = [
        'astrology' => [
            'name'          => 'Astrology',
            'webinar_name'  => 'Mega Astrology Webinar',
            'trainer'       => 'Miss. Laxmi',
            'trainer_role'  => 'Astrologer · All India Institute of Occult Science',
            'trainer_bio'   => "B.Tech + Master's in Astrology — Vedic wisdom meets analytical thinking.",
            'trainer_image' => 'image/astrology%20assests/laxmi%20mam.png',
            'logo'          => 'image/astrology%20assests/logo%40300x%20%281%29.webp',
            'event_date'    => 'Sat, 25th April 2026',
            'event_date_short' => 'April 25th',
            'event_time'    => '1:00 PM – 3:00 PM IST',
            'zoho_form'     => 'https://forms.zohopublic.in/allindiainstituteofoccultsci1/form/AstrologyWebinar/formperma/u5xhvCVVKohScA-mli9GWsWCKu3-geIGBrn83l2vn-Q',
            'form_height'   => '950px',
            'alumni_path'   => 'image/astrology%20assests/',
            'alumni_files'  => ['alumni%201.jpg', 'alumni%202.jpg', 'alumni%203.jpg', 'alumni%204.jpg'],
            'whatsapp'      => 'https://chat.whatsapp.com/BFIYGRs0d0kEcpnAt2OKPZ',
            'attend_date'   => 'April 25th',
            'description'   => 'decode your cosmic blueprint',
            'timer_key'     => 'astrology_offer_timer_end',
        ],
        'graphology' => [
            'name'          => 'Graphology',
            'webinar_name'  => 'Mega Graphology Webinar',
            'trainer'       => 'Pawan Sir',
            'trainer_role'  => 'Graphologist · All India Institute of Occult Science',
            'trainer_bio'   => 'Expert in handwriting analysis with years of experience in Graphology.',
            'trainer_image' => 'image/graphology assests/pawan sir.jpg',
            'logo'          => 'image/graphology assests/logo (2) 1.svg',
            'event_date'    => 'Sun, 26 April 2026',
            'event_date_short' => 'April 26th',
            'event_time'    => '1:00 PM – 3:00 PM IST',
            'zoho_form'     => 'https://forms.zohopublic.in/allindiainstituteofoccultsci1/form/MegaGraphologyWebinar/formperma/syGbeX5Uekmsro9yiDvTz842piWRQ-_mWlNvTiakKYM',
            'form_height'   => '850px',
            'alumni_path'   => 'image/graphology assests/',
            'alumni_files'  => ['alumni 1.jpg', 'alumni 2.jpg', 'alumni 3.jpg', 'alumni 4.jpg'],
            'whatsapp'      => 'https://chat.whatsapp.com/LbpRef6d9we7RHzCh9jWtc',
            'attend_date'   => 'April 26th',
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
