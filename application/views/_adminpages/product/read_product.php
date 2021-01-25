<div class="flex md:flex-row flex-wrap md:space-x-5">
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
        <button type="submit" class="flex space-x-2 items-center shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
            <svg class="w-4 h-4" fill="" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
            </svg>
            <span class="">Filter</span>
        </button>
        <?php echo form_close(); ?>
    </div>

    <div class="flex md:flex-row-reverse md:w-auto w-full py-5 px-4 mb-5 bg-white rounded-lg relative shadow-xs">
        <div class="flex flex-col space-y-2 w-full md:space-y-0 md:space-x-5 md:w-auto md:flex-row">
            <a href="<?= base_url(); ?>product/product-add" class="flex space-x-2 items-center shadow-lg px-4 py-1 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                <svg class="w-4 h-4" fill="" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span class="">New Products</span>
            </a>
        </div>
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
            <tbody id="filter_data" class="filter_data bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
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
                                    <svg class="w-4 h-4 fill-current text-white" aria-hidden="true" fill="" viewBox="0 0 20 20">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
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
                                <button class="<?= smallIconColor('delete'); ?>">
                                    <?= smallIcon('delete'); ?>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<div class="mt-6"></div>