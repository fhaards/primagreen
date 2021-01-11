<div class="px-4 py-3 mb-8 rounded-lg">
    <div class="grid gap-4 lg:grid-cols-1">
        <h3 class="">Details</h3>
        <hr>
    </div>
    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('company/update-profile/' . getCompanyData()['id']); ?>
    <div class="grid gap-4 lg:grid-cols-2 mt-3">
        <div>
            <label class="block text-sm py-2">
                <span class="text-gray-700 dark:text-gray-400">Company Name</span>
                <input name="comp_nm" value="<?= getCompanyData()['comp_nm']; ?>" type="text" class="block w-full mt-1 text-sm bg-gray-200 focus:bg-white focus:border-green-400 focus:outline-none focus:shadow-outline-green form-input" />
            </label>
        </div>
        <div>
            <label class="block text-sm py-2">
                <span class="text-gray-700 dark:text-gray-400">Unique Code</span>
                <input name="unique_code" value="<?= getCompanyData()['unique_code']; ?>" type="text" class="block w-full mt-1 text-sm bg-gray-200 focus:bg-white focus:border-green-400 focus:outline-none focus:shadow-outline-green   form-input" />
            </label>
        </div>
    </div>
    <div class="grid gap-4 lg:grid-cols-2">
        <div class="">
            <label class="block text-sm py-2">
                <span class="text-gray-700 dark:text-gray-400">Whatsapp</span>
                <input name="telp" value="<?= getCompanyData()['telp']; ?>" type="text" class="block w-full mt-1 text-sm focus:border-green-400 bg-gray-200 focus:bg-white focus:outline-none focus:shadow-outline-green   form-input" />
            </label>
            <label class="block text-sm py-2">
                <span class="text-gray-700 dark:text-gray-400">Instagram</span>
                <input name="instagram" value="<?= getCompanyData()['instagram']; ?>" type="text" class="block w-full mt-1 text-sm bg-gray-200 focus:bg-white focus:border-green-400 focus:outline-none focus:shadow-outline-green   form-input" />
            </label>
        </div>
        <div class="">
            <label class="block text-sm py-2">
                <span class="text-gray-700 dark:text-gray-400">Address</span>
                <textarea name="address" type="number" class="block w-full mt-1 text-sm dark:text-gray-300 form-textarea bg-gray-200 focus:bg-white focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:focus:shadow-outline-gray" rows="5"><?= getCompanyData()['address']; ?></textarea>
            </label>
        </div>
    </div>
    <div class="grid gap-4 lg:grid-cols-1">
        <label class="block text-sm py-2">
            <span class="text-gray-700 dark:text-gray-400">About Us</span>
            <textarea name="about" type="number" class="block w-full mt-1 text-sm dark:text-gray-300 form-textarea bg-gray-200 focus:bg-white focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:focus:shadow-outline-gray" rows="5"><?= getCompanyData()['about']; ?></textarea>
        </label>
    </div>

    <div class="grid gap-4 lg:grid-cols-2">
        <input name="baseLogo" type="text" hidden value="<?= getCompanyData()['logo']; ?>">
        <input name="baseFavIco" type="text" hidden value="<?= getCompanyData()['icon']; ?>">
        <!-- LOGO -->
        <label class="block mt-4 text-sm p-5 rounded-lg border-solid border-2 bordert-gray-200">
            <span class="text-gray-700 uppercase font-bold">Logo</span>
            <hr class="my-3">
            <div class="flex flex-col flex-wrap mb-4 space-y-4 md:flex-row md:items-end md:space-x-4">
                <div class="relative w-20 h-20 mr-3 rounded-sm md:block">
                    <?php
                    if (getCompanyData()['logo'] == '') {
                    ?>
                        <img class="object-cover w-full h-full rounded-sm" src="<?php echo base_url() . 'uploads/default_img.jpg'; ?>" alt="" loading="lazy" />
                    <?php
                    } else {
                    ?>
                        <img class="object-cover mx-auto rounded-sm" src="<?php echo base_url() . 'uploads/company/' . getCompanyData()['logo']; ?>" alt="" loading="lazy" />
                    <?php
                    }
                    ?>
                    <div class="absolute inset-0 rounded-sm shadow-inner" aria-hidden="true"></div>
                </div>
                <span>
                    <input type='file' name='logoProfile' size='20' class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </span>
            </div>
        </label>
        <!-- FAVICO OR ICON  -->
        <label class="block mt-4 text-sm p-5 rounded-lg border-solid border-2 bordert-gray-200">
            <span class="text-gray-700 uppercase font-bold">Favico / Icon</span>
            <hr class="my-3">
            <div class="flex flex-col flex-wrap mb-4 space-y-4 md:flex-row md:items-end md:space-x-4">
                <div class="relative w-20 h-20 mr-3 rounded-sm md:block">
                    <?php
                    if (getCompanyData()['icon'] == '') {
                    ?>
                        <img class="object-cover w-full h-full rounded-sm" src="<?php echo base_url() . 'uploads/default_img.jpg'; ?>" alt="" loading="lazy" />
                    <?php
                    } else {
                    ?>
                        <img class="object-cover w-full h-full rounded-sm" src="<?php echo base_url() . 'uploads/company/' . getCompanyData()['icon']; ?>" alt="" loading="lazy" />
                    <?php
                    }
                    ?>
                    <div class="absolute inset-0 rounded-sm shadow-inner" aria-hidden="true"></div>
                </div>
                <span>
                    <p>* The format of file must be .ico </p>
                    <input type='file' name='favIcoProfile' size='20' class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </span>
            </div>
        </label>
    </div>

    <hr class="mt-6"></hr>
    
    <div class="w-full text-center mx-auto mt-4">
        <button type="submit" class="flex space-x-2 items-center shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
            <svg class="w-4 h-4 text-white" fill="" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
            </svg>
            <span class="hidden lg:block">Update Profile</span>
        </button>
    </div>
    <?php form_close(); ?>
</div>