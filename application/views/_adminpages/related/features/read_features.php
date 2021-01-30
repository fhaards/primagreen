<div class="grid grid-cols-1 md:grid-cols-4 gap-5">

    <?php $this->load->view('_adminpages/related/features/form_add_features'); ?>

    <div class="md:col-span-3 bg-white md:overflow-hidden overflow-x-scroll rounded-lg shadow-xs">
        <table id="primaTable2" class="stripe hover">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="text-center">Name</th>
                    <th class="md:block hidden text-center">Image</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700">
                <?php
                foreach ($featuresList as $featuresLists) {
                    $idFeatures = $featuresLists['id_features'];
                    $statusFeatures = $featuresLists['status_features'];
                    if ($statusFeatures == 'Enabled') {
                        $statusClass = 'flex flex-row items-center py-1 px-2 font-semibold text-xs text-green-700 bg-green-100 border border-green-300 rounded-full shadow-xs hover:shadow-md hover:bg-green-500 hover:text-white';
                    } else {
                        $statusClass = 'flex flex-row items-center py-1 px-2 font-semibold text-xs text-red-700 bg-red-100 border border-red-200 rounded-sm shadow-xs hover:shadow-md hover:bg-red-500 hover:text-white';
                    }

                    if (!empty($featuresLists['img_features'])) :
                        $getImageFeaturesUrl = 'uploads/features/' . $featuresLists['img_features'];
                    else :
                        $getImageFeaturesUrl = 'uploads/default_img.jpg';
                    endif;
                ?>
                    <tr class="text-gray-700">
                        <td class="w-full text-center">
                            <?= $featuresLists['nm_features']; ?>
                        </td>
                        <td class="md:block hidden">
                            <div class="h-6 w-6 rounded-sm mx-auto">
                                <img class="object-cover w-full h-full rounded-sm mx-auto" src="<?= base_url($getImageFeaturesUrl); ?>" alt="" loading="lazy" />
                            </div>
                        </td>
                        <td class="text-center items-center space-x-4 ">
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="<?php echo site_url('product/change-features-status/' . $idFeatures); ?>" class="<?= $statusClass; ?>" aria-label="Edit">
                                    <span class="px-1"> <?= $statusFeatures; ?></span>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center space-x-1">
                                <button @click="openModalEditFeatures" data-idfeatures="<?= $idFeatures; ?>" data-nmfeatures="<?= $featuresLists['nm_features']; ?>" data-urlimgfeatures="<?= $featuresLists['img_features']; ?>" class="open-features-edit <?= smallIconColor('edit'); ?>">
                                    <?= smallIcon('edit'); ?>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


</div>