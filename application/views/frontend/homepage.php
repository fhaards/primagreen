<section class="homepage-banner  min-w-full w-full mt-20 lg:mt-20 mx-auto flex md:items-center bg-cover bg-right" style="height:600px;">
    <div class="container mx-auto md:mt-0 mt-20 px-6 text-gray-800">
        <div class="flex flex-col w-full lg:w-2/3 tracking-wide md:mx-0 mx-auto ">
            <h1 class="uppercase  font-black md:text-5xl text-2xl tracking-wide">Time to bloom </h1>
            <h1 class="uppercase md:-mt-5 font-bold md:text-4xl text-xl tracking-wide py-0">youre house with plants</h1>
        </div>
        <div class="flex flex-col w-full md:w-1/3 tracking-wide md:mx-0 mx-auto mt-5">
            <h4 class=" font-semibold md:text-xl text-md md:w-full w-2/3 ">
                Studies have also proven that indoor plants improve concentration and productivity , reduce stress levels and boost your mood.
            </h4>
            <a href="<?= base_url(); ?>store/product-list" class="block flex flex-row px-4 py-2 items-center mt-10 text-sm uppercase shadow-lg hover:shadow-none font-bold leading-5 text-green-600 transition-colors duration-150 bg-green-100 border border-transparent rounded-sm active:bg-green-600 hover:bg-green-200 focus:border-green-400 focus:shadow-outline-green">
                <div class="flex flex-row items-center space-x-4 mx-auto">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                    <span>Go to store</span>
                </div>
            </a>
        </div>
    </div>
</section>

<section class="w-full bg-gray-200 mb-10">
    <div class="container px-6 mx-auto flex md:flex-row lg:flex-row flex-col md:space-x-10">
        <div class="md:w-1/4 w-full">
            <div class="w-full container flex md:flex-col md:space-x-0 space-x-5 mt-0 pt-10">
                <div class="flex flex-col text-gray-800">
                    <span class="uppercase tracking-widest no-underline hover:no-underline font-bold  md:text-4xl text-xl">New</span>
                    <span class="md:-mt-5 uppercase tracking-widest no-underline hover:no-underline font-black  md:text-4xl text-xl">Arrival</span>
                </div>
                <span class="w-full uppercase tracking-widest text-gray-600 font-semibold md:text-xl text-xs md:text-left text-right">PLANTS ALWAYS <BR> GROW UP</span>
            </div>
        </div>
        <div class="md:w-3/4 w-full md:mt-0 mt-10">
            <div class="grid grid-cols-1">
                <div class="grid gid-cols-2">
                    <div class="new-arrival grid gap-4 md:gap-6 grid-flow-col auto-rows-max overflow-x-scroll py-10 ">
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
                            <div id="showProducts" class="p-2 rounded-md flex flex-col bg-white shadow-sm hover:shadow-md border-2 border-transparent hover:border-gray-800" style="width:15rem;">
                                <a href="<?php echo site_url('store/product-list/detail/' . $newItemsValue['id_barang'] . '/' . $newNmProduct); ?>" class="">
                                    <div class="h-48 w-full">
                                        <img class="object-cover w-full h-full rounded-md" src="<?php echo base_url() . 'uploads/product/' . $urlImage; ?>">
                                    </div>
                                    <div class="flex pt-2">
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
                                            <button data-produkid="<?= $newItemsValue['id_barang']; ?>" data-produknama="<?= $newItemsValue['nm_barang']; ?>" data-produkharga="<?= $newItemsValue['harga']; ?>" data-sku="<?= $newItemsValue['sku']; ?>" data-gambar="<?= $newItemsValue['gambar']; ?>" class="add_cart flex space-x-2 shadow-lg w-full lg:w-full rounded-md px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                                                <div class="mx-auto flex space-x-2 items-center mx-auto">
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

<section class="container px-6 mx-auto grid grid-cols-1 my-5">
    <div class="grid gid-cols-2">
        <div class="bg-gray-100 grid gap-4 md:gap-10 grid-flow-col auto-rows-max overflow-x-scroll w-full h-full scrollbar-none">
            <a href="<?php echo site_url('store/show-all-items'); ?>" class="relative h-full px-10 cat-img-2 md:w-full w-56 rounded-md">
                <div class="absolute bottom-0 pb-10">
                    <div class="md:text-xl text-md text-white">
                        <h1 class="text-white  uppercase"> Shop</h1>
                        <h1 class="text-white -mt-2 uppercase font-bold"> All Items </h1>
                    </div>

                    <div class="block text-xs md:text-md flex flex-row space-x-4 text-white uppercase py-2  font-bold leading-5 transition-colors duration-150">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                        <span class="tracking-widest md:block hidden"> Go to store </span>
                    </div>
                </div>
            </a>
            <div class="relative h-full px-10 cat-img-1 md:w-full w-56 rounded-md">
                <div class="absolute bottom-0 pb-10">
                    <div class="md:text-xl text-md text-white">
                        <h1 class="text-white uppercase"> Pet-Friendly</h1>
                        <h1 class="text-white -mt-2 uppercase font-bold"> Plants</h1>
                    </div>
                    <a href="<?php echo site_url('store/show-all-items'); ?>" class="block text-xs md:text-md flex flex-row space-x-4 text-white uppercase py-2 font-bold leading-5 transition-colors duration-150">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                        <span class="tracking-widest md:block hidden"> Go to store </span>
                    </a>
                </div>
            </div>
            <div class="relative h-full px-10 cat-img-3 md:w-full w-56 rounded-md">
                <div class="absolute bottom-0 pb-10">
                    <div class="md:text-xl text-md text-white">
                        <h1 class="text-white uppercase"> Edible</h1>
                        <h1 class="text-white -mt-2 uppercase font-bold"> Garden </h1>
                    </div>

                    <a href="<?php echo site_url('store/show-all-items'); ?>" class="block text-xs md:text-md flex flex-row space-x-4 text-white uppercase py-2 font-bold leading-5 transition-colors duration-150">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                        <span class="tracking-widest md:block hidden"> Go to store </span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- STORE ITEMS -->
