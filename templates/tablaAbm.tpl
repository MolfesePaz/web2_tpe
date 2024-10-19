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

{include "header.tpl"}

    <div class="container mt-5">
    <h2>Gestión de Viajes</h2>

    {if $error}
        <div class="alert alert-danger">{$error}</div>
    {/if}

    <table class="table">
        <thead>
            <tr>
                <th>Origen</th>
                <th>Destino</th>
                <th>Fecha de Salida</th>
                <th>Fecha de Llegada</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            {foreach $viajes as $viaje}
                <tr>
                    <td>{$viaje->origen}</td>
                    <td>{$viaje->destino}</td>
                    <td>{$viaje->FechaDeSalida}</td>
                    <td>{$viaje->FechaDeLlegada}</td>
                    <td>{$viaje->id_empresa}</td>

                    <td>
                        <a href="edit/{$viaje->id_viaje}" class="btn btn-primary">Editar</a>
                        <a href='delete/{$viaje->id_viaje}' class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>

    <form action='add' method="post">
    <div class="form-group">
        <label>Origen</label>
        <input type="text" name="origen" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Destino</label>
        <input type="text" name="destino" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Fecha de Salida</label>
        <input type="date" name="FechaDeSalida" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Fecha de Vuelta</label>
        <input type="date" name="FechaDeLlegada" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Empresa</label>
        <select name="id_empresa" class="form-control" required>
            <!-- Aquí deberías llenar las opciones con empresas existentes -->
            {foreach $empresas as $empresa}
                <option value="{$empresa->id_empresa}">{$empresa->nombre}</option>
            {/foreach}
        </select>
    </div>
    <button type="submit" class="btn btn-success">Agregar</button>
</form>

{include "footer.tpl"}
    </main> 
</body>
</html>