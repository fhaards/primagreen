<div class="w-full bg-white overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto content-center px-4 py-4">
        <?php
        $checkCompany = $this->db->count_all('company');
        if ($checkCompany == 0) {
        ?>
            <div class="flex flex-col flex-wrap mb-4 space-y-4 md:flex-row md:items-end md:space-x-4">
                <div class='flex-1'></div>
                <div>
                    <p class="mb-2">Don't have any data</p>
                    <a href="<?php echo site_url('company/add-randomly/'); ?>" class="block px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                        Add Randomly
                    </a>
                </div>
                <div class='flex-1'></div>
            </div>
        <?php
        } else {
            $this->load->view('_adminpages/company/detail_company');
            // require_once(APPPATH . 'views/company/detail_comapny.php');
        }
        ?>
    </div>
</div>