<section class="container w-full mx-auto bg-white my-5 md:my-8 px-5 md:px-5" id="show_someitems">
    <div class="flex flex-wrap ">
        <!-- <div id="store" class="w-full  py-10">
                <div class="w-full flex flex-row space-x-10 items-center justify-between mt-0 py-3">
                    <div class="flex-1 h-1 bg-gray-900"></div>
                    <div class=" flex flex-row space-x-5">
                        <h1 class="uppercase tracking-widest no-underline hover:no-underline font-bold text-gray-800 md:text-4xl text-xl">SOME</h1>
                        <span class="uppercase tracking-widest no-underline hover:no-underline font-black text-gray-800 md:text-4xl text-xl">PLANTS</span>
                    </div>
                    <div class="flex-1 h-1 bg-gray-900"></div>
                </div>
            </div> -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-2 md:gap-5">
            <?php foreach ($someItems as $someItemsValue) { ?>
                <?php
                $getIds = $someItemsValue['id_barang'];
                $someNmProduct = strtolower(str_replace(' ', '-', $someItemsValue['nm_barang']));
                $checkImage1IfEmpty = $someItemsValue['gambar'];
                if ($checkImage1IfEmpty == 'default_img.jpg') {
                    $urlImage = 'default_img.jpg';
                } else {
                    $urlImage = $someItemsValue['sku'] . '/' . $someItemsValue['gambar'];
                }
                ?>
                <div class="flex flex-col w-full p-2 rounded-md border-2 border-transparent  md:border-gray-50 hover:border-gray-800 hover:shadow-md ">
                    <div id="open_this_items">
                        <a style="cursor:pointer;" href="<?php echo site_url('store/product-list/detail/' . $someItemsValue['id_barang'] . '/' . $someNmProduct); ?>" class="flex flex-col">
                            <div class="w-full h-20 md:h-48 lg:h-48 md:block">
                                <img class="object-cover w-full h-full rounded-md" src="<?php echo base_url() . 'uploads/product/' . $urlImage; ?>">
                            </div>
                            <div class="flex pt-2 space-x-2">
                                <div class="w-2/3 h-16 max-h-16 lg:h-12 lg:max-h-12  overflow-y-auto">
                                    <p class="text-gray-900 font-bold text-xs md:text-sm"><?= $someItemsValue['nm_barang']; ?></p>
                                </div>
                                <div class="w-1/3 text-right">
                                    <p class="text-gray-600 font-bold text-xs lg:text-sm">Rp <?= number_format($someItemsValue['harga']); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="flex flex-row space-x-2 rounded-md">
                        <?php if ($someItemsValue['stok'] == 0) : ?>
                            <div class="flex items-center py-1 lg:py-2 md:mx-auto">
                                <span class="text-xs lg:block text-gray-600 font-semibold">Sorry , Out of Stock</span>
                            </div>
                        <?php else : ?>
                            <div class="flex-0">
                                <input name="quantity" min="1" type="number" id="<?= $someItemsValue['id_barang']; ?>" value="1" class="quantity block w-16 py-1 md:py-2 text-xs dark:border-gray-600 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" />
                            </div>
                            <div class="flex-1">
                                <button data-produkid="<?= $someItemsValue['id_barang']; ?>" data-produknama="<?= $someItemsValue['nm_barang']; ?>" data-produkharga="<?= $someItemsValue['harga']; ?>" data-sku="<?= $someItemsValue['sku']; ?>" data-gambar="<?= $someItemsValue['gambar']; ?>" class="add_cart flex space-x-2 shadow-lg w-full lg:w-full px-4 py-2 text-xs font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                                    <div class="mx-auto flex space-x-2">
                                        <svg class="load-icon type-load hidden w-3 text-white text-xs" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                        <svg class="cart-icon type-cart w-3 text-white text-xs" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <span class="text-xs lg:block md:block hidden">Add to Cart</span>
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