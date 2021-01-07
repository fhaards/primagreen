<section class="homepage-banner w-full h-screen mt-20 lg:mt-20 mx-auto flex pt-12 md:pt-0 md:items-center bg-cover bg-right">
    <div class="container mx-auto md:mt-0 mt-10 px-6">
        <div class="flex flex-col w-full lg:w-2/3 tracking-wide md:mx-0 mx-auto ">
            <h1 class="uppercase text-white font-black md:text-5xl text-2xl tracking-wide">Time to bloom </h1>
            <h1 class="uppercase md:-mt-5 text-white font-bold md:text-4xl text-xl tracking-wide py-0">youre house with plants</h1>
        </div>
        <div class="flex flex-col w-full  lg:w-1/3 tracking-wide md:mx-0 mx-auto mt-5">
            <h4 class="text-white font-semibold md:text-xl ">
                Studies have also proven that indoor plants improve concentration and productivity , reduce stress levels and boost your mood.
            </h4>
            <a href="<?= base_url(); ?>store/product-list" class="block flex flex-row px-4 py-2 space-x-4 items-center mt-10 text-sm uppercase font-bold leading-5 text-green-500 transition-colors duration-150 bg-green-100 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-200 focus:border-green-400 focus:shadow-outline-green">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
                <span>Go to store</span>
            </a>
        </div>
    </div>
</section>

<section class="w-full bg-gray-200">
    <div class="container px-6 py-3 mx-auto flex md:flex-row lg:flex-row flex-col md:py-20 md:space-x-10 py-10">
        <div class="md:w-1/4 w-full">
            <div class="w-full container flex md:flex-col md:space-x-0 space-x-5 mt-0">
                <div class="flex flex-col">
                    <span class="uppercase tracking-widest no-underline hover:no-underline font-bold text-gray-800 md:text-4xl text-xl">New</span>
                    <span class="md:-mt-5 uppercase tracking-widest no-underline hover:no-underline font-black text-gray-800 md:text-4xl text-xl">Arrival</span>
                </div>
                <span class="w-full uppercase tracking-widest text-gray-600 font-semibold md:text-xl text-xs md:text-left text-right">PLANTS ALWAYS <BR> GROW UP</span>
            </div>
        </div>
        <div class="md:w-3/4 w-full md:mt-0 mt-10">
            <div class="grid grid-cols-1">
                <div class="grid gid-cols-2">
                    <div class="grid gap-4 md:gap-3 grid-flow-col auto-rows-max overflow-x-scroll">
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
                            <div id="showProducts" class="flex flex-col md:w-full w-48 bg-white shadow-sm hover:shadow-none">
                                <a href="<?php echo site_url('store/product-list/detail/' . $newItemsValue['id_barang'] . '/' . $newNmProduct); ?>" class="">
                                    <div class="h-48 w-full">
                                        <img class="object-cover w-full h-full" src="<?php echo base_url() . 'uploads/product/' . $urlImage; ?>">
                                    </div>
                                    <div class="flex pt-2 px-3">
                                        <div class="w-2/3 h-12 max-h-10 md:h-16 md:max-h-12  overflow-y-auto">
                                            <p class="text-gray-900 font-bold text-xs lg:text-sm"><?= $newItemsValue['nm_barang']; ?></p>
                                        </div>
                                    </div>
                                </a>
                                <div class="h-1/3 flex lg:flex-row lg:flex-wrap">
                                    <?php if ($newItemsValue['stok'] == 0) : ?>
                                        <div class="flex items-center py-1 lg:py-2 mx-auto">
                                            <span class="lg:text-sm text-xs lg:block text-gray-600 font-bold text-gray-700">Out Stock</span>
                                        </div>
                                    <?php else : ?>
                                        <input name="quantity" type="hidden" id="<?= $newItemsValue['id_barang']; ?>" value="1" class="quantity block w-16 py-1 lg:py-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" />

                                        <div class="w-full">
                                            <button data-produkid="<?= $newItemsValue['id_barang']; ?>" data-produknama="<?= $newItemsValue['nm_barang']; ?>" data-produkharga="<?= $newItemsValue['harga']; ?>" data-sku="<?= $newItemsValue['sku']; ?>" data-gambar="<?= $newItemsValue['gambar']; ?>" class="add_cart flex space-x-2 shadow-lg w-full lg:w-full px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
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
            </div>
        </div>
    </div>
</section>

