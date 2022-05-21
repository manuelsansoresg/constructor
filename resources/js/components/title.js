
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


window.getDataModal = function (section_id, widget_id) {
    axios.get("/admin/getDataWidget/"+section_id+'/'+widget_id)
        .then(function (response) {
            let result = response.data;
            console.log(section_id);
            switch (section_id) {
                case '2':
                    break;
                case '3':
                    CKEDITOR.instances['texto-content'].setData(result.content);
                    break;
                case '4':
                    CKEDITOR.instances['two-columns-title'].setData(result.title);
                    CKEDITOR.instances['two-columns-subtitle'].setData(result.subtitle);
                    CKEDITOR.instances['two-columns-description'].setData(result.description);
                    break;
                case '7':
                    CKEDITOR.instances['video-title'].setData(result.title);
                    CKEDITOR.instances['video-subtitle'].setData(result.subtitle);
                    CKEDITOR.instances['video-description'].setData(result.description);
                    $('#video-url').val(result.video);
                    break;
                case '9':
                    if (result.contact !== null) {
                        $('#contacto-name').val(result.contact.name);
                    }

                    $('#elementsForm').html(result.content_form);
                    $('#modal-contacto-widget_id').val(result.widget_id);
                    break;
                default:
                    CKEDITOR.instances['encabezado-title'].setData(result.title);
                    CKEDITOR.instances['encabezado-phone'].setData(result.phone);
                    CKEDITOR.instances['encabezado-phone2'].setData(result.phone2);
                    break;
            }
            
        })
        .catch(e => { });
}

window.openModalAddElementContact = function (section_id, widget_id, page_actual) {
    $('#modal-element_contact-section_id').val(section_id);
    $('#modal-element_contact-widget_id').val(widget_id);
    $('#modal-element_contact-page_actual').val(page_actual);

    $('#modal-widget-element_contact').modal('show');
    $('#modal-widget-element_contact').addClass('addScroll');
}

window.closeModalSection = function (div) {
    $('#' + div + '').modal('hide');
}


$(function () {
    /* Encabezado */
    if (document.getElementById('encabezado-title')) {
        let ckeditor = CKEDITOR.replace('encabezado-title', {
            language: 'es-mx',
        });
    }
    if (document.getElementById('encabezado-phone')) {
        let ckeditor = CKEDITOR.replace('encabezado-phone', {
            language: 'es-mx',
        });
    }
    if (document.getElementById('encabezado-phone2')) {
        let ckeditor = CKEDITOR.replace('encabezado-phone2', {
            language: 'es-mx',
        });
    }
    
    if (document.getElementById('texto-content')) {
        let ckeditor = CKEDITOR.replace('texto-content', {
            language: 'es-mx',
        });
    }
    if (document.getElementById('two-columns-title')) {
        let ckeditor = CKEDITOR.replace('two-columns-title', {
            language: 'es-mx',
        });
    }
    if (document.getElementById('two-columns-subtitle')) {
        let ckeditor = CKEDITOR.replace('two-columns-subtitle', {
            language: 'es-mx',
        });
    }
    if (document.getElementById('two-columns-description')) {
        let ckeditor = CKEDITOR.replace('two-columns-description', {
            language: 'es-mx',
        });
    }
    
    if (document.getElementById('config-derechos')) {
       
        let ckeditor = CKEDITOR.replace('config-derechos', {
            language: 'es-mx',
        });
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

});