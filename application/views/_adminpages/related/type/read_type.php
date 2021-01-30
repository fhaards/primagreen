<div class="grid grid-cols-1 md:grid-cols-4 gap-5">
    <?php $this->load->view('_adminpages/related/type/form_add_type'); ?>

    <div class="md:col-span-3 bg-white md:overflow-hidden overflow-x-scroll rounded-lg shadow-xs">
        <table id="primaTable" class="w-full whitespace-no-wrap stripe hover" width="100%">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3"></th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700">
                <?php
                foreach ($typeList as $typeLists) {
                    $idType = $typeLists['id_type'];
                    $statusType = $typeLists['status_type'];
                    if ($statusType == 'Enabled') {
                        $statusClass = 'flex flex-row items-center text-center py-1 px-2 font-semibold text-xs text-green-700 bg-green-100 border border-green-300 rounded-sm shadow-xs hover:shadow-md hover:bg-green-500 hover:text-white';
                    } else {
                        $statusClass = 'flex flex-row items-center text-center py-1 px-2 font-semibold text-xs text-red-700 bg-red-100 border border-red-200 rounded-sm shadow-xs hover:shadow-md hover:bg-red-500 hover:text-white';
                    }
                ?>
                    <tr class="text-gray-700">
                        <td class="px-4 py-3"></td>
                        <td class="px-4 py-3 ">
                            <span class="hidden"><?= $typeLists['nm_type']; ?></span>
                            <?php echo form_open('product/edit-type/' . $idType); ?>
                            <div class="flex items-center space-x-4 text-sm">
                                <label class="block text-sm">
                                    <input type="text" name="nameType" value="<?= $typeLists['nm_type']; ?>" class="block text-sm focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                                </label>
                                <button type="submit" class="flex items-center justify-between px-1 py-1 text-sm font-medium leading-5 rounded-md shadow-xs text-white transition-colors duration-150 bg-gray-800 active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                                    <svg class="w-4 h-4 fill-current text-white" aria-hidden="true" fill="" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </button>
                            </div>
                            <?php echo form_close(); ?>
                        </td>
                        <td class="px-4 py-3 flex flex-nowrap space-x-4">
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="<?php echo site_url('product/change-type-status/' . $idType); ?>" class="<?= $statusClass; ?>" aria-label="Edit">
                                    <span class="px-1"> <?= $statusType; ?></span>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>