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
<div class="container">
        <ul class='listaViajes'> 
                {foreach from=$viajes item=$viaje} 
                        <li>
                                <strong>Origen:</strong>{$viaje->origen} <br>
                                <strong>Destino:</strong> {$viaje->destino} <br>
                                <a href='detallePorId/{$viaje->id_viaje}'>Ver detalles</a>
                        </li>
                {/foreach}   
        </ul>
</div>
</main> 

{include 'footer.tpl'}
</body>
</html>
