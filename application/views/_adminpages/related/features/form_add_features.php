<?php echo validation_errors(); ?>
<?php echo form_open_multipart('product/add-features', array('class' => 'bg-white shadow-xs rounded-lg px-4 py-2 flex flex-col space-y-4 w-full ')); ?>
<div class="border-b-2 border-gray-200 mb-2  py-4">
    <h1 class="font-bold tracking-wide text-sm text-gray-600">New Features Form</h1>
</div>
<label class="block text-sm">
    <input name="nm_features" required features="text" class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Features Name" />
</label>
<label class="block text-sm">
    <label class="block text-sm p-1 border-2 border-gray-300 border-dashed rounded-md bg-white hover:bg-gray-100">
        <div class="flex flex-row space-x-4 ">
            <svg class="h-6 w-6 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <div class="flex text-sm text-gray-600 px-5">
                <label for="img_features" class="relative cursor-pointer rounded-md font-medium text-indigo-600">
                    <input id="img_features" name="img_features" type="file" class="sr-only">
                    <p class="pl-1">Add Image , PNG , JPG</p>
                </label>
            </div>
        </div>
    </label>
</label>
<label class="block text-sm">
    <select name="status_features" class="block w-full text-sm dark:text-gray-300 dark:border-gray-600 bg-gray-100 focus:bg-white dark:bg-gray-700 form-select focus:border-green-400 focus:outline-none focus:shadow-outline-green">
        <option value="Enabled">Enabled</option>
        <option value="Disabled">Disabled</option>
    </select>
</label>
<label>
    <button type="submit" class="flex space-x-2 items-center shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
        <svg class="w-4 h-4" fill="" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
        <span class="">New Features</span>
    </button>
</label>
<?php echo form_close(); ?>