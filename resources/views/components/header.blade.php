{{-- Agrega esto en el <head> de tu layout principal o aquí si es necesario --}}
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,700,1,0" />

<div class="navbar-inner">
    <div class="container">
        @if (Auth::user()->role === 'admin')
            <ul class="nav !gap-[18px]">
                <li>
                    <a href="{{ route('inicio') }}" class="flex items-center gap-1">
                        <span class="material-symbols-outlined icon-xs" style="">home</span>
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center gap-1">
                        <span class="material-symbols-outlined icon-xs" style="">store</span>
                        Sucursales
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center gap-1">
                        <span class="material-symbols-outlined icon-xs" style="">badge</span>
                        Empleados
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center gap-1">
                        <span class="material-symbols-outlined icon-xs" style="">fastfood</span>
                        Menús
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center gap-1">
                        <span class="material-symbols-outlined icon-xs">data_usage</span>
                        Reportes globales
                    </a>
                </li>
            </ul>
        @elseif (Auth::user()->role === 'gerente')
            <ul class="nav !gap-[18px]">
                <li>
                    <a href="" class="flex items-center gap-1" title="Ventas diarias, pedidos activos, empleados">
                        <span class="material-symbols-outlined icon-xs" style="">home</span>
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center gap-1" title="Ver, editar y controlar pedidos de su sucursal">
                        <span class="material-symbols-outlined icon-xs">receipt_long</span>
                        Pedidos
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center gap-1" title="Registrar, editar y asignar roles locales">
                        <span class="material-symbols-outlined icon-xs" style="">badge</span>
                        Empleados
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center gap-1" title="Modificar precios o disponibilidad del menú local">
                        <span class="material-symbols-outlined icon-xs" style="">fastfood</span>
                        Menú
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center gap-1" title="Ventas de la sucursal, desempeño del personal">
                        <span class="material-symbols-outlined icon-xs">data_usage</span>
                        Reportes
                    </a>
                </li>
            </ul>
        @elseif (Auth::user()->role === 'supervisor')
            <ul class="nav !gap-[18px]">
                <li>
                    <a href="" class="flex items-center gap-1" title="Resumen operativo">
                        <span class="material-symbols-outlined icon-xs" style="">home</span>
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center gap-1" title="Ver estado de pedidos">
                        <span class="material-symbols-outlined icon-xs">receipt_long</span>
                        Pedidos
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center gap-1" title="Ver lista y desempeño, sin editar">
                        <span class="material-symbols-outlined icon-xs" style="">badge</span>
                        Empleados
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center gap-1" title="Ventas y métricas operativas">
                        <span class="material-symbols-outlined icon-xs">data_usage</span>
                        Reportes
                    </a>
                </li>
            </ul>
        @elseif (Auth::user()->role === 'cajero')
            <ul class="nav !gap-[18px]">
                <li>
                    <a href="" class="flex items-center gap-1" title="Crear nuevos pedidos">
                        <span class="material-symbols-outlined icon-xs" style="">home</span>
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center gap-1" title="Ver pedidos en curso y su estado">
                        <span class="material-symbols-outlined icon-xs">receipt_long</span>
                        Pedidos
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center gap-1" title="Ventas pasadas y totales">
                        <span class="material-symbols-outlined icon-xs">history</span>
                        Historial
                    </a>
                </li>
            </ul>
        @elseif (Auth::user()->role === 'cocinero')
            <ul class="nav !gap-[18px]">
                <li>
                    <a href="" class="flex items-center gap-1" title="Ver pedidos por preparar">
                        <span class="material-symbols-outlined icon-xs">receipt_long</span>
                        Pedidos pendientes
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center gap-1" title="Marcar pedidos completados">
                        <span class="material-symbols-outlined icon-xs">check_circle</span>
                        Pedidos listos
                    </a>
                </li>
            </ul>
        @endif

        <div class="dropdown">
            <button onclick="toggleDropdown()" class="dropbtn flex items-center gap-1">
                <span class="material-symbols-outlined icon-xs" style="position: relative; top: 1.3px;">person</span>
                {{ Auth::user()->name }}
            </button>
        </div>
    </div>
