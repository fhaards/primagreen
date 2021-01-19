<?php if (empty($getUser)) : ?>
    <div class="">
        <span class="text-gray-600 font-semibold">You don't have any order :( </span> <a class="ml-4 underline text-blue-600" href="<?php echo base_url() . 'store/product-list'; ?>">go to store</a>
    </div>
<?php else : ?>
    <div class="grid grid-cols-3 gap-4 p-1 bg-gray-800 text-white rounded-sm shadow-xs border border-gray-300 font-bold mb-1">
        <label class="mx-auto">Order Date</label>
        <label class="mx-auto">Order ID</label>
        <label class="mx-auto">Status</label>
    </div>

    <?php foreach ($getUser as $getUsers) : ?>
        <a href="<?php echo site_url('profile/detail-order/' . $getUsers['no_pemesanan']); ?>" class="grid grid-cols-3 gap-4 p-1 my-1 bg-gray-100 items-center rounded-md py-4 <?= status_bg_color($getUsers['status']); ?>">
            <span class="text-gray-800 font-bold lg:text-base text-xs mx-auto"><?= strftime("%d %B %Y | %H:%M", strtotime($getUsers['tgl_pesan'])); ?></span>
            <span class="text-gray-800 font-bold lg:text-base text-xs mx-auto"><?= $getUsers['no_pemesanan']; ?></span>
            <?= get_status_order($getUsers['status']); ?>
        </a>
    <?php endforeach; ?>

    <div class="w-full mx-auto py-2 mt-10">
        <div class="mx-auto">
            <?php echo $this->pagination->create_links(); ?>
        </div>

    </div>

<?php endif; ?>