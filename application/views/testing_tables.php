<?php echo form_open('dummy'); ?>
A <input type="text" class="this_type">
B <input type="text" class="getTypeInput" value="<?= $getType; ?>">
<div class="flex flex-row space-x-5">
    <select name="type" id="send_type" class="send_type form-select">
        <option value="">Select All Types</option>
        <?php foreach ($type_data as $row) : ?>
            <!-- <input type="checkbox" class="common_selector type" value="<?php echo $row['id_type']; ?>"> &nbsp; <?php echo $row['nm_type']; ?> -->
            <?php  echo '<option value="' . $row['id_type'] . '" ' . ($row['id_type'] == $getType ? 'selected="selected"' : '') . '>' . $row['nm_type'] . '</option>'; ?>
            <!-- <option value="<?= $row['id_type']; ?>"><?= $row['nm_type']; ?></option> -->
        <?php endforeach; ?>
        <option value="20">SeSDSDlect All Types</option>
    </select>
    <button type="submit" class="flex space-x-2 items-center shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
        <svg class="w-4 h-4" fill="" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
        </svg>
        <span class="">Filter</span>
    </button>
</div>
<?php echo form_close(); ?>

<div class="w-full bg-white overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <div class="checkwei"></div>
        <table id="primaTable" class="w-full whitespace-no-wrap stripe hover" width="100%">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Pictures</th>
                    <th class="px-4 py-3">Type</th>
                    <th class="px-4 py-3">Price</th>
                    <th class="px-4 py-3">Stock</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody id="filter_data" class="filter_data bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php foreach ($productList as $productLists) { ?>
                    <?php
                    $id = $productLists['id_barang'];
                    $numberStock = $productLists['stok'];
                    if ($numberStock >= 1) {
                        $stockClass = 'text-center font-semibold text-sm text-white bg-green-600 rounded-full';
                        $stockStatus = 'Ready';
                        $bgStockStatus = '';
                        $iconStatus = 'M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z';
                    } else {
                        $stockClass = 'text-center font-semibold text-sm text-white bg-red-600 rounded-full';
                        $stockStatus = 'Out Stock !';
                        $bgStockStatus = 'bg-red-500';
                        $iconStatus = 'M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z';
                    }

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
                        <td class="px-4 py-3">
                            <div>
                                <p class="font-semibold"><?= $productLists['nm_barang']; ?></p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    <?= $productLists['nm_barang_bot']; ?>
                                </p>
                            </div>
                        </td>
                        <td class="px-4 py-3">
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
                        <td class="px-4 py-3"><?= $productLists['nm_type']; ?></td>
                        <td class="px-4 py-3">Rp <?= number_format($productLists['harga']); ?></td>
                        <td class="px-4 py-3 <?= $bgStockStatus; ?>">
                            <div class="flex items-center space-x-3">
                                <span class="hidden"><?= $productLists['stok']; ?></span>
                                <span class="<?= $stockClass; ?>">
                                    <div class="flex space-x-2 items-center justify-between font-medium leading-5">
                                        <svg class="w-4 h-4 fill-current text-green500" aria-hidden="true" fill="" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="<?= $iconStatus; ?>" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </span>
                                <?php echo form_open('product/product-edit-stock/' . $id); ?>
                                <div class="flex items-center space-x-4 text-sm">
                                    <label class="block text-sm">
                                        <input type="number" name="stock" value="<?= $productLists['stok']; ?>" class="block w-20 text-sm font-bold py-1 dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                                    </label>
                                    <button type="submit" class="flex items-center justify-between px-1  py-1 text-sm font-medium leading-5 bg-blue-500 rounded-full hover:bg-blue-700">
                                        <svg class="w-4 h-4 fill-current text-white" aria-hidden="true" fill="" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </td>
                        <td class="px-4 py-3 w-10">
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="<?php echo site_url('product/product-edit/' . $id); ?>" class="flex items-center justify-between px-1 py-1 text-sm font-medium leading-5 rounded-md shadow-xs text-white transition-colors duration-150 bg-gray-800 active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                    <svg class="w-4 h-4 fill-current text-white" aria-hidden="true" fill="" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>