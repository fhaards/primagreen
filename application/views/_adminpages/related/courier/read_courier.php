<?php echo validation_errors(); ?>
<?php echo form_open('product/add-courier'); ?>
<div class="flex md:flex-row-reverse w-full py-5 px-4 mb-5 bg-white rounded-lg relative shadow-xs">
    <div class="flex flex-col space-y-2 w-full md:space-y-0 md:space-x-5 md:w-auto md:flex-row">
        <label class="block text-sm">
            <input name="nm_kurir" required type="text" class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Courier Name" />
        </label>
        <label class="block text-sm">
            <select name="status_courier" class="block w-full text-sm dark:text-gray-300 dark:border-gray-600 bg-gray-100 focus:bg-white dark:bg-gray-700 form-select focus:border-green-400 focus:outline-none focus:shadow-outline-green">
                <option value="Enabled">Enabled</option>
                <option value="Disabled">Disabled</option>
            </select>
        </label>
        <label class="block text-sm">
            <input name="harga_kurir" required type="number" class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Price" />
        </label>
        <label class="block text-sm">
            <input name="estimasi" required type="number" class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Estimated Days" />
        </label>
        <label>
            <button type="submit" class="flex space-x-2 items-center shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                <svg class="w-4 h-4" fill="" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span class="">New Courier</span>
            </button>
        </label>
    </div>
</div>
<?php echo form_close(); ?>

<div class="w-full bg-white overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table id="primaTable" class="w-full whitespace-no-wrap stripe hover" width="100%">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50">
                    <th class="px-4 py-3"></th>
                    <th class="px-4 py-3">Name / Price / Estimated Days</th>
                    <th class="px-4 py-3">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700">
                <?php
                foreach ($courierList as $courierLists) {
                    $idCourier = $courierLists['id_kurir'];
                    $statusCourier = $courierLists['status_courier'];
                    if ($statusCourier == 'Enabled') {
                        $statusClass = 'flex flex-row items-center text-center py-1 px-2 font-semibold text-xs text-green-700 bg-green-100 border border-green-300 rounded-sm shadow-xs hover:shadow-md hover:bg-green-500 hover:text-white';
                    } else {
                        $statusClass = 'flex flex-row items-center text-center py-1 px-2 font-semibold text-xs text-red-700 bg-red-100 border border-red-200 rounded-sm shadow-xs hover:shadow-md hover:bg-red-500 hover:text-white';
                    }
                ?>
                    <tr class="text-gray-700">
                        <td class="px-4 py-3"></td>
                        <td class="px-4 py-3 ">
                            <span class="hidden"><?= $courierLists['nm_kurir']; ?></span>
                            <?php echo form_open('product/edit-courier/' . $idCourier); ?>
                            <div class="flex items-center space-x-4 text-sm">
                                <label class="block text-sm">
                                    <input courier="text" name="nameCourier" value="<?= $courierLists['nm_kurir']; ?>" class="block text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                                </label>
                                <label class="block text-sm">
                                    <input courier="text" name="harga_kurir" value="<?= $courierLists['harga_kurir']; ?>" class="block text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                                </label>
                                <label class="block text-sm">
                                    <input courier="text" name="estimasi" value="<?= $courierLists['estimasi']; ?>" class="block text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                                </label>
                                <button courier="submit" class="flex items-center justify-between px-1  py-1 text-sm font-medium leading-5 rounded-md shadow-xs text-white transition-colors duration-150 bg-gray-800 active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                                    <svg class="w-4 h-4 fill-current text-white" aria-hidden="true" fill="" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </button>
                            </div>
                            <?php echo form_close(); ?>
                        </td>
                        <td class="px-4 py-3 flex flex-nowrap space-x-4">
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="<?php echo site_url('product/change-courier-status/' . $idCourier); ?>" class="<?= $statusClass; ?>" aria-label="Edit">
                                    <span class="px-1"> <?= $statusCourier; ?></span>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>