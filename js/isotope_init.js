// TODO: Figure out how this works and add proper settings if any is needed.
var elem = document.querySelector('.grid');

var iso = new Isotope(elem, {
  itemSelector: '.grid-item',

  masonry: {
    gutter: 5
  }

});

var images = document.querySelectorAll('.full-width-img');

Array.prototype.forEach.call(images, function (img) {
  img.addEventListener('load', function onLoad() {
    img.removeEventListener('load', onLoad);
    iso.layout();
  });
});
