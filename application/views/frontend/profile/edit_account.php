<?php echo validation_errors(); ?>
<?php echo form_open('profile/edit-account', array('class' => 'my-0')); ?>
<div class="grid grid-cols-1 md:grid-cols-3 gap-10">
    <div class="flex flex-col">
        <div class="mb-4">
            <h2 class="font-semibold text-gray-500">Personal Information </h2>
        </div>
        <div class="mb-2">
            <label>
                <p class="text-gray-600 font-semibold text-sm">Name</p>
                <input type="hidden" name="id_user" value="<?= getUserData()['id_user']; ?>" />
                <input name="name" type="text" value="<?= getUserData()['nama']; ?>" class="block w-full mt-1 text-sm focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" />
            </label>
        </div>
        <div class="mb-2">
            <label>
                <p class="text-gray-600 font-semibold text-sm">Email</p>
                <input name="email" type="email" value="<?= getUserData()['email']; ?>" class="block w-full mt-1 text-sm focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" />
            </label>
        </div>
        <div class="mb-2">
            <label>
                <p class="text-gray-600 font-semibold text-sm">Telephone</p>
                <input name="tlp" type="text" value="<?= getUserData()['tlp']; ?>" class="block w-full mt-1 text-sm focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" />
            </label>
        </div>

    </div>

    <!-- CHANGE PASSWORD -->
    <?php $this->load->view('frontend/profile/content_password'); ?>
    <div></div>
</div>
<div></div>
<div class="grid grid-cols-1 border-t-2 border-gray-300 py-4 my-4">
    <div class="w-full text-center mx-auto">
        <button type="submit" class="flex space-x-2 items-center shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
            <svg class="w-4 h-4" fill="" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
            </svg>
            <span class="hidden lg:block">Save</span>
        </button>
    </div>
</div>

<?php echo form_close(); ?>