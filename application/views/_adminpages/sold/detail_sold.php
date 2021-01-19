<div clas="grid grid-cols-1">
    <div class="grid gid-cols-3">
        <div class="grid gap-4 grid-flow-col auto-rows-max overflow-x-scroll">
            <div class="grid bg-white w-48 rounded-lg border border-gray-200 md:w-full p-4">
                <div class="flex flex-col">
                    <div class="flex flex-col mb-4">
                        <span class="border-b border-gray-200 py-1 my-1 uppercase tracking-wide no-underline hover:no-underline font-semibold text-gray-600 text-xs lg:text-sm">
                            Order Number
                        </span>
                        <span class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-sm lg:text-xl">
                            <?= $getOrderDetail['no_pemesanan']; ?>
                        </span>
                    </div>
                    <div class="flex flex-col flex-1">
                        <span class="border-b border-gray-200 py-1 my-1 uppercase tracking-wide no-underline hover:no-underline font-semibold text-gray-600 text-xs lg:text-sm">
                            Order Date
                        </span>
                        <span class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-sm lg:text-xl">
                            <?= strftime("%d %B %Y / %H:%M", strtotime($getOrderDetail['tgl_pesan'])); ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="grid bg-white w-48 rounded-lg border border-gray-200 md:w-full p-4">
                <div class="flex flex-col">
                    <div class="flex flex-col mb-4">
                        <span class="border-b border-gray-200 py-1 my-1 uppercase tracking-wide no-underline hover:no-underline font-semibold text-gray-600 text-xs lg:text-sm">
                            Order By
                        </span>
                        <span class="uppercase tracking-wide no-underline hover:no-underline font-bold text-sm lg:text-xl">
                            <a class="text-blue-500 underline hover:text-blue-600 " href="<?= base_url() . 'user/user-detail/' . $getOrderDetail['id_user']; ?>"><?= $getOrderDetail['nama']; ?></a>
                        </span>
                    </div>
                    <div class="flex flex-col mb-4">
                        <span class="border-b border-gray-200 py-1 my-1 uppercase tracking-wide no-underline hover:no-underline font-semibold text-gray-600 text-xs lg:text-sm">
                            Payment Confirmation Date
                        </span>
                        <span class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-sm lg:text-xl">
                            <?= strftime("%d %B %Y / %H:%M", strtotime($getOrderDetail['tgl_pnjl'])); ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="grid bg-white rounded-lg border border-gray-200 md:w-full p-4">
                <div class="flex flex-col py-4 lg:py-0 lg:border-none ">
                    <span class="border-b border-gray-200 py-1 my-1 mb-4 uppercase tracking-wide no-underline hover:no-underline font-semibold text-gray-600 text-xs lg:text-sm">
                        Resi Number
                    </span>
                    <span class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-sm lg:text-xl">
                        <?= $getOrderDetail['no_resi']; ?>
                    </span>
                    <span class="border-b border-gray-200 py-1 my-1 mb-4 uppercase tracking-wide no-underline hover:no-underline font-semibold text-gray-600 text-xs lg:text-sm">
                        Bank Transfer
                    </span>
                    <a href="<?php echo base_url() . 'uploads/transfer_proof/' .  $getPaymentDetail['no_pemesanan'] . '/' . $getPaymentDetail['gambar']; ?>" target="_blank" class="flex space-x-2 shadow-lg items-center px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-green-600 rounded-md active:bg-green-700 hover:shadow-none hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                        <svg class="w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class=""> Transfer Confirmation </span>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="container flex-col lg:flex-row w-full bg-white overflow-hidden rounded-lg shadow-xs px-4 my-4">

        <div class="w-full">
            <?= detail_order_title('Items'); ?>
            <table class="w-full table-auto text-xs lg:text-base">
                <?php
                $classTr = 'p-2 border border-gray-300 ';
                ?>
                <thead>
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

            <?= detail_order_title('Shipments'); ?>

            <!-- SEND TO -->
            <div class="grid gid-cols-2">
                <div class="grid gap-4 grid-flow-col auto-rows-max overflow-x-scroll">
                    <div class="grid w-48 md:w-full border border-gray-200 rounded-lg p-5 my-5">
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
                    <div class="grid w-48 md:w-full border border-gray-200 rounded-lg p-5 my-5">
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
            </div>

            <?= detail_order_title('Payment'); ?>

            <div class="flex w-full lg:flex-row flex-col lg:space-x-5 mt-5">
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
</div>