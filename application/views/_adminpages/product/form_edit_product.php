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
    <div class="w-full text-center mx-auto">
        <button type="submit" class="mt-6 block items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-500 border border-transparent rounded-lg active:bg-green-800 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
            Submit
        </button>
    </div>
</div>
<?php echo form_close(); ?>