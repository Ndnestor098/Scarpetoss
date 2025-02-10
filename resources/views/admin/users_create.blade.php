<x-app>
    <x-slot name="title">Administer {{Auth::user()->name}}</x-slot>
    <x-slot name="link">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </x-slot> 

    <main>
        <!-- Contenido de la portada principal -->
        <div class="user-dashboard">
            <x-panel />

            <div class="account-info">
                <div class="greeting">
                    <h3>Crear Nuevo Usuario Administrador</h3>
                </div>
                <div class="data-container">
                    <div class="user-info">
                        <div class="user-data">
                            <form action="{{ route('users.store') }}" method="POST" autocomplete="off"enctype="application/x-www-form-urlencoded" class="product-edit-form">
                                @csrf
                                <div>
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" required> 
                                </div>
                                <div>
                                    <label for="email">Email</label> 
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                                </div>
                                <div>
                                    <label for="password">Clave</label>
                                    <input type="password" name="password" id="password" required>
                                </div>
                                <div>
                                    <label for="password_confirmation">Confirmar Clave</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                                </div>
                                <span class="error" style="font-size: 11px">
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}
                                            @break
                                        @endforeach
                                    @endif
                                </span>
                                <button type="submit" id="btn_actualizar">Crear</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </main>
</x-app>