@extends('layouts.app')

@section('title', 'Register for Mega Graphology Webinar')
@section('description', 'Register for the Mega Graphology Webinar - Reserve your seat now.')

@section('content')
<iframe
    id="zoho-form-iframe"
    src="https://forms.zohopublic.in/allindiainstituteofoccultsci1/form/MegaWebnar/formperma/G5-sJzQY1LJXGwjhhOK6RpOrPD680Uc6NMOQhg1Yv88"
    width="100%"
    frameborder="0"
    scrolling="no"
    allow="geolocation; microphone; camera"
    style="height: 1200px; border: none; display: block;"
    title="Webinar Registration Form"
></iframe>
@endsection

@push('scripts')
<script>
(function () {
    var iframe  = document.getElementById('zoho-form-iframe');
    var THANK_YOU_URL = '{{ url("/graphology-thankyou") }}';
    var redirected  = false;

    function doRedirect() {
        if (redirected) return;
        redirected = true;
        window.top.location.href = THANK_YOU_URL;
    }

    // ── METHOD 1: postMessage ─────────────────────────────────────────────────
    // Zoho sends height updates AND (after our /thankyou redirect) our own page
    // fires postMessage({ type: 'zoho_form_submitted' }) back to the parent.
    window.addEventListener('message', function (e) {
        // Zoho auto-resize: resize the iframe to match content
        if (e.data && typeof e.data === 'object') {
            if (e.data.action === 'setHeight' && e.data.height) {
                iframe.style.height = (parseInt(e.data.height, 10) + 30) + 'px';
            }
            // Our own thankyou page sends this signal (see thankyou.blade.php)
            if (e.data.type === 'zoho_form_submitted') {
                doRedirect();
            }
        }
        // Zoho Forms sends: "zf-iframeResize|height|900" (pipe-delimited string)
        if (typeof e.data === 'string') {
            var parts = e.data.split('|');
            if (parts[0] === 'zf-iframeResize' && parts[2]) {
                iframe.style.height = (parseInt(parts[2], 10) + 30) + 'px';
            }
            // Fallback: plain numeric string
            if (!isNaN(parseInt(e.data, 10)) && parts.length === 1) {
                iframe.style.height = (parseInt(e.data, 10) + 30) + 'px';
            }
        }
    }, false);

    // ── METHOD 2: window.top (handled inside /thankyou page itself) ───────────
    // When Zoho redirects the iframe to our /thankyou URL, that page runs
    //   window.top.location.href = THANK_YOU_URL
    // That covers method 2 entirely — no extra code needed here.

    // ── METHOD 3: URL polling ─────────────────────────────────────────────────
    // Once Zoho navigates the iframe to our same-origin /thankyou page we can
    // read iframe.contentWindow.location.href (cross-origin throws, same-origin works).
    var pollInterval = setInterval(function () {
        try {
            var iframeHref = iframe.contentWindow.location.href;
            if (iframeHref && iframeHref.indexOf('/thankyou') !== -1) {
                clearInterval(pollInterval);
                doRedirect();
            }
        } catch (crossOriginError) {
            // Still on Zoho domain — cross-origin block is expected, keep polling
        }
    }, 600);

    // Stop polling after 20 minutes (safety cleanup)
    setTimeout(function () { clearInterval(pollInterval); }, 20 * 60 * 1000);
})();
</script>
@endpush
