var $owl = $('.owl-carousel').owlCarousel({
    stagePadding: 0,
    items: 1,
    loop:true,
    margin:0,
    singleItem:true,
    nav:true,
    /* 
    navText: [
        "<i class='fa fa-caret-left'></i>",
        "<i class='fa fa-caret-right'></i>"
    ], */
    dots:true,
    autoplay:true,
    autoplayTimeout:5000
});

window.addTitle = function()
{
    let title = $('#titlePage').val();
    axios
    .post("/page/store", {title:title})
    .then(function (response) {
       Livewire.emit('updatePages');
       $( "#close-page-modal" ).trigger( "click" );
       
    })
    .catch(e => { });

}

window.modalSection = function() {
    $('#sectionModal').modal('show');
}

window.changeSection = function() {
    let widget_id = $('#section').val();
    Livewire.emit('updateSection', widget_id);
    $('#sectionModal').modal('hide');
}

$(function(){

    window.Livewire.on('setScroll', divPosition => {
        $('.tree').jstree();

        $('html, body').animate({
            scrollTop: $(divPosition).offset().top
        }, 2000);
    })
    
    window.Livewire.on('setTree', divPosition => {
        $('.tree').jstree();
       
    })

});