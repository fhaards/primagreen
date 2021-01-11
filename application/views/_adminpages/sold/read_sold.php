<div class="flex md:flex-row-reverse w-full py-5 px-4 mb-5 bg-white rounded-lg relative shadow-xs">
    <div class="flex flex-col space-y-2 w-full md:space-y-0 md:space-x-5 md:w-auto md:flex-row">
        <button @click="openModalReport" class="open-modal-report flex space-x-2 items-center shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
            <svg class="w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
            </svg>
            <span> Report Order</span>
        </button>
    </div>
</div>

<div class="w-full bg-white overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table id="primaTable" class="w-full whitespace-no-wrap stripe hover" width="100%">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Order Number</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Total</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y">
                <?php foreach ($orderList as $orderLists) : ?>
                    <?php $noPemesanan = $orderLists['no_pemesanan']; ?>
                    <tr class="lg:h-12 text-gray-700">
                        <td><a class="text-blue-500 hover:text-blue-600 underline" href="<?php echo base_url() . 'sold/sold-detail/' . $orderLists['no_pemesanan']; ?>"><?= $orderLists['no_pemesanan']; ?></a></td>
                        <td><?= $orderLists['nama']; ?></td>
                        <td><?= $orderLists['tgl_pnjl']; ?></td>
                        <td>Rp. <?= number_format($orderLists['total_harga']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>