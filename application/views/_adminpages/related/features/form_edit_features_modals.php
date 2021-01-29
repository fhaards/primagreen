<div x-show="isModalEditFeaturesOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
    <!-- Modal -->
    <div x-show="isModalEditFeaturesOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden bg-white dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal-edit-features">
        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->

        <?php echo form_open_multipart('product/edit-features/'); ?>
        <div class="flex flex-col text-sm">
            <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                Edit Features
            </p>
            <input type="text" name="nameFeatures" value="" class="text-sm focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" />
            <div class="flex flex-row space-x-4 text-sm text-gray-600">
                <?php
                if (!empty($featuresLists['img_features'])) :
                    $getImageFeaturesUrl = 'uploads/features/' . $featuresLists['img_features'];
                    $styleColor = "text-gray-600";
                    $textImage = "Edit Image, PNG , JPG";
                else :
                    $getImageFeaturesUrl = 'uploads/default_img.jpg';
                    $styleColor = "text-indigo-600";
                    $textImage = "Add Image , PNG , JPG";
                endif;
                ?>
                <input type="text" name="base_img_features" value="" />
                <div class="relative h-6 w-6  rounded-sm md:block">
                    <img class="object-cover w-full h-full rounded-sm" src="<?= base_url($getImageFeaturesUrl); ?>" alt="" loading="lazy" />
                    <div class="absolute inset-0 rounded-sm shadow-inner" aria-hidden="true"></div>
                </div>
                <label for="img_features_edit" class="relative cursor-pointer rounded-md font-medium <?= $styleColor; ?>">
                    <input id="img_features_edit" name="img_features_edit" type="file" class="sr-only">
                    <p class="pl-1 md:block hidden"> <?= $textImage; ?></p>
                </label>
                <svg class="h-6 w-6 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
            <button type="submit" class="flex items-center justify-between px-1 py-1 text-sm font-medium leading-5 rounded-md shadow-xs text-white transition-colors duration-150 bg-gray-800 active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                <svg class="w-4 h-4 fill-current text-white" aria-hidden="true" fill="" viewBox="0 0 20 20">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                </svg>
            </button>
        </div>
        <?php echo form_close(); ?>

    </div>
</div>