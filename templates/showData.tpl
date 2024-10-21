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
<body class="d-flex flex-column min-vh-100">
{include 'header.tpl'}
    <main class="flex-fill">  
        <div class= "container">  
            <h1>Detalle del Viaje</h1>
                <p><strong>Origen:</strong> {$viaje->origen}</p>
                <p><strong>Destino:</strong> {$viaje->destino}</p>
                <p><strong>Fecha de salida:</strong> {$viaje->FechaDeSalida}</p>
                <p><strong>Fecha de llegada:</strong> {$viaje->FechaDeLlegada}</p>
                <a href='list'>Volver al listado</a>
        </div>
    </main>       
{include 'footer.tpl'}
     
</body>
</html>