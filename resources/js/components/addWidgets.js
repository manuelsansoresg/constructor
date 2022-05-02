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

function showInfo() {
    Swal.fire({
        icon: 'success',
        title: 'Información',
        text: 'Los datos han sido guardados',
    })
}