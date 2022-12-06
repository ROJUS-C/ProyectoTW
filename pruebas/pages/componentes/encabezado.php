
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Button para mostrar Side Bar (tamaño movil) -->
    <button id="sidebarToggleTop" class="btn d-md-none rounded-circle mr-3" style="color: var(--color-main);">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Linea Divisora -->
        <div class="topbar-divider d-none d-sm-inline"></div>

        <!-- Contenedor: Nombre y menu del perfil -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-sm-inline text-gray-600 small"><?php echo "".$_SESSION['nombre']." ".$_SESSION['apellido'].""; ?></span>
                <img class="img-profile rounded-circle"
                    src="../public/img/undraw_profile.svg">
            </a>
            <!-- Menu del perfil -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#updateUser">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Modificar cuenta
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Cerrar sesion
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- Fin de encabezado -->