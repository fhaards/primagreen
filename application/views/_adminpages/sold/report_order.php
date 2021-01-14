<div x-show="isModalReportOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
    <div x-show="isModalReportOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden bg-white dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal-report">
        <header class="flex justify-end">
            <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                    <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </button>
        </header>
        <!-- Modal body -->
        <?php echo validation_errors(); ?>
        <?php echo form_open('report/report-order-adm', array('target' => '_blank')); ?>
        <div class="mt-4 mb-6 flex flex-col">
            <!-- Modal title -->
            <div class="">
                <p class="text-lg font-semibold text-gray-700">Report Order Purchased</p>
                <p class="mb-2 text-sm font-semibold text-gray-500"> by Month and Year</p>
            </div>
            <div class="py-4 flex flex-col" id="uploadTransferModalBody">
                <div class="flex flex-col lg:flex-row lg:space-x-4 mt-2">
                    <span class="text-gray-600 font-semibold lg:flex-1">Select Month</span>
                    <span class="text-gray-800 font-bold md:mt-0 mt-2 lg:flex-1">
                        <label class="block text-sm" id="change_status_order">
                            <?php $array = array(
                                "01" => "JANUARY", "02" => "FEBRUARY",
                                "03" => "MARCH", "04" => "APRIL",
                                "05" => "MEI", "06" => "JUNE",
                                "07" => "JULY", "08" => "AUGUST",
                                "08" => "SEPTEMBER", "10" => "OCTOBER",
                                "09" => "NOVEMBER", "12" => "DECEMBER"
                            ); ?>
                            <select name="month" class="block w-full text-sm  bg-gray-100 focus:bg-white dark:bg-gray-700 form-select focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:focus:shadow-outline-gray">
                                <?php
                                foreach ($array as $key => $value) :
                                    echo '<option value="' . $key . '">' . $value . '</option>';
                                endforeach;
                                ?>
                            </select>
                        </label>
                    </span>
                </div>
            </div>

            <div class="py-4 flex flex-col" id="uploadTransferModalBody">
                <div class="flex flex-col lg:flex-row lg:space-x-4 mt-2">
                    <span class="text-gray-600 font-semibold lg:flex-1">Select Year</span>
                    <span class="text-gray-800 font-bold md:mt-0 mt-2 lg:flex-1">
                        <label class="block text-sm" id="change_status_order">
                            <?php $array = array("2019", "2020", "2021", "2022"); ?>
                            <select name="year" class="block w-full text-sm  bg-gray-100 focus:bg-white dark:bg-gray-700 form-select focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:focus:shadow-outline-gray">
                                <?php
                                foreach ($array as $key => $value) :
                                    echo '<option value="' . $value . '">' . $value . '</option>';
                                endforeach;
                                ?>
                            </select>
                        </label>
                    </span>
                </div>
            </div>

        </div>

        <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
            <button type="submit" class="flex space-x-2 shadow-lg w-full sm:w-auto  items-center px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                <svg class="w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                <span> Report Order</span>
            </button>
        </footer>
        <?php echo form_close(); ?>
    </div>
</div>