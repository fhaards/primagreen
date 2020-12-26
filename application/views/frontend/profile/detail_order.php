<section class="w-full mx-auto mt-20 lg:mt-32 py-4 my-4">
    <div class="container flex flex-col lg:flex-row mb-8">

        <div class="flex-1 flex flex-col">
            <span class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl mb-4">
                Order Detail
            </span>
            <div class="flex flex-col lg:flex-row">
                <div class="flex flex-col flex-1">
                    <span class="uppercase tracking-wide no-underline hover:no-underline font-semibold text-gray-600 text-xs lg:text-sm">
                        Order Number
                    </span>
                    <span class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-sm lg:text-xl">
                        <?= $getOrderDetail['no_pemesanan']; ?>
                    </span>
                    <span class="mt-4 uppercase tracking-wide no-underline hover:no-underline font-semibold text-gray-600 text-xs lg:text-sm">
                        Order Date
                    </span>
                    <span class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-sm lg:text-xlt">
                        <?= $getOrderDetail['tgl_pesan']; ?>
                    </span>
                </div>
            </div>

        </div>

        <div class="flex-1 my-4 lg:my-0">
            <div class="flex flex-col mx-auto">
                <div class="flex flex-col lg:items-center lg:text-center">
                    <span class="uppercase tracking-wide no-underline hover:no-underline font-semibold text-gray-600 text-xs lg:text-sm">
                        Status
                    </span>
                    <span class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-sm lg:text-xl">
                        <span class="<?= status_order_color($getOrderDetail['status']); ?>"><?= $getOrderDetail['status']; ?></span>
                    </span>
                </div>
            </div>
        </div>

        <div class="flex-1">
            <div class="flex flex-row py-4 lg:py-0 space-x-4 border-t border-gray-300 lg:border-none lg:float-right ">
                <a href="<?php echo base_url().'report/report-order';?>" target="_blank" class="flex space-x-2 shadow-lg items-center px-4 text-sm py-2 font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                    <svg class="w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    <span class=""> Print </span>
                </a>
                <?php if ($getOrderDetail['status'] == 'ONHOLD') : ?>
                    <button @click="openModal" data-nopemesanan="<?= $getOrderDetail['no_pemesanan']; ?>" class="upload-transfer flex space-x-2 shadow-lg items-center px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                        <svg class="w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                        <span class=""> Confirmation Transfer </span>
                    </button>
                <?php else : ?>
                    <a href="<?php echo base_url() . 'uploads/transfer_proof/' .  $getPaymentDetail['no_pemesanan'] . '/' . $getPaymentDetail['gambar']; ?>" target="_blank" class="flex space-x-2 shadow-lg items-center px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-green-600 rounded-md active:bg-green-700 hover:shadow-none hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                        <svg class="w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class=""> My Confirmation </span>
                    </a>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <div class="container mt-4">
        <div class="mt-4 w-full">
            <table class="w-full table-auto text-xs lg:text-base">
                <?php
                $classTr = 'p-2 border border-gray-300 ';
                ?>
                <thead>
                    <tr>
                        <th colspan="4" class="text-gray-600 bg-gray-100 border border-gray-300 p-2">Items</th>
                    </tr>
                    <tr class="bg-gray-100">
                        <th class="<?= $classTr; ?>">Name</th>
                        <th class="<?= $classTr; ?>">Qty</th>
                        <th class="<?= $classTr; ?>">Price</th>
                        <th class="<?= $classTr; ?>">Subtotal Items</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $subTotalAllItems = 0; ?>
                    <?php $setTax = 4 / 100; ?>
                    <?php foreach ($getOrderList as $getOrderLists) : ?>
                        <?php
                        $hargaBarang = $getOrderLists['harga'];
                        $qtyBarang = $getOrderLists['qty_pesan'];
                        $subTotalBarang = $hargaBarang * $qtyBarang;
                        $subTotalAllItems += $subTotalBarang;
                        ?>
                        <tr class="text-center">
                            <td class="<?= $classTr; ?>"><?= $getOrderLists['nm_barang']; ?></td>
                            <td class="<?= $classTr; ?>"><?= $qtyBarang; ?></td>
                            <td class="<?= $classTr; ?>">Rp. <?= number_format($hargaBarang); ?></td>
                            <td class="<?= $classTr; ?>">Rp. <?= number_format($subTotalBarang); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php $setTaxSubTotal = $subTotalAllItems * 4 / 100; ?>
                    <tr class="">
                        <td colspan="3" class="text-center text-gray-800 font-bold <?= $classTr; ?>">Subtotal All Items</td>
                        <td class="text-center text-gray-800 font-bold  <?= $classTr; ?>">Rp. <?= number_format($subTotalAllItems); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-4 w-full text-xs lg:text-base">
            <table class="w-full table-auto text-xs lg:text-base">
                <thead>
                    <tr>
                        <th colspan="4" class="text-gray-600 bg-gray-100 border border-gray-300 p-2">Shipments</th>
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
                                <span class=""><?= $getOrderDetail['nama_t']; ?></span>
                            </div>
                        </div>
                        <div class="flex flex-col mt-2 w-full">
                            <div class="flex mt-2 text-gray-800">Address</div>
                            <div class="text-gray-600 w-full">
                                <span class=""><?= $getOrderDetail['alamat_t']; ?></span>
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
                        <div class="flex mt-2 text-gray-800 py-2 ">Selected Courier</div>

                        <label id="" class=" flex w-full my-2 text-white rounded-md p-2 bg-green-500 shadow-sm">
                            <div class="w-3/5 flex flex-col px-4">
                                <span class="font-bold text-left"><?= $getOrderDetail['nm_kurir']; ?></span>
                                <span class="text-left font-semibold ">
                                    Estimated Time <?= $getOrderDetail['estimasi']; ?> Days
                                </span>
                            </div>
                            <div class="w-2/5 font-semibold flex flex-col">
                                <span class="font-bold text-left">Price :</span>
                                <span class="text-left font-semibold">
                                    Rp. <?= number_format($getOrderDetail['harga_kurir']); ?>
                                </span>
                            </div>
                        </label>

                    </div>

                </div>
            </div>

            <div class="flex w-full lg:flex-row flex-col lg:space-x-5 ">
                <div class="flex-1"></div>
                <div class="flex-1 flex flex-col">
                    <div class="flex flex-row py-1 my-1 border-b border-gray-500 p-2">
                        <div class="lg:w-2/3 w-1/3 font-semibold text-gray-600">Items</div>
                        <div class="lg:w-1/3 w-2/3 grid grid-cols-2">
                            <span class="font-semibold text-gray-600">Rp.</span>
                            <span class="font-semibold text-gray-800 text-right"><?= number_format($subTotalAllItems); ?></span>
                        </div>
                    </div>
                    <div class="flex flex-row py-1 my-1 border-b border-gray-500 p-2">
                        <div class="lg:w-2/3 w-1/3  font-semibold text-gray-600">Shipments</div>
                        <div class="lg:w-1/3 w-2/3 grid grid-cols-2">
                            <span class="font-semibold text-gray-600">Rp.</span>
                            <span class="font-semibold text-gray-800 text-right"><?= number_format($getOrderDetail['harga_kurir']); ?></span>
                        </div>
                    </div>
                    <div class="flex flex-row py-1 my-1 p-2">
                        <div class="lg:w-2/3 w-1/3  font-semibold text-gray-600">Tax</div>
                        <div class="lg:w-1/3 w-2/3  grid grid-cols-2">
                            <span class="font-semibold text-gray-600">Rp.</span>
                            <span class="font-semibold text-gray-800 text-right"><?= number_format($setTaxSubTotal); ?></span>
                        </div>
                    </div>
                    <div class="flex flex-row py-1 my-1 float-right border-t border-green-500 p-2">
                        <div class="lg:w-2/3 w-1/3 font-bold text-gray-900">Total</div>
                        <div class="lg:w-1/3 w-2/3 grid grid-cols-2 font-bold text-gray-900">
                            <span class="w-1/3">Rp.</span>
                            <span class="font-semibold text-gray-800 text-right"><?= number_format($getOrderDetail['total_harga']); ?></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php if ($getOrderDetail['status'] == 'ONHOLD') : ?>
        <?php $getNoPemesanan = $getOrderDetail['no_pemesanan']; ?>
        <div class="container mt-8">
            <hr>
            <?php $this->load->view('frontend/cart/success_checkout_info'); ?>
        </div>
    <?php endif; ?>

</section>