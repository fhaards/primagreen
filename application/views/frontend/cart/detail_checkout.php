<section class="w-full mx-auto mt-32 py-4 my-4">
    <div class="container flex flex-col items-center flex-wrap">

        <div class="flex lg:flex-row flex-col w-full">
            <div class="w-1/3 mb-4">
                <nav id="new-items" class="w-full top-0 py-1">
                    <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
                        <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                            Checkout Detail
                        </a>
                    </div>
                </nav>
            </div>
        </div>

        <div class="mt-4 w-full">
            <table class="w-full">
                <thead>
                    <tr>
                        <th colspan="3" class="text-gray-600 bg-gray-200 p-2">Items</th>
                    </tr>
                    <tr class="border-b border-gray-500">
                        <td class="py-2 font-semibold text-gray-600">Name</td>
                        <td class="py-2 font-semibold text-gray-600">Qty</td>
                        <td class="py-2 float-right"></td>
                    </tr>
                </thead>
                <tbody id="detail_checkout">
                    <?php echo $detailCart; ?>
                </tbody>
            </table>

            <table class="w-full">
                <thead>
                    <tr>
                        <th colspan="3" class="text-gray-600 bg-gray-200 p-2">Shipments</th>
                    </tr>
                </thead>
            </table>

            <div class="flex w-full lg:flex-row lg:space-x-5 flex-col">

                <div class="flex-1 w-full border border-gray-200  rounded-lg p-5 my-5">
                    <div class="border-b border-gray-400 py-4">
                        <span class="text-gray-800 font-bold">Shipments To</span>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex flex-col mt-2 w-full">
                            <div class="flex mt-2 text-gray-800 py-2">Sending By</div>
                            <div class="text-gray-600 w-full">
                                <input type="text" name="detail_info" value="<?= getUserData()['nama']; ?>" type="number" class="block mt-1 form-input w-full p-2 border border-gray-500 text-sm focus:bg-whiteform-textarea focus:border-green-400 focus:outline-none focus:shadow-outline-green" />
                            </div>
                        </div>
                        <div class="flex flex-col mt-2 w-full">
                            <div class="flex mt-2 text-gray-800">Address</div>
                            <div class="text-gray-600 w-full">
                                <textarea name="detail_info" type="number" class="block mt-1 w-full p-4 form-input border border-gray-500 text-sm focus:bg-whiteform-textarea focus:border-green-400 focus:outline-none focus:shadow-outline-green"><?= getUserData()['alamat']; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex-1 flex w-full flex-col text-right border border-gray-200 rounded-lg p-5 my-5">
                    <div class="border-b border-gray-400 py-4">
                        <span class="text-gray-800 font-bold">Courier</span>
                    </div>

                    <div class="flex flex-col lg:full w-3/3 float-right">
                        <div class="flex mt-2 text-gray-800 py-2 ">Select Courier</div>

                        <?php foreach ($getCourier as $getCouriers) : ?>
                            <div class="flex w-full my-2 bg-gray-200 shadow-md border border-gray-300 rounded-md p-2">
                                <div class="px-2 setkurir">
                                    <input type="radio" name="hargakurir" class="selectkurir" value="<?= $getCouriers['harga_kurir']; ?>">
                                </div>
                                <div class="flex-1 flex flex-col">
                                    <span class="font-bold text-left"><?= $getCouriers['nm_kurir']; ?></span>
                                    <span class="text-left font-semibold text-gray-600">
                                        Estimated Time <?= $getCouriers['estimasi']; ?> Days
                                    </span>
                                </div>
                                <div class="flex-1 font-semibold text-gray-600">
                                    Price : Rp. <?= number_format($getCouriers['harga_kurir']); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                </div>
            </div>

            <table class="w-full">
                <thead>
                    <tr>
                        <th colspan="3" class="text-gray-600 bg-gray-200 p-2">Payments</th>
                    </tr>
                </thead>
            </table>

            <!-- KALKULASI -->
            <input hidden type="number" value="" name="subtotal" id="sub-total"> <br>
            <input hidden type="number" value="" name="totalorder" id="totalorder-clone"> <br>
            <input hidden type="number" value="" name="setkurir" id="setkurir-clone"> <br>

            <div class="flex w-full lg:flex-row flex-col">
                <div class="flex-1"></div>
                <div class="flex-1"></div>
                <div class="flex-1 flex flex-col">
                    <div class="flex flex-row py-1 my-1 border-b border-gray-500 p-2">
                        <div class="flex-1">Items</div>
                        <div class="flex-1 text-right">Rp. <span id="sub-total-clone"></span></div>
                    </div>
                    <div class="flex flex-row py-1 my-1 border-b border-gray-500 p-2">
                        <div class="flex-1">Shipments</div>
                        <div class="flex-1 text-right">Rp. <span id="setkurir"></span></div>
                    </div>
                    <div class="flex flex-row py-1 my-1 p-2">
                        <div class="flex-1">Tax</div>
                        <div class="flex-1 text-right">Rp. <span id="taxes"></span></div>
                    </div>
                    <div class="flex flex-row py-1 my-1 float-right border  border-green-500 p-2">
                        <div class="flex-1 font-bold text-gray-900">Total</div>
                        <div class="flex-1 text-right">Rp. <span id="totalorder"></span></div>
                    </div>
                    <div class="flex flex-row py-1 my-1">
                        <span class="sel-courier font-bold text-gray-500 uppercase">Before Checkout , Select a Courier First !</span>
                        <button class="checkout-final-btn flex w-full shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-green-500 rounded-md active:bg-green-600 hover:shadow-none hover:bg-green-600 focus:outline-none focus:shadow-outline-green">
                            <div class="flex mx-auto space-x-2 items-center">
                                <svg class="w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="">Checkout</span>
                            </div>
                        </button>
                    </div>
                </div>

            </div>


        </div>
    </div>
</section>