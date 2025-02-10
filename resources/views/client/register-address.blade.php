<x-app>
    <x-slot name="title">User {{Auth::user()->name}}</x-slot>

    <x-slot name="link">
        <script src="https://js.stripe.com/v3/"></script>
    </x-slot>
    
    <main>
        <!-- Contenido de la portada principal -->
        <div class="payment-dashboard">
            <div class="payment-section">
                <div class="data-form">
                    <h2 class="text-center">Direccion de Envio</h2>
                    <form class="FORMULARIO" action="{{ route('address.add') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="address">Direccion</label>
                            <input type="text" id="address" name="address" required @if (auth()->user()->address) value="{{auth()->user()->address}}" @endif>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Agregar Direccion</button>
                    </form>

                </div>
            </div>
        </div>
    </main>
</x-app>