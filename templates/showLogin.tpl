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
{include "header.tpl"}
<main class="flex-fill">
    
{if $error}
        <div class='alert alert-danger' role='alert'>
            {$error}
        </div>
    {/if}
 
    <div class="container mt-5 mb-5">
        <h2 class="text-center mb-4">Iniciar Sesión</h2>
            <form action="ingresar" method="post" class="w-50 mx-auto">
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="nombre" id="usuario" class="form-control" placeholder="Ingresa tu usuario" required>
                </div>
                <div class="form-group">
                    <label for="constraseña">Contraseña</label>
                    <input type="password" name="contraseña" id="constraseña" class="form-control" placeholder="Ingresa tu contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
            </form>
    </div>
</main>
{include "footer.tpl"}
     
</body>
</html>