<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function objectSocmed($var)
{
    if ($var == 'Instagram') :
        $socmed = getCompanyData()['instagram'];
        $outputsocmed = '<div class="flex flex-row space-x-2 items-center">
                            <svg class="md:w-4 md:h-4 h-6 w-6 " fill="currentColor" viewBox="0 0 24 24" stroke="none">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                            <span>' . $socmed . '</span>
                        </div>';
    else :
        $socmed = getCompanyData()['telp'];
        $outputsocmed = '<div class="flex flex-row space-x-2 items-center">
                            <svg class="md:w-4 md:h-4 h-6 w-6 " fill="currentColor" viewBox="0 0 24 24" stroke="none">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                            </svg>
                            <span>' . $socmed . '</span>
                        </div>';
    endif;
    return $outputsocmed;
}

function buttonPrimary($var)
{
    if ($var == 'Background') :
        $var = 'flex shadow-lg w-full lg:w-full px-4 py-2  text-xs text-white rounded-md font-bold leading-5 transition-colors duration-150 bg-gray-800 active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray';
    endif;

    return $var;
}

function buttonPrimaryRounded($var)
{
    if ($var == 'Background') :
        $var = 'flex shadow-lg p-3 text-xs text-white rounded-full font-bold transition-colors duration-150 bg-gray-800 active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray';
    endif;

    return $var;
}



function smallIconColor($var)
{
    if ($var == 'edit') {
        $getClass = "flex items-center mx-auto justify-between px-1 py-1 text-sm font-medium leading-5 rounded-md shadow-xs text-white transition-colors duration-150 bg-gray-800 active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray";
    } else if ($var == 'delete') {
        $getClass = "flex items-center mx-auto justify-between px-1 py-1 text-sm font-medium leading-5 rounded-md shadow-xs text-white transition-colors duration-150 bg-red-600 active:bg-red-800 hover:shadow-none hover:bg-red-700 focus:outline-none focus:shadow-outline-red";
    } else if ($var == 'deleteDisabled') {
        $getClass = "disabled flex items-center mx-auto justify-between px-1 py-1 text-sm font-medium leading-5 rounded-md shadow-xs text-gray-500 transition-colors duration-150 bg-gray-100 active:bg-red-200 hover:shadow-none hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray";
    } else {
    }

    return $getClass;
}

function smallIcon($var)
{
    if ($var == 'edit') {
        $getIcon = '<svg class="w-4 h-4 fill-current text-white" aria-hidden="true" fill="" viewBox="0 0 20 20">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                    </svg>';
    } else if ($var == 'delete') {
        $getIcon = '<svg class="w-4 h-4" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>';
    }
    return $getIcon;
}
