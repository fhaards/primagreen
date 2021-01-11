<?php echo validation_errors(); ?>
<?php echo form_open_multipart('banner/update-banner/' . getBannerData()['id_banner']); ?>
<div class="md:grid md:grid-cols-3 md:gap-3">
    <input name="baseMainImg" type="hidden" value="<?= getBannerData()['main_banner']; ?>">
    <input name="baseLoginImg" type="hidden" value="<?= getBannerData()['login_banner']; ?>">
    <input name="baseRegistImg" type="hidden" value="<?= getBannerData()['regist_banner']; ?>">
    <input name="baseContactusImg" type="hidden" value="<?= getBannerData()['contactus_banner']; ?>">

    <!-- Main -->
    <label class="block text-sm p-5 border-2 border-gray-300 border-dashed rounded-md bg-white hover:bg-gray-100">
        <div class="text-gray-700 uppercase font-bold mb-2">Main Banner</div>
        <div class="flex flex-col w-full space-y-2">
            <div class="flex w-full h-48 rounded-sm md:block">
                <?php if (getBannerData()['main_banner'] == 'default_img.jpg' || getBannerData()['main_banner'] == '') { ?>
                    <img class="object-cover w-full h-full rounded-md" src="<?php echo base_url() . 'uploads/default_img.jpg'; ?>" alt="" loading="lazy" />
                <?php } else { ?>
                    <img class="object-cover w-full h-full rounded-md" src="<?php echo base_url() . 'uploads/banner/' . getBannerData()['main_banner']; ?>" alt="" loading="lazy" />
                <?php } ?>
            </div>
            <div class="flex flex-row space-x-4 ">
                <svg class="h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div>
                    <div class="flex text-sm text-gray-600">
                        <label for="mainImage" class="relative cursor-pointer rounded-md font-medium text-indigo-600">
                            <span>Upload a file</span>
                            <input id="mainImage" name="mainImage" type="file" class="sr-only">
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">
                        PNG, JPG,   up to 10MB
                    </p>
                </div>
            </div>
        </div>
    </label>

    <!-- LOGIN BANNER  -->
    <label class="block text-sm p-5 border-2 border-gray-300 border-dashed rounded-md bg-white hover:bg-gray-100">
        <div class="text-gray-700 uppercase font-bold mb-2">Login Banner</div>
        <div class="flex flex-col w-full space-y-2">
            <div class="flex w-full h-48 rounded-sm md:block">
                <?php if (getBannerData()['login_banner'] == 'default_img.jpg' || getBannerData()['login_banner'] == '') { ?>
                    <img class="object-cover w-full h-full rounded-md" src="<?php echo base_url() . 'uploads/default_img.jpg'; ?>" alt="" loading="lazy" />
                <?php } else {  ?>
                    <img class="object-cover w-full h-full rounded-md" src="<?php echo base_url() . 'uploads/banner/' . getBannerData()['login_banner']; ?>" alt="" loading="lazy" />
                <?php  }  ?>
            </div>
            <div class="flex flex-row space-x-4 ">
                <svg class="h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div>
                    <div class="flex text-sm text-gray-600">
                        <label for="loginImage" class="relative cursor-pointer rounded-md font-medium text-indigo-600">
                            <span>Upload a file</span>
                            <input id="loginImage" name="loginImage" type="file" class="sr-only">
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">
                        PNG, JPG,   up to 10MB
                    </p>
                </div>
            </div>
        </div>
    </label>

    <!-- REGIST BANNER  -->
    <label class="block text-sm p-5 border-2 border-gray-300 border-dashed rounded-md bg-white hover:bg-gray-100">
        <div class="text-gray-700 uppercase font-bold mb-2">Registration Banner</div>
        <div class="flex flex-col w-full space-y-2">
            <div class="flex w-full h-48 rounded-sm md:block">
                <?php if (getBannerData()['regist_banner'] == 'default_img.jpg' || getBannerData()['regist_banner'] == '') {  ?>
                    <img class="object-cover w-full h-full rounded-md" src="<?php echo base_url() . 'uploads/default_img.jpg'; ?>" alt="" loading="lazy" />
                <?php } else {  ?>
                    <img class="object-cover w-full h-full rounded-md" src="<?php echo base_url() . 'uploads/banner/' . getBannerData()['regist_banner']; ?>" alt="" loading="lazy" />
                <?php } ?>
            </div>
            <div class="flex flex-row space-x-4 ">
                <svg class="h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div>
                    <div class="flex text-sm text-gray-600">
                        <label for="registImage" class="relative cursor-pointer rounded-md font-medium text-indigo-600">
                            <span>Upload a file</span>
                            <input id="registImage" name="registImage" type="file" class="sr-only">
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">
                        PNG, JPG,   up to 10MB
                    </p>
                </div>
            </div>
        </div>
    </label>


    <!-- CONTACT BANNER  -->
    <label class="block text-sm p-5 border-2 border-gray-300 border-dashed rounded-md bg-white hover:bg-gray-100">
        <div class="text-gray-700 uppercase font-bold mb-2">Contact Us Banner</div>
        <div class="flex flex-col w-full space-y-2">
            <div class="flex w-full h-48 rounded-sm md:block">
                <?php if (getBannerData()['contactus_banner'] == 'default_img.jpg' || getBannerData()['contactus_banner'] == '') {  ?>
                    <img class="object-cover w-full h-full rounded-sm" src="<?php echo base_url() . 'uploads/default_img.jpg'; ?>" alt="" loading="lazy" />
                <?php } else {  ?>
                    <img class="object-cover w-full h-full rounded-sm" src="<?php echo base_url() . 'uploads/banner/' . getBannerData()['contactus_banner']; ?>" alt="" loading="lazy" />
                <?php } ?>
            </div>
            <div class="flex flex-row space-x-4 ">
                <svg class="h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div>
                    <div class="flex text-sm text-gray-600">
                        <label for="contactusImage" class="relative cursor-pointer rounded-md font-medium text-indigo-600">
                            <span>Upload a file</span>
                            <input id="contactusImage" name="contactusImage" type="file" class="sr-only">
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">
                        PNG, JPG,   up to 10MB
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
        <svg class="w-4 h-4 text-white" fill="" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
        </svg>
        <span class="hidden lg:block">Update Banner</span>
    </button>
</div>
<?php echo form_close(); ?>