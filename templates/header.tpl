<header class="container-fluid p-0">

    <nav class="navbar navbar-expand-lg navbar-light d-flex bg-light mb-4">

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav col-md-12 p-0 d-flex align-items-center">
                <div class="row col-md-8 justify-content-start p-0 ml-3">
                    <li class="nav-item">
                        <a href="list" class="nav-link h1">VIAJES LUPA</a> 
                    </li>
                </div>

        <div class="row col-md-4 justify-content-end p-0">
                    {if isset($smarty.session.ID_USER)}
                        <li class="nav-item">
                            <p class="nav-link">Hola, {$smarty.session.NOMBRE_USER} </p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="btn-menu-register" href='logout'>Logout</a>
                        </li>                    
                    {else}  
                        <li class="nav-item">
                            <a class="nav-link mr-2" id="btn-menu-login" href='ingresar'>Login</a>
                        </li>
                    {/if}
                </div>
            </ul>
        </div>

    </nav>
</header>
