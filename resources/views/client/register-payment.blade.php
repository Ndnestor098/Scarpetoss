<x-app>
    <x-slot name="title">User {{Auth::user()->name}}</x-slot>

    <x-slot name="link">
        <script src="https://js.stripe.com/v3/"></script>
    </x-slot>
    
    <main>
        <!-- Contenido de la portada principal -->
        <div class="payment-dashboard">
            <div class="payment-section">
                <div class="container">
                    <div class="data-form">
                        <h2 class="text-center">Payment Method</h2>
            
                        <form class="payment-form" style="width: 100%; max-width:250px;" action="{{ route('stripe.createPay') }}" method="post" id="payment-form">
                            @csrf
                            <div class="form-group">
                                <label for="cardholder-name">Nombre</label>
                                <input type="text" class="form-control" id="cardholder-name" name="cardholder_name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required value="{{ auth()->user()->email }}">
                            </div>
                            <div class="form-group">
                                <label for="card-element">Tarjeta de Credito o Debito</label>
                                <div id="card-element" class="form-control"></div>
                            </div>
                            <div id="card-errors" role="alert"></div>
                            <button type="submit" class="btn btn-primary mt-3" style="border-radius: 10px; font-weight:500">Agregar Metodo de Pago</button>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                var stripe = Stripe('{{ config('services.stripe.key') }}');
                var elements = stripe.elements();
                var card = elements.create('card');
                card.mount('#card-element');
        
                card.addEventListener('change', function(event) {
                    var displayError = document.getElementById('card-errors');
                    if (event.error) {
                        displayError.textContent = event.error.message;
                    } else {
                        displayError.textContent = '';
                    }
                });
        
                var form = document.getElementById('payment-form');
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
        
                    stripe.createToken(card).then(function(result) {
                        if (result.error) {
                            var errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;
                        } else {
                            var hiddenInput = document.createElement('input');
                            hiddenInput.setAttribute('type', 'hidden');
                            hiddenInput.setAttribute('name', 'stripeToken');
                            hiddenInput.setAttribute('value', result.token.id);
                            form.appendChild(hiddenInput);
        
                            form.submit();
                        }
                    });
                });
            </script>
        </div>


    </main>
</x-app>