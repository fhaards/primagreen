<div class="flex md:flex-row flex-wrap md:space-x-5 items-center">
    <div class="flex-1 flex md:flex-row-reverse w-full py-5 px-4 mb-5 bg-white rounded-lg relative shadow-xs">
        <?php echo form_open('product/product-list', array('class' => 'flex flex-row w-full md:space-y-0 space-x-5 md:w-auto md:flex-row md:items-center')); ?>
        <select name="type" id="send_type" class="send_type form-select">
            <option value="">Select All Types</option>
            <?php foreach ($type_data as $row) : ?>
                <!-- <input type="checkbox" class="common_selector type" value="<?php echo $row['id_type']; ?>"> &nbsp; <?php echo $row['nm_type']; ?> -->
                <?php echo '<option value="' . $row['id_type'] . '" ' . ($row['id_type'] == $getType ? 'selected="selected"' : '') . '>' . $row['nm_type'] . '</option>'; ?>
                <!-- <option value="<?= $row['id_type']; ?>"><?= $row['nm_type']; ?></option> -->
            <?php endforeach; ?>
        </select>
        <?= $filterButton; ?>
        <?php echo form_close(); ?>
    </div>

    <div class="flex flex-col py-5 px-4 mb-5 bg-white rounded-lg relative shadow-xs">
        <?= $addButton; ?>
    </div>
</div>


<div class="w-full bg-white overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table id="primaTable" class="w-full whitespace-no-wrap stripe hover" width="100%">
            <thead>
                <tr class="text-xs font-semibold text-center tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="">Name</th>
                    <th class="">Pictures</th>
                    <th class="">Type</th>
                    <th class="">Price</th>
                    <th class="">Stock</th>
                    <th class="">Action</th>
                </tr>
            </thead>
            <tbody id="isProductTable" class=" bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php foreach ($productList as $productLists) { ?>
                    <?php
                    $id = $productLists['id_barang'];
                    // IF IMAGE EXIST
                    $checkImage1IfEmpty = $productLists['gambar'];
                    $checkImage2IfEmpty = $productLists['gambar2'];
                    $checkImage3IfEmpty = $productLists['gambar3'];

                    if ($checkImage1IfEmpty == 'default_img.jpg') {
                        $urlImage = 'default_img.jpg';
                    } else {
                        $urlImage = $productLists['sku'] . '/' . $productLists['gambar'];
                    }

                    if ($checkImage2IfEmpty == 'default_img.jpg') {
                        $urlImage2 = 'default_img.jpg';
                    } else {
                        $urlImage2 = $productLists['sku'] . '/' . $productLists['gambar2'];
                    }

                    if ($checkImage3IfEmpty == 'default_img.jpg') {
                        $urlImage3 = 'default_img.jpg';
                    } else {
                        $urlImage3 = $productLists['sku'] . '/' . $productLists['gambar3'];
                    }

                    ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="">
                            <div>
                                <p class="font-semibold"><?= $productLists['nm_barang']; ?></p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    <?= $productLists['nm_barang_bot']; ?>
                                </p>
                            </div>
                        </td>
                        <td class="">
                            <div class="flex items-center text-sm">
                                <div class="relative  w-8 h-8 mr-3 rounded-sm md:block">
                                    <img class="object-cover w-full h-full rounded-sm" src="<?php echo base_url() . 'uploads/product/' . $urlImage; ?>" alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-sm shadow-inner" aria-hidden="true"></div>
                                </div>
                                <div class="relative  w-8 h-8 mr-3 rounded-sm md:block">
                                    <img class="object-cover w-full h-full rounded-sm" src="<?php echo base_url() . 'uploads/product/' . $urlImage2; ?>" alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-sm shadow-inner" aria-hidden="true"></div>
                                </div>
                                <div class="relative  w-8 h-8 mr-3 rounded-sm md:block">
                                    <img class="object-cover w-full h-full rounded-sm" src="<?php echo base_url() . 'uploads/product/' . $urlImage3; ?>" alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-sm shadow-inner" aria-hidden="true"></div>
                                </div>
                                <a href="<?php echo site_url('product/product-edit-image/' . $id); ?>" class="flex items-center justify-between text-center px-1 py-1 text-sm font-medium leading-5 bg-blue-500 rounded-md hover:bg-blue-700">
                                    <svg class="w-4 h-4 fill-current text-white" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                        <td class=""><?= $productLists['nm_type']; ?></td>
                        <td class="">Rp <?= number_format($productLists['harga']); ?></td>
                        <td class="">
                            <?php echo form_open('product/product-edit-stock/' . $id, array('class' => 'flex items-center')); ?>
                            <?= stockInList($productLists['stok']); ?>
                            <?php echo form_close(); ?>
                        </td>
                        <td class="w-10">
                            <div class="flex items-center space-x-1">
                                <a href="<?php echo site_url('product/product-edit/' . $id); ?>" class="<?= smallIconColor('edit') ?>" aria-label="Edit">
                                    <?= smallIcon('edit'); ?>
                                </a>
                                <?php if (in_array($id, $productInOrder)) : ?>
                                    <button type="button" disabled class="<?= smallIconColor('deleteDisabled'); ?>" style="cursor: context-menu;" title="Product Cannot be Deleted">
                                        <?= smallIcon('delete'); ?>
                                    </button>
                                <?php else : ?>
                                    <button type="submit" data-isidproductdelete="<?= $id; ?>" class="delete-products <?= smallIconColor('delete'); ?>">
                                        <?= smallIcon('delete'); ?>
                                    </button>

                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<div class="mt-6"></div>