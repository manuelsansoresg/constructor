import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';

$(document).ready(function () {

    var $owl = $('.owl-carousel').owlCarousel({
        stagePadding: 0,
        items: 1,
        loop: true,
        margin: 0,
        singleItem: true,
        nav: true,
        responsiveClass:true,
        
        navText: [
            "<i class='fa fa-caret-left'></i>",
            "<i class='fa fa-caret-right'></i>"
        ],
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoHeight: true,
    });


});