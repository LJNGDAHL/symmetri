(function () {
  'use strict';

  initCookie();
  initGrid();
  initMenu();

  /** --------------------------------------------------------------------------
   * HANDLE COOKIE NOTIFICATION WARNING
   ---------------------------------------------------------------------------*/
  function initCookie() {
    var cookieReg = /notification-dismissed/;
    var cookieNotification = document.querySelector('.js-cookie-notification');
    var hideButton = document.querySelector('.js-hide-button');

    if (cookieNotification && !cookieReg.test(document.cookie)) {
      hideButton.addEventListener('click', function hideNotification() {
        var expire = new Date(Date.now() + (1000 * 60 * 60 * 24 * 365));

        // Set cookie once notification is dismissed
        document.cookie = 'notification-dismissed=true; expires=' + expire;

        // Remove cookie notification
        cookieNotification.parentElement.removeChild(cookieNotification);
      });
    }
  }

  /** --------------------------------------------------------------------------
   * HANDLE GRID WITH MASONRY
   -------------------------------------------------------------------------- */
  function initGrid() {
    var msnry, isActive;
    var MEDIAQUERY = '(min-width: 900px), (max-height: 500px) and (orientation: landscape)';
    var elem = document.querySelector('.js-grid');
    var images = document.querySelectorAll('.js-img');

    if (elem) {
      // Setup Masonry on page load.
      if (window.matchMedia(MEDIAQUERY).matches) {
        msnry = createMsnry();
      }

      // Set initial state of Masonry.
      toggleMsnry();

      /**
      * Listen for images to load
      */
      Array.prototype.forEach.call(images, function (img) {
        img.addEventListener('load', function () {
          if (isActive) {
            // Let Masonry recalculate layout
            msnry.layout();
          }
        });
      });

      /**
      * Toggle Masonry state on window resize
      */
      window.addEventListener('resize', debounce(toggleMsnry));

      /**
      * Determine whether Masonry should be active or not
      */
      function toggleMsnry() {
        var shouldBeActive = window.matchMedia(MEDIAQUERY).matches;

        if (shouldBeActive && !isActive) {
          msnry = createMsnry();
        } else if (!shouldBeActive && isActive) {
          msnry.destroy();
          isActive = false;
        }
      }

      /**
      * Create a grid using Masonry
      * @return {Masonry}
      */
      function createMsnry() {
        // Set active state for later reference
        isActive = true;

        return new Masonry(elem, {
          itemSelector: '.js-grid-item',
          gutter: 17,
          transitionDuration: 0
        });
      }
    }
  }

  /** --------------------------------------------------------------------------
   * HANDLE WHETHER OR NOT MENU IS FIXED
   -------------------------------------------------------------------------- */
  function initMenu() {
    var isQueued = false;
    var menuIsSticky = false;
    var mastHead = document.querySelector('.js-mast-head');
    var threshold = mastHead.offsetTop + mastHead.offsetHeight;
    var stickyMenu = document.querySelector('.js-menu');

    // Handle menu state on scroll
    window.addEventListener('scroll', onScroll);

    // Set initial menu state
    setMenuState();

    /**
     * Toggle menu fixed position based on scroll
     */
    function setMenuState() {
      var scroll = window.scrollY;

      // Once scrolling passed threshold
      if (scroll > threshold) {
        if (!menuIsSticky) {
          menuIsSticky = true;
          stickyMenu.classList.add('visible');
          stickyMenu.removeAttribute('hidden');
        }
      } else if (menuIsSticky) {
        menuIsSticky = false;
        stickyMenu.classList.remove('visible');
        stickyMenu.setAttribute('hidden', true);
      }
    }

    /**
     * Handle scroll in the next available frame
     */
    function onScroll() {
      // if no frame is queued
      if (!isQueued) {
        // queue a frame
        requestAnimationFrame(function () {
          // unset frame queue
          isQueued = false;
          setMenuState();
        });
      }

      // set frame queue.
      // Happens before requestAnimationFrame
      isQueued = true;
    }
  }

  /**
   * Ensures that given function only executes once during a given interval.
   * @param  {Function} fn      Give any function to debounce
   * @param  {Number}   time    The given interval (defaults to 200ms)
   * @return {Function}         Debounced function.
   */
  function debounce(fn, time) {
    var timeout;

    return function () {
      var context = this;
      var args = Array.prototype.slice.call(arguments);

      clearTimeout(timeout);
      timeout = setTimeout(function () {
        fn.apply(context, args);
      }, time || 200);
    };
  }
}());
