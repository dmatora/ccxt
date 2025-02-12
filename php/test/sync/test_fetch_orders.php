<?php
namespace ccxt;
use \ccxt\Precise;

// ----------------------------------------------------------------------------

// PLEASE DO NOT EDIT THIS FILE, IT IS GENERATED AND WILL BE OVERWRITTEN:
// https://github.com/ccxt/ccxt/blob/master/CONTRIBUTING.md#how-to-contribute-code

// -----------------------------------------------------------------------------
include_once __DIR__ . '/../base/test_order.php';

function test_fetch_orders($exchange, $symbol) {
    $method = 'fetchOrders';
    $orders = $exchange->fetch_orders($symbol);
    assert(gettype($orders) === 'array' && array_keys($orders) === array_keys(array_keys($orders)), $exchange->id . ' ' . $method . ' must return an array, returned ' . $exchange->json($orders));
    $now = $exchange->milliseconds();
    for ($i = 0; $i < count($orders); $i++) {
        test_order($exchange, $method, $orders[$i], $symbol, $now);
    }
    assert_timestamp_order($exchange, $method, $symbol, $orders);
}
