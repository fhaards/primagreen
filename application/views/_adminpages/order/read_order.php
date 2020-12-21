<div class="my-6 flex">
    <div class="flex-1">
        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Order
        </h2>
        <p class="">List of table order</p>
    </div>
</div>
<div class="py-3"></div>

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
                    if ($statusType == 'ONHOLD') {
                        $statusClass = 'text-center py-1 px-2 font-semibold text-xs text-gray-700 bg-gray-200 border border-gray-300 rounded-sm shadow-md';
                    } else if ($statusType == 'ONHOLD') {
                        $statusClass = 'text-center py-1 px-2 font-semibold text-xs text-red-700 bg-red-100 rounded-md';
                    } else {
                    }
                    ?>
                    <tr class="lg:h-12 text-gray-700">
                        <td><?= $orderLists['no_pemesanan']; ?></td>
                        <td><?= $orderLists['nama']; ?></td>
                        <td><?= $orderLists['tgl_pesan']; ?></td>
                        <td>Rp. <?= number_format($orderLists['total_harga']); ?></td>
                        <td class="flex flex-row space-x-2">
                            <span class="<?= $statusClass; ?>">
                                <?= $statusType; ?>
                            </span>
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="<?php echo site_url('product/change-type-status/' . $noPemesanan); ?>" class="flex items-center justify-between px-2 py-1 text-xs text-white font-medium leading-5 bg-green-500 rounded-md hover:bg-green-700" aria-label="Edit">
                                    <svg class="w-4 h-4 fill-current text-white" aria-hidden="true" fill="" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>