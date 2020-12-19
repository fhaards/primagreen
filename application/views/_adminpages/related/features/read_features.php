<div class="mt-6 flex flex-nowrap w-full">
    <div class="lg:flex-1">
        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Features
        </h2>
        <p class="">List of table features</p>
    </div>
    <div class="lg:flex-1">
        <div class="grid gap-4 lg:grid-cols-1 bg-white p-5 rounded-lg shadow-xs">
            <h2>
                Add more features
            </h2>
            <?php echo form_open('product/add-features'); ?>
            <div class="grid gap-4 lg:grid-cols-3">
                <label class="block text-sm">
                    <input name="nm_features" features="text" class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Features Name" />
                </label>
                <label class="block text-sm">
                    <select name="status_features" class="block w-full text-sm dark:text-gray-300 dark:border-gray-600 bg-gray-100 focus:bg-white dark:bg-gray-700 form-select focus:border-green-400 focus:outline-none focus:shadow-outline-green">
                        <option value="Enabled">Enabled</option>
                        <option value="Disabled">Disabled</option>
                    </select>
                </label>
                <label>
                    <button features="submit" class="block items-center justify-between w-full px-4 py-2 text-sm font-medium  text-white transition-colors duration-150 bg-green-500 border border-transparent rounded-lg active:bg-green-800 hover:bg-green-700 focus:border-green-800 focus:shadow-outline-green">
                        New Features
                        <span class="ml-2" aria-hidden="true">+</span>
                    </button>
                </label>
            </div>
            <?php echo form_close(); ?>
        </div>

    </div>
</div>
<div class="py-3"></div>
<div class="w-full bg-white overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table id="primaTable2" class="w-full whitespace-no-wrap stripe hover" width="100%">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3"></th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700">
                <?php
                foreach ($featuresList as $featuresLists) {
                    $idFeatures = $featuresLists['id_features'];
                    $statusFeatures = $featuresLists['status_features'];
                    if ($statusFeatures == 'Enabled') {
                        $statusClass = 'text-center py-1 px-2 font-semibold text-xs text-green-700 bg-green-100 rounded-md ';
                    } else {
                        $statusClass = 'text-center py-1 px-2 font-semibold text-xs text-red-700 bg-red-100 rounded-md';
                    }
                ?>
                    <tr class="text-gray-700">
                        <td class="px-4 py-3"></td>
                        <td class="px-4 py-3">
                            <span class="hidden"><?= $featuresLists['nm_features']; ?></span>
                            <?php echo form_open('product/edit-features/' . $idFeatures); ?>
                            <div class="flex items-center space-x-4 text-sm">
                                <label class="block text-sm">
                                    <input type="text" name="nameFeatures" value="<?= $featuresLists['nm_features']; ?>" class="text-sm focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" />
                                </label>
                                <button type="submit" class="flex items-center justify-between px-1 py-1 text-sm font-medium leading-5 bg-green-500 rounded-md hover:bg-green-700">
                                    <svg class="w-4 h-4 fill-current text-white" aria-hidden="true" fill="" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </button>
                            </div>
                            <?php echo form_close(); ?>
                        </td>
                        <td class="px-4 py-3 flex items-center  space-x-4">
                            <span class="<?= $statusClass; ?>">
                                <?= $statusFeatures; ?>
                            </span>
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="<?php echo site_url('product/change-features-status/' . $idFeatures); ?>" class="flex items-center justify-between px-2 py-1 text-xs text-white font-medium leading-5 bg-green-500 rounded-md hover:bg-green-700" aria-label="Edit">
                                    <svg class="w-4 h-4 fill-current text-white" aria-hidden="true" fill="" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                    <span class="px-1">Change Status</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>