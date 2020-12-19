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
                        <td class="py-2">Name</td>
                        <td class="py-2">Qty</td>
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

            <div class="flex w-full lg:flex-row flex-col">
                <div class="flex-1">
                    <div class="border-b border-gray-400 py-4">
                        <span class="text-gray-800 font-bold">Shipments To</span>
                    </div>
                    <div class="flex mt-2 text-gray-800 py-2">Sending By</div>
                    <div class="flex w-3/3 lg:w-2/3 mt-2">
                        <div class="text-gray-600 w-full">
                            <input type="text" name="detail_info" value="<?= getUserData()['nama']; ?>" type="number" class="block mt-1 form-input w-full p-4 border border-gray-500 text-sm focus:bg-whiteform-textarea focus:border-green-400 focus:outline-none focus:shadow-outline-green" />
                        </div>
                    </div>
                    <div class="flex mt-2 text-gray-800 py-2">Address</div>
                    <div class="flex w-3/3 lg:w-2/3 mt-2">
                        <div class="text-gray-600 w-full">
                            <textarea name="detail_info" type="number" class="block mt-1 w-full p-4 form-input border border-gray-500 text-sm focus:bg-whiteform-textarea focus:border-green-400 focus:outline-none focus:shadow-outline-green"><?= getUserData()['alamat']; ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="flex-1 text-right">
                    <div class="border-b border-gray-400 py-4">
                        <span class="text-gray-800 font-bold">Courier</span>
                    </div>

                    <div class="flex flex-col lg:w-2/3 w-3/3 float-right">
                        <div class="flex mt-2 text-gray-800 py-2 ">Select Courier</div>
                        <?php foreach ($getCourier as $getCouriers) : ?>
                            <div class="flex w-full mt-2 border border-gray-500 rounded-md p-2">
                                <div class="px-2">
                                    <input type="radio" name="kurir">
                                </div>
                                <div class="flex-1 flex flex-col">
                                    <span class="font-bold text-left"><?= $getCouriers['nm_kurir']; ?></span>
                                    <span class="text-left">
                                        Estimated Time <?= $getCouriers['estimasi']; ?> Days
                                    </span>
                                </div>
                                <div class="flex-1">
                                    Price : Rp. <?= number_format($getCouriers['harga_kurir']); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>

            <table class="w-full my-6">
                <thead>
                    <tr>
                        <th colspan="3" class="text-gray-600 bg-gray-200 p-2">Payments</th>
                    </tr>
                </thead>
            </table>
            
            <!-- KALKULASI -->
            <input hidden type="number" value="" name="subtotal" id="sub-total"> <br>
            <input hidden type="number" value="" name="totalorder" id="totalorder-clone"> <br>


            <div class="flex w-full lg:flex-row flex-col">
                <div class="flex-1"></div>
                <div class="flex-1"></div>
                <div class="flex-1 flex flex-col">
                    <div class="flex flex-row py-1 my-1 border-b border-gray-500 p-2">
                        <div class="flex-1">Items</div>
                        <div class="flex-1 text-right">Rp.<span id="sub-total-clone"></span></div>
                    </div>
                    <div class="flex flex-row py-1 my-1 border-b border-gray-500 p-2">
                        <div class="flex-1">Shipments</div>
                        <div class="flex-1 text-right">Rp. 90909</div>
                    </div>
                    <div class="flex flex-row py-1 my-1 p-2">
                        <div class="flex-1">Tax</div>
                        <div class="flex-1 text-right">Rp. <span id="taxes"></span></div>
                    </div>
                    <div class="flex flex-row py-1 my-1 float-right border  border-green-500 p-2">
                        <div class="flex-1 font-bold text-gray-900">Total</div>
                        <div class="flex-1 text-right">Rp. <span id="totalorder"></span></div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</section>