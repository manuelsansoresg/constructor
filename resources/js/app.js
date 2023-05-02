/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');
import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';
require('./components/title')
require('./components/addImage')
require('./components/addWidgets')
require('./components/domain')

if (document.getElementById('parallax')) {
    $('.parallax-window').parallax();
}

function openModal() {
    if (document.getElementById('domain_id')) {
        let domain_id = document.getElementById('domain_id').value;
        if (domain_id == '') {
            $('#modal-select-domain').modal('show');
        }
    }
}

$(document).ready(function(){
    openModal();
    if (document.getElementById('dt-domains')) {
        $('#dt-domains').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
        });
    }
});

$('#modal-select-domain').on('hidden.bs.modal', function (e) {
    openModal();
  })

  $("#frm-select-domain").submit(function (e) {
    e.preventDefault();

    const form = document.getElementById("frm-select-domain");
    const data = new FormData(form);

    axios
        .post("/admin/settings/setDomain", data)
        .then(function (response) {
            location.reload();
        })
        .catch(e => { });


});

$("#id-change_domain" ).click(function() {
    $('#modal-select-domain').modal('show');
});


window.deleteImage = function(widget_id, name_widget, name_image) { 
    axios
    .get("/admin/image/"+widget_id+"/"+name_widget+"/"+name_image+"/delete")
    .then(function (response) {
        /* location.reload(); */
    })
    .catch(e => { });
}
  
/* window.Vue = require('vue').default; */

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/* Vue.component('example-component', require('./components/ExampleComponent.vue').default); */

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/* const app = new Vue({
    el: '#app',
});
 */

$('.tree').jstree();