<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Contacto</title>
  </head>
  <body>
    <h1>
        Formulario de contacto
    </h1>

    <table class="table">
        <tbody>
            @foreach ($contacts as $key=> $contact)
            <tr>
                <td>{{ $key }}</td>
                <td> 
                  {{ $contact }}
                </td>
              </tr>
            @endforeach
        
           
        </tbody>
    </table>
  </body>
</html>