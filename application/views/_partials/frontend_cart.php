<div x-show="isCartMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
<template x-if="isCartMenuOpen">
    <div x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeCartMenu" @keydown.escape="closeProfileMenu" class="z-40 absolute right-0 h-full w-full lg:w-1/4 p-5 bg-white shadow-lg" aria-label="submenu">
        <div class="mx-auto">

            <div class="flex containe mx-auto w-4/5 mt-5">
                <div class="flex-1">
                    <nav id="new-items" class="flex w-full top-0 py-1 border-b border-gray-700 border-solid">
                        <div class="flex-1 py-3 ">
                            <h1 class="uppercase tracking-wide font-bold text-gray-700 text-xl " href="#">
                                Your Cart
                            </h1>
                        </div>
                        <!-- <div class="py-3">
                            <a href="#" @click="closeCartMenu" class="uppercase tracking-wide font-bold text-gray-700 text-xl"> X </a>
                        </div> -->
                    </nav>
                </div>
            </div>

            <?php $this->load->view('frontend/cart/detail_cart');?>

            <!-- <tr class="border-b border-gray-500">
                <td class="p-2"><label class="">Bromeliad Aechmea Pink</label></td>
                <td class="p-2"><input type="number" value="1" class="px-1 w-10 h-10"></td>
            </tr> -->



            <div class="w-4/5 mt-10 mx-auto container">
                <div class="flex mb-4">
                    <div class="flex-1">
                        <span class="text-gray-600 font-semibold">Subtotal</span>
                    </div>
                    <div>
                        <span class="text-gray-900 font-semibold"> 129000 </span>
                    </div>
                </div>
                <div class="flex">
                    <p class="text-xs text-gray-500 justify-between">
                        Shipping and taxes calculated at checkout. Please check again the items to be purchased. We will not be held responsible for any mistakes you make during checkout.
                    </p>
                </div>
            </div>


            <div class="flex mt-10">
                <div class="w-4/5 mx-auto container">
                    <button class="shadow-lg w-full px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-green-500 rounded-md active:bg-green-600 hover:shadow-none hover:bg-green-600 focus:outline-none focus:shadow-outline-green">
                        <p class="tracking-widest"> CHECKOUT </p>
                    </button>
                </div>
            </div>

        </div>
    </div>
</template>