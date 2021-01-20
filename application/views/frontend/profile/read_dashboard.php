<div class="flex flex-col mb-5">
    <p class="font-semibold text-gray-700 md:text-lg text-md">Hello, <strong><?= getUserData()['nama']; ?></strong> !</p>
    <p class="text-xs md:text-sm font-semibold text-gray-500 text-justify">
        From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.
    </p>
</div>

<div class="flex flex-col mb-5 py-3 border-t-2 border-gray-300">
    <div>
        <p class="font-semibold text-gray-700 md:text-lg text-md"> Recently Order </p>
    </div>
    <?php $this->load->view('frontend/profile/read_order');?>
</div>