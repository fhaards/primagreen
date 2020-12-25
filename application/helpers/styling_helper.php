<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


function status_order_color($var = '')
{
    if ($var == 'PROCESS') {
        $var = 'inline-block rounded-sm lg:px-4 px-2 py-1 text-xs border bg-blue-300 border-blue-400 text-blue-800 font-bold';
    } else if ($var == 'PACKING') {
        $var = 'inline-block rounded-sm lg:px-4 px-2 py-1 text-xs border bg-yellow-300 border-yellow-400 text-yellow-800 font-bold';
    } else if ($var == 'COMPLETE') {
        $var = 'inline-block rounded-sm lg:px-4 px-2 py-1 text-xs border bg-green-300 border-green-400 text-green-800 font-bold';
    } else {
        $var = 'inline-block rounded-sm lg:px-4 px-2 py-1 text-xs border bg-gray-300 border-gray-400 text-gray-800 font-bold';
    }
    return $var;
}

function status_order_info($var = '')
{
    if ($var == 'PROCESS') {
        $var = 'Administrator will check youre transfer proof. If the transfer proof was valid , we will packing your order and send to youre destination.';
    } else if ($var == 'PACKING') {
        $var = 'The items was packing and we will send to your destination. Destination is same as your address or youre input in checkout.';
    } else if ($var == 'COMPLETE') {
        $var = 'The Order was complete, and enjoy our products :) .';
    } else {
        $var = 'The order was succcesfully , you must transfer to our bank account and confirmation transfer proof in website profile account.';
    }
    return $var;
}

function status_bg_color($var = '')
{
    if ($var == 'PROCESS') {
        $var = 'bg-blue-100 hover:bg-blue-200';
    } else if ($var == 'COMPLETE') {
        $var = 'bg-green-100 hover:bg-green-200';
    } else if ($var == 'PACKING') {
        $var = 'bg-yellow-100 hover:bg-yellow-200';
    } else {
        $var = 'bg-gray-100 hover:bg-gray-200';
    }
    return $var;
}
