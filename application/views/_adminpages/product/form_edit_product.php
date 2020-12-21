<div class="my-6">
    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Forms
    </h2>
    <p class="">Add New Product</p>
</div>
<div class="py-3"></div>
<?php echo validation_errors(); ?>
<?php echo form_open('product/product-edit/' . $edt_product['id_barang']); ?>
<div class="p-8 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <div class="grid gap-8 lg:grid-cols-2">
        <div>
            <label class="block text-sm py-2">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input name="nm_barang" type="text" value="<?php echo $edt_product['nm_barang']; ?>" class="block w-full mt-1 text-sm bg-gray-100 focus:bg-white  dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
            </label>

            <label class="block text-sm py-2">
                <span class="text-gray-700 dark:text-gray-400">Botanical Name</span>
                <input name="nm_barang_bot" type="text" value="<?php echo $edt_product['nm_barang_bot']; ?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Philodendron Monstera Deliciosa" />
            </label>

            <div class="grid gap-2 lg:grid-cols-2">
                <label class="block text-sm py-2">
                    <span class="text-gray-700 dark:text-gray-400">Features</span>
                    <select name="features" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 bg-gray-100 focus:bg-white dark:bg-gray-700 form-select focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:focus:shadow-outline-gray">
                        <?php foreach ($featuresList as $featuresLists) { ?>
                            <?php if ($edt_product['id_features'] == $featuresLists['id_features']) { ?>
                                <option value="<?= $featuresLists['id_features']; ?>" Selected><?= $featuresLists['nm_features']; ?></option>
                            <?php } else { ?>
                                <option value="<?= $featuresLists['id_features']; ?>"><?= $featuresLists['nm_features']; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </label>

                <label class="block text-sm py-2">
                    <span class="text-gray-700 dark:text-gray-400">Type</span>
                    <select name="type" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 bg-gray-100 focus:bg-white dark:bg-gray-700 form-select focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:focus:shadow-outline-gray">
                        <?php foreach ($typeList as $typeLists) { ?>
                            <?php if ($edt_product['id_type'] == $typeLists['id_type']) { ?>
                                <option value="<?= $typeLists['id_type']; ?>" Selected><?= $typeLists['nm_type']; ?></option>
                            <?php } else { ?>
                                <option value="<?= $typeLists['id_type']; ?>"><?= $typeLists['nm_type']; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </label>
            </div>
        </div>

        <div>
            <div class="grid gap-2 grid-cols-2">
                <label class="block text-sm py-2">
                    <span class="text-gray-700 dark:text-gray-400">Size</span>
                    <select name="size" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 bg-gray-100 focus:bg-white dark:bg-gray-700 form-select focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:focus:shadow-outline-gray">
                        <?php
                        $size = array('Extra Small', 'Small', 'Medium', 'Large', 'Extra Large');
                        foreach ($size as $key => $sizeValue) :
                            echo '<option value="' . $sizeValue . '" ' . ($edt_product['size'] == $sizeValue ? 'selected="selected"' : '') . '>' . $sizeValue . '</option>';
                        endforeach;
                        ?>
                    </select>
                </label>
                <label class="block text-sm py-2">
                    <span class="text-gray-700 dark:text-gray-400">Size Description</span>
                    <input name="size_desc" type="text" value='<?php echo $edt_product['size_desc']; ?>' class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
            </div>

            <div class="grid gap-2 grid-cols-2">
                <label class="block text-sm py-2">
                    <span class="text-gray-700 dark:text-gray-400">Light</span>
                    <select name="light" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 bg-gray-100 focus:bg-white dark:bg-gray-700 form-select focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:focus:shadow-outline-gray">
                        <?php
                        $light = array('Low', 'Medium', 'Bright');
                        foreach ($light as $key => $lightValue) :
                            echo '<option value="' . $lightValue . '" ' . ($edt_product['light'] == $lightValue ? 'selected="selected"' : '') . '>' . $lightValue . '</option>';
                        endforeach;
                        ?>
                    </select>
                </label>
                <label class="block text-sm py-2">
                    <span class="text-gray-700 dark:text-gray-400">Stok</span>
                    <input name="stock" type="number" value="<?php echo $edt_product['stok']; ?>" class="block w-full mt-1 text-sm bg-gray-100 focus:bg-white  dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
            </div>

            <label class="block text-sm py-2">
                <span class="text-gray-700 dark:text-gray-400">Price</span>
                <input name="price" type="number" value="<?php echo $edt_product['harga']; ?>" class="block w-full mt-1 text-sm bg-gray-100 focus:bg-white dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
            </label>
        </div>
    </div>
    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Detail Info/ Description</span>
        <textarea name="detail_info" type="number" class="block w-full mt-1 text-sm bg-gray-100 focus:bg-white  dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:focus:shadow-outline-gray" rows="3"><?php echo $edt_product['detail']; ?></textarea>
    </label>

    <hr class="mt-6">
    </hr>
    <div class="w-full text-center mx-auto mt-4">
        <button type="submit" class="flex space-x-2 items-center shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
            <svg class="w-4 h-4" fill="" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
            </svg>
            <span class="hidden lg:block">Submit</span>
        </button>
    </div>
</div>
<?php echo form_close(); ?>