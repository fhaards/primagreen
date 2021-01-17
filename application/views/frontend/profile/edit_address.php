<?php echo form_open('profile/edit-account/' . getUserData()['id_user'],array('class'=>'md:w-1/3')); ?>
<div class="mb-5">
    <h2 class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-sm md:text-xl py-2" href="#">
        Edit Address Book
    </h2>
</div>

<div class="my-2">
    <label>
        <p class="text-gray-600 font-semibold text-sm">Name</p>
        <textarea name="alamat" class="block w-full mt-1 text-sm dark:border-gray-600  focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input"><?= getUserData()['alamat']; ?></textarea>
    </label>
</div>
<div class="py-4">
    <div class="w-full text-center mx-auto mt-4">
        <button type="submit" class="flex space-x-2 items-center shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
            <svg class="w-4 h-4" fill="" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
            </svg>
            <span class="hidden lg:block">Save</span>
        </button>
    </div>
</div>
<?php echo form_close(); ?>