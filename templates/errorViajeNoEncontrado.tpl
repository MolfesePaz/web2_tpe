<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viajes Lupa</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

{include 'header.tpl'}

    <div class="container mt-8 mb-8 py-5 text-center">

        <div class="alert alert-danger p-4">

            <h1>Error: Viaje no encontrado.</h1>

            <p>El viaje que estás buscando no existe o no está disponible en este momento. Por favor, revisa la información e intenta nuevamente.</p>

        </div> 
         
    </div>

{include 'footer.tpl'}
    </main> 
</body>
</html>