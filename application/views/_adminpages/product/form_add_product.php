<?php echo validation_errors(); ?>
<?php echo form_open_multipart('product/product-add'); ?>
<div class="p-8 mb-8 bg-white rounded-lg shadow-xs">
    <div class="grid gap-8 lg:grid-cols-2">
        <div>
            <label class="block text-sm py-2">
                <span class="text-gray-700 dark:text-gray-400">Common Name</span>
                <input name="nm_product" type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Monstera" />
            </label>

            <label class="block text-sm py-2">
                <span class="text-gray-700 dark:text-gray-400">Botanical Name</span>
                <input name="nm_barang_bot" type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Philodendron Monstera Deliciosa" />
            </label>

            <div class="grid gap-2 lg:grid-cols-3">
                <label class="block text-sm py-2">
                    <span class="text-gray-700 dark:text-gray-400">Type</span>
                    <select name="type" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 bg-gray-100 focus:bg-white dark:bg-gray-700 form-select focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:focus:shadow-outline-gray">
                        <?php foreach ($typeList as $typeLists) { ?>
                            <option value="<?= $typeLists['id_type']; ?>"><?= $typeLists['nm_type']; ?></option>
                        <?php } ?>
                    </select>
                </label>

                <label class="block text-sm py-2">
                    <span class="text-gray-700 dark:text-gray-400">Light</span>
                    <select name="light" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 bg-gray-100 focus:bg-white dark:bg-gray-700 form-select focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:focus:shadow-outline-gray">
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="Bright">Bright</option>
                    </select>
                </label>
                <label class="block text-sm py-2">
                    <span class="text-gray-700 dark:text-gray-400">Stok</span>
                    <input name="stock" type="number" placeholder="20" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>

            </div>
        </div>

        <div>
            <div class="grid gap-2 grid-cols-3">
                <label class="block text-sm py-2">
                    <span class="text-gray-700 dark:text-gray-400">Size</span>
                    <select name="size" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 bg-gray-100 focus:bg-white dark:bg-gray-700 form-select focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:focus:shadow-outline-gray">
                        <option value="Extra Small">Extra Small</option>
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Large">Large</option>
                        <option value="Extra Large">Extra Large</option>
                    </select>
                </label>
                <label class="block text-sm py-2">
                    <span class="text-gray-700 dark:text-gray-400">Size Description</span>
                    <input name="size_desc" type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder='26"-32" tall, 20"-26" wide' />
                </label>
                <label class="block text-sm py-2">
                    <span class="text-gray-700 dark:text-gray-400">Price</span>
                    <input name="price" type="number" placeholder="25000" class="block w-full mt-1 text-sm dark:border-gray-600 bg-gray-100 focus:bg-white dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
            </div>

            <div class="grid gap-2 grid-cols-1">
                <label class="block text-sm py-2 w-full">
                    <span class="text-gray-700">Features</span>
                    <div class="grid grid-cols-2 ">
                        <?php foreach ($featuresList as $row) { ?>
                            <div class="flex text-xs">
                                <div class="flex w-full flex-row space-x-2 items-center">
                                    <input name="features[]" type="checkbox" value="<?= $row['id_features']; ?>">
                                    <span> <?= $row['nm_features']; ?> </span>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </label>
            </div>
        </div>
    </div>
    <label class="block mt-5 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Detail Info/ Description</span>
        <textarea name="detail_info" type="number" class="tiny-mce block w-full mt-1 text-sm dark:text-gray-300 bg-gray-100 focus:bg-white  dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:focus:shadow-outline-gray" rows="3" placeholder="Enter some long form content."></textarea>
    </label>
    <div class="grid gap-4 lg:grid-cols-3 mt-5">
        <input type="hidden" name="default_img" value="default_img.jpg">

        <label class="block text-sm p-5 border-2 border-gray-300 border-dashed rounded-md bg-white hover:bg-gray-100">
            <div class="text-gray-700 uppercase font-bold mb-2">Image 1</div>
            <div class="flex flex-col w-fullspace-y-2">
                <div class="flex flex-row space-x-4 ">
                    <svg class="h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div>
                        <div class="flex text-sm text-gray-600">
                            <label for="product_img_1" class="relative cursor-pointer rounded-md font-medium text-indigo-600">
                                <span>Upload a file</span>
                                <input id="product_img_1" name="product_img_1" type="file" class="sr-only">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">
                            PNG, JPG, up to 10MB
                        </p>
                    </div>
                </div>
            </div>
        </label>

        <label class="block text-sm p-5 border-2 border-gray-300 border-dashed rounded-md bg-white hover:bg-gray-100">
            <div class="text-gray-700 uppercase font-bold mb-2">Image 2</div>
            <div class="flex flex-col w-fullspace-y-2">
                <div class="flex flex-row space-x-4 ">
                    <svg class="h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div>
                        <div class="flex text-sm text-gray-600">
                            <label for="product_img_2" class="relative cursor-pointer rounded-md font-medium text-indigo-600">
                                <span>Upload a file</span>
                                <input id="product_img_2" name="product_img_2" type="file" class="sr-only">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">
                            PNG, JPG, up to 10MB
                        </p>
                    </div>
                </div>
            </div>
        </label>

        <label class="block text-sm p-5 border-2 border-gray-300 border-dashed rounded-md bg-white hover:bg-gray-100">
            <div class="text-gray-700 uppercase font-bold mb-2">Image 3</div>
            <div class="flex flex-col w-fullspace-y-2">
                <div class="flex flex-row space-x-4 ">
                    <svg class="h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div>
                        <div class="flex text-sm text-gray-600">
                            <label for="product_img_3" class="relative cursor-pointer rounded-md font-medium text-indigo-600">
                                <span>Upload a file</span>
                                <input id="product_img_3" name="product_img_3" type="file" class="sr-only">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">
                            PNG, JPG, up to 10MB
                        </p>
                    </div>
                </div>
            </div>
        </label>
    </div>
    
    <hr class="mt-6">
    </hr>

    <div class="w-full text-center mx-auto mt-4">
        <?= $submitButton; ?>
    </div>
</div>
<?php echo form_close(); ?>