<?php
include './stripe-php/init.php';
//require 'vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51KBzxXHR1XVDkcETd9dpbkV8xEyvRQmFPShqghPWRuNi2Y0zXFaWGL0GZFNEY5Cm9ua8ibow7kcjGRnpjpIprkRV00lLiD3eGN');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/stripe/';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => '{{PRICE_ID}}',
    'quantity' => 1,
  ]],
  'mode' => 'payment',
    'success_url' => $YOUR_DOMAIN . '/success.html',
    'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);