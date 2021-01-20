<div class="container px-6 py-3 mx-auto grid min-h-screen">
    <section class="w-full mx-auto mt-20 md:mt-24">
        <div class="container flex flex-wrap pt-4 pb-2">
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
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 ">
                <div class="grid grid-cols-1">
                    <!-- <img id="expandedImg" style="width:100%"> -->
                    <div class="flex w-full mb-5" style="height:30rem;max-height:30rem;">
                        <img id="expandedImg" class="h-full w-full object-cover rounded-md shadow-xs" src="<?php echo base_url() . 'uploads/product/' . $urlImage1; ?>">
                        <div id="imgtext"></div>
                    </div>
                    <div class="flex flex-row space-x-5 h-20">
                        <div class="md:h-20 md:w-20 h-full w-full">
                            <img class="object-cover h-full rounded-md shadow-xs <?= $hiddenClass1; ?>" src="<?php echo base_url() . 'uploads/product/' . $urlImage1; ?>" alt="Nature" style="width:100%;cursor:pointer;" onclick="detailImage(this);">
                        </div>
                        <div class="md:h-20 md:w-20 h-full w-full">
                            <img class="object-cover h-full rounded-md shadow-xs  <?= $hiddenClass2; ?>" src="<?php echo base_url() . 'uploads/product/' . $urlImage2; ?>" alt="Snow" style="width:100%;cursor:pointer;" onclick="detailImage(this);">
                        </div>
                        <div class="md:h-20 md:w-20 h-full w-full">
                            <img class="object-cover h-full rounded-md shadow-xs  <?= $hiddenClass3; ?>" src="<?php echo base_url() . 'uploads/product/' . $urlImage3; ?>" alt="Mountains" style="width:100%;cursor:pointer;" onclick="detailImage(this);">
                        </div>
                    </div>
                </div>
                <div class="grid">
                    <div class="flex mb-5">
                        <div class="flex-1">
                            <h2 class="leading-tight  font-black text-gray-800 text-2xl md:text-3xl">
                                <?= $getDetail['nm_barang']; ?>
                            </h2>
                            <p class="text-gray-600 text-xs">SKU
                                <?= $getDetail['sku']; ?>
                            </p>
                        </div>
                        <div>
                            <div class="rounded-md shadow-xs bg-green-500 flex py-1 px-4 items-center border-green-600 border-2">
                                <span class="font-bold text-white text-xl items-center">Rp <?= number_format($getDetail['harga']); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 py-4 px-5 bg-white border-2 border-gray-300 rounded-md my-5">
                        <div class="grid grid-cols-2 gap-5 mb-2 ">
                            <div>
                                <p class="text-gray-600 font-semibold md:text-sm text-xs">Common Names</p>
                                <p class="text-gray-800 font-bold md:text-sm text-xs"><?= $getDetail['nm_barang']; ?></p>
                            </div>
                            <div>
                                <p class="text-gray-600 font-semibold md:text-sm text-xs">Light</p>
                                <p class="text-gray-800 font-bold md:text-sm text-xs"><?= $getDetail['light']; ?></p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-5 ">
                            <div>
                                <p class="text-gray-600 font-semibold md:text-sm text-xs">Botanical Names</p>
                                <p class="text-gray-800 font-bold md:text-sm text-xs"><?= $getDetail['nm_barang_bot']; ?></p>
                            </div>
                            <div>
                                <p class="text-gray-600 font-semibold md:text-sm text-xs flex">Size </p>
                                <p class="text-gray-800 text-gray-800 font-bold md:text-sm text-xs"><?= $getDetail['size']; ?></p>
                                <p class="text-gray-800 text-gray-800 font-bold md:text-sm text-xs"><?= $getDetail['size_desc']; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="flex text-center space-x-4 p-4 rounded-md bg-gray-50 border-2 border-gray-200 mb-5">
                        <div class="flex flex-1 space-x-2">
                            <input type="number" min="1" name="qty" id="<?= $getDetail['id_barang']; ?>" value="1" placeholder="QTY" class="block items-center w-20 bg-white text-sm font-bold leading-5 px-4 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" />
                            <button data-produkid="<?= $getDetail['id_barang']; ?>" data-produknama="<?= $getDetail['nm_barang']; ?>" data-produkharga="<?= $getDetail['harga']; ?>" data-sku="<?= $getDetail['sku']; ?>" data-gambar="<?= $checkImage1IfEmpty; ?>" class="add_cart flex space-x-2 shadow-lg px-4 py-2 items-center text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="">Add to Cart</span>
                            </button>
                        </div>
                    </div>

                    <div class="w-full">
                        <div class="p-4  border-2 border-gray-200 rounded-md">
                            <p class="text-gray-600 font-semibold md:text-sm text-xs mb-5">Description </p>
                            <div class="text-justify md:text-sm text-xs"><?= $getDetail['detail']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


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