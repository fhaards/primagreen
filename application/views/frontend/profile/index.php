<div class="container px-6 py-3 mx-auto grid overflow-y-auto h-full" style="max-height:600px;">
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
                    <ul class="md:text-sm text-xs font-semibold">
                        <?php
                        $profile_page = $this->uri->segment(2);
                        $active = "transition-colors duration-150 text-green-500 hover:text-green-700 border-b border-green-500";
                        $inactive = "transition-colors duration-150 text-gray-800 hover:text-green-500 border-b border-gray-300";
                        ?>
                        <li><a href="<?= base_url() . 'profile/user-dashboard'; ?>" class="inline-block py-2 w-full <?= ($profile_page == 'user-dashboard') ? $active :  $inactive; ?>"> Account Dashboard </a></li>
                        <li><a href="<?= base_url() . 'profile/user-account'; ?>" class="inline-block py-2 w-full <?= ($profile_page == 'user-account') ? $active :  $inactive; ?>"> Account Information </a></li>
                        <li><a href="<?= base_url() . 'profile/edit-address'; ?>" class="inline-block py-2 w-full <?= ($profile_page == 'edit-address') ? $active :  $inactive; ?>"> Address Book </a></li>
                        <li><a href="<?= base_url() . 'profile/order-history'; ?>" class="inline-block py-2 w-full <?= ($profile_page == 'order-history') ? $active :  $inactive; ?>"> My Order </a></li>
                    </ul>
                </div>
            </div>

            <div class="flex-1 flex flex-col">
                <div class="flex flex-col">
                    <div class="mb-5">
                        <h2 class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-sm md:text-xl py-2">
                            <?php echo $profile_title; ?>
                        </h2>
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