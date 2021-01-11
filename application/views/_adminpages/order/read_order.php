<!-- <div class="bg-white">
    <nav class="tabs flex flex-col sm:flex-row">
        <button data-target="panel-1" class="tab active text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none text-blue-500 border-b-2 font-medium border-blue-500">
            Description
        </button>
        <button data-target="panel-2" class="tab ext-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none">
            Map and Street View
        </button>
        <button data-target="panel-3" class="tab text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none">
            Other info
        </button>
    </nav>
</div>

<div id="panels">
    <div class="panel-1 tab-content active py-5">
        <span class="mr-5">
            <i class="fal fa-bed mr-1"></i> {{ entry.bedrooms }}
        </span>
        <span>
            <i class="fal fa-bath mr-1"></i> {{ entry.bathrooms }}
        </span>

        {{ entry.body }}
    </div>
    <div class="panel-2 tab-content py-5">
        Map here
    </div>
    <div class="panel-3 tab-content py-5">
        other info
    </div>
</div> -->

<div class="w-full bg-white overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table id="primaTable" class="w-full whitespace-no-wrap stripe hover" width="100%">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Order Number</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Total</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y">
                <?php foreach ($orderList as $orderLists) : ?>
                    <?php
                    $noPemesanan = $orderLists['no_pemesanan'];
                    $statusType = $orderLists['status'];
                    ?>
                    <tr class="lg:h-12 text-gray-700">
                        <td><a class="text-blue-500 hover:text-blue-600 underline" href="<?php echo base_url() . 'order/order-detail/' . $orderLists['no_pemesanan']; ?>"><?= $orderLists['no_pemesanan']; ?></a></td>
                        <td><?= $orderLists['nama']; ?></td>
                        <td><?= $orderLists['tgl_pesan']; ?></td>
                        <td>Rp. <?= number_format($orderLists['total_harga']); ?></td>
                        <td class="">
                            <span class="<?= status_order_color($statusType); ?>"><?= $statusType; ?></span>
                        </td>
                        <td>
                            <div class="flex flex-row items-center space-x-4 text-sm">
                                <?php if ($statusType == 'COMPLETE') : ?>
                                <?php else : ?>
                                    <button @click="openModal" data-nopemesanans="<?= $noPemesanan; ?>" class="openmodal-csorder flex items-center justify-between px-2 py-1 text-xs text-white font-medium leading-5 bg-green-500 rounded-md hover:bg-green-700">
                                        <svg class="w-4 h-4 fill-current text-white" aria-hidden="true" fill="" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                        <span class="mx-2">Change Status</span>
                                    </button>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>