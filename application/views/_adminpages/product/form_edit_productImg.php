<?php echo validation_errors(); ?>
<?php echo form_open_multipart('product/product-edit-image/' . $edtProductImg['id_barang']); ?>
<?php
$id = $edtProductImg['id_barang'];
$checkImage1IfEmpty = $edtProductImg['gambar'];
$checkImage2IfEmpty = $edtProductImg['gambar2'];
$checkImage3IfEmpty = $edtProductImg['gambar3'];
if ($checkImage1IfEmpty == 'default_img.jpg') {
    $urlImage = 'default_img.jpg';
    $hiddenDelete1 = 'hidden';
} else {
    $urlImage = $edtProductImg['sku'] . '/' . $edtProductImg['gambar'];
    $hiddenDelete1 = '';
}

if ($checkImage2IfEmpty == 'default_img.jpg') {
    $urlImage2 = 'default_img.jpg';
    $hiddenDelete2 = 'hidden';
} else {
    $urlImage2 = $edtProductImg['sku'] . '/' . $edtProductImg['gambar2'];
    $hiddenDelete2 = '';
}

if ($checkImage3IfEmpty == 'default_img.jpg') {
    $urlImage3 = 'default_img.jpg';
    $hiddenDelete3 = 'hidden';
} else {
    $urlImage3 = $edtProductImg['sku'] . '/' . $edtProductImg['gambar3'];
    $hiddenDelete3 = '';
}
?>
<div class="px-5 py-3 mb-8 bg-white rounded-lg shadow-xs">
    <input type="hidden" name="nm_product" value="<?php echo $edtProductImg['nm_barang']; ?>">
    <input type="hidden" name="sku" value="<?php echo $edtProductImg['sku']; ?>">
    <div class="grid grid-cols-2 gap-3">
        <div>
            <label class="block text-sm py-2">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <p class="font-semibold py-2">
                    <?php echo $edtProductImg['nm_barang']; ?>
                </p>
            </label>
        </div>
    </div>

    <div class="grid gap-4 lg:grid-cols-3">
        <label class="block mt-4 text-sm p-5 rounded-lg border-solid border-2 bordert-gray-200">
            <span class="text-gray-700 uppercase font-bold">Image 1</span>
            <hr class="my-3">
            <div class="flex flex-col flex-wrap mb-4 space-y-4 md:flex-row md:items-end md:space-x-4">
                <div class="relative w-20 h-20 mr-3 rounded-sm md:block">
                    <img class="object-cover w-full h-full rounded-sm" src="<?php echo base_url() . 'uploads/product/' . $urlImage; ?>" alt="" loading="lazy" />
                    <div class="absolute inset-0 rounded-sm shadow-inner" aria-hidden="true"></div>
                </div>
                <div class="relative">
                    <a href="<?php echo site_url('product/product-edit-image-s1/' . $id); ?>" class="flex flex-nowarp <?= $hiddenDelete1; ?> items-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                        <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                        <span>Delete</span>
                    </a>
                </div>
            </div>

            <input type="text" name="baseImg1" <?= $edtProductImg['gambar']; ?> hidden>
            <span>
                <input type='file' name='product_img_1' size='20' class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
            </span>
        </label>

        <label class="block mt-4 text-sm p-5 rounded-lg border-solid border-2 bordert-gray-200">
            <span class="text-gray-700 uppercase font-bold">Image 2</span>
            <hr class="my-3">
            <div class="flex flex-col flex-wrap mb-4 space-y-4 md:flex-row md:items-end md:space-x-4">
                <div class="relative  w-20 h-20 mr-3 rounded-sm md:block">
                    <img class="object-cover w-full h-full rounded-sm" src="<?php echo base_url() . 'uploads/product/' . $urlImage2; ?>" alt="" loading="lazy" />
                    <div class="absolute inset-0 rounded-sm shadow-inner" aria-hidden="true"></div>
                </div>
                <div class="relative">
                    <a href="<?php echo site_url('product/product-edit-image-s2/' . $id); ?>" class="flex flex-nowarp <?= $hiddenDelete2; ?> items-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                        <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                        <span>Delete</span>
                    </a>
                </div>
            </div>
            <input type="text" name="baseImg2" value="<?= $edtProductImg['gambar2']; ?>" hidden>
            <span>
                <input type='file' name='product_img_2' size='20' class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
            </span>
        </label>

        <label class="block mt-4 text-sm p-5 rounded-lg border-solid border-2 bordert-gray-200">
            <span class="text-gray-700 uppercase font-bold">Image 3</span>
            <hr class="my-3">
            <div class="flex flex-col flex-wrap mb-4 space-y-4 md:flex-row md:items-end md:space-x-4">
                <div class="relative  w-20 h-20 mr-3 rounded-sm md:block">
                    <img class="object-cover w-full h-full rounded-sm" src="<?php echo base_url() . 'uploads/product/' . $urlImage3; ?>" alt="" loading="lazy" />
                    <div class="absolute inset-0 rounded-sm shadow-inner" aria-hidden="true"></div>
                </div>
                <div class="relative">
                    <a href="<?php echo site_url('product/product-edit-image-s3/' . $id); ?>" class="flex flex-nowarp <?= $hiddenDelete3; ?> items-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                        <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                        <span>Delete</span>
                    </a>
                </div>
            </div>
            <input type="text" name="baseImg3" value="<?= $edtProductImg['gambar3']; ?>" hidden>
            <span>
                <input type='file' name='product_img_3' size='20' class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
            </span>
        </label>
    </div>

    <hr class="mt-6"></hr>

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