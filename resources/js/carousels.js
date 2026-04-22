/**
 * Shared carousel module — loaded once by Vite, cached by browser.
 * Components register configs via window.__carousels queue; this
 * file processes them after DOMContentLoaded.
 *
 * Types:
 *   "indexed"  (default) — scrolls to slides[n].offsetLeft (supports dots + prev/next)
 *   "scrollby"           — scrolls by clientWidth (for snap/flex carousels without index)
 */
(function () {
  'use strict';

  function initCarousel(cfg) {
    var el = document.getElementById(cfg.id);
    if (!el) return;

    var current = 0;
    var paused  = false;
    var interval = cfg.interval || 2500;
    var offsetPad = cfg.offsetPad || 0;
    var type = cfg.type || 'indexed';

    function getSlides() {
      return cfg.slideClass
        ? el.querySelectorAll(cfg.slideClass)
        : el.querySelectorAll(':scope > *');
    }

    function getDots() {
      if (!cfg.dotPrefix) return [];
      return Array.from(document.querySelectorAll('[id^="' + cfg.dotPrefix + '"]'));
    }

    function updateDots(idx) {
      var dots = getDots();
      var activeColor   = cfg.dotActive   !== undefined ? cfg.dotActive   : '#800202';
      var inactiveColor = cfg.dotInactive !== undefined ? cfg.dotInactive : '#d6d6d6';
      dots.forEach(function (d, i) {
        d.style.backgroundColor = (i === idx) ? activeColor : inactiveColor;
      });
    }

    // ── Indexed (scrollTo absolute position) ──────────────────────
    function goTo(index) {
      var slides = getSlides();
      if (!slides.length) return;
      if (index >= slides.length) index = 0;
      if (index < 0) index = slides.length - 1;
      current = index;
      el.scrollTo({ left: slides[current].offsetLeft - offsetPad, behavior: 'smooth' });
      updateDots(current);
    }

    // ── ScrollBy (scroll by one viewport width) ───────────────────
    function scrollByNext() {
      var atEnd = el.scrollLeft + el.clientWidth >= el.scrollWidth - 5;
      el.scrollBy({ left: atEnd ? -el.scrollWidth : el.clientWidth, behavior: 'smooth' });
    }
    function scrollByPrev() {
      var atStart = el.scrollLeft <= 5;
      el.scrollBy({ left: atStart ? el.scrollWidth : -el.clientWidth, behavior: 'smooth' });
    }

    var next = (type === 'scrollby') ? scrollByNext : function () { goTo(current + 1); };
    var prev = (type === 'scrollby') ? scrollByPrev : function () { goTo(current - 1); };

    // ── Buttons ────────────────────────────────────────────────────
    function bindBtn(id, fn) {
      var btn = document.getElementById(id);
      if (!btn) return;
      btn.addEventListener('click', function () {
        paused = true; fn();
        setTimeout(function () { paused = false; }, 3000);
      });
    }
    if (cfg.prevId) bindBtn(cfg.prevId, prev);
    if (cfg.nextId) bindBtn(cfg.nextId, next);

    // ── Dot clicks ─────────────────────────────────────────────────
    getDots().forEach(function (dot, i) {
      dot.addEventListener('click', function () {
        paused = true; goTo(i);
        setTimeout(function () { paused = false; }, 3000);
      });
    });

    // ── Pause on hover / touch ────────────────────────────────────
    el.addEventListener('mouseenter', function () { paused = true; });
    el.addEventListener('mouseleave', function () { paused = false; });
    el.addEventListener('touchstart', function () { paused = true; }, { passive: true });
    el.addEventListener('touchend', function () {
      setTimeout(function () { paused = false; }, 2000);
    }, { passive: true });

    // ── Expose globally (for onclick="window.X?.next()" patterns) ─
    if (cfg.name) {
      window[cfg.name] = { next: next, prev: prev };
    }

    // ── Initial state ─────────────────────────────────────────────
    if (type === 'indexed') updateDots(0);

    // ── Auto-advance: only start when section enters viewport ─────
    var timer = null;
    var obs = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting && !timer) {
          timer = setInterval(function () { if (!paused) next(); }, interval);
          obs.disconnect();
        }
      });
    }, { threshold: 0.1 });
    obs.observe(el);
  }

  function processQueue() {
    (window.__carousels || []).forEach(initCarousel);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', processQueue);
  } else {
    processQueue();
  }
}());
