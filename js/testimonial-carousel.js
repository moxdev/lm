// Carousel
var elem = document.querySelector('.testimonial-carousel');
var flkty = new Flickity( elem, {
    contain: true,
    pageDots: false,
    setGallerySize: true,
    groupCells: true,
    autoPlay: 7000,
    resize: true,
    selectedAttraction: 0.01,
    friction: 0.2,
    wrapAround: true
});