<div class="container px-6 py-3  mx-auto grid min-h-screen">
    <section class="w-full mx-auto mt-20 md:mt-24">
        <?php echo $breadcrumb; ?>
        <?php echo validation_errors(); ?>
        <?php echo form_open('cart/checkout'); ?>
        <div class="container flex flex-col items-center my-5 py-5">

            <div class="flex lg:flex-row flex-col w-full">
                <div class=" mb-4">
                    <div id="new-items" class="w-full top-0 ">
                        <div class=" container mx-auto flex flex-col">
                            <h2 class="uppercase tracking-wide no-underline hover:no-underline font-black text-sm md:text-xl ">
                                Checkout Detail
                            </h2>
                            <h2 class="font-bold text-sm md:text-md tracking-wide text-gray-800">
                                Please check again the items to be purchased. We will not be held responsible for any mistakes you make during checkout.
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 w-full">

                <?= detail_order_title('Items'); ?>

                <div class="flex flex-col pt-6">
                    <div> <?php echo $detailCart; ?></div>
                </div>
                <!-- SHIPMENTS -->

                <?= detail_order_title('Shipments'); ?>

                <div clas="grid grid-cols-1">
                    <div class="grid gid-cols-2">
                        <div class="grid gap-4 grid-flow-col auto-rows-max overflow-x-scroll lg:scrollbar-none">
                            <!-- SEND TO -->
                            <div class="grid grid-cols-1 md:w-full border border-gray-300 rounded-lg my-5 bg-white" style="min-width:300px;">
                                <div class="p-4 w-full">
                                    <div class="tracking-wide text-gray-800 font-bold md:text-sm text-xs">DELIVERY TO</div>
                                    <div class="tracking-wide text-gray-500 font-bold text-xs">You can delivery to youre address , or you can gift to other people you love for surprise</div>
                                </div>
                                <div class="p-5">
                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="mt-2 text-gray-800 text-xs">Sending By / To </div>
                                        <div class="text-gray-600">
                                            <input type="text" name="nama_t" value="<?= getUserData()['nama']; ?>" type="number" class="block mt-1 form-input w-full p-2 border border-gray-500 text-sm focus:bg-whiteform-textarea focus:border-green-400 focus:outline-none focus:shadow-outline-green" />
                                        </div>
                                    </div>
                                    <div class="flex flex-col mt-2 w-full">
                                        <div class="mt-2 text-gray-800 text-xs">Delivery Address</div>
                                        <div class="text-gray-600 w-full">
                                            <textarea name="alamat_t" type="number" class="block mt-1 w-full p-4 form-input border border-gray-500 text-sm focus:bg-whiteform-textarea focus:border-green-400 focus:outline-none focus:shadow-outline-green"><?= getUserData()['alamat']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- COURIER -->
                            <div class="grid grid-cols-1 md:w-full border border-gray-200 rounded-lg my-5 bg-white" style="min-width:500px;">
                                <div class="p-4 w-full">
                                    <div class="tracking-wide text-gray-800 font-bold md:text-sm text-xs">SELECT COURIER</div>
                                </div>
                                <div class="flex flex-col lg:full w-3/3 float-right px-4">
                                    <div class="grid grid-cols-2 gap-4">
                                        <?php foreach ($getCourier as $getCouriers) : ?>

                                            <label id="selectedkurir" class="selectedkurir flex flex-row items-center p-3 space-x-5 md:text-md text-xs flex w-full shadow-md bg-gray-100 rounded-md p-2 hover:bg-green-400 hover:shadow-sm">
                                                <!-- <div class="flex items-center mx-auto px-5 setkurir w-1/5"> -->
                                                <input type="radio" name="hargakurir" class="selectkurir mr-4" value="<?= $getCouriers['id_kurir']; ?>">
                                                <!-- </div> -->
                                                <div class="flex flex-col">
                                                    <div class="font-bold items-center py-1"><?= $getCouriers['nm_kurir']; ?></div>
                                                    <div class="text-left font-semibold grid grid-cols-2 gap-4">
                                                        <p>Estimated Time</p>
                                                        <p>: <?= $getCouriers['estimasi']; ?> Days</p>
                                                    </div>
                                                    <div class="text-left font-semibold grid grid-cols-2 gap-4">
                                                        <p class="text-left">Price </p>
                                                        <p class="text-left font-semibold">
                                                            : Rp. <?= number_format($getCouriers['harga_kurir']); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </label>

                                        <?php endforeach; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <!-- PAYMENTS -->

                <?= detail_order_title('Payment'); ?>

                <div class="grid md:grid md:grid-cols-3">
                    <div></div>
                    <div>
                        <input type="hidden" name="user_checkout" value="<?= getUserData()['id_user']; ?>">
                        <input type="hidden" value="" name="subtotal" id="sub-total"> <br>
                        <input type="hidden" value="" name="totalorder" id="totalorder-clone"> <br>
                        <input type="hidden" name="harga_kurir" value="" id="setkurir-harga"> <br>
                        <input type="hidden" name="id_kurir" value="" id="setkurir-clone"> <br>
                    </div>
                    <div class="flex-1 flex flex-col py-4 text-md md:text-base">
                        <div class="flex flex-row border-b border-gray-500 p-2">
                            <div class="lg:w-2/3 w-1/3 font-semibold text-gray-600">Items</div>
                            <div class="lg:w-1/3 w-2/3 grid grid-cols-2">
                                <span class="font-semibold text-gray-600">Rp.</span>
                                <span id="sub-total-clone" class="text-right font-semibold text-gray-600"></span>
                            </div>
                        </div>
                        <div class="flex flex-row border-b border-gray-500 p-2">
                            <div class="lg:w-2/3 w-1/3  font-semibold text-gray-600">Shipments</div>
                            <div class="lg:w-1/3 w-2/3 grid grid-cols-2">
                                <span class="font-semibold text-gray-600">Rp.</span>
                                <span id="setkurir-harga-clone" class="text-right font-semibold text-gray-600"></span>
                            </div>
                        </div>
                        <div class="flex flex-row p-2">
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
                                    <span class="">Finish Checkout</span>
                                </div>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <?php echo form_close(); ?>
    </section>
</div>