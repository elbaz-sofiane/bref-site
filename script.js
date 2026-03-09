/**
 * BREF BARBER SHOP — script.js
 * Compatible: Chrome 60+, Firefox 55+, Safari 11+, Edge 18+
 * No dependencies — vanilla JS only
 */

(function () {
  'use strict';

  /* ============================================================
     UTILITIES
     ============================================================ */

  /**
   * Shorthand querySelector
   * @param {string} sel
   * @param {Element|Document} ctx
   * @returns {Element|null}
   */
  function qs(sel, ctx) {
    return (ctx || document).querySelector(sel);
  }

  /**
   * Shorthand querySelectorAll → Array
   * @param {string} sel
   * @param {Element|Document} ctx
   * @returns {Element[]}
   */
  function qsa(sel, ctx) {
    return Array.prototype.slice.call((ctx || document).querySelectorAll(sel));
  }

  /**
   * Add event listener with optional once support
   */
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
      nav.classList.toggle('scrolled', y > 50);

      // Hide nav on fast scroll down, show on scroll up
      if (y > 300 && y > lastY + 5) {
        nav.style.transform = 'translateY(-100%)';
        nav.style.transition = 'transform 0.4s ease, background 0.4s ease, padding 0.3s ease';
      } else if (y < lastY - 5 || y <= 300) {
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

    // Run once on load
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
      document.body.style.overflow = 'hidden'; // prevent scroll behind
    }

    function closeMenu() {
      isOpen = false;
      menu.classList.remove('is-open');
      burger.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    }

    on(burger, 'click', function () {
      if (isOpen) {
        closeMenu();
      } else {
        openMenu();
      }
    });

    // Close on link click
    links.forEach(function (link) {
      on(link, 'click', closeMenu);
    });

    // Close on Escape key
    on(document, 'keydown', function (e) {
      if (isOpen && (e.key === 'Escape' || e.keyCode === 27)) {
        closeMenu();
        burger.focus();
      }
    });

    // Close when clicking outside
    on(menu, 'click', function (e) {
      if (e.target === menu) {
        closeMenu();
      }
    });
  }());

  /* ============================================================
     SCROLL REVEAL — IntersectionObserver with fallback
     ============================================================ */
  (function initReveal() {
    var elements = qsa('.reveal');
    if (!elements.length) return;

    // If IntersectionObserver is not supported, just show everything
    if (!('IntersectionObserver' in window)) {
      elements.forEach(function (el) {
        el.classList.add('is-visible');
      });
      return;
    }

    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target); // fire once
          }
        });
      },
      {
        threshold: 0.1,
        rootMargin: '0px 0px -40px 0px'
      }
    );

    elements.forEach(function (el) {
      observer.observe(el);
    });
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

        var nav = qs('#nav');
        var navH = nav ? nav.offsetHeight : 0;
        var targetY = target.getBoundingClientRect().top + window.pageYOffset - navH;

        // Use native smooth scroll if available, else manual
        if ('scrollBehavior' in document.documentElement.style) {
          window.scrollTo({ top: targetY, behavior: 'smooth' });
        } else {
          scrollTo(targetY, 600);
        }
      });
    });

    /**
     * Polyfill smooth scroll
     * @param {number} targetY
     * @param {number} duration ms
     */
    function scrollTo(targetY, duration) {
      var startY = window.pageYOffset;
      var diff   = targetY - startY;
      var startTime = null;

      function step(timestamp) {
        if (!startTime) startTime = timestamp;
        var elapsed = timestamp - startTime;
        var progress = Math.min(elapsed / duration, 1);
        // Ease in-out cubic
        var ease = progress < 0.5
          ? 4 * progress * progress * progress
          : 1 - Math.pow(-2 * progress + 2, 3) / 2;

        window.scrollTo(0, startY + diff * ease);
        if (elapsed < duration) {
          window.requestAnimationFrame(step);
        }
      }
      window.requestAnimationFrame(step);
    }
  }());

  /* ============================================================
     TABLE — Row hover accessibility
     ============================================================ */
  (function initTable() {
    var rows = qsa('.price-table tbody tr');

    rows.forEach(function (row) {
      // Keyboard focus for table rows (if ever made focusable)
      on(row, 'focus', function () {
        row.classList.add('is-hover');
      });
      on(row, 'blur', function () {
        row.classList.remove('is-hover');
      });
    });
  }());

  /* ============================================================
     GALLERY — Lazy load & lightbox-ready placeholder
     ============================================================ */
  (function initGallery() {
    var items = qsa('.gal-item');

    items.forEach(function (item, i) {
      // Add stagger to reveal animation
      var delay = (i % 3) * 0.1;
      item.style.transitionDelay = delay + 's';

      // If item contains an <img> with data-src, lazy load it
      var img = qs('img[data-src]', item);
      if (!img) return;

      if ('IntersectionObserver' in window) {
        var lazyObserver = new IntersectionObserver(function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              img.src = img.getAttribute('data-src');
              img.removeAttribute('data-src');
              lazyObserver.unobserve(entry.target);
            }
          });
        }, { rootMargin: '200px' });

        lazyObserver.observe(item);
      } else {
        // Fallback: load immediately
        img.src = img.getAttribute('data-src');
        img.removeAttribute('data-src');
      }
    });
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
      var nav = qs('#nav');
      var navH = nav ? nav.offsetHeight : 0;
      var scrollY = window.pageYOffset + navH + 20;

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
  }());

  /* ============================================================
     CTA BAND — Parallax-lite effect on scroll
     ============================================================ */
  (function initCtaParallax() {
    var cta = qs('#cta');
    if (!cta) return;
    // Only run on non-reduced-motion, larger screens
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    if (window.innerWidth < 768) return;

    var ticking = false;
    on(window, 'scroll', function () {
      if (!ticking) {
        window.requestAnimationFrame(function () {
          var rect = cta.getBoundingClientRect();
          if (rect.top < window.innerHeight && rect.bottom > 0) {
            var progress = 1 - (rect.top / window.innerHeight);
            cta.style.backgroundPositionY = (progress * 15).toFixed(1) + 'px';
          }
          ticking = false;
        });
        ticking = true;
      }
    }, { passive: true });
  }());

  /* ============================================================
     INIT COMPLETE
     ============================================================ */
  // Expose a minimal public API if needed
  window.BrefBarber = {
    version: '1.0.0'
  };

}());