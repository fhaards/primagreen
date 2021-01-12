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
    <input type="hidden" name="baseImg1" value="<?= $edtProductImg['gambar']; ?>">
    <input type="hidden" name="baseImg2" value="<?= $edtProductImg['gambar2']; ?>">
    <input type="hidden" name="baseImg3" value="<?= $edtProductImg['gambar3']; ?>">

    <div class="grid grid-cols-1 gap-3 mb-5">
        <label class="block text-sm py-2 flex flex-row space-x-2">
            <span class="text-gray-700 dark:text-gray-400">Name</span>
            <p class="font-bold flex-1">
                <?php echo $edtProductImg['nm_barang']; ?>
            </p>
        </label>
    </div>

    <div class="grid gap-4 lg:grid-cols-3">

        <label class="block text-sm p-5 border-2 border-gray-300 border-dashed rounded-md bg-white hover:bg-gray-100">
            <div class="flex flex-row space-x-2 items-center mb-2">
                <div class="flex-1 text-gray-700 uppercase font-bold">Image 1</div>
                <a href="<?php echo site_url('product/product-edit-image-s1/' . $id); ?>" class="flex flex-nowarp <?= $hiddenDelete1; ?> items-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                    <svg class="w-4 h-4" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
            <div class="flex flex-col  space-y-2">
                <div class="flex rounded-sm md:block p-5 items-center">
                    <img class="object-cover  w-48 h-48 mx-auto bg-white p-5 rounded-md" src="<?php echo base_url() . 'uploads/product/' . $urlImage; ?>" alt="" loading="lazy" />
                </div>
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
            <div class="flex flex-row space-x-2 items-center mb-2">
                <div class="flex-1 text-gray-700 uppercase font-bold">Image 2</div>
                <a href="<?php echo site_url('product/product-edit-image-s2/' . $id); ?>" class="flex flex-nowarp <?= $hiddenDelete2; ?> items-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                    <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                    <span>Delete</span>
                </a>
            </div>
            <div class="flex flex-col  space-y-2">
                <div class="flex rounded-sm md:block p-5 items-center">
                    <img class="object-cover  w-48 h-48 mx-auto bg-white p-5 rounded-md" src="<?php echo base_url() . 'uploads/product/' . $urlImage2; ?>" alt="" loading="lazy" />
                </div>
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
            <div class="flex flex-row space-x-2 items-center mb-2">
                <div class="flex-1 text-gray-700 uppercase font-bold">Image 3</div>
                <a href="<?php echo site_url('product/product-edit-image-s3/' . $id); ?>" class="flex flex-nowarp <?= $hiddenDelete3; ?> items-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                    <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                    <span>Delete</span>
                </a>
            </div>
            <div class="flex flex-col  space-y-2">
                <div class="flex rounded-sm md:block p-5 items-center">
                    <img class="object-cover  w-48 h-48 mx-auto bg-white p-5 rounded-md" src="<?php echo base_url() . 'uploads/product/' . $urlImage3; ?>" alt="" loading="lazy" />
                </div>
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
        <button type="submit" class="flex space-x-2 items-center shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
            <svg class="w-4 h-4" fill="" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
            </svg>
            <span class="hidden lg:block">Submit</span>
        </button>
    </div>
</div>
<?php echo form_close(); ?>