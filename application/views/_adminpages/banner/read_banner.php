<div class="my-6">
    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Banner
    </h2>
    <p class="">Image Gallery</p>
</div>
<div class="py-3"></div>
<div class="w-full bg-white overflow-hidden rounded-lg shadow-md">
    <div class="w-full overflow-x-auto content-center px-4 py-4">
        <?php
        $checkBanner = $this->db->count_all('banner');
        if (empty($checkBanner)) {
        ?>
            <div class="flex flex-col flex-wrap mb-4 space-y-4 md:flex-row md:items-end md:space-x-4">
                <div class='flex-1'></div>
                <div>
                    <p class="mb-2">Don't have any data</p>
                    <a href="<?php echo site_url('banner/add-randomly/'); ?>" class="block px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                        Add Randomly
                    </a>
                </div>
                <div class='flex-1'></div>
            </div>
        <?php
        } else {
            $this->load->view('_adminpages/banner/detail_banner');
        }
        ?>
    </div>
</div>


