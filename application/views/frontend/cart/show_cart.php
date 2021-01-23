<div id="show-cart" class="show-cart hidden fixed inset-0 z-40 mt-0 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
    <div class="this-cart hidden flex flex-col border-l border-gray-300 z-40 fixed right-0 h-full lg:w-1/4 w-full bg-white focus:outline-none active:outline-none shadow-lg" aria-label="submenu">
        <div class="container mx-auto px-6">
            <div class="flex flex-row w-full py-4 mt-2">
                <div class="flex-1">
                    <h1 class="tracking-wide font-bold text-gray-800 text-xl" href="#">
                        Your Cart
                    </h1>
                </div>
                <div class="">
                    <button class="close-cart uppercase tracking-wide font-bold text-gray-700 text-xl px-2 hover:text-green-500"> X </button>
                </div>
            </div>
        </div>

        <div>
            <div class="w-full">
                <div class="flex flex-col">
                    <div id="detail_cart" class=""></div>
                </div>
            </div>

            <div class="flex flex-col mt-5 px-6">
                <?php if (isLoggedIn()) : ?>
                    <?php if (getUserData()['status_user'] == 0) : ?>
                        <span class="text-center text-sm font-bold py-4 text-red-500">
                            Please complete youre account <a href="<?= base_url() . 'profile/user-account'; ?>" class="underline"> Here </a> <br>
                            to finish youre cart
                        </span>
                    <?php else : ?>
                        <div class="flex">
                            <p class="text-xs text-gray-600 justify-between">
                                Shipping and taxes calculated at checkout. Please check again the items to be purchased. We will not be held responsible for any mistakes you make during checkout.
                            </p>
                        </div>
                        <button id="checkout-btn" type="button" class="flex w-full mt-8 mx-auto space-x-2 shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                            <div class="flex flex-row space-x-4 items-center mx-auto">
                                <svg class="w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                <span class="tracking-widest"> CHECKOUT </span>
                            </div>
                        </button>
                    <?php endif; ?>
                <?php else : ?>
                    <span class="text-center text-sm font-bold py-4 text-red-500">
                        Please <a href="<?= base_url() . 'login'; ?>" class="underline">Login</a> <br>
                        to finish youre cart
                    </span>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>