<div class="container px-6 mx-auto grid min-h-screen">
    <!-- STORE ITEMS -->
    <section class="w-full mx-auto bg-white">

        <div class="container flex items-center flex-wrap">
            <div id="store" class="w-full  py-10">
                <div class="w-full flex flex-row space-x-10 items-center justify-between mt-0 py-3">
                    <div class="flex-1 h-1 bg-gray-900"></div>
                    <div class=" flex flex-row space-x-5">
                        <h1 class="uppercase tracking-widest no-underline hover:no-underline font-bold text-gray-800 md:text-4xl text-xl">SOME</h1>
                        <span class="uppercase tracking-widest no-underline hover:no-underline font-black text-gray-800 md:text-4xl text-xl">PLANTS</span>
                    </div>
                    <div class="flex-1 h-1 bg-gray-900"></div>
                </div>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($someItems as $someItemsValue) { ?>
                    <?php
                    $someNmProduct = strtolower(str_replace(' ', '-', $someItemsValue['nm_barang']));
                    $checkImage1IfEmpty = $someItemsValue['gambar'];
                    if ($checkImage1IfEmpty == 'default_img.jpg') {
                        $urlImage = 'default_img.jpg';
                    } else {
                        $urlImage = $someItemsValue['sku'] . '/' . $someItemsValue['gambar'];
                    }
                    ?>
                    <div class="flex flex-col">
                        <a href="<?php echo site_url('store/product-list/detail/' . $someItemsValue['id_barang'] . '/' . $someNmProduct); ?>" class="flex flex-col  border border-gray-300 hover:border-green-500">
                            <div class="w-full h-20 md:h-48 lg:h-48 rounded-sm md:block">
                                <img class="object-cover w-full h-full opacity-75 hover:opacity-100 hover:shadow-lg" src="<?php echo base_url() . 'uploads/product/' . $urlImage; ?>">
                            </div>
                            <div class="flex pt-2 space-x-2 px-5">
                                <div class="w-2/3 h-16 max-h-16 lg:h-12 lg:max-h-12  overflow-y-auto">
                                    <p class="text-gray-900 font-bold text-xs lg:text-sm"><?= $someItemsValue['nm_barang']; ?></p>
                                </div>
                                <div class="w-1/3 text-right">
                                    <p class="text-gray-600 font-bold text-xs lg:text-sm"><?= number_format($someItemsValue['harga']); ?></p>
                                </div>
                            </div>
                            <div class="flex px-5 pb-4">
                                <p class="text-gray-600 font-semibold text-xs lg:text-xs"> Size : <?= $someItemsValue['size']; ?></p>
                            </div>
                        </a>
                        <?php if (isLoggedIn()) : ?>
                            <?php
                            $getIdUser2 = getUserData()['id_user'];
                            $getIdBarang2 = $someItemsValue['id_barang'];
                            ?>
                            <?php if (in_array($getIdBarang2, $favItems)) : ?>
                                <?php
                                $classFav2 = 'w-5 text-red-500';
                                $classFillFav2 = 'currentColor';
                                ?>
                            <?php else : ?>
                                <?php
                                $classFav2 = 'w-5 text-gray-500 hover:text-red-500';
                                $classFillFav2 = 'none';
                                ?>
                            <?php endif; ?>
                            <button data-itemsid="<?= $getIdBarang2; ?>" data-userid="<?= $getIdUser2; ?>" class="add_favorites absolute items-center bg-white p-1 rounded-br-lg">
                                <svg class="<?= $classFav2; ?>" fill="<?= $classFillFav2; ?>" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                        <?php else : ?>
                            <a href="<?= base_url() . 'login'; ?>" class="absolute items-center bg-white p-1 rounded-br-lg">
                                <svg class="h-6 text-gray-600 right-0 hover:text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </a>
                        <?php endif; ?>
                        <div class="flex lg:flex-row lg:flex-wrap space-x-2 mt-4">
                            <?php if ($someItemsValue['stok'] == 0) : ?>
                                <div class="flex items-center py-1 lg:py-2">
                                    <span class="lg:text-sm text-xs lg:block text-gray-600 font-semibold">Out Stock</span>
                                </div>
                            <?php else : ?>
                                <div class="flex-0">
                                    <input name="quantity" type="number" id="<?= $someItemsValue['id_barang']; ?>" value="1" class="quantity block w-16 py-1 lg:py-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" />
                                </div>
                                <div class="flex-1">
                                    <button data-produkid="<?= $someItemsValue['id_barang']; ?>" data-produknama="<?= $someItemsValue['nm_barang']; ?>" data-produkharga="<?= $someItemsValue['harga']; ?>" data-sku="<?= $someItemsValue['sku']; ?>" data-gambar="<?= $someItemsValue['gambar']; ?>" class="add_cart flex space-x-2 shadow-lg w-full lg:w-full px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
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
        <div class="flex flex-col flex-wrap space-y-4 md:flex-row md:items-end md:space-x-4 mt-10">
            <div class='flex-1'></div>
            <div>
                <a href="<?php echo site_url('store/show-all-items'); ?>" class="block flex flex-row space-x-4 text-gray-800 uppercase px-4 py-2 text-sm font-bold leading-5 transition-colors duration-150">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                    <span class="tracking-widest">
                        Go to store
                    </span>
                </a>
            </div>
            <div class='flex-1'></div>
        </div>
    </section>
</div>