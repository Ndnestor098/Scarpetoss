<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Sell;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class StripeController extends Controller
{
    public function index()
    {
        return view('client.register-payment');
    }

    public function createPayment(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'cardholder_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|exists:users,email',
            'stripeToken' => 'required|string',
        ]);

        // Configurar la clave secreta de Stripe
        Stripe::setApiKey(config('services.stripe.secret'));

        // Crear un cliente en Stripe
        $customer = Customer::create([
            'email' => $request->email,
            'source' => $request->stripeToken,
        ]);

        // Guardar detalles no sensibles en la base de datos
        $user = User::find(Auth::user()->id);
        $user->stripe_customer_id = $customer->id;
        $user->card_last_four = substr($request->stripeToken, -4); // Últimos 4 dígitos del número de tarjeta
        $user->save();

        return redirect()->route('cart');
    }

    public function processPayment()
    {
        // Obtener productos en el carrito del usuario autenticado
        $products = Cart::with('product') // Carga los productos relacionados con los carritos
            ->select('product_id', 'user_id', 'sizes', DB::raw('COUNT(*) as count_total')) // Selecciona los campos necesarios y cuenta las filas agrupadas
            ->groupBy('product_id', 'user_id', 'sizes') // Agrupa por product_id, user_id y sizes
            ->where('user_id', Auth::user()->id)
            ->get(); // Ejecuta la consulta y obtiene los resultados
        
        // Verificar si hay productos en el carrito
        if ($products->isEmpty()) {
            return redirect()->route("cart")
            ->withErrors(['cart_empty' => 'No hay productos en el carrito.'])
            ->withInput();
        }

        $amount = 0;

        foreach($products as $item){
            $amount += $item->product->price * $item->count_total;
        }

        // Convertir el monto a centavos
        $amountInCents = intval(round($amount * 100)); // Redondear para evitar problemas con decimales

        // Validar que el monto en centavos sea mayor o igual a 1
        if ($amountInCents < 1) {
            return redirect()->route("cart")
                ->withErrors(['amount_error' => 'El monto debe ser al menos $0.01.'])
                ->withInput();
        }

        // Configurar la clave secreta de Stripe
        Stripe::setApiKey(config('services.stripe.secret'));

        // Obtener el cliente de Stripe del usuario autenticado
        $user = Auth::user();
        $customerId = $user->stripe_customer_id;

        // Crear un cargo
        try {
            Charge::create([
                'customer' => $customerId,
                'amount' => $amountInCents, // Monto en centavos
                'currency' => 'usd',
                'description' => 'Pago de Zapatos en Scarpetoss',
            ]);

            // Registrar cada venta
            foreach ($products as $item) {
                Sell::create([
                    'user_id' => Auth::id(),
                    'product_id' => $item->product_id,
                    'size' => $item->sizes,
                    'price' => $item->product->price,
                    'count' => $item->count_total,
                ]);
            }

            // Vaciar el carrito del usuario
            Cart::where('user_id', Auth::id())->delete();
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            Log::info("Entro aqui");
            return redirect()->route("cart")
                ->withErrors(['error' => 'Hubo un problema al procesar el pago: ' . $e->getMessage()])
                ->withInput();
        }

        // Redirigir a la página de agradecimiento
        return redirect()->route('thanks')->with('success', 'Pago realizado correctamente. ¡Gracias por su compra!');
    }

    public function edit()
    {
        return view('client.payment');
    }

    public function update(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'password' => 'required|string',
            'stripeToken' => 'required|string',
        ]);

        $user = User::find(Auth::user()->id);

        if(Hash::check($request->password, $user->password)){

            // Configurar la clave secreta de Stripe
            Stripe::setApiKey(config('services.stripe.secret'));

            // Crear un cliente en Stripe
            $customer = Customer::create([
                'email' => $user->email,
                'source' => $request->stripeToken,
            ]);

            // Guardar detalles no sensibles en la base de datos
            $user->stripe_customer_id = $customer->id;
            $user->card_last_four = substr($request->stripeToken, -4); // Últimos 4 dígitos del número de tarjeta
            $user->save();

            return redirect()->route('client')->with('success', 'Método de pago actualizado con éxito.');
        }

        return redirect()->back()->with('error', 'Método de pago ha fallado.');
    }

    public function showPurchase(Request $request)
    {
        $data = Sell::with('product')->where('user_id', Auth::user()->id)->get();

        return view('client.sell', ['sells' => $data]);
    }
}
