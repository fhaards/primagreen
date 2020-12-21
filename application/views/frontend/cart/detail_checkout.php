<section class="w-full mx-auto mt-32 py-4 my-4">
    <?php echo validation_errors(); ?>
    <?php echo form_open('cart/checkout'); ?>
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
            <!-- SHIPMENTS -->
            <table class="w-full">
                <thead>
                    <tr>
                        <th colspan="3" class="text-white bg-gray-500 p-2">Shipments</th>
                    </tr>
                </thead>
            </table>

            <div class="flex w-full lg:flex-row lg:space-x-5 flex-col">
            <!-- SEND TO -->
                <div class="flex-1 w-full border border-gray-200  rounded-lg p-5 my-5">
                    <div class="border-b border-gray-400 py-4">
                        <span class="text-gray-800 font-bold">Shipments To</span>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-col mt-2 w-full">
                            <div class="flex mt-2 text-gray-800 py-2">Sending By</div>
                            <div class="text-gray-600 w-full">
                                <input type="text" name="nama_t" value="<?= getUserData()['nama']; ?>" type="number" class="block mt-1 form-input w-full p-2 border border-gray-500 text-sm focus:bg-whiteform-textarea focus:border-green-400 focus:outline-none focus:shadow-outline-green" />
                            </div>
                        </div>
                        <div class="flex flex-col mt-2 w-full">
                            <div class="flex mt-2 text-gray-800">Address</div>
                            <div class="text-gray-600 w-full">
                                <textarea name="alamat_t" type="number" class="block mt-1 w-full p-4 form-input border border-gray-500 text-sm focus:bg-whiteform-textarea focus:border-green-400 focus:outline-none focus:shadow-outline-green"><?= getUserData()['alamat']; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- COURIER -->
                <div class="flex-1 flex w-full flex-col text-right border border-gray-200 rounded-lg p-5 my-5">
                    <div class="border-b border-gray-400 py-4">
                        <span class="text-gray-800 font-bold">Courier</span>
                    </div>
                    <div class="flex flex-col lg:full w-3/3 float-right">
                        <div class="flex mt-2 text-gray-800 py-2 ">Select Courier</div>
                        <?php foreach ($getCourier as $getCouriers) : ?>

                            <label id="selectedkurir" class="selectedkurir flex w-full my-2 shadow-md bg-gray-100 rounded-md p-2 hover:bg-blue-400 hover:shadow-sm">
                                <!-- <div class="flex items-center mx-auto px-5 setkurir w-1/5"> -->
                                <input type="radio" name="hargakurir" class="selectkurir mr-4" value="<?= $getCouriers['id_kurir']; ?>">
                                <!-- </div> -->
                                <div class="w-2/5 flex flex-col">
                                    <span class="font-bold text-left"><?= $getCouriers['nm_kurir']; ?></span>
                                    <span class="text-left font-semibold ">
                                        Estimated Time <?= $getCouriers['estimasi']; ?> Days
                                    </span>
                                </div>
                                <div class="w-2/5 font-semibold flex flex-col">
                                    <span class="font-bold text-left">Price :</span>
                                    <span class="text-left font-semibold">
                                        Rp. <?= number_format($getCouriers['harga_kurir']); ?>
                                    </span>
                                </div>
                            </label>
                        <?php endforeach; ?>

                    </div>

                </div>
            </div>

            <!-- PAYMENTS -->

            <table class="w-full">
                <thead>
                    <tr>
                        <th colspan="3" class="text-white bg-gray-500 p-2">Payments</th>
                    </tr>
                </thead>
            </table>

            <input hidden type="text" name="user_checkout" value="<?= getUserData()['id_user']; ?>">
            <input hidden type="number" value="" name="subtotal" id="sub-total"> <br>
            <input hidden type="number" value="" name="totalorder" id="totalorder-clone"> <br>
            <input hidden type="number" name="harga_kurir" value="" id="setkurir-harga"> <br>
            <input hidden type="number" name="id_kurir" value="" id="setkurir-clone"> <br>

            <div class="flex w-full lg:flex-row flex-col">
                <div class="flex-1"></div>
                <div class="flex-1"></div>
                <div class="flex-1 flex flex-col">
                    <div class="flex flex-row py-1 my-1 border-b border-gray-500 p-2">
                        <div class="lg:w-2/3 w-1/3 font-semibold text-gray-600">Items</div>
                        <div class="lg:w-1/3 w-2/3 grid grid-cols-2">
                            <span class="font-semibold text-gray-600">Rp.</span>
                            <span id="sub-total-clone" class="text-right font-semibold text-gray-600"></span>
                        </div>
                    </div>
                    <div class="flex flex-row py-1 my-1 border-b border-gray-500 p-2">
                        <div class="lg:w-2/3 w-1/3  font-semibold text-gray-600">Shipments</div>
                        <div class="lg:w-1/3 w-2/3 grid grid-cols-2">
                            <span class="font-semibold text-gray-600">Rp.</span>
                            <span id="setkurir-harga-clone" class="text-right font-semibold text-gray-600"></span>
                        </div>
                    </div>
                    <div class="flex flex-row py-1 my-1 p-2">
                        <div class="lg:w-2/3 w-1/3  font-semibold text-gray-600">Tax</div>
                        <div class="lg:w-1/3 w-2/3  grid grid-cols-2">
                            <span class="font-semibold text-gray-600">Rp.</span>
                            <span id="taxes" class="text-right font-semibold text-gray-600"></span>
                        </div>
                    </div>
                    <div class="flex flex-row py-1 my-1 float-right border-t border-green-500 p-2">
                        <div class="lg:w-2/3 w-1/3 font-bold text-gray-900">Total</div>
                        <div class="lg:w-1/3 w-2/3 grid grid-cols-2 font-bold text-gray-900">
                            <span class="w-1/3">Rp.</span>
                            <span id="totalorder" class="text-right"></span>
                        </div>
                    </div>
                    <div class="flex flex-row py-1 my-1">
                        <span class="sel-courier font-bold text-green-500 uppercase">Before Checkout , Select a Courier First !</span>
                        <button type="submit" class="checkout-final-btn flex w-full shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-green-500 rounded-md active:bg-green-600 hover:shadow-none hover:bg-green-600 focus:outline-none focus:shadow-outline-green">
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
    <?php echo form_close(); ?>
</section>