<div class="px-4 py-3 mb-8 rounded-lg">
    <div class="grid gap-4 lg:grid-cols-1">
        <h3 class="">Banner in this website</h3>
        <hr>
    </div>
    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('banner/update-banner/' . getBannerData()['id_banner']); ?>
    <div class="md:grid md:grid-cols-3 md:gap-3">
        <input name="baseMainImg" type="hidden" value="<?= getBannerData()['main_banner']; ?>">
        <input name="baseLoginImg" type="hidden" value="<?= getBannerData()['login_banner']; ?>">
        <input name="baseRegistImg" type="hidden" value="<?= getBannerData()['regist_banner']; ?>">
        <input name="baseContactusImg" type="hidden" value="<?= getBannerData()['contactus_banner']; ?>">

        <!-- Main -->
        <label class="block mt-4 text-sm p-5 rounded-lg border-solid border-2 bordert-gray-200">
            <span class="text-gray-700 uppercase font-bold">Main Banner</span>
            <hr class="my-3">
            <div class="flex flex-col flex-wrap mb-4 space-y-4 md:flex-row md:items-end md:space-x-4">
                <div class="relative w-20 h-20 mr-3 rounded-sm md:block">
                    <?php if (getBannerData()['main_banner'] == 'default_img.jpg' || getBannerData()['main_banner'] == '') { ?>
                        <img class="object-cover w-full h-full rounded-sm" src="<?php echo base_url() . 'uploads/default_img.jpg'; ?>" alt="" loading="lazy" />
                    <?php } else { ?>
                        <img class="object-cover mx-auto rounded-sm" src="<?php echo base_url() . 'uploads/banner/' . getBannerData()['main_banner']; ?>" alt="" loading="lazy" />
                    <?php } ?>
                    <div class="absolute inset-0 rounded-sm shadow-inner" aria-hidden="true"></div>
                </div>
                <span>
                    <input type='file' name='mainImage' class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </span>
            </div>
        </label>

        <!-- LOGIN BANNER  -->
        <label class="block mt-4 text-sm p-5 rounded-lg border-solid border-2 bordert-gray-200">
            <span class="text-gray-700 uppercase font-bold">Login Banner</span>
            <hr class="my-3">
            <div class="flex flex-col flex-wrap mb-4 space-y-4 md:flex-row md:items-end md:space-x-4">
                <div class="relative w-20 h-20 mr-3 rounded-sm md:block">
                    <?php if (getBannerData()['login_banner'] == 'default_img.jpg' || getBannerData()['login_banner'] == '') { ?>
                        <img class="object-cover w-full h-full rounded-sm" src="<?php echo base_url() . 'uploads/default_img.jpg'; ?>" alt="" loading="lazy" />
                    <?php } else {  ?>
                        <img class="object-cover w-full h-full rounded-sm" src="<?php echo base_url() . 'uploads/banner/' . getBannerData()['login_banner']; ?>" alt="" loading="lazy" />
                    <?php  }  ?>
                    <div class="absolute inset-0 rounded-sm shadow-inner" aria-hidden="true"></div>
                </div>
                <span>
                    <input type='file' name='loginImage' class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </span>
            </div>
        </label>

        <!-- REGIST BANNER  -->
        <label class="block mt-4 text-sm p-5 rounded-lg border-solid border-2 bordert-gray-200">
            <span class="text-gray-700 uppercase font-bold">Registration Banner</span>
            <hr class="my-3">
            <div class="flex flex-col flex-wrap mb-4 space-y-4 md:flex-row md:items-end md:space-x-4">
                <div class="relative w-20 h-20 mr-3 rounded-sm md:block">
                    <?php if (getBannerData()['regist_banner'] == 'default_img.jpg' || getBannerData()['regist_banner'] == '') {  ?>
                        <img class="object-cover w-full h-full rounded-sm" src="<?php echo base_url() . 'uploads/default_img.jpg'; ?>" alt="" loading="lazy" />
                    <?php } else {  ?>
                        <img class="object-cover w-full h-full rounded-sm" src="<?php echo base_url() . 'uploads/banner/' . getBannerData()['regist_banner']; ?>" alt="" loading="lazy" />
                    <?php } ?>
                    <div class="absolute inset-0 rounded-sm shadow-inner" aria-hidden="true"></div>
                </div>
                <span>
                    <input type='file' name='registImage' class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </span>
            </div>
        </label>

        <!-- CONTACT BANNER  -->
        <label class="block mt-4 text-sm p-5 rounded-lg border-solid border-2 bordert-gray-200">
            <span class="text-gray-700 uppercase font-bold">Contact Us Banner</span>
            <hr class="my-3">
            <div class="flex flex-col flex-wrap mb-4 space-y-4 md:flex-row md:items-end md:space-x-4">
                <div class="relative w-20 h-20 mr-3 rounded-sm md:block">
                    <?php if (getBannerData()['contactus_banner'] == 'default_img.jpg' || getBannerData()['contactus_banner'] == '') {  ?>
                        <img class="object-cover w-full h-full rounded-sm" src="<?php echo base_url() . 'uploads/default_img.jpg'; ?>" alt="" loading="lazy" />
                    <?php } else {  ?>
                        <img class="object-cover w-full h-full rounded-sm" src="<?php echo base_url() . 'uploads/banner/' . getBannerData()['contactus_banner']; ?>" alt="" loading="lazy" />
                    <?php } ?>
                    <div class="absolute inset-0 rounded-sm shadow-inner" aria-hidden="true"></div>
                </div>
                <span>
                    <input type='file' name='contactusImage' class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </span>
            </div>
        </label>
    </div>
    <div class="my-3">
        <hr>
    </div>
    <button type="submit" class="inline-block flex flex-row space-x-3 items-center justify-between px-4 py-2 text-sm font-medium rounded-md text-white transition-colors duration-150 bg-gray-800 active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
        Update Banner
    </button>
    <?php echo form_close(); ?>
</div>