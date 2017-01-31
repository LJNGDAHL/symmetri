(function () {
  'use strict';

  var iso;
  var elem = document.querySelector('.grid');
  var images = document.querySelectorAll('.full-width-img');

  if (elem) {
    /**
     * Create a grid using Isotope
     * @type {Isotope}
     */
    iso = new Isotope(elem, {
      itemSelector: '.grid-item',
      masonry: {
        gutter: 5
      }
    });

    /**
     * Listen for images to load.
     */
    Array.prototype.forEach.call(images, function (img) {
      img.addEventListener('load', function onLoad() {
        img.removeEventListener('load', onLoad);

        // Let Isotope recalculate layout.
        iso.layout();
      });
    });
  }
}());
