if (document.querySelector("#myCarousel")) {
    const myCarouselElement = document.querySelector("#myCarousel");

    const carousel = new bootstrap.Carousel(myCarouselElement, {
        interval: 1000,
        touch: false,
    });
}
