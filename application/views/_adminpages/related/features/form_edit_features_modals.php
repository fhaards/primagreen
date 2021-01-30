<div x-show="isModalEditFeaturesOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
    <!-- Modal -->
    <div x-show="isModalEditFeaturesOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden bg-white dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal-edit-features">
        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
        <header class="flex justify-end">
            <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                    <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </button>
        </header>

        <?php echo form_open_multipart('product/edit-features/'); ?>
        <h1 class="mb-2 text-lg font-semibold text-gray-700 py-2 my-2 border-b-2 border-gray-300">
            Edit Features
        </h1>
        <div class="flex flex-col text-sm">

            <label class="grid grid-cols-2 gap-5 mb-4 items-center">
                <span class="text-gray-600 font-semibold lg:flex-1">Features Name</span>
                <input type="hidden" id="idFeaturesEdit" name="idFeaturesEdit" value="">
                <input type="text" id="nmFeaturesEdit" name="nameFeatures" value="" class="text-sm focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" />
            </label>

            <label class="flex flex-col space-y-2">
                <span class="text-gray-600 font-semibold lg:flex-1">Features Image</span>
                <div class="grid grid-cols-2 gap-5 text-sm text-gray-600 p-4 border-2 border-gray-300 border-dashed rounded-md">
                    <input type="hidden" id="baseUrlImgFeatures" name="base_img_features">
                    <div class="md:w-48 md:h-48 h-20 w-20 rounded-md">
                        <img id="loadImgFeatureEdit" class="object-cover w-full h-full rounded-md" src="<?= base_url('uploads/default.jpg'); ?>">
                    </div>
                    <div class="flex flex-row space-x-4 items-center">
                        <svg class="h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="items-center">
                            <div class="flex flex-col text-sm text-gray-600">
                                <label for="img_features_edit" class="relative cursor-pointer rounded-md font-medium text-indigo-600">
                                    <span>Upload a file</span>
                                    <input id="img_features_edit" name="img_features_edit" type="file" class="sr-only">
                                </label>
                            </div>
                            <p class="text-xs text-gray-500">
                                PNG, JPG, JPEG up to 5MB
                            </p>
                        </div>
                    </div>
                </div>
            </label>

        </div>
        <div class="flex justify-end py-2 my-2 border-t-2 border-gray-300">
            <button type="submit" class="flex space-x-2 shadow-lg w-full sm:w-auto  items-center px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                <svg class="w-4 h-4 fill-current text-white" aria-hidden="true" fill="" viewBox="0 0 20 20">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                </svg>
                <span class=""> Edit </span>
            </button>
        </div>

        <?php echo form_close(); ?>

    </div>
</div>