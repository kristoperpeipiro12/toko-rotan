// Ensure that both carousels operate independently
const carousel1 = document.getElementById("carouselExampleIndicators");
const carousel2 = document.getElementById("carouselExampleIndicators2");

const bootstrapCarousel1 = new bootstrap.Carousel(carousel1, {
    interval: 5000, // Slide interval for the first carousel
    ride: "carousel",
});

const bootstrapCarousel2 = new bootstrap.Carousel(carousel2, {
    interval: 7000, // Slide interval for the second carousel
    ride: "carousel",
});
