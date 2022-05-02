$(document).ready(function () {

    var $owl = $('.owl-carousel').owlCarousel({
        stagePadding: 0,
        items: 1,
        loop: true,
        margin: 0,
        singleItem: true,
        nav: true,
        /* 
        navText: [
            "<i class='fa fa-caret-left'></i>",
            "<i class='fa fa-caret-right'></i>"
        ], */
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000
    });


});
window.addTitle = function () {
    let title = $('#titlePage').val();
    axios
        .post("/page/store", { title: title })
        .then(function (response) {
            Livewire.emit('updatePages');
            $("#close-page-modal").trigger("click");

        })
        .catch(e => { });

}

window.modalSection = function () {
    $('#sectionModal').modal('show');
}

window.changeSection = function (page_actual) {
    let section_id = $('#section').val();
    setDataModal(page_actual, section_id, 'null')
}

window.setDataModal = function (page_actual, section_id, widget_id) {
    
    getDataModal(section_id, widget_id);
    closeModalSection('sectionModal');
    switch (section_id) {
        case '2':
            $('#modal-carusel-section_id').val(section_id);
            $('#modal-carusel-widget_id').val(widget_id);
            $('#modal-carusel-page_actual').val(page_actual);
            $('#modal-widget-carusel').modal('show');

            break;

        default:
            $('#modal-encabezado-section_id').val(section_id);
            $('#modal-encabezado-widget_id').val(widget_id);
            $('#modal-encabezado-page_actual').val(page_actual);
            $('#modal-widget-header').modal('show');
            break;
    }
}

function getDataModal(section_id, widget_id) {
    axios.get("/admin/getDataWidget/"+section_id+'/'+widget_id)
        .then(function (response) {
            let result = response.data;
            switch (section_id) {
                case '2':
                  
                    break;
            
                default:
                    $('#encabezado-title').val(result.title);
                    $('#encabezado-phone').val(result.phone);
                    $('#encabezado-phone2').val(result.phone2);
                    break;
            }
            
        })
        .catch(e => { });
}

window.closeModalSection = function (div) {
    $('#' + div + '').modal('hide');
}


$(function () {

    window.Livewire.on('setScroll', divPosition => {
        $('.tree').jstree();

        $('html, body').animate({
            scrollTop: $(divPosition).offset().top
        }, 2000);
    })

    window.Livewire.on('setTree', divPosition => {
        $('.tree').jstree();

    })

    window.Livewire.on('setSummernote', divPosition => {
        $('.summernote').summernote({

        });
        $(".summernote").on("summernote.change", function (e) {   // callback as jquery custom event 
            Livewire.emit('setTitle', this.value);
            console.log(this.value);

        });
    })

    window.Livewire.on('setSummerTitle', title => {
        console.log(title);
        $('#title').val(title);
    })

});