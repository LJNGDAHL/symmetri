(function () {
  'use strict';

  var msnry;
  var elem = document.querySelector('.grid');
  var images = document.querySelectorAll('.full-width-img');

  if (elem) {
    /**
     * Create a grid using Masonry
     * @type {Masonry}
     */
  msnry = new Masonry(elem, {
      itemSelector: '.grid-item',
      gutter: 40
    });

    /**
     * Listen for images to load.
     */
    Array.prototype.forEach.call(images, function (img) {
      img.addEventListener('load', function onLoad() {
        // Let Masonry recalculate layout.
        msnry.layout();
      });
    });
  }
}());
