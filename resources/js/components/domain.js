import Swal from 'sweetalert2'

window.deleteDomain = function(domain_id) {
    Swal.fire({
        icon: 'warning',
        title: 'Información',
        text: '¿Estas seguro que deseas borrar el dominio?',
        showDenyButton: false,
        confirmButtonText: 'Borrar',
        
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) { 
            axios.get("/admin/domains/"+domain_id+'/delete')
            .then(function (response) {
                let result = response.data;
                window.location = '/admin/domains'
            })
            .catch(e => { });
        }
    })
}

$("#frm-domains").submit(function (e) {
    e.preventDefault();
    $('#loading').show();
    
    const form = document.getElementById("frm-domains");
    const data = new FormData(form);
    axios.post("/admin/domains", data)
        .then(function (response) {
            $('#loading').hide();
            showInfoDomain(1);
            
        })
        .catch(e => { 
            $('#loading').hide();
            Swal.fire({
                icon: 'warning',
                title: 'Información',
                text: 'El dominio ya existe',
                showDenyButton: false,
                confirmButtonText: 'Continuar',
                
            })
        });
});

function showInfoDomain(redirect) {

    Swal.fire({
        icon: 'success',
        title: 'Información',
        text: 'Los datos han sido guardados',
        showDenyButton: false,
        confirmButtonText: 'Continuar',
        
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) { 
            window.location = '/admin/domains'
        }
    })

}