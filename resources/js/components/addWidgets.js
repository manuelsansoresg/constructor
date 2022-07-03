import Swal from 'sweetalert2'


$("#frm-encabezado").submit(function (e) {
    e.preventDefault();
    var desc = CKEDITOR.instances['encabezado-title'].getData();
    $('#encabezado-title').val(desc);
    
    var desc = CKEDITOR.instances['encabezado-phone'].getData();
    $('#encabezado-phone').val(desc);
    
    var desc = CKEDITOR.instances['encabezado-phone2'].getData();
    $('#encabezado-phone2').val(desc);

    $('#loading-encabezado').show();
    const form = document.getElementById("frm-encabezado");
    const data = new FormData(form);
    axios.post("/widgets/header/store", data)
        .then(function (response) {
            $('#loading-encabezado').hide();
            let result = response.data;
            Livewire.emit('updateMyWidgets');
            Livewire.emit('resetComponents');
            showInfo(1);
        })
        .catch(e => { 
            $('#loading-encabezado').hide();
        });

});

$("#frm-carusel").submit(function (e) {
    e.preventDefault();
    $('#loading-carusel').show();
    const form = document.getElementById("frm-carusel");
    const data = new FormData(form);
    axios.post("/widgets/carusel/store", data)
        .then(function (response) {
            $('#loading-carusel').hide();
            let result = response.data;
            Livewire.emit('updateMyWidgets');
            Livewire.emit('resetComponents');
            showInfo(1);
        })
        .catch(e => { 
            $('#loading-carusel').hide();
        });

});

$("#frm-texto").submit(function (e) {
    e.preventDefault();
    $('#loading-texto').show();
    var desc = CKEDITOR.instances['texto-content'].getData();
    $('#texto-content').val(desc);
    const form = document.getElementById("frm-texto");
    const data = new FormData(form);
    axios.post("/widgets/texto/store", data)
        .then(function (response) {
            $('#loading-texto').hide();
            let result = response.data;
            Livewire.emit('updateMyWidgets');
            Livewire.emit('resetComponents');
            $('#modal-widget-texto').modal('hide');
            showInfo(1);
        })
        .catch(e => { 
            $('#loading-texto').hide();
        });

});

$("#frm-two-columns").submit(function (e) {
    e.preventDefault();
    $('#loading-two-columns').show();
    var desc = CKEDITOR.instances['two-columns-title'].getData();
    $('#two-columns-title').val(desc);
    
    var desc = CKEDITOR.instances['two-columns-subtitle'].getData();
    $('#two-columns-subtitle').val(desc);
    
    var desc = CKEDITOR.instances['two-columns-description'].getData();
    $('#two-columns-description').val(desc);

    const form = document.getElementById("frm-two-columns");
    const data = new FormData(form);
    axios.post("/widgets/two-columns/store", data)
        .then(function (response) {
            $('#loading-two-columns').hide();
            let result = response.data;
            Livewire.emit('updateMyWidgets');
            Livewire.emit('resetComponents');
            $('#modal-widget-two-columns').modal('hide');
            showInfo(1);
        })
        .catch(e => {
            $('#loading-two-columns').hide();
         });

});

$("#frm-parallax").submit(function (e) {
    e.preventDefault();
    $('#loading-parallax').show();
    const form = document.getElementById("frm-parallax");
    const data = new FormData(form);
    axios.post("/widgets/parallax/store", data)
        .then(function (response) {
            $('#loading-parallax').hide();
            let result = response.data;
            Livewire.emit('updateMyWidgets');
            Livewire.emit('resetComponents');
            $('#modal-widget-parallax').modal('hide');
            showInfo(1);
        })
        .catch(e => { 
            $('#modal-widget-parallax').modal('hide');
        });

});

$("#frm-video").submit(function (e) {
    e.preventDefault();
    $('#loading-video').show();
    var desc = CKEDITOR.instances['video-title'].getData();
    $('#video-title').val(desc);
    
    var desc = CKEDITOR.instances['video-subtitle'].getData();
    $('#video-subtitle').val(desc);
    
    var desc = CKEDITOR.instances['video-description'].getData();
    $('#video-description').val(desc);

    const form = document.getElementById("frm-video");
    const data = new FormData(form);
    axios.post("/widgets/video/store", data)
        .then(function (response) {
            $('#loading-video').hide();
            let result = response.data;
            Livewire.emit('updateMyWidgets');
            Livewire.emit('resetComponents');
            $('#modal-widget-video').modal('hide');
            showInfo(1);
        })
        .catch(e => {
            $('#loading-video').hide();
         });

});