</div>

<!-- Movemos el menú fuera del header -->
<ul id="userDropdown" class="dropdown-menu rounded">
    <li>
        <div class="user-info-compact">
            <span>
                @if (Auth::user()->role === 'admin')
                    Administrador general
                @elseif (Auth::user()->role === 'gerente')
                    Gerente de sucursal(es)
                @elseif (Auth::user()->role === 'supervisor')
                    Supervisor de sucursal(es)
                @elseif (Auth::user()->role === 'cajero')
                    Cajero
                @elseif (Auth::user()->role === 'cocinero')
                    Cocinero
                @endif
            </span>
        </div>
    </li>
    <li class="dropdown-divider"></li>
    <li>
        <a href="" class="dropdown-item-compact !py-1">
            Cambiar contraseña
        </a>
    </li>
    <li class="dropdown-divider"></li>
    <li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="dropdown-item-compact mt-1 !py-1">
                <span class="material-symbols-outlined icon-xs">logout</span>
                Cerrar sesión
            </button>
        </form>
    </li>
</ul>

<style>
    .material-symbols-outlined.icon-xs {
        font-size: 16px !important;
        vertical-align: middle;
        line-height: 1;

    }

    .navbar-inner {
        width: 100%;
        min-height: 40px;
        padding-left: 20px;
        padding-right: 20px;
        background-color: #fafafa;
        background-image: -moz-linear-gradient(top, #ffffff, #f2f2f2);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#f2f2f2));
        background-image: -webkit-linear-gradient(top, #ffffff, #f2f2f2);
        background-image: -o-linear-gradient(top, #ffffff, #f2f2f2);
        background-image: linear-gradient(to bottom, #ffffff, #f2f2f2);
        background-repeat: repeat-x;
        border: 1px solid #d4d4d4;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
        -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
        display: flex;
    }

    /* Forzar que el contenedor interno ocupe todo el ancho */
    .navbar-inner .container {
        width: 100%;
        max-width: 100%;
        box-sizing: border-box; /* incluye padding en el ancho */
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding-left: 20px; /* mantiene el padding original */
        padding-right: 20px;
    }

    /* ul / nav reset solo dentro del navbar para no afectar global */
    .navbar-inner ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .navbar-inner .nav {
        margin: 0;
        display: flex;
        gap: 10px;
        float: none; /* evita que Bootstrap float afecte el layout flex */
        align-items: center;
    }

    .navbar-inner .nav a {
        color: #777777;
        text-decoration: none;
        transition: color 0.2s ease;
        font-size: 0.875rem; /* text-sm */
    }

    .navbar-inner .nav a:hover {
        color: #333;
    }

    .navbar-inner .nav i {
        color: #777777;
        transition: color 0.2s ease;
    }

    .navbar-inner .nav a:hover i {
        color: #555555;
    }

    .navbar-inner .nav .material-symbols-outlined {
        color: #444 !important;
    }

    /* Botón de colapso a la izquierda */
    .navbar-inner .btn.btn-navbar {
        margin-right: 6px;
    }

    /* Zona central: ocupa el espacio restante y centra su contenido */
    .navbar-inner #insertMenuHere {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Menú de usuario a la derecha */
    .navbar-inner .user-menu {
        margin-left: auto; /* fuerza al extremo derecho */
        display: flex;
        align-items: center;
        gap: 12px;
    }

    /* Opcional: ajustes responsivos básicos */
    @media (max-width: 768px) {
        .navbar-inner .container {
            flex-wrap: wrap;
        }
        .navbar-inner #insertMenuHere {
            order: 3;
            width: 100%;
            justify-content: flex-start;
            margin-top: 8px;
        }
        .navbar-inner .user-menu {
            order: 2;
        }
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropbtn {
        background: none;
        border: none;
        padding: 8px 16px;
        cursor: pointer;
        font-size: 14px;
        color: #777777;
        transition: color 0.2s ease, background-color 0.2s ease;
    }

    .dropbtn:hover {
        color: #555555;
    }

    /* Mantener el mismo color al estar activo */
    .dropbtn.active {
        background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
        color: #555555;
    }

    .dropdown-menu {
        position: fixed; /* Cambiamos a fixed para que se posicione respecto a la ventana */
        display: none;
        min-width: 180px;
        padding: 4px;
        margin: 10px 0 0; /* Aumentamos el margen para el pico */
        border: 1px solid #d4d4d4;
        background-color: #ffffff;
        border-radius: 4px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* Pico mejorado */
    .dropdown-menu:before,
    .dropdown-menu:after {
        content: '';
        display: block;
        position: absolute;
        width: 0;
        height: 0;
        right: 12px;
        border-style: solid;
        /* Elimina box-shadow aquí, lo ponemos solo en el borde */
    }

    /* Sombra exterior del pico: ahora coincide con el borde del ul */
    .dropdown-menu:before {
        top: -11px;
        border-width: 0 11px 11px;
        border-color: transparent transparent #d4d4d4 transparent; /* mismo color que el borde del ul */
        z-index: 1;
    }

    /* Parte interior del pico: ahora coincide con el fondo del ul */
    .dropdown-menu:after {
        top: -10px;
        border-width: 10px 10px 10px 10px;
        border-color: transparent transparent #ffffff transparent; /* mismo color que el fondo del ul */
        z-index: 2;
    }

    .show {
        display: block !important;
    }

    .user-info {
        padding: 12px 16px;
        display: flex;
        align-items: center;
        gap: 8px;
        color: #666;
    }

    .user-info-compact {
        padding: 6px 12px;
        color: #666;
        font-size: 12px;
    }

    .dropdown-divider {
        height: 1px;
        background-color: #eee;
        margin: 2px 0;
    }

    .dropdown-item-compact {
        display: flex;
        align-items: center;
        gap: 6px;
        width: 100%;
        padding: 6px 12px;
        border: none;
        background: none;
        cursor: pointer;
        color: #333;
        text-align: left;
        font-size: 13px;
    }

    .dropdown-item-compact:hover {
        background-color: #f5f5f5;
    }

    /* Estilo específico para el botón de cerrar sesión */
    form .dropdown-item-compact {
        border-radius: 4px;
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, .2), 0 1px 2px rgba(0, 0, 0, .05);
    }

    form .dropdown-item-compact:hover,
    form .dropdown-item-compact:focus {
        color: #ffffff;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
        background-color: #b71c1c;
        background-image: -moz-linear-gradient(top, #e74c3c, #b71c1c);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#e74c3c), to(#b71c1c));
        background-image: -webkit-linear-gradient(top, #e74c3c, #b71c1c);
        background-image: -o-linear-gradient(top, #e74c3c, #b71c1c);
        background-image: linear-gradient(to bottom, #e74c3c, #b71c1c);
        background-repeat: repeat-x;
        background-position: 0 -15px;
        -webkit-transition: background-position 0.1s linear;
        transition: background-position 0.1s linear;
        text-decoration: none;
    }

    .navbar-inner,
    .navbar-inner *,
    #userDropdown,
    #userDropdown * {
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }
</style>

<script>
    function toggleDropdown() {
        const dropdownMenu = document.getElementById("userDropdown");
        const button = document.querySelector(".dropbtn");
        const buttonRect = button.getBoundingClientRect();
        
        dropdownMenu.classList.toggle("show");
        button.classList.toggle("active"); // Agregamos o quitamos la clase active al botón
        
        if (dropdownMenu.classList.contains("show")) {
            dropdownMenu.style.top = `${buttonRect.bottom + window.scrollY}px`;
            dropdownMenu.style.left = `${buttonRect.right - dropdownMenu.offsetWidth + window.scrollX}px`;
        }

        // Modificamos el evento para verificar si el clic fue dentro del menú
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn') && 
                !event.target.closest('#userDropdown')) {
                if (dropdownMenu.classList.contains('show')) {
                    dropdownMenu.classList.remove('show');
                    button.classList.remove('active'); // Quitamos la clase active si se cierra el menú
                }
            }
        }
    }
</script>