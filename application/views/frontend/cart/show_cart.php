<div id="show-cart" class="show-cart z-40 fixed  right-0 h-full lg:w-1/4 w-full bg-white shadow-lg focus:outline-none active:outline-none" aria-label="submenu">
    <div class="mx-auto p-5">

        <div class="flex containe mx-auto w-4/5 mt-5">
            <div class="flex-1">
                <nav id="new-items" class="flex w-full top-0 py-1 border-b border-gray-700 border-solid">
                    <div class="flex-1 py-3 ">
                        <h1 class="uppercase tracking-wide font-bold text-gray-700 text-xl p-2" href="#">
                            Your Cart
                        </h1>
                    </div>
                    <div class="py-3">
                        <button class="close-cart uppercase tracking-wide font-bold text-gray-700 text-xl p-2"> X </button>
                    </div>
                </nav>
            </div>
        </div>

        <div class="mt-4 w-full overflow-y-scroll" style="max-height:400px;">
            <div class="w-4/5 mx-auto container">
                <table class="w-full" style="max-height:400px;">
                    <thead>
                        <tr class="border-b border-gray-500">
                            <td class="py-2">Name</td>
                            <td class="py-2">Qty</td>
                            <td class="py-2"></td>
                        </tr>
                    </thead>
                    <tbody id="detail_cart">
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4 w-full overflow-y-scroll" style="max-height:400px;">
            <div class="w-4/5 mx-auto container">
                <table class="w-full" style="max-height:400px;">
                    <tbody id="total_cart">
                    </tbody>
                </table>
            </div>
        </div>

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
</div>