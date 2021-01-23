<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function get_status_order($var)
{
    if ($var == 'PROCESS') {
        $get_bg = 'bg-blue-300 border-2 border-blue-400 text-blue-800';
        $get_svg = 'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15';
    } else if ($var == 'PACKING') {
        $get_bg = 'bg-yellow-300  border-2 border-yellow-400 text-yellow-800';
        $get_svg = 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4';
    } else if ($var == 'COMPLETE') {
        $get_bg = 'bg-green-300  border-2 border-green-400 text-green-800';
        $get_svg = 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z';
    } else {
        $get_bg = 'bg-gray-300  border-2 border-gray-400 text-gray-800';
        $get_svg = 'M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20';
    }

    $status_output = '<div class="flex py-0 mx-auto">
                            <div class="flex flex-row space-x-2 items-center uppercase py-1 px-3 text-center font-bold md:text-xs text-xs tracking-wide rounded-md my-1 ' . $get_bg . '">
                                <div class="w-1/3">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="' . $get_svg . '" />
                                    </svg>
                                </div>
                                <div>' . $var . '</div>
                            </div>
                        </div>';
    return $status_output;
}

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


function detail_order_title($var)
{
    $title_output = '<div class="flex w-full mt-5">
                        <div class="uppercase flex w-full items-center p-2 bg-gray-300">
                            <div class="mx-auto tracking-widest font-black text-gray-800 md:text-base text-xs">' . $var . '</div>
                        </div>
                    </div>';
    return $title_output;
}


/// STATUS USER

function status_user_info_longtext($var)
{
    if ($var == 0) :
        $suinfo =   '<div class="bg-red-100 text-red-600 font-bold py-1 px-4 rounded-md flex flex-row space-x-2 md:space-x-5 items-center">
                        <svg class="h-3 md:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg> 
                        <div class="text-xs md:text-sm">Please , Complete Your Account !</div>
                    </div>';
    else :
        $suinfo =  '<div class="bg-green-100 text-green-600 font-bold py-1 px-4 rounded-md flex flex-row space-x-2 md:space-x-5 items-center">
                        <svg class="h-3 md:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-xs md:text-sm">Your Accout Is Complete !</div>
                    </div>';
    endif;
    return $suinfo;
}

function status_user_info_icon_address($var)
{
    if (empty($var)) :
        $su_icon_address = '<svg class="h-3 md:h-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>';
    else :

        $su_icon_address = '<svg class="h-3 md:h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>';
    endif;
    return $su_icon_address;
}

