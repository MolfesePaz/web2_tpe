<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIAJES LUPA</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body class="d-flex flex-column min-vh-100">
{include 'header.tpl'}

<main class="flex-fill">
    <div class="container">

        <form action="edit/{$viaje->id_viaje}" method="post">
            <div class="form-group">
                <label>Origen</label>
                <input type="text" name="origen" class="form-control" value="{$viaje->origen}" required>
            </div>
            <div class="form-group">
                <label>Destino</label>
                <input type="text" name="destino" class="form-control" value="{$viaje->destino}" required>
            </div>
            <div class="form-group">
                <label>Fecha de Salida</label>
                <input type="date" name="FechaDeSalida" class="form-control" value="{$viaje->FechaDeSalida}" required>
            </div>
            <div class="form-group">
                <label>Fecha de Llegada</label>
                <input type="date" name="FechaDeLlegada" class="form-control" value="{$viaje->FechaDeLlegada}" required>
            </div>
            <div class="form-group">
                <label>Empresa</label>
                <select name="id_empresa" class="form-control" required>
                    {foreach $empresas as $empresa}
                        <option value="{$empresa->id_empresa}" {if $empresa->id_empresa == $viaje->id_empresa}selected{/if}>{$empresa->nombre}</option>
                    {/foreach}
                </select>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
    </div>
</main>
{include "footer.tpl"}
    
</body>
</html>