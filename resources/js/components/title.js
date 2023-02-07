import Swal from 'sweetalert2'

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
    let section_modal_section = $('#section-modal-section').val();
    let section_template = $('#section-template').val();
    if (section_modal_section == 1) {
        let name_section = 'encabezado';
       
        switch (section_id) {
            case '2':
                name_section = 'carusel'
                break;
            case '3':
                name_section = 'texto'
                break;
            case '4':
                name_section = 'two-columns'
                break;
            case '5':
                name_section = 'parallax'
                break;
            case '6':
                name_section = 'producto'
                break;
            case '7':
                name_section = 'video'
                break;
            case '8':
                name_section = 'galeria'
                break;
            case '9':
                name_section = 'contacto'
                break;
        }
        let url = '/admin/'+name_section+'/'+page_actual+'/null/edit'

        window.location = url;
    } else {
        //selecciono la opcion template
        axios
        .post("/admin/template/store", { section_template: section_template, page_actual:page_actual })
        .then(function (response) {
            let result = response.data;
            location.reload();
        })
        .catch(e => { });
    }
    
}



window.setDataModal = function (page_actual, section_id, widget_id) {

    getDataModal(section_id, widget_id, page_actual);
    closeModalSection('sectionModal');
    switch (section_id) {
       
        case '2':
            $('#modal-carusel-section_id').val(section_id);
            $('#modal-carusel-widget_id').val(widget_id);
            $('#modal-carusel-page_actual').val(page_actual);
            $('#modal-widget-carusel').modal('show');
            break;
        case '3':
            $('#modal-texto-section_id').val(section_id);
            $('#modal-texto-widget_id').val(widget_id);
            $('#modal-texto-page_actual').val(page_actual);
            $('#modal-widget-texto').modal('show');
            break;
        case '4':
                $('#modal-two-columns-section_id').val(section_id);
                $('#modal-two-columns-widget_id').val(widget_id);
                $('#modal-two-columns-page_actual').val(page_actual);
                $('#modal-widget-two-columns').modal('show');
                $('#modal-widget-two-columns').addClass('addScroll');
            break;
        case '5':
                $('#modal-parallax-section_id').val(section_id);
                $('#modal-parallax-widget_id').val(widget_id);
                $('#modal-parallax-page_actual').val(page_actual);
                $('#modal-widget-parallax').modal('show');
                $('#modal-widget-parallax').addClass('addScroll');
            break;
        case '7':
                $('#modal-video-section_id').val(section_id);
                $('#modal-video-widget_id').val(widget_id);
                $('#modal-video-page_actual').val(page_actual);
                $('#modal-widget-video').modal('show');
                $('#modal-widget-video').addClass('addScroll');
            break;
        case '8':
                $('#modal-gallery-section_id').val(section_id);
                $('#modal-gallery-widget_id').val(widget_id);
                $('#modal-gallery-page_actual').val(page_actual);
                $('#modal-widget-gallery').modal('show');
                $('#modal-widget-gallery').addClass('addScroll');
            break;
        case '9':
                $('#modal-contacto-section_id').val(section_id);
                if (widget_id != 'null') {
                    $('#modal-contacto-widget_id').val(widget_id);
                }
                
                $('#modal-contacto-page_actual').val(page_actual);
                $('#modal-widget-contacto').modal('show');
                $('#modal-widget-contacto').addClass('addScroll');
            break;

        default:
            $('#modal-encabezado-section_id').val(section_id);
            $('#modal-encabezado-widget_id').val(widget_id);
            $('#modal-encabezado-page_actual').val(page_actual);
            $('#modal-widget-header').modal('show');
            break;
    }
}


window.getDataModal = function (section_id, widget_id, page_actual) {
    axios.get("/admin/getDataWidget/"+section_id+'/'+widget_id+ '/' + page_actual)
        .then(function (response) {
            let result = response.data;
            switch (section_id) {
                case '2':
                    $('#carusel-order').val(result.order);
                    break;
                case '3':
                    $('#texto-order').val(result.order);
                    $('#texto-height').val(result.height);
                    $('#texto-background_color').val(result.background_color);
                    $("#texto-align").val(result.align);
                    CKEDITOR.instances['texto-content'].setData(result.content);
                    break;
                case '4':
                    $('#two-columns-order').val(result.order);
                    CKEDITOR.instances['two-columns-title'].setData(result.title);
                    CKEDITOR.instances['two-columns-subtitle'].setData(result.subtitle);
                    CKEDITOR.instances['two-columns-description'].setData(result.description);
                    break;
                case '5':
                        $('#parallax-order').val(result.order);
                    break;
                case '6':
                        $('#product-order').val(result.order);
                        $('#product-name').val(result.name);
                    break;
                case '7':
                    $('#video-order').val(result.order);
                    console.log(result);
                    CKEDITOR.instances['video-title'].setData(result.title);
                    CKEDITOR.instances['video-subtitle'].setData(result.subtitle);
                    CKEDITOR.instances['video-description'].setData(result.description);
                    $('#video-url').val(result.video);
                    break;
                case '8':
                    $('#gallery-order').val(result.order);
                    break;
                case '9':
                    $('#contacto-order').val(result.order);
                    if (result.contact !== null) {
                        $('#contacto-name').val(result.contact.name);
                    }

                    $('#elementsForm').html(result.content_form);
                    $('#modal-contacto-widget_id').val(result.widget_id);
                    break;
                case '1':
                    CKEDITOR.replace('encabezado-title', {
                        language: 'es-mx',
                    });
                    
                    $('#encabezado-order').val(result.order);
                    CKEDITOR.instances['encabezado-title'].setData(result.title);
                    CKEDITOR.instances['encabezado-phone'].setData(result.phone);
                    CKEDITOR.instances['encabezado-phone2'].setData(result.phone2);
                    break;
            }
            
        })
        .catch(e => { });
}

