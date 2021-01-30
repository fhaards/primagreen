<?php echo validation_errors(); ?>
<?php echo form_open('product/add-type', array('class' => 'bg-white shadow-xs rounded-lg px-4 py-2 flex flex-col space-y-4 ')); ?>
<div class="border-b-2 border-gray-200 mb-2  py-4">
    <h1 class="font-bold tracking-wide text-sm text-gray-600">New Type Form</h1>
</div>
<label class="block text-sm">
    <input name="nm_type" required type="text" class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Type Name" />
</label>
<label class="block text-sm">
    <select name="status_type" class="block w-full text-sm dark:text-gray-300 dark:border-gray-600 bg-gray-100 focus:bg-white dark:bg-gray-700 form-select focus:border-green-400 focus:outline-none focus:shadow-outline-green">
        <option value="Enabled">Enabled</option>
        <option value="Disabled">Disabled</option>
    </select>
</label>
<label>
    <button type="submit" class="flex space-x-2 items-center shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
        <svg class="w-4 h-4" fill="" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
        <span class="">New Type</span>
    </button>
</label>
<?php echo form_close(); ?>
