<nav class="account-panel">
    <h2>Mi Cuenta</h2>
    <ul class="account-options">
        <li><a href="{{route('client')}}" class="account-link">Panel de Cuenta</a></li>
        <li><a href="{{route('client.details')}}" class="account-link">Mis Datos</a></li>
        <li><a href="{{route('payment.edit')}}" class="account-link">Metodo de Pago</a></li>
        <li><a href="{{route('purchase')}}" class="account-link">Registros de Compras</a></li>

        @if (Auth::user()->is_admin)
            <li><a href="{{route('products')}}" class="account-link">Productos</a></li>
            <li><a href="{{route('users')}}" class="account-link">Usuarios</a></li>
            <li><a href="{{route('sell')}}" class="account-link">Ventas</a></li>
        @endif

        <li><a href="{{route('logout')}}" class="account-link logout">Cerrar sesion</a></li>
    </ul>
</nav>