$(document).ready(function(){
    //Código que se ejecutará al cargar la página
    if (document.getElementById('modal-encabezado-section_id')) {
        let section_id    = $('#modal-encabezado-section_id').val();
        let widget_id     = $('#modal-encabezado-widget_id').val();
        let page_actual   = $('#modal-encabezado-page_actual').val();
    
        getDataModal(section_id, widget_id, page_actual);
    }
    
    if (document.getElementById('modal-carusel-section_id')) {
        let section_id    = $('#modal-carusel-section_id').val();
        let widget_id     = $('#modal-carusel-widget_id').val();
        let page_actual   = $('#modal-carusel-page_actual').val();
    
        getDataModal(section_id, widget_id, page_actual);
    }
    
    if (document.getElementById('modal-texto-section_id')) {
        let section_id    = $('#modal-texto-section_id').val();
        let widget_id     = $('#modal-texto-widget_id').val();
        let page_actual   = $('#modal-texto-page_actual').val();
    
        getDataModal(section_id, widget_id, page_actual);
    }
    
    if (document.getElementById('modal-two-columns-section_id')) {
        let section_id    = $('#modal-two-columns-section_id').val();
        let widget_id     = $('#modal-two-columns-widget_id').val();
        let page_actual   = $('#modal-two-columns-page_actual').val();
    
        getDataModal(section_id, widget_id, page_actual);
    }
    
    if (document.getElementById('modal-parallax-section_id')) {
        let section_id    = $('#modal-parallax-section_id').val();
        let widget_id     = $('#modal-parallax-widget_id').val();
        let page_actual   = $('#modal-parallax-page_actual').val();
    
        getDataModal(section_id, widget_id, page_actual);
    }
    
    if (document.getElementById('modal-video-section_id')) {
        let section_id    = $('#modal-video-section_id').val();
        let widget_id     = $('#modal-video-widget_id').val();
        let page_actual   = $('#modal-video-page_actual').val();
    
        getDataModal(section_id, widget_id, page_actual);
    }
    
    if (document.getElementById('modal-gallery-section_id')) {
        let section_id    = $('#modal-gallery-section_id').val();
        let widget_id     = $('#modal-gallery-widget_id').val();
        let page_actual   = $('#modal-gallery-page_actual').val();
    
        getDataModal(section_id, widget_id, page_actual);
    }
    if (document.getElementById('modal-contacto-section_id')) {
        let section_id    = $('#modal-contacto-section_id').val();
        let widget_id     = $('#modal-contacto-widget_id').val();
        let page_actual   = $('#modal-contacto-page_actual').val();
    
        getDataModal(section_id, widget_id, page_actual);
    }
    
    if (document.getElementById('modal-product-section_id')) {
        let section_id    = $('#modal-product-section_id').val();
        let widget_id     = $('#modal-product-widget_id').val();
        let page_actual   = $('#modal-product-page_actual').val();
    
        getDataModal(section_id, widget_id, page_actual);
    }
});

window.openModalAddElementContact = function (section_id, widget_id, page_actual) {
    $('#modal-element_contact-section_id').val(section_id);
    $('#modal-element_contact-widget_id').val(widget_id);
    $('#modal-element_contact-page_actual').val(page_actual);

    $('#modal-widget-element_contact').modal('show');
    $('#modal-widget-element_contact').addClass('addScroll');
}

window.openModalAddElementProduct = function (section_id, widget_id, page_actual) {
    $('#modal-element_product-section_id').val(section_id);
    $('#modal-element_product-widget_id').val(widget_id);
    $('#modal-element_product-page_actual').val(page_actual);
    $('#modal-element_product-id').val('null')
    $('#modal-widget-element_product').modal('show');
    $('#modal-widget-element_product').addClass('addScroll');
}

window.editProduct = function(section_id, content_id, product_id, page_actual)  {

    $('#modal-element_product-section_id').val(section_id);
    $('#modal-element_product-widget_id').val(content_id);
    $('#modal-element_product-id').val(product_id)
    $('#modal-element_product-page_actual').val(page_actual);

    axios.get("/admin/producto/"+product_id+"/get")
        .then(function (response) {
            let result = response.data;
            $('#product-title').val(result.title);
            $('#product-price').val(result.price);
            $('#product-discount').val(result.discount);
            CKEDITOR.instances['product-element-description'].setData(result.description);
            $('#modal-widget-element_product').modal('show');
        })
        .catch(e => { });

    
}

