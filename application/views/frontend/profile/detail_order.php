<section class="w-full mx-auto mt-32 py-4 my-4">
    <div class="container flex flex-col lg:flex-row">
        <div class="flex-1 flex">
            <span class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl  mb-8 ">
                Order Detail
            </span>
        </div>

        <?php
        $getStatus = $getOrderDetail['status'];
        if ($getStatus == 'PROCESS') {
            $bgClass = 'bg-blue-100 hover:bg-blue-200';
            $StatusClass = 'bg-blue-300 border-blue-400';
        } else if ($getStatus == 'COMPLETE') {
            $bgClass = 'bg-green-100 hover:bg-green-200';
            $StatusClass = 'bg-green-300 border-green-400';
        } else if ($getStatus == 'PACKING') {
            $bgClass = 'bg-yellow-100 hover:bg-yellow-200';
            $StatusClass = 'bg-yellow-300 border-yellow-400';
        } else {
            $bgClass = 'bg-gray-100 hover:bg-gray-200';
            $StatusClass = 'bg-gray-300 border-gray-400';
        }
        ?>

        <div class="flex-1">
            <div class="flex flex-col">
                <span class="uppercase tracking-wide no-underline hover:no-underline font-semibold text-gray-600 text-sm text-left lg:text-right">
                    Order Number
                </span>
                <span class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl text-left lg:text-right">
                    <?= $getOrderDetail['no_pemesanan']; ?>
                </span>
                <span class="mt-4 uppercase tracking-wide no-underline hover:no-underline font-semibold text-gray-600 text-sm text-left lg:text-right">
                    Status
                </span>
                <span class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl text-left lg:text-right">
                    <div class="inline-block rounded-sm px-4 py-0 lg:text-sm text-xs border <?= $StatusClass; ?>"> <?= $getOrderDetail['status']; ?> </div>
                </span>
                <span class="mt-4 uppercase tracking-wide no-underline hover:no-underline font-semibold text-gray-600 text-sm text-left lg:text-right">
                    Order Date
                </span>
                <span class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl text-left lg:text-right">
                    <?= $getOrderDetail['tgl_pesan']; ?>
                </span>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="mt-4 w-full">
            <table class="w-full table-auto text-xs lg:text-base">
                <?php
                $classTr = 'p-2 border border-gray-500 ';
                ?>
                <thead>
                    <tr>
                        <th colspan="4" class="text-gray-600 bg-gray-200 border border-gray-500 p-2">Items</th>
                    </tr>
                    <tr class="bg-gray-300">
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
                    <tr class="bg-green-300">
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
                        <th colspan="4" class="text-gray-600 bg-gray-200 border border-gray-500 p-2">Shipments</th>
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

                        <label id="selectedkurir" class="selectedkurir flex w-full my-2 rounded-md p-2 bg-blue-300 shadow-sm">
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
</section>