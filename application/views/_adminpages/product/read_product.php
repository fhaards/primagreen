<div class="my-6 flex">
    <div class="flex-1">
        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Product
        </h2>
        <p class="">List of table products</p>
    </div>
    <div class="">
        <a href="<?= base_url(); ?>product/product-add" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-green-500 transition-colors duration-150 bg-green-100 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-200 focus:border-green-400 focus:shadow-outline-green">
            New Prodduct
            <span class="ml-2" aria-hidden="true">+</span>
        </a>
    </div>
</div>
<div class="py-3"></div>

<div class="w-full bg-white overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
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
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
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
                        <td class="px-4 py-3"><?= $productLists['harga']; ?></td>
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
                                <a href="<?php echo site_url('product/product-edit/' . $id); ?>" class="flex items-center justify-between px-1 py-1 text-sm font-medium leading-5 bg-green-500 rounded-md hover:bg-green-700" aria-label="Edit">
                                    <svg class="w-4 h-4 fill-current text-white" aria-hidden="true" fill="" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                                <button class="flex items-center justify-between px-1 py-1 text-sm font-medium leading-5 bg-green-500 rounded-md" aria-label="Delete">
                                    <svg class="w-4 h-4 fill-current text-white" aria-hidden="true" fill="" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Category</th>
                    <th class="px-4 py-3">Price</th>
                    <th class="px-4 py-3">Stock</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                                <p class="font-semibold">Hans Burger</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    10x Developer
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm">$ 863.45</td>
                    <td class="px-4 py-3 text-xs">
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                            Approved
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm">6/10/2020</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                            <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                </svg>
                            </button>
                            <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&facepad=3&fit=facearea&s=707b9c33066bf8808c934c8ab394dff6" alt="" loading="lazy" />
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                                <p class="font-semibold">Jolina Angelie</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    Unemployed
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm">$ 369.95</td>
                    <td class="px-4 py-3 text-xs">
                        <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                            Pending
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm">6/10/2020</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                            <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                </svg>
                            </button>
                            <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/photo-1551069613-1904dbdcda11?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                                <p class="font-semibold">Sarah Curry</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    Designer
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm">$ 86.00</td>
                    <td class="px-4 py-3 text-xs">
                        <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                            Denied
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm">6/10/2020</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                            <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                </svg>
                            </button>
                            <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table> -->

    </div>

    <!-- PAGGING -->
    <!-- <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        <span class="flex items-center col-span-3">
            Showing 21-30 of 100
        </span>
        <span class="col-span-2"></span>

        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
            <nav aria-label="Table navigation">
                <ul class="inline-flex items-center">
                    <li>
                        <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                            <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </li>
                    <li>
                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                            1
                        </button>
                    </li>
                    <li>
                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                            2
                        </button>
                    </li>
                    <li>
                        <button class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                            3
                        </button>
                    </li>
                    <li>
                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                            4
                        </button>
                    </li>
                    <li>
                        <span class="px-3 py-1">...</span>
                    </li>
                    <li>
                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                            8
                        </button>
                    </li>
                    <li>
                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                            9
                        </button>
                    </li>
                    <li>
                        <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                            <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </li>
                </ul>
            </nav>
        </span>
    </div> -->
</div>
<div class="mt-6"></div>