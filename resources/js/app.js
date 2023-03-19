import "./bootstrap";
import "../sass/app.scss";

AOS.init({
    once: true,
    mirror: true,
});

$(document).ready(function () {
    // Logout
    $(document).on("click", "#logOut", function (e) {
        e.preventDefault();
        $("#logout-form").submit();
    });

    // Nav On Scroll
    $(document).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $(".custom-navbar").addClass("sticky");
        } else {
            $(".custom-navbar").removeClass("sticky");
        }
    });

    // Testimonial Carousel
    $(".testimonial-carousel").slick({
        autoplay: true,
        autoplaySpeed: 5000,
        variableWidth: true,
        centerMode: true,
        slidesToShow: 3,
        focusOnSelect: true,
        arrows: false,
        infinite: true,
        slidesToScroll: 1,
    });

    // Gallery Slide
    $(".gallery-container").slick({
        slidesToShow: 7,
        focusOnSelect: true,
        arrows: false,
        infinite: true,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 5,
                },
            },
        ],
    });

    $(document).on("click", ".gallery-container .item", function () {
        let imgSelected = $(this).find("img").attr("src");

        $(".single-feature-image").attr("src", imgSelected);
    });

    // Similar Listings Carousel
    $(".similar-carousel").slick({
        slidesToShow: 4,
        variableWidth: true,
        focusOnSelect: true,
        arrows: false,
        infinite: false,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    variableWidth: false,
                },
            },
        ],
    });
});
