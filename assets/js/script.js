/**
 * BREF BARBER SHOP — script.js
 * Vanilla JS — no dependencies — deferred loading
 * Compatible: Chrome 60+, Firefox 55+, Safari 11+, Edge 18+
 */

(function () {
  'use strict';

  /* ============================================================
     UTILITIES
     ============================================================ */
  function qs(sel, ctx) {
    return (ctx || document).querySelector(sel);
  }

  function qsa(sel, ctx) {
    return Array.prototype.slice.call((ctx || document).querySelectorAll(sel));
  }

  function on(el, type, handler, opts) {
    if (el) el.addEventListener(type, handler, opts || false);
  }

  /* ============================================================
     NAVIGATION — Sticky / Scrolled state
     ============================================================ */
  (function initNav() {
    var nav = qs('#nav');
    if (!nav) return;

    var lastY = 0;
    var ticking = false;

    function updateNav() {
      var y = window.pageYOffset || document.documentElement.scrollTop;
      nav.classList.toggle('scrolled', y > 60);

      // Hide nav on fast scroll down (>300px), show on scroll up
      if (y > 300 && y > lastY + 6) {
        nav.style.transform = 'translateY(-100%)';
        nav.style.transition = 'transform 0.4s ease, background 0.4s ease, padding 0.3s ease';
      } else if (y < lastY - 6 || y <= 300) {
        nav.style.transform = 'translateY(0)';
      }
      lastY = y;
      ticking = false;
    }

    on(window, 'scroll', function () {
      if (!ticking) {
        window.requestAnimationFrame(updateNav);
        ticking = true;
      }
    }, { passive: true });

    updateNav();
  }());

  /* ============================================================
     MOBILE MENU — Burger toggle
     ============================================================ */
  (function initMobileMenu() {
    var burger = qs('#burger');
    var menu   = qs('#mobMenu');
    if (!burger || !menu) return;

    var isOpen = false;
    var links  = qsa('.mob-menu__link', menu);

    function openMenu() {
      isOpen = true;
      menu.classList.add('is-open');
      burger.setAttribute('aria-expanded', 'true');
      document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
      isOpen = false;
      menu.classList.remove('is-open');
      burger.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    }

    on(burger, 'click', function () {
      isOpen ? closeMenu() : openMenu();
    });

    links.forEach(function (link) {
      on(link, 'click', closeMenu);
    });

    on(document, 'keydown', function (e) {
      if (isOpen && (e.key === 'Escape' || e.keyCode === 27)) {
        closeMenu();
        burger.focus();
      }
    });

    on(menu, 'click', function (e) {
      if (e.target === menu) closeMenu();
    });
  }());

  /* ============================================================
     SCROLL REVEAL — IntersectionObserver
     ============================================================ */
  (function initReveal() {
    var elements = qsa('.reveal');
    if (!elements.length) return;

    if (!('IntersectionObserver' in window)) {
      elements.forEach(function (el) { el.classList.add('is-visible'); });
      return;
    }

    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.08, rootMargin: '0px 0px -30px 0px' }
    );

    elements.forEach(function (el) { observer.observe(el); });
  }());

  /* ============================================================
     SMOOTH SCROLL — Anchor links
     ============================================================ */
  (function initSmoothScroll() {
    var anchors = qsa('a[href^="#"]');

    anchors.forEach(function (anchor) {
      on(anchor, 'click', function (e) {
        var href = anchor.getAttribute('href');
        if (href === '#') return;

        var target = qs(href);
        if (!target) return;

        e.preventDefault();

        var nav  = qs('#nav');
        var navH = nav ? nav.offsetHeight : 0;
        var targetY = target.getBoundingClientRect().top + window.pageYOffset - navH - 8;

        if ('scrollBehavior' in document.documentElement.style) {
          window.scrollTo({ top: targetY, behavior: 'smooth' });
        } else {
          easeScroll(targetY, 600);
        }
      });
    });

    function easeScroll(targetY, duration) {
      var startY   = window.pageYOffset;
      var diff     = targetY - startY;
      var startTime = null;

      function step(ts) {
        if (!startTime) startTime = ts;
        var elapsed  = ts - startTime;
        var progress = Math.min(elapsed / duration, 1);
        var ease = progress < 0.5
          ? 4 * progress * progress * progress
          : 1 - Math.pow(-2 * progress + 2, 3) / 2;

        window.scrollTo(0, startY + diff * ease);
        if (elapsed < duration) window.requestAnimationFrame(step);
      }
      window.requestAnimationFrame(step);
    }
  }());

  /* ============================================================
     ACTIVE NAV LINK — Highlight based on scroll position
     ============================================================ */
  (function initActiveLink() {
    var sections = qsa('section[id], div[id]');
    var navLinks = qsa('.nav__links a[href^="#"]');
    if (!navLinks.length) return;

    var ticking = false;

    function update() {
      var nav   = qs('#nav');
      var navH  = nav ? nav.offsetHeight : 0;
      var scrollY = window.pageYOffset + navH + 30;

      var current = '';
      sections.forEach(function (section) {
        if (section.offsetTop <= scrollY) {
          current = '#' + section.getAttribute('id');
        }
      });

      navLinks.forEach(function (link) {
        link.classList.toggle('is-active', link.getAttribute('href') === current);
      });
      ticking = false;
    }

    on(window, 'scroll', function () {
      if (!ticking) {
        window.requestAnimationFrame(update);
        ticking = true;
      }
    }, { passive: true });

    update();
  }());

  /* ============================================================
     GALLERY — Lazy load with IntersectionObserver
     ============================================================ */
  (function initGallery() {
    var items = qsa('.gal-item');

    items.forEach(function (item, i) {
      // Stagger reveal delay
      item.style.transitionDelay = (i * 0.08) + 's';

      var img = qs('img[data-src]', item);
      if (!img) return;

      if ('IntersectionObserver' in window) {
        var lo = new IntersectionObserver(function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              img.src = img.getAttribute('data-src');
              img.removeAttribute('data-src');
              lo.unobserve(entry.target);
            }
          });
        }, { rootMargin: '200px' });
        lo.observe(item);
      } else {
        img.src = img.getAttribute('data-src');
        img.removeAttribute('data-src');
      }
    });
  }());

  /* ============================================================
     PERFORMANCE — Fonts loaded → remove layout shift insurance
     ============================================================ */
  if ('fonts' in document) {
    document.fonts.ready.then(function () {
      document.documentElement.classList.add('fonts-loaded');
    });
  }

  /* ============================================================
     PUBLIC API
     ============================================================ */
  window.BrefBarber = { version: '2.0.0' };

}());