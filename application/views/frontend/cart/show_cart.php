<div id="show-cart" class="show-cart z-30 fixed right-0 h-full lg:w-1/4 w-full bg-green-100 mt-20 focus:outline-none active:outline-none" aria-label="submenu">

    <div class="flex container w-full">
        <div class="flex w-4/5 items-center mx-auto top-0 border-b border-green-800 border-solid">
            <div class="flex-1">
                <h1 class="tracking-wide font-bold text-green-800 text-xl" href="#">
                    Your Cart
                </h1>
            </div>
            <div class="py-3">
                <button class="close-cart uppercase tracking-wide font-bold text-gray-700 text-xl p-2"> X </button>
            </div>
        </div>
    </div>

    <div class="w-full overflow-y-scroll bg-red-200" style="max-height:400px;">
        <div class="w-4/5 mx-auto container bg-red-300">
            <div class="flex flex-col">
                <div id="detail_cart"></div>
            </div>
            <!-- <table class="w-full" style="max-height:400px;">
                <tbody id="detail_cart">
                </tbody>
            </table> -->
        </div>
    </div>

    <!-- <div class="mt-4 w-full">
        <div class="w-4/5 mx-auto container">
            <table class="w-full">
                <tbody id="total_cart">
                </tbody>
            </table>
        </div>
    </div> -->

    <div class="w-4/5 mt-4 mx-auto container">
        <div class="flex">
            <p class="text-xs text-gray-500 justify-between">
                Shipping and taxes calculated at checkout. Please check again the items to be purchased. We will not be held responsible for any mistakes you make during checkout.
            </p>
        </div>
    </div>


    <div class="flex mt-10">
        <div class="w-4/5 mx-auto container">
            <?php if (isLoggedIn()) : ?>
                <button id="checkout-btn" type="button" class="shadow-lg w-full px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-green-500 rounded-md active:bg-green-600 hover:shadow-none hover:bg-green-600 focus:outline-none focus:shadow-outline-green">
                    <p class="tracking-widest"> CHECKOUT </p>
                </button>
            <?php else : ?>
                <span class="text-xs py-4 text-red-500"> Login First Before Checkout ! </span>
            <?php endif; ?>
        </div>
    </div>
</div>