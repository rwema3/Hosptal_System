<?php

require 'vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51KBzxXHR1XVDkcETd9dpbkV8xEyvRQmFPShqghPWRuNi2Y0zXFaWGL0GZFNEY5Cm9ua8ibow7kcjGRnpjpIprkRV00lLiD3eGN');

header('Content-Type: application/json');

try {
    // retrieve JSON from POST body
    $jsonStr = file_get_contents('php://input');
    $jsonObj = json_decode($jsonStr);

    // Lookup the payment methods available for the customer
    $paymentMethods = \Stripe\PaymentMethod::all([
        'customer' => $jsonObj->customer,
        'type' => 'card'
    ]);

    // Charge the customer and payment method immediately
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => 1099,
        'currency' => 'eur',
        'customer' => $jsonObj->customer,
        'payment_method' => $paymentMethods->data[0]->id,
        'off_session' => true,
        'confirm' => true,
    ]);

    echo json_encode([
        'paymentIntent' => $paymentIntent,
    ]);
} catch (\Stripe\Exception\CardException $e) {
    // Error code will be authentication_required if authentication is needed
    echo 'Error code is:' . $e->getError()->code;
    $paymentIntentId = $e->getError()->payment_intent->id;
    $paymentIntent = \Stripe\PaymentIntent::retrieve($paymentIntentId);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}