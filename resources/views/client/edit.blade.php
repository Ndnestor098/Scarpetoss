<x-app>
    <x-slot name="title">Edit User {{Auth::user()->name}}</x-slot>

    <main>
        <!-- Contenido de la portada principal -->
        <section class="user-dashboard">
            <x-panel/>

            <div class="account-info">
                <div class="greeting">
                    <h3>Hola, {{ Auth::user()->name }}!</h3>
                </div>
                <div class="user-data">
                    <div class="data-content">
                        <div class="data-form">
                            <div>
                                <p>Mis datos</p>
                            </div>
                            <div class="data-form">
                                <form action="{{ route('edit.user') }}" method="POST" autocomplete="off"
                                    enctype="application/x-www-form-urlencoded" class="update-info">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <label for="name">Nombre</label>
                                        <input type="text" name="name" id="name" placeholder="Nombre"
                                            value="{{ Auth::user()->name }}">
                                    </div>
                                    <span class="error">
                                        @if ($errors->has('name'))
                                            {{ $errors->first('name') }}
                                        @endif
                                    </span>
                                    <div>
                                        <label>Email</label>
                                        <input type="email" disabled="disabled" value="{{ Auth::user()->email }}">
                                    </div>
                                    <div>
                                        <label for="address">Direccion</label>
                                        <input type="text" name="address" id="address" placeholder="address"
                                            value="{{ auth()->user()->address }}">
                                    </div>
                                    <span class="error">
                                        @if ($errors->has('address'))
                                            {{ $errors->first('address') }}
                                        @endif
                                    </span>
                                    <div>
                                        <label for="password">Clave Actual</label>
                                        <input type="password" name="password" id="password" required
                                            placeholder="Clave Actual">
                                    </div>
                                    <span class="error">
                                        @if ($errors->has('password'))
                                            {{ $errors->first('password') }}
                                        @endif
                                    </span>
                                    <button type="submit">Guardar Cambios</button>
                                </form>
                            </div>
                        </div>
                        <div class="data-form">
                            <div>
                                <p>Cambiar Clave</p>
                            </div>
                            <div class="user-info">
                                <form action="{{ route('edit.password', [], true) }}" method="POST"
                                    enctype="application/x-www-form-urlencoded" class="update-password">
                                    @csrf
                                    @method('PUT')
                
                                    <div>
                                        <label for="password">Clave Actual</label>
                                        <input type="password" name="password" id="password" required
                                            placeholder="Clave Actual">
                                    </div>
                                    <div>
                                        <label for="password_new">Clave Nueva</label>
                                        <input type="password" name="password_new" id="password_new" required placeholder="Clave Nueva">
                                        
                                        <span class="error">
                                            @if ($errors->has('password_new'))
                                                {{ $errors->first('password_new') }}
                                            @endif
                                        </span>
                                    </div>
                                    <div>
                                        <label for="password_new_confirmation">Confirmar Clave Nueva</label>
                                        <input type="password" name="password_new_confirmation"
                                            id="password_new_confirmation" required placeholder="Clave Nueva">
                                    </div>
                                    <span class="error">
                                        @if ($errors->has('password_password'))
                                            {{ $errors->first('password_password') }}
                                        @endif
                                    </span>
                                    <button type="submit">Guardar Cambios</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</x-app>
        
    

