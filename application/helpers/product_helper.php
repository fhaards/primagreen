<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function stockInList($var)
{
    if ($var >= 1) {
        $stockBackground = '';
        $stockIcon = 'M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z';
        $stockIconColor = 'text-green-500';
    } else {
        $stockBackground = 'bg-red-200';
        $stockIcon = 'M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z';
        $stockIconColor = 'text-red-500';
    }

    $stockInListOutput  =   '<div class="flex mx-auto py-2 px-4 rounded-md text-justify ' . $stockBackground . '">
                                <span class="hidden">' . $var . '</span>
                                <div class="flex flex-row items-center space-x-4 text-sm">
                                    <label class="block text-sm relative items-center ">
                                        <div class="bg-white rounded-full absolute mx-1">
                                            <svg class="w-4 h-4 ' . $stockIconColor . '" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="' . $stockIcon . '" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <input type="number" name="stock" value="' . $var . '" class="block w-20 pl-4 ml-3 text-sm font-bold py-1 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                                    </label>
                                    <button type="submit" class="flex items-center justify-between px-1  py-1 text-sm font-medium leading-5 bg-blue-500 rounded-full hover:bg-blue-700">
                                        <svg class="w-4 h-4 fill-current text-white" aria-hidden="true" fill="" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>';

    return $stockInListOutput;
}
