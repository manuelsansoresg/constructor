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
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        autoHeight: true,
    });


});

window.openModalProduct = function(path, image, title, price, discount , description) {

    if (image != '') {
        $("#modal-product-img").attr("src", path+'/'+image);
    }
    $("#modal-product-title").html(title);
    $("#modal-product-price").html(price);
    if (discount != '') {
        $("#modal-product-price").html('<del>' + price + '</del>');
        $("#modal-product-discount").html(discount);
    }
    $("#modal-product-description").html(description);

    $('#modal-product').modal('show');
}