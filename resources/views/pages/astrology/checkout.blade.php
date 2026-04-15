@extends('layouts.app')

@section('title', 'Register – Mega Astrology Webinar')
@section('description', 'Reserve your seat for the Mega Astrology Webinar by All India Institute of Occult Science.')

@section('content')
<div class="min-h-screen bg-white flex items-center justify-center">

    <iframe
        id="zoho-form-iframe"
        aria-label="Astrology Webinar - Less than 12 seats left"
        src="https://forms.zohopublic.in/allindiainstituteofoccultsci1/form/AstrologyWebinaroccultsciencecom/formperma/hnrAqYA_e5OFRlpxgewU90K7jjH00pahi9Gws4pJ8og"
        frameborder="0"
        allow="geolocation; microphone; camera; payment"
        style="width:100%; height:900px; border:none; display:block;"
        title="Webinar Registration Form"
        loading="eager"
    ></iframe>

</div>

<script defer>
(function () {
    var iframe = document.getElementById('zoho-form-iframe');
    var THANK_YOU_URL = '{{ url("/astrology-thankyou") }}';
    var redirected = false;

    function doRedirect() {
        if (redirected) return;
        redirected = true;
        window.location.href = THANK_YOU_URL;
    }

    // Catch all Zoho postMessage variants
    window.addEventListener('message', function (e) {
        if (!e.data) return;

        // Object messages
        if (typeof e.data === 'object') {
            var d = e.data;
            // Resize
            if (d.action === 'setHeight' && d.height) {
                var h = parseInt(d.height, 10) + 30;
                if (h > 900) iframe.style.height = h + 'px';
            }
            // Submission signals
            if (
                d.type === 'zoho_form_submitted' ||
                d.action === 'zf_submitted' ||
                d.action === 'submitComplete' ||
                d.zf_event === 'formSubmit'
            ) { doRedirect(); }
        }

        // String messages
        if (typeof e.data === 'string') {
            var parts = e.data.split('|');

            // Resize
            if (parts[0] === 'zf-iframeResize' && parts[2]) {
                var h = parseInt(parts[2], 10) + 30;
                if (h > 900) iframe.style.height = h + 'px';
            }
            if (!isNaN(parseInt(e.data, 10)) && parts.length === 1) {
                var h = parseInt(e.data, 10) + 30;
                if (h > 900) iframe.style.height = h + 'px';
            }

            // Submission signals
            if (
                e.data === 'zf_submitted' ||
                e.data.indexOf('zf_submitted') !== -1 ||
                e.data.indexOf('submitComplete') !== -1 ||
                e.data.indexOf('formSubmit') !== -1
            ) { doRedirect(); }
        }
    }, false);

    // Poll iframe URL — catches redirect after payment/thank-you
    var poll = setInterval(function () {
        try {
            var href = iframe.contentWindow.location.href;
            if (!href || href === 'about:blank') return;
            // Any URL change away from the form = submission done
            if (
                href.indexOf('zohopublic') === -1 ||
                href.indexOf('thankyou') !== -1 ||
                href.indexOf('thank-you') !== -1 ||
                href.indexOf('success') !== -1
            ) {
                clearInterval(poll);
                doRedirect();
            }
        } catch (e) { /* cross-origin — expected while form is open */ }
    }, 800);

    // Stop polling after 30 minutes
    setTimeout(function () { clearInterval(poll); }, 30 * 60 * 1000);
})();
</script>
@endsection
