<section class="container px-6 mx-auto grid grid-cols-1 my-10">
    <div id="store" class="w-full">
        <h1 class="uppercase tracking-widest no-underline hover:no-underline font-bold text-gray-800 md:text-4xl text-xl">Features</h1>
    </div>

    <div class="grid gid-cols-2">
        <div class="grid gap-4 md:gap-5 grid-flow-col auto-rows-max  overflow-x-scroll w-100 py-5 ">
            <?php foreach ($features as $row) : ?>
                <?php $newNmFeatures = strtolower(str_replace(' ', '-', $row['nm_features'])); ?>
                <a href="<?php echo site_url('store/features/' . $newNmFeatures); ?>" class="relative rounded-md bg-gray-500 w-100 h-full" style="width:300px;height:400px;">
                    <img src="<?= base_url('uploads/features/' . $row['img_features']); ?>" class="w-full h-full object-cover rounded-md">
                    <div class="absolute z-10 top-0 bg-black w-full h-full opacity-50 rounded-md hover:opacity-0"></div>
                    <div class="absolute z-30 bottom-0 pb-10 px-10">
                        <div class="lg:text-2xl text-lg text-white">
                            <h1 class="text-white w-2/3 -mt-2 uppercase font-bold text-shadow"> <?= $row['nm_features']; ?></h1>
                        </div>
                        <div class="text-xs block flex flex-row space-x-4 text-white uppercase py-2 font-bold leading-5 transition-colors duration-150">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                            <span class="tracking-widest md:hidden lg:block hidden"> Go to store </span>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>