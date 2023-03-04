<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

</head>

<body>
    <div class="container">
        <div class="row mt-5">
            @foreach ($images as $image)
                @php
                    $url_image = asset($image);
                @endphp
                <div class="col-md-3">
                    <a onclick="setUrl('{{ $url_image }}')" style="cursor: pointer">
                        <img class="img-fluid" src="{{ $url_image }}"
                            style="width: 200px; height:200px; object-fit: cover;">
                    </a>
                    <p class="text-center mt-2">
                        <button class="btn btn-danger" onclick="deleteImage('{{ $image }}')">Borrar</button>
                    </p>
                </div>
                {{-- <a onclick="window.opener.CKEDITOR.tools.callFunction('selectImage', '{{ $url_image}}'); window.close(); return false;" style="cursor: pointer"> --}}
            @endforeach
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> <!--axios CDN-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
</body>
<script>
    function setUrl(filename) {
        // Get CKEditorFuncNum from query string
        var funcNum = getUrlParam('CKEditorFuncNum');
        // Set URL in CKEditor dialog
        window.opener.CKEDITOR.tools.callFunction(funcNum, filename);
        // Close window
        window.close();
    }

    function getUrlParam(paramName) {
        var reParam = new RegExp('(?:[\?&]|&)' + paramName + '=([^&]+)', 'i');
        var match = window.location.search.match(reParam);
        return (match && match.length > 1) ? match[1] : '';
    }

    function deleteImage(image) {
        Swal.fire({
            title: '¿Estás seguro?',
            showDenyButton: true,
            confirmButtonText: 'Borrar',
            denyButtonText: `Cancelar`,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                axios.post('/admin/texto/image/delete/server', {image: image})
                .then(function (response) {
                    window.close();
                })
                .catch(function (error) {
                    console.log(error); // handle the error
                })
            }
        })
    }
</script>

</html>
