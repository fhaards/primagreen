<!-- STORE ITEMS -->
<section class="w-full mx-auto mt-32 bg-white py-4 my-4">
    <div class="flex w-full md:space-x-4">

        <!-- FILTER  -->
        <?php
        $hal = $this->uri->segment(1);
        $hal2 = $this->uri->segment(2);
        ?>
        <div class="w-1/5 md:block hidden">
            <nav id="store" class="w-full top-0">
                <div class="w-full container flex flex-wrap items-center justify-between mt-0 py-3">
                    <h2 class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                        Filter
                    </h2>
                </div>
            </nav>
            <div class="flex">
                <ul class="">
                    <li class="mb-3">
                        <span class="text-gray-600 text-md"> Type </span>
                    </li>

                    <?php foreach ($typeList as $typeLists) : ?>
                        <?php
                        $nmType = $typeLists['nm_type'];
                        $newNmType = strtolower(str_replace(' ', '-', $nmType));
                        ?>
                        <?php echo form_open('store/'.$newNmType); ?>
                        <li class="relative text-gray-500 text-md mb-1">
                            <label class="">
                                <input type="radio" class="form-radio h-4 w-4 text-gray-600 mr-2" onchange="this.form.submit()" value="<?= $newNmType; ?>" <?= ($hal2 == $newNmType ? 'checked' : '') ?> /> <?= $nmType; ?>
                            </label>
                        </li>
                        <?php echo  form_close(); ?>
                    <?php endforeach; ?>
                    <li class="relative text-gray-500 text-md mb-1">
                        <?php echo form_open('store/show-all-items'); ?>
                        <label class="">
                            <input type="radio" class="form-radio h-4 w-4 text-gray-600  mr-2" onchange="this.form.submit()" value="show all items" <?= ($hal2 == 'show-all-items' ? 'checked' : '') ?> /> Show All Items
                        </label>
                        <?php echo  form_close(); ?>
                    </li>
                </ul>
            </div>
        </div>

        <!-- PRODUCT LIST -->

        <div class="md:w-4/5 w-5/5">
            <nav id="store" class="w-full op-0 py-1 lg:px-6">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-3">
                    <h2 class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">

                        Store /
                    </h2>
                </div>
            </nav>
            <div class="w-full flex-col flex-wrap">
                <div class="container flex items-center flex-wrap">

                    <?php foreach ($getItems as $getItemsValue) { ?>

                        <div class="w-1/2 md:w-1/3 xl:w-1/4 lg:h-full p-4 flex flex-col">
                            <div class="h-2/3">
                                <a href="<?php echo site_url('store/detail/' . $getItemsValue['id_barang']); ?>" class="border-solid  ">
                                    <div class="relative w-full lg:h-48 h-20 rounded-sm md:block">
                                        <img class="object-cover w-full h-full rounded-lg duration-150 hover:grow  hover:shadow-lg" src="<?php echo base_url() . 'uploads/product/' .  $getItemsValue['sku'] . '/' . $getItemsValue['gambar']; ?>">
                                    </div>

                                    <div class="flex h-16 lg:h-12 mb-4 space-x-2">
                                        <div class="flex-1 pt-4">
                                            <p class="text-gray-900 font-bold text-xs lg:text-sm"><?= $getItemsValue['nm_barang']; ?></p>
                                        </div>
                                        <div class="pt-4">
                                            <p class="text-gray-600 font-bold text-xs lg:text-sm"><?= number_format($getItemsValue['harga']); ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="h-1/3 flex lg:flex-row lg:flex-wrap space-x-2">
                                <div class="flex-0">
                                    <input name="quantity" type="number" id="<?= $getItemsValue['id_barang']; ?>" value="1" class="quantity block w-16 py-1 lg:py-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" />
                                </div>
                                <div class="flex-1">
                                    <button data-produkid="<?= $getItemsValue['id_barang']; ?>" data-produknama="<?= $getItemsValue['nm_barang']; ?>" data-produkharga="<?= $getItemsValue['harga']; ?>" class="add_cart flex space-x-2 shadow-lg lg:w-full px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                                        <div class="mx-auto flex space-x-2">
                                            <svg class="w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            <span class="lg:text-sm text-xs lg:block hidden">Add to Cart</span>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>


                    <?php } ?>

                </div>
            </div>
        </div>
    </div>




</section>