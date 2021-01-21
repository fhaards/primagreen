<div class="container px-6 py-3 mx-auto grid overflow-y-auto max-h-screen scrollbar-none">
    <div class="w-full mx-auto mt-20 md:mt-24">
        <?php echo $breadcrumb; ?>
        <div class="container flex flex-row md:space-x-10 my-5 py-5">

            <div class="flex flex-col w-1/5 mr-5 md:block hidden">
                <div id="new-items" class="w-full top-0 py-1">
                    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mb-5">
                        <div class="flex flex-col">
                            <h2 class="uppercase tracking-wide no-underline hover:no-underline font-black text-sm md:text-xl ">
                                My Account
                            </h2>
                        </div>
                    </div>
                    <ul class="md:text-sm text-xs font-semibold  border-r-2 border-gray-300">
                        <?php
                        $profile_page = $this->uri->segment(2);
                        $active = "transition-colors bg-gray-200 px-4 duration-150 font-bold text-gray-800 hover:text-gray-700";
                        $inactive = "transition-colors duration-150 px-4 text-gray-800 hover:bg-gray-100 hover:text-gray-700 border-b";
                        ?>
                        <li><a href="<?= base_url() . 'profile/user-dashboard'; ?>" class="inline-block py-2 w-full <?= ($profile_page == 'user-dashboard') ? $active :  $inactive; ?>"> Account Dashboard </a></li>
                        <li>
                            <a href="<?= base_url() . 'profile/user-account'; ?>" class="inline-block py-2 w-full flex flex-row <?= ($profile_page == 'user-account' || $profile_page == 'edit-account') ? $active :  $inactive; ?>">
                                <span class="flex-1 ">Account Information</span>
                                <svg class="h-3 md:h-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url() . 'profile/edit-address'; ?>" class="inline-block py-2 w-full flex flex-row <?= ($profile_page == 'edit-address') ? $active :  $inactive; ?>">
                                <span class="flex-1 ">Address Book</span>
                                <?= status_user_info_icon_address(getUserData()['alamat']);?>
                            </a>
                        </li>
                        <li><a href="<?= base_url() . 'profile/order-history'; ?>" class="inline-block py-2 w-full <?= ($profile_page == 'order-history') ? $active :  $inactive; ?>"> My Order </a></li>
                    </ul>
                </div>
            </div>

            <div class="flex-1 flex flex-col">
                <div class="flex flex-col">
                    <div class="mb-5 flex flex-col md:flex-row  md:space-x-10">
                        <h2 class="uppercase md:flex-1 tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-sm md:text-xl py-1">
                            <?php echo $profile_title; ?>
                        </h2>
                        <?= status_user_info_longtext(getUserData()['status_user']); ?>
                    </div>

                    <?php $this->load->view($profile_content); ?>
                </div>
            </div>


        </div>

    </div>
</div>

<div class="flex flex-col mt-8 w-full">
    <!-- <?php $this->load->view('frontend/profile/read_order'); ?> -->
</div>