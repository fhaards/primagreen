<div class="flex flex-col mb-5">
    <p class="font-semibold text-gray-700 md:text-lg text-md">Hello, <strong><?= getUserData()['nama']; ?></strong> !</p>
    <p class="text-xs md:text-sm font-semibold text-gray-500 text-justify">
        From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.
    </p>
</div>

<div class="flex flex-col">
    <div class="border-2 py-2 px-5 my-5 border-gray-300 rounded-md">
        <p class="font-semibold text-gray-700 md:text-lg text-md"> Account Information</p>
    </div>
    <div class="grid gid-cols-3">
        <div class="grid gap-4 grid-flow-col auto-rows-max overflow-x-scroll pb-5 text-xs md:text-sm md:overflow-x-hidden">
            <div class="flex flex-col md:w-full w-48 py-2 px-5 border-gray-300 border-2 rounded-md">
                <div class="mb-4">
                    <h2 class="font-semibold text-gray-500">Personal Information </h2>
                </div>
                <label><?= getUserData()['nama']; ?> </label>
                <label><?= getUserData()['email']; ?> </label>
                <label><?= getUserData()['tlp']; ?> </label>
                <a href="<?= base_url() . 'profile/edit-address'; ?>" class="underline text-blue-600">Edit </a>
            </div>
            <div class="flex flex-col md:w-auto w-48 p-2 border-gray-300 border-2 rounded-md">
                <?php $this->load->view('frontend/profile/content_password'); ?>
            </div>
            <div class="flex flex-col md:w-auto w-48 p-2 border-gray-300 border-2 rounded-md">
                <div class="mb-4">
                    <h2 class="font-semibold text-gray-500">Address </h2>
                </div>
                <?php if (getUserData()['status_user'] == 0) : ?>
                    <a href="<?= base_url() . 'profile/edit-address'; ?>" class="underline text-blue-600">Add Address </a>
                <?php else : ?>
                    <label><?= getUserData()['alamat']; ?> </label>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="flex flex-col mb-5">
    <div class="border-2 p-2 my-5 border-gray-300 rounded-md">
        <p class="font-semibold text-gray-700 md:text-lg text-md"> Recently Order </p>
    </div>
    <?php $this->load->view('frontend/profile/read_order'); ?>
</div>