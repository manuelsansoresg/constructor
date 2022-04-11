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
        $('html, body').animate({
            scrollTop: $(divPosition).offset().top
        }, 2000);
    })
    
    window.Livewire.on('setTree', divPosition => {
        $('.tree').jstree();
    })

});