<section class="homepage-banner w-full mt-20 lg:mt-32 my-4 mx-auto flex pt-12 md:pt-0 md:items-center bg-cover bg-right">
    <div class="container mx-auto">
        <div class="flex flex-col w-full lg:w-1/3 justify-center items-start lg:p-6 tracking-wide">
            <h1 class="text-white font-bold lg:text-4xl text-3xl my-4 px-6 rounded-lg tracking-wide">Time to bloom youre house with plants</h1>
            <h4 class="text-white p-6 rounded-lg">
                Studies have also proven that indoor plants improve concentration and productivity , reduce stress levels and boost your mood.
                <a href="<?= base_url(); ?>" class="block justify-between px-4 py-2 my-4 text-sm uppercase font-bold leading-5 text-green-500 transition-colors duration-150 bg-green-100 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-200 focus:border-green-400 focus:shadow-outline-green">
                    Go to store
                </a>
            </h4>
        </div>
    </div>
</section>

<!-- NEW ITEMS -->
<section class="w-full mx-auto py-4 mt-4">
    <div class="container flex items-center flex-wrap pt-4 pb-2">

        <nav id="new-items" class="w-full top-0 py-1">
            <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-3">
                <a class="uppercase tracking-widest no-underline hover:no-underline font-bold text-gray-600 text-xl" href="#">
                    New Items
                </a>
            </div>
        </nav>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($newItems as $newItemsValue) { ?>
                <?php
                $newNmProduct = strtolower(str_replace(' ', '-', $newItemsValue['nm_barang']));
                $checkImage1IfEmpty = $newItemsValue['gambar'];
                if ($checkImage1IfEmpty == 'default_img.jpg') {
                    $urlImage = 'default_img.jpg';
                } else {
                    $urlImage = $newItemsValue['sku'] . '/' . $newItemsValue['gambar'];
                }
                ?>
                <div class="flex flex-col">
                    <a href="<?php echo site_url('store/detail/' . $newItemsValue['id_barang'] . '/' . $newNmProduct); ?>" class="flex flex-col">
                        <div class="relative w-full h-20 md:h-48 lg:h-48 rounded-sm md:block">
                            <img class="object-cover w-full h-full opacity-75 hover:opacity-100 hover:shadow-lg" src="<?php echo base_url() . 'uploads/product/' . $urlImage; ?>">
                        </div>
                        <div class="flex h-16 lg:h-12 pt-2 space-x-2">
                            <div class="w-2/3">
                                <p class="text-gray-900 font-bold text-xs lg:text-sm"><?= $newItemsValue['nm_barang']; ?></p>
                            </div>
                            <div class="w-1/3 text-right">
                                <p class="text-gray-600 font-bold text-xs lg:text-sm"><?= number_format($newItemsValue['harga']); ?></p>
                            </div>
                        </div>
                    </a>
                    <div class="h-1/3 flex lg:flex-row lg:flex-wrap space-x-2">
                        <?php if ($newItemsValue['stok'] == 0) : ?>
                            <div class="flex items-center py-1 lg:py-2">
                                <span class="lg:text-sm text-xs lg:block text-gray-600 font-semibold">Out Stock</span>
                            </div>
                        <?php else : ?>
                            <div class="flex-0">
                                <input name="quantity" type="number" id="<?= $newItemsValue['id_barang']; ?>" value="1" class="quantity block w-16 py-1 lg:py-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" />
                            </div>
                            <div class="flex-1">
                                <button data-produkid="<?= $newItemsValue['id_barang']; ?>" data-produknama="<?= $newItemsValue['nm_barang']; ?>" data-produkharga="<?= $newItemsValue['harga']; ?>" class="add_cart flex space-x-2 shadow-lg w-full lg:w-full px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                                    <div class="mx-auto flex space-x-2">
                                        <svg class="w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <span class="lg:text-sm text-xs lg:block hidden">Add to Cart</span>
                                    </div>
                                </button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- STORE ITEMS -->
<section class="w-full mx-auto bg-white mt-4 py-4">
    <div class="container flex items-center flex-wrap pt-4 pb-8">

        <nav id="store" class="w-full top-0 py-1">
            <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-3">
                <a class="uppercase tracking-widest no-underline hover:no-underline font-bold text-gray-600 text-xl" href="#">
                    Store
                </a>
                <div class="" id="store-nav-content"></div>
            </div>
        </nav>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($someItems as $someItemsValue) { ?>
                <?php
                $newNmProduct2 = strtolower(str_replace(' ', '-', $someItemsValue['nm_barang']));
                $checkImage1IfEmpty = $someItemsValue['gambar'];
                if ($checkImage1IfEmpty == 'default_img.jpg') {
                    $urlImage = 'default_img.jpg';
                } else {
                    $urlImage = $someItemsValue['sku'] . '/' . $someItemsValue['gambar'];
                }
                ?>
                <div class="flex flex-col">
                    <a href="<?php echo site_url('store/detail/' . $newItemsValue['id_barang'] . '/' . $newNmProduct2); ?>" class="flex flex-col">
                        <div class="relative w-full h-20 md:h-48 lg:h-48 rounded-sm md:block">
                            <img class="object-cover w-full h-full opacity-75 hover:opacity-100 hover:shadow-lg" src="<?php echo base_url() . 'uploads/product/' . $urlImage; ?>">
                        </div>
                        <div class="flex h-16 lg:h-12 pt-2 space-x-2">
                            <div class="w-2/3">
                                <p class="text-gray-900 font-bold text-xs lg:text-sm"><?= $someItemsValue['nm_barang']; ?></p>
                            </div>
                            <div class="w-1/3 text-right">
                                <p class="text-gray-600 font-bold text-xs lg:text-sm"><?= number_format($someItemsValue['harga']); ?></p>
                            </div>
                        </div>
                    </a>
                    <div class="h-1/3 flex lg:flex-row lg:flex-wrap space-x-2">
                        <?php if ($someItemsValue['stok'] == 0) : ?>
                            <div class="flex items-center py-1 lg:py-2">
                                <span class="lg:text-sm text-xs lg:block text-gray-600 font-semibold">Out Stock</span>
                            </div>
                        <?php else : ?>
                            <div class="flex-0">
                                <input name="quantity" type="number" id="<?= $someItemsValue['id_barang']; ?>" value="1" class="quantity block w-16 py-1 lg:py-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" />
                            </div>
                            <div class="flex-1">
                                <button data-produkid="<?= $someItemsValue['id_barang']; ?>" data-produknama="<?= $someItemsValue['nm_barang']; ?>" data-produkharga="<?= $someItemsValue['harga']; ?>" class="add_cart flex space-x-2 shadow-lg w-full lg:w-full px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                                    <div class="mx-auto flex space-x-2">
                                        <svg class="load-icon type-load hidden w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                        <svg class="cart-icon type-cart w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <span class="lg:text-sm text-xs lg:block hidden">Add to Cart</span>
                                    </div>
                                </button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
    <div class="flex flex-col flex-wrap space-y-4 md:flex-row md:items-end md:space-x-4">
        <div class='flex-1'></div>
        <div>
            <a href="<?php echo site_url('store/show-all-items'); ?>" class="block uppercase shadow-xs px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                <p class="tracking-widest"> Go to store </p>
            </a>
        </div>
        <div class='flex-1'></div>
    </div>
</section>