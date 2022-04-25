window.modalImage = function (widget_id, type, name_image) {
    $('#type').val(type);
    $('#widget_id').val(widget_id);
    $('#name_image').val(name_image);
    $('#modalImage').modal('show');
}


window.closeModalImage = function () {
    $('#modalImage').modal('hide');
}

$("#form-image").submit(function (e) {
    e.preventDefault();

    const form = document.getElementById("form-image");
    const data = new FormData(form);

    axios
        .post("/image/add", data)
        .then(function (response) {
            Livewire.emit('updateImage');
            $('#modalImage').modal('hide');
        })
        .catch(e => { });


});