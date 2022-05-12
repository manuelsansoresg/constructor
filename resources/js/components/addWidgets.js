import Swal from 'sweetalert2'


$("#frm-encabezado").submit(function (e) {
    e.preventDefault();
    
    const form = document.getElementById("frm-encabezado");
    const data = new FormData(form);
    axios.post("/widgets/header/store", data)
        .then(function (response) {
            let result = response.data;
            Livewire.emit('updateMyWidgets');
            Livewire.emit('resetComponents');
            $('#modal-widget-header').modal('hide');
            document.getElementById('frm-encabezado').reset();
            showInfo();
        })
        .catch(e => { });

});

$("#frm-carusel").submit(function (e) {
    e.preventDefault();
    const form = document.getElementById("frm-carusel");
    const data = new FormData(form);
    axios.post("/widgets/carusel/store", data)
        .then(function (response) {
            let result = response.data;
            Livewire.emit('updateMyWidgets');
            Livewire.emit('resetComponents');
            $('#modal-widget-carusel').modal('hide');
            document.getElementById('frm-carusel').reset();
            showInfo();
        })
        .catch(e => { });

});

$("#frm-texto").submit(function (e) {
    e.preventDefault();
    var desc = CKEDITOR.instances['texto-content'].getData();
    $('#texto-content').val(desc);
    const form = document.getElementById("frm-texto");
    const data = new FormData(form);
    axios.post("/widgets/texto/store", data)
        .then(function (response) {
            let result = response.data;
            Livewire.emit('updateMyWidgets');
            Livewire.emit('resetComponents');
            $('#modal-widget-texto').modal('hide');
            document.getElementById('frm-texto').reset();
            showInfo();
        })
        .catch(e => { });

});

$("#frm-two-columns").submit(function (e) {
    e.preventDefault();
    
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
            let result = response.data;
            Livewire.emit('updateMyWidgets');
            Livewire.emit('resetComponents');
            $('#modal-widget-two-columns').modal('hide');
            document.getElementById('frm-two-columns').reset();
            showInfo();
        })
        .catch(e => { });

});

$("#frm-parallax").submit(function (e) {
    e.preventDefault();
    const form = document.getElementById("frm-parallax");
    const data = new FormData(form);
    axios.post("/widgets/parallax/store", data)
        .then(function (response) {
            let result = response.data;
            Livewire.emit('updateMyWidgets');
            Livewire.emit('resetComponents');
            $('#modal-widget-parallax').modal('hide');
            document.getElementById('frm-parallax').reset();
            showInfo();
        })
        .catch(e => { });

});

$("#frm-video").submit(function (e) {
    e.preventDefault();
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
            let result = response.data;
            Livewire.emit('updateMyWidgets');
            Livewire.emit('resetComponents');
            $('#modal-widget-video').modal('hide');
            document.getElementById('frm-video').reset();
            showInfo();
        })
        .catch(e => { });

});



function showInfo() {
    Swal.fire({
        icon: 'success',
        title: 'Información',
        text: 'Los datos han sido guardados',
    })
}