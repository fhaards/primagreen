<div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
    <!-- Modal -->
    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden bg-white dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal">
        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->

        <header class="flex justify-end">
            <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                    <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </button>
        </header>
        <!-- Modal body -->
        <?php echo validation_errors(); ?>
        <?php echo form_open_multipart('order/change-status'); ?>
        <div class="mt-4 mb-6">
            <!-- Modal title -->
            <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                Change Status Order
            </p>
            <!-- Modal description -->
            <p class="bg-yellow-300 px-4 rounded-lg text-sm text-gray-700 py-4">
                Warning !! . Be careful when your try to change status order
            </p>
            <div class="py-4 flex flex-col" id="uploadTransferModalBody">
                <div class="flex flex-col lg:flex-row lg:space-x-4">
                    <span class="text-gray-600 font-semibold lg:flex-1">Order Number</span>
                    <div class="lg:flex-1">
                        <span class="text-gray-800 font-bold mt-2 lg:mt-0" id="no_order_pemesanan_modal"></span>
                        <input hidden type="text" id="no_order_pemesanan_modal_input" name="no_pemesanan">
                    </div>
                </div>
                <div class="flex flex-col lg:flex-row lg:space-x-4 mt-2">
                    <span class="text-gray-600 font-semibold lg:flex-1">Change Status to</span>
                    <span class="text-gray-800 font-bold mt-2 lg:flex-1">
                        <label class="block text-sm" id="change_status_order">
                            <?php $array = array("ONHOLD", "PROCESS", "PACKING", "COMPLETE"); ?>
                            <select name="status_baru" class="block w-full text-sm dark:text-gray-300 dark:border-gray-600 bg-gray-100 focus:bg-white dark:bg-gray-700 form-select focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:focus:shadow-outline-gray">
                                <?php
                                foreach ($array as $key => $value) :
                                    echo '<option value="' . $value . '">' . $value . '</option>';
                                endforeach;
                                ?>
                            </select>
                        </label>
                    </span>
                </div>
                <div id="resi_no" class="flex flex-col lg:flex-row lg:space-x-4 mt-2">
                    <span class="text-gray-600 font-semibold lg:flex-1">Resi Number</span>
                    <span class="text-gray-800 font-bold mt-2 lg:flex-1">
                        <label class="block text-sm">
                            <input type="text" name="resi" onchange="changeStatusOrder(this)" class="block w-full text-sm dark:text-gray-300 dark:border-gray-600 bg-gray-100 focus:bg-white form-input focus:border-green-400 focus:outline-none focus:shadow-outline-green " >
                        </label>
                    </span>
                </div>
            </div>

        </div>

        <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
            <button type="submit" class="flex space-x-2 shadow-lg w-full sm:w-auto  items-center px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                <svg class="w-4 h-4 fill-current text-white" aria-hidden="true" fill="" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>
                </svg>
                <span class=""> Change </span>
            </button>
        </footer>
        <?php echo form_close(); ?>

    </div>
</div>