window.closeModalSection = function (div) {
    $('#' + div + '').modal('hide');
}

window.changeModalAddSection = function (section) {

    $('#content-section').hide();
    $('#content-template').hide();
    let section_select = 0;

    if (section == 1) {
        $('#content-section').show();
        section_select = 1;
    } else {
        $('#content-template').show();
        section_select = 0;
    }
    $('#section-modal-section').val(section_select);
}

window.isExistTemplate = function(widget_id, type) {
    axios
    .get('/admin/template/'+widget_id+'/'+type+'/exist')
    .then(function (response) {
       let result = response.data;
       let status = result.status;
       if (status == 500) {
        Swal.fire({
            icon: 'info',
            title: 'Información',
            text: 'El template ya se encuentra creado, para visualizarlo elegir la opción template que aparece al darle click al boton flotante inferior con signo +',
          });
       } else {
        $('#template_widget_id').val(widget_id);
        $('#template_type').val(type);
        $('#templateModal').modal('show');
       }

    })
    .catch(e => { });
}

$("#form-template").submit(function (e) {
    e.preventDefault();

    const form = document.getElementById("form-template");
    const data = new FormData(form);

    axios
        .post("/admin/template/create", data)
        .then(function (response) {
            Swal.fire({
                icon: 'success',
                title: 'Información',
                text: 'Los datos han sido guardados',
                showDenyButton: false,
                confirmButtonText: 'Continuar',
                
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                location.reload();
            })
        })
        .catch(e => { });


});



$(function () {
    /* Encabezado */
    
    if (document.getElementById('encabezado-title')) {
        let ckeditor = CKEDITOR.replace('encabezado-title', {
            language: 'es-mx',
        });
        CKEDITOR.config.extraPlugins = 'colorbutton';
    }
    if (document.getElementById('encabezado-phone')) {
        let ckeditor = CKEDITOR.replace('encabezado-phone', {
            language: 'es-mx',
        });
        CKEDITOR.config.extraPlugins = 'colorbutton';
    }
    if (document.getElementById('encabezado-phone2')) {
        let ckeditor = CKEDITOR.replace('encabezado-phone2', {
            language: 'es-mx',
        });
        CKEDITOR.config.extraPlugins = 'colorbutton';
    }
    
    if (document.getElementById('texto-content')) {
        let ckeditor = CKEDITOR.replace('texto-content', {
            language: 'es-mx',
        });
        CKEDITOR.config.extraPlugins = 'colorbutton';
    }
    if (document.getElementById('two-columns-title')) {
        let ckeditor = CKEDITOR.replace('two-columns-title', {
            language: 'es-mx',
        });
        CKEDITOR.config.extraPlugins = 'colorbutton';
    }
    if (document.getElementById('two-columns-subtitle')) {
        let ckeditor = CKEDITOR.replace('two-columns-subtitle', {
            language: 'es-mx',
        });
        CKEDITOR.config.extraPlugins = 'colorbutton';
    }
    if (document.getElementById('two-columns-description')) {
        let ckeditor = CKEDITOR.replace('two-columns-description', {
            language: 'es-mx',
        });
        CKEDITOR.config.extraPlugins = 'colorbutton';
    }
    
    if (document.getElementById('config-derechos')) {
       
        let ckeditor = CKEDITOR.replace('config-derechos', {
            language: 'es-mx',
        });
        CKEDITOR.config.extraPlugins = 'colorbutton';
        resolveTextSetting();
        
    }

    function resolveTextSetting() {
        return new Promise(resolve => {
          setTimeout(() => {
              let result = $('#content-config-derechos').val();
              CKEDITOR.instances['config-derechos'].setData(result);
              resolve();
          }, 2000);
        });
      }

    /* video */
    if (document.getElementById('video-title')) {
        let ckeditor = CKEDITOR.replace('video-title', {
            language: 'es-mx',
        });
    }
    if (document.getElementById('video-subtitle')) {
        let ckeditor = CKEDITOR.replace('video-subtitle', {
            language: 'es-mx',
        });
    }
    if (document.getElementById('video-description')) {
        let ckeditor = CKEDITOR.replace('video-description', {
            language: 'es-mx',
        });
    }
    
    if (document.getElementById('product-element-description')) {
        let ckeditor = CKEDITOR.replace('product-element-description', {
            language: 'es-mx',
        });
    }

    /* setear pagina con click a las paginas en el admin */
    window.setPage = function(page) {
        Livewire.emit('setPage', page);
    }

    window.Livewire.on('setScroll', divPosition => {
        $('.tree').jstree();

        $('html, body').animate({
            scrollTop: $(divPosition).offset().top
        }, 2000);
    })

    window.Livewire.on('setTree', divPosition => {
        $('.tree').jstree();

    })

    

    window.Livewire.on('setSummerTitle', title => {
        console.log(title);
        $('#title').val(title);
    })

    window.deletePage = function (id) {
        Swal.fire({
            icon: 'warning',
            text: '¿Esta seguro que desea borrar la página?',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Sí',
            cancelButtonText: 'No',
            
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            Livewire.emit('deletePage', id);
        })
    }

});