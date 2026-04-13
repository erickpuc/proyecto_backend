<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Planes;
use App\Http\Controllers\SuscripcionController;

class StripeController extends Controller
{ 




public function crearSesion(Request $request)
{
    $plan = Planes::find($request->plan_id);

    Stripe::setApiKey(env('STRIPE_SECRET'));

    $session = Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'mxn',
                'product_data' => [
                    'name' => $plan->nombre,
                ],
                'unit_amount' => $plan->precio * 100,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',

        'success_url' => 'http://localhost:3000/success',
        'cancel_url' => 'http://localhost:3000/cancel',

        
        'metadata' => [
            'usuario_id' => $request->usuario_id,
            'plan_id' => $request->plan_id
        ]
    ]);

    return response()->json([
        'url' => $session->url
    ]);
}



public function webhook(Request $request)
{
    $event = json_decode($request->getContent());

    if ($event->type == 'checkout.session.completed') {

        $session = $event->data->object;

        $fakeRequest = new Request([
            'usuario_id' => $session->metadata->usuario_id,
            'plan_id' => $session->metadata->plan_id
        ]);

        
        $controller = new SuscripcionController();
        $controller->AddSuscripcion($fakeRequest);
    }

    return response()->json(['ok' => true]);
}



public function pagar(Request $request)
{
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    // 🔥 BUSCAS EL PLAN
    $plan = Planes::find($request->plan_id);

    if (!$plan) {
        return response()->json(['error' => 'Plan no existe'], 404);
    }

    try {
        
        \Stripe\Charge::create([
            "amount" => $plan->precio * 100, 
            "currency" => "mxn",
            "source" => $request->token_stripe,
            "description" => "Pago de plan " . $plan->nombre
        ]);

        
        $controller = new \App\Http\Controllers\SuscripcionController();
        $controller->AddSuscripcion($request);

        return response()->json([
            'status' => 'OK'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Pago fallido',
            'detalle' => $e->getMessage()
        ], 500);
    }
}

}