<section class="w-full mx-auto mt-32 py-4 lg:mt-32">
    <div class="container flex flex-wrap pt-4 pb-2">
        <div class="md:flex-1 w-full h-full">
            <div x-data="{ image: 1 }" x-cloak>
                <div class="lg:w-4/5 rounded-lg mb-4">
                    <?php
                    $checkImage1IfEmpty = $getDetail['gambar'];
                    $checkImage2IfEmpty = $getDetail['gambar2'];
                    $checkImage3IfEmpty = $getDetail['gambar3'];
                    if ($checkImage1IfEmpty == 'default_img.jpg') {
                        $urlImage1 = 'default_img.jpg';
                        $hiddenClass1 = 'hidden';
                        $getCount = 0;
                    } else {
                        $urlImage1 = $getDetail['sku'] . '/' . $getDetail['gambar'];
                        $hiddenClass1 = '';
                        $getCount = 1;
                    }

                    if ($checkImage2IfEmpty == 'default_img.jpg') {
                        $urlImage2 = 'default_img.jpg';
                        $hiddenClass2 = 'hidden';
                        $getCount2 = 0;
                    } else {
                        $urlImage2 = $getDetail['sku'] . '/' . $getDetail['gambar2'];
                        $hiddenClass2 = '';
                        $getCount2 = 1;
                    }

                    if ($checkImage3IfEmpty == 'default_img.jpg') {
                        $urlImage3 = 'default_img.jpg';
                        $hiddenClass3 = 'hidden';
                        $getCount3 = 0;
                    } else {
                        $urlImage3 = $getDetail['sku'] . '/' . $getDetail['gambar3'];
                        $hiddenClass3 = '';
                        $getCount3 = 1;
                    }

                    $totalCount = $getCount + $getCount2 + $getCount3;

                    ?>
                    <div x-show="image === 1" class="lg:w-4/5 mx-auto flex flex-wrap bg-gray-100 mb-4 flex items-center justify-center <?= $hiddenClass1; ?>">
                        <img class="lg:w-full w-full object-cover object-center rounded-lg" src="<?php echo base_url() . 'uploads/product/' . $urlImage1; ?>">
                    </div>

                    <div x-show="image === 2" class="lg:w-4/5 mx-auto flex flex-wrap bg-gray-100 mb-4 flex items-center items-center justify-center <?= $hiddenClass2; ?>">
                        <img class="object-cover w-full h-full rounded-lg" src="<?php echo base_url() . 'uploads/product/' . $urlImage2; ?>">
                    </div>

                    <div x-show="image === 3" class="lg:w-4/5 mx-auto flex flex-wrap bg-gray-100 mb-4 flex items-centeritems-center justify-center <?= $hiddenClass3; ?>">
                        <img class="object-cover w-full h-full rounded-lg" src="<?php echo base_url() . 'uploads/product/' . $urlImage3; ?>">
                    </div>
                </div>

                <div class="flex lg:w-4/5 mb-5">
                    <?php $imgGot = array($urlImage1, $urlImage2, $urlImage3); ?>

                    <!-- <template x-for="i in <?= $totalCount; ?>">
                        <div class="flex-1 px-2">
                            <div class="flex-1 px-2">
                                <button x-on:click="image = i" :class="{ 'ring-2 ring-indigo-300 ring-inset': image === i }" class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                                    <?php foreach ($imgGot as $key => $imgGotValue) : ?>
                                        <img class="object-cover w-full h-full rounded-lg" src="<?php echo base_url() . 'uploads/product/' . $imgGotValue; ?>">
                                    <?php endforeach; ?>
                                </button>
                            </div>
                        </div>
                    </template> -->

                    <!-- <template x-for="i in <?= $totalCount; ?>">
                        <div class="flex-1 px-2">
                            <?php for ($x = 1; $x <= $totalCount; $x++) { ?>
                                <div class="flex-1 px-2">
                                    <button x-on:click="image = i" :class="{ 'ring-2 ring-indigo-300 ring-inset': image === i }" 
                                    class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                                        <span x-text="i" class="text-2xl"></span>
                                    </button>
                                </div>
                            <?php } ?>
                        </div>
                    </template> -->

                    <template x-for="i in <?= $totalCount; ?>">
                        <div class="px-2 ">
                            <button x-on:click="image = i" :class="{ 'ring-2 ring-indigo-300 ring-inset': image === i }" class="focus:outline-none rounded-full h-2 w-2 bg-black flex items-center justify-center">

                            </button>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <div class="md:flex-1 pl-5">
            <div class="flex mb-6">
                <div class="flex-1">
                    <h2 class="leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">
                        <?= $getDetail['nm_barang']; ?>
                    </h2>
                    <p class="text-gray-600 text-xs">SKU
                        <?= $getDetail['sku']; ?>
                    </p>
                </div>
                <div>
                    <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                        <span class="text-green-400 mr-1 mt-1">IDR</span>
                        <span class="font-bold text-green-500 text-2xl"><?= number_format($getDetail['harga']); ?></span>
                    </div>
                </div>
            </div>
        
            <div class="flex my-4">
                <div class="flex-1 ">
                    <label>
                        <p class="text-gray-600 font-semibold text-sm">Common Names</p>
                        <p class="text-gray-800 font-bold text-md"><?= $getDetail['nm_barang']; ?></p>
                    </label>
                </div>
                <div class="flex-1">
                    <label>
                        <p class="text-gray-600 font-semibold text-sm">Light</p>
                        <p class="text-gray-800 font-bold text-md"><?= $getDetail['light']; ?></p>
                    </label>
                </div>
            </div>

            <div class="flex my-4">
                <div class="flex-1">
                    <label>
                        <p class="text-gray-600 font-semibold text-sm">Botanical Names</p>
                        <p class="text-gray-800 font-bold text-md"><?= $getDetail['nm_barang_bot']; ?></p>
                    </label>
                </div>
                <div class="flex-1">
                    <label>
                        <p class="text-gray-600 font-semibold text-sm flex">Size </p>
                        <p class="text-gray-800 font-bold text-md space-x-4">
                            <span class="text-gray-800 font-bold text-md"><?= $getDetail['size']; ?></span>
                            <span class="text-gray-800 font-bold text-md"><?= $getDetail['size_desc']; ?></span>
                        </p>
                    </label>
                </div>
            </div>

            <div class="flex text-center space-x-4 border-solid border-2 p-5 border-lg rounded-lg border-green-200 mt-8">
                <div class="flex space-x-2">
                    <input type="number" name="qty"  id="<?= $getDetail['id_barang']; ?>" value="1" placeholder="QTY" class="block w-20 text-sm font-bold leading-5 px-4dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" />
                </div>

                <button data-produkid="<?= $getDetail['id_barang']; ?>" data-produknama="<?= $getDetail['nm_barang']; ?>" data-produkharga="<?= $getDetail['harga']; ?>" class="add_cart flex space-x-2 shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                    <div class="mx-auto flex space-x-2">
                        <svg class="w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="">Add to cart</span>
                    </div>
                </button>

            </div>

            <div class="w-full mt-8">
                <div>
                    <p class="text-gray-600 font-semibold text-sm flex">Description </p>
                    <?= $getDetail['detail']; ?>
                </div>
            </div>
        </div>


    </div>
</section>