$("#frm-gallery").submit(function (e) {
    e.preventDefault();
    $('#loading-gallery').show();
    const form = document.getElementById("frm-gallery");
    const data = new FormData(form);
    axios.post("/widgets/gallery/store", data)
        .then(function (response) {
            $('#loading-gallery').hide();
            let result = response.data;
            Livewire.emit('updateMyWidgets');
            Livewire.emit('resetComponents');
            $('#modal-widget-gallery').modal('hide');
            showInfo(1);
        })
        .catch(e => {
            $('#loading-gallery').hide();
         });

});

$("#frm-contacto").submit(function (e) {
    e.preventDefault();
    $('#loading-contacto').show();
    const form = document.getElementById("frm-contacto");
    const data = new FormData(form);
    axios.post("/widgets/contacto/store", data)
        .then(function (response) {
            $('#loading-contacto').hide();
            let result = response.data;
            Livewire.emit('updateMyWidgets');
            Livewire.emit('resetComponents');
            $('#modal-widget-contacto').modal('hide');
            showInfo(1);
        })
        .catch(e => {
            $('#loading-contacto').hide();
         });

});

$("#frm-product").submit(function (e) {
    e.preventDefault();

    

    $('#loading-product').show();
    const form = document.getElementById("frm-product");
    const data = new FormData(form);
    axios.post("/widgets/producto/store", data)
        .then(function (response) {
            $('#loading-product').hide();
            let result = response.data;
            Livewire.emit('updateMyWidgets');
            Livewire.emit('resetComponents');
            $('#modal-widget-product').modal('hide');
            showInfo(1);
        })
        .catch(e => {
            $('#loading-product').hide();
         });

});

$("#frm-element_contact").submit(function (e) {
    e.preventDefault();
    $('#loading-element_contact').show();
    const form = document.getElementById("frm-element_contact");
    const data = new FormData(form);
    axios.post("/widgets/add-element-contacto/store", data)
        .then(function (response) {
            $('#loading-element_contact').hide();
            let result = response.data;
            Livewire.emit('updateMyWidgets');
            Livewire.emit('resetComponents');
            $('#modal-widget-element_contact').modal('hide');
            document.getElementById('frm-element_contact').reset();
            showInfo(1);
        })
        .catch(e => { });

});

$("#frm-element_product").submit(function (e) {
    e.preventDefault();
    var desc = CKEDITOR.instances['product-element-description'].getData();
    $('#product-description').val(desc);

    $('#loading-element_product').show();
    const form = document.getElementById("frm-element_product");
    const data = new FormData(form);
    axios.post("/widgets/add-element-producto/store", data)
        .then(function (response) {
            $('#loading-element_product').hide();
            let result = response.data;
            Livewire.emit('updateMyWidgets');
            Livewire.emit('resetComponents');
            $('#modal-widget-element_product').modal('hide');
            document.getElementById('frm-element_product').reset();
            showInfo(1);
        })
        .catch(e => { });

});

$("#frm-settings").submit(function (e) {
    e.preventDefault();
    $('#loading-setting').show();
    var desc = CKEDITOR.instances['config-derechos'].getData();
    $('#config-derechos').val(desc);
    
    const form = document.getElementById("frm-settings");
    const data = new FormData(form);
    axios.post("/widgets/setting/store", data)
        .then(function (response) {
            $('#loading-setting').hide();
            let result = response.data;
            showInfo(2);
        })
        .catch(e => { });
});



function showInfo(redirect) {

    Swal.fire({
        icon: 'success',
        title: 'Información',
        text: 'Los datos han sido guardados',
        showDenyButton: false,
        confirmButtonText: 'Continuar',
        
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) { 
            if (redirect == 1) { //*redirect back
                window.history.back();
            }
            location.reload();
        }
    })

}