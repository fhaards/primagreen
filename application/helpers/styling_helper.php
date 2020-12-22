<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


function status_order_color($var = '')
{
    if ($var == 'PROCESS') {
        $var = 'inline-block rounded-sm px-4 py-2 lg:text-sm text-xs border bg-blue-300 border-blue-400 text-blue-800';
    } else if ($var == 'COMPLETE') {
        $var = 'inline-block rounded-sm px-4 py-2 lg:text-sm text-xs border bg-green-300 border-green-400 text-green-800';
    } else if ($var == 'PACKING') {
        $var = 'inline-block rounded-sm px-4 py-2 lg:text-sm text-xs border bg-yellow-300 border-yellow-400 text-yellow-800';
    } else {
        $var = 'inline-block rounded-sm px-4 py-2 lg:text-sm text-xs border bg-gray-300 border-gray-400 text-gray-800';
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
