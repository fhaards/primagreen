<?php echo validation_errors(); ?>
<?php echo form_open_multipart('settings/update-company-profile/' . getCompanyData()['id'], array('class' => 'grid grid-cols-1 w-full gap-4')); ?>

<div class="grid md:grid-cols-2 gap-4">
    <div class="grid gap-4 lg:grid-cols-1 bg-white px-4 py-3 rounded-md shadow-xs">
        <div>
            <label class="block text-sm py-2">
                <span class="text-gray-700 dark:text-gray-400">Company Name</span>
                <input name="comp_nm" value="<?= getCompanyData()['comp_nm']; ?>" type="text" class="block w-full mt-1 text-sm bg-gray-200 focus:bg-white focus:border-green-400 focus:outline-none focus:shadow-outline-green form-input" />
            </label>

            <label class="block text-sm py-2">
                <span class="text-gray-700 dark:text-gray-400">Whatsapp</span>
                <input name="telp" value="<?= getCompanyData()['telp']; ?>" type="text" class="block w-full mt-1 text-sm focus:border-green-400 bg-gray-200 focus:bg-white focus:outline-none focus:shadow-outline-green   form-input" />
            </label>
            <label class="block text-sm py-2">
                <span class="text-gray-700 dark:text-gray-400">Instagram</span>
                <input name="instagram" value="<?= getCompanyData()['instagram']; ?>" type="text" class="block w-full mt-1 text-sm bg-gray-200 focus:bg-white focus:border-green-400 focus:outline-none focus:shadow-outline-green   form-input" />
            </label>
            <label class="block text-sm py-2">
                <span class="text-gray-700 dark:text-gray-400">Unique Code</span>
                <input name="unique_code" value="<?= getCompanyData()['unique_code']; ?>" type="text" class="block w-full mt-1 text-sm bg-gray-200 focus:bg-white focus:border-green-400 focus:outline-none focus:shadow-outline-green   form-input" />
            </label>
        </div>
        <div>
            <label class="block text-sm py-2">
                <span class="text-gray-700 dark:text-gray-400">Address</span>
                <textarea name="address" type="number" class="tiny-mce block w-full mt-1 text-sm dark:text-gray-300 form-textarea bg-gray-200 focus:bg-white focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:focus:shadow-outline-gray"><?= getCompanyData()['address']; ?></textarea>
            </label>
        </div>
    </div>

    <div class="grid gap-4 lg:grid-cols-1">
        <input name="baseLogo" type="text" hidden value="<?= getCompanyData()['logo']; ?>">
        <input name="baseFavIco" type="text" hidden value="<?= getCompanyData()['icon']; ?>">
        <!-- LOGO -->
        <label class="block text-sm p-5 border-2 border-gray-300 border-dashed rounded-md bg-white hover:bg-gray-100">
            <div class="text-gray-700 uppercase font-bold mb-2">Logo</div>
            <div class="flex flex-col w-full space-y-2">
                <div class="flex w-full rounded-sm md:block p-5 items-center">
                    <?php if (getCompanyData()['logo'] == '') { ?>
                        <img class="object-cover bg-white p-5 rounded-md" src="<?php echo base_url() . 'uploads/default_img.jpg'; ?>" alt="" loading="lazy" />
                    <?php  } else {  ?>
                        <img class="object-cover mx-auto  bg-white p-5  rounded-md" src="<?php echo base_url() . 'uploads/company/' . getCompanyData()['logo']; ?>" alt="" loading="lazy" />
                    <?php }  ?>
                </div>
                <div class="flex flex-row space-x-4 ">
                    <svg class="h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div>
                        <div class="flex text-sm text-gray-600">
                            <label for="logoProfile" class="relative cursor-pointer rounded-md font-medium text-indigo-600">
                                <span>Upload a file</span>
                                <input id="logoProfile" name="logoProfile" type="file" class="sr-only">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">
                            PNG, JPG, up to 10MB
                        </p>
                    </div>
                </div>
            </div>
        </label>

        <!-- FAVICO OR ICON  -->
        <label class="block text-sm p-5 border-2 border-gray-300 border-dashed rounded-md bg-white hover:bg-gray-100">
            <div class="text-gray-700 uppercase font-bold mb-2">Favico / Icon</div>
            <div class="flex flex-col w-fullspace-y-2">
                <div class="flex w-full rounded-sm md:block p-5 items-center">
                    <?php if (getCompanyData()['icon'] == '') { ?>
                        <img class="object-cover bg-white p-5 rounded-md" src="<?php echo base_url() . 'uploads/default_img.jpg'; ?>" alt="" loading="lazy" />
                    <?php  } else {  ?>
                        <img class="object-cover mx-auto h-20  bg-white p-5 rounded-md" src="<?php echo base_url() . 'uploads/company/' . getCompanyData()['icon']; ?>" alt="" loading="lazy" />
                    <?php }  ?>
                </div>
                <div class="flex flex-row space-x-4 ">
                    <svg class="h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div>
                        <div class="flex text-sm text-gray-600">
                            <label for="favIcoProfile" class="relative cursor-pointer rounded-md font-medium text-indigo-600">
                                <span>Upload a file</span>
                                <input id="favIcoProfile" name="favIcoProfile" type="file" class="sr-only">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">
                            ICO Format
                        </p>
                    </div>
                </div>
            </div>
        </label>
    </div>
</div>

<div class="grid gap-4 lg:grid-cols-1 bg-white px-4 py-3 rounded-md shadow-xs">
    <label class="block text-sm py-2">
        <div class="text-gray-700 dark:text-gray-400 mb-5">About Us</div>
        <textarea  name="about" type="number" class="tiny-mce block w-full h-screen mt-1 text-sm dark:text-gray-300 form-textarea bg-gray-200 focus:bg-white focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:focus:shadow-outline-gray"><?= getCompanyData()['about']; ?></textarea>
    </label>
</div>

<hr class="mt-6"></hr>

<div class="flex w-full text-center mx-auto mt-4">
    <button type="submit" class="flex space-x-2 items-center shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
        <svg class="w-4 h-4 text-white" fill="" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
        </svg>
        <span class="hidden lg:block">Update Profile</span>
    </button>
</div>
<?php form_close(); ?>