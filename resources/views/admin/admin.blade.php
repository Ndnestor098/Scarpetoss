<x-app>
    <x-slot name="title">User {{Auth::user()->name}}</x-slot>


    <main>
        <!-- Contenido de la portada principal -->
        <div class="user-dashboard">
            <x-panel/>

            <div class="account-info">
                <div class="greeting">
                    <h3>Hola, {{Auth::user()->name}}!</h3>
                </div>
                <div class="user-data">
                    <div>
                        <p class="sub-title">Mis datos</p>
                    </div>
                    <div class="data-container">
                        <div class="user-info" >
                            <span><i class="fa-regular fa-user"></i>{{Auth::user()->name}}</span>
                            <span><i class="fa-solid fa-envelope"></i>{{Auth::user()->email}}</span>
                            <span><i class="fa-solid fa-location-dot"></i>Direccion</span>
                        </div>
                        <a href="{{route("client.details")}}" class="btn-data">
                            <span>Mis datos</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </main>
</x-app>