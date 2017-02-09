(function () {
  'use strict';

  var msnry, isActive, timeout;
  var MEDIAQUERY = '(min-width: 900px), (max-height: 500px) and (orientation: landscape)';
  var elem = document.querySelector('.grid');
  var images = document.querySelectorAll('.full-width-img');

  if (elem) {

    msnry = createMsnry();

    toggleMsnry();

    /**
     * Listen for images to load.
     */
    Array.prototype.forEach.call(images, function (img) {
      img.addEventListener('load', function () {

        if (isActive) {
          // Let Masonry recalculate layout.
          msnry.layout();
        }
      });
    });
  }
  /**
  * Debounce toggleMsnry for 200ms on window resize
  */
  window.addEventListener('resize', debounce(toggleMsnry));


  /**
   * Determine whether Msnry should be active or not.
   */
  function toggleMsnry() {
    var shouldBeActive = window.matchMedia(MEDIAQUERY).matches;

    if (shouldBeActive && !isActive) {
      msnry = createMsnry();
    } else if (!shouldBeActive && isActive) {
      msnry.destroy();
    }

    isActive = shouldBeActive;
  }

  // TODO: Clean up and comment!

  var isScrolling = false;
  var menuIsSticky = false;
  var logo = document.querySelector('.main-logo');
  var threshold = logo.offsetTop + logo.offsetHeight;
  var mastHead = document.getElementById('menu');

  window.addEventListener('scroll', onScroll);

  setMenuState();

  function setMenuState() {
    var scroll = window.scrollY;

    if (scroll > threshold) {
      if (!menuIsSticky) {
        menuIsSticky = true;
        console.log('yay!');
        mastHead.classList.add('sticky');
      }
    } else {
      menuIsSticky = false;
      mastHead.classList.remove('sticky');
    }
  }

  function onScroll() {
    if (!isScrolling) {
      requestAnimationFrame(function () {
        isScrolling = false;
        setMenuState();
      });
    }

    isScrolling = true;
  }

  function debounce(fn, time) {
    var timeout;

    return function () {
      var args = Array.prototype.slice.call(arguments);

      clearTimeout(timeout);
      timeout = setTimeout(function () {
        fn.apply(this, args);
      }, time || 200);
    };
  }

  /**
   * Create a grid using Masonry
   * @return {Masonry}
   */
  function createMsnry() {
    return new Masonry(elem, {
      itemSelector: '.grid-item',
      gutter: 40,
      transitionDuration: 0
    });
  }

}());
