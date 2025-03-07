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
        <?php echo form_open_multipart('profile/upload-transfer'); ?>
        <div class="mt-4 mb-6">
            <!-- Modal title -->
            <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                Transfer Proof
            </p>
            <!-- Modal description -->
            <p class="text-sm text-gray-700 dark:text-gray-400 py-4">
                Upload a transfer proof for continue youre order.
                After this we will check youre transfer and youre status was change to Process.
            </p>
            <div class=" border-t border-gray-400 py-4 flex flex-col" id="uploadTransferModalBody">
                <div class="flex flex-col">
                    <span class="text-gray-600 font-semibold">Order Number</span>
                    <span class="text-gray-800 font-bold mt-2" id="upNoOrderInput2"></span>
                    <input type="text" hidden id="upNoOrderInput" name="no_pemesanan">
                </div>
                <div class="flex flex-col mt-2">
                    <span class="text-gray-600 font-semibold">Notes</span>
                    <span class="text-gray-800 font-bold mt-2">
                        <label class="block text-sm">
                            <textarea name="ket" id="upKetInput" class="block w-full text-sm dark:text-gray-300 bg-gray-100 focus:bg-white form-textarea focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:focus:shadow-outline-gray" rows="3" placeholder="Enter some long form content."></textarea>
                        </label>
                    </span>
                </div>
                <div class="flex flex-col mt-4">
                    <span class="text-gray-600 font-semibold">Transfer Proof</span>
                    <label class="block text-sm">
                        <span>
                            <input required type='file' name='transfer_prof' size='20' class="block w-full mt-1 text-sm bg-gray-100 focus:bg-white  dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                        </span>
                    </label>
                </div>
            </div>

        </div>

        <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
            <button @click="closeModal" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                Cancel
            </button>
            <button type="submit" class="flex space-x-2 shadow-lg w-full sm:w-auto  items-center px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                <svg class="w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <span class=""> Upload </span>
            </button>
        </footer>
        <?php echo form_close(); ?>

    </div>
</div>