<div id="show-cart" class="flex show-cart shadow-lg z-30 fixed right-0 h-full lg:w-1/4 w-full bg-gray-100 mt-20 focus:outline-none active:outline-none" aria-label="submenu">
    <div class="container mx-auto px-6 ">
        <div class="flex flex-row w-full py-4">
            <div class="flex-1">
                <h1 class="tracking-wide font-bold text-gray-800 text-xl" href="#">
                    Your Cart
                </h1>
            </div>
            <div class="">
                <button class="close-cart uppercase tracking-wide font-bold text-gray-700 text-xl"> X </button>
            </div>
        </div>

        <div class="w-full">
            <div class="flex flex-col">
                <div id="detail_cart"></div>
            </div>
            <!-- <table class="w-full" style="max-height:400px;">
                <tbody id="detail_cart">
                </tbody>
            </table> -->
        </div>

        <!-- <div class="mt-4 w-full">
        <div class="w-4/5 mx-auto container">
            <table class="w-full">
                <tbody id="total_cart">
                </tbody>
            </table>
        </div>
    </div> -->

        <div class="flex flex-col">
            <?php if (isLoggedIn()) : ?>
                <div class="flex">
                    <p class="text-xs text-gray-600 justify-between">
                        Shipping and taxes calculated at checkout. Please check again the items to be purchased. We will not be held responsible for any mistakes you make during checkout.
                    </p>
                </div>
                <!-- <button id="checkout-btn" type="button" class="shadow-lg w-full px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-green-500 rounded-md active:bg-green-600 hover:shadow-none hover:bg-green-600 focus:outline-none focus:shadow-outline-green">
                        <p class="tracking-widest"> CHECKOUT </p>
                    </button> -->
                <button id="checkout-btn" type="button" class="flex w-full mt-8 mx-auto space-x-2 shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                    <div class="flex flex-row space-x-4 items-center mx-auto">
                        <svg class="w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span class="tracking-widest"> CHECKOUT </span>
                    </div>
                </button>
            <?php else : ?>
                <span class="text-md font-semibold py-4 text-red-500"> Login First Before Checkout ! </span>
            <?php endif; ?>
        </div>

    </div>
</div>