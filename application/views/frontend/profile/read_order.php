<div class="flex w-1/3 mb-4">
    <nav class="w-full top-0 py-1">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
            <span class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                My Order
            </span>
        </div>
    </nav>
</div>

<?php if(empty($getUser)): ?>
    <div class="">
        <span class="text-gray-600 font-semibold">You don't have any order :( </span> <a class="ml-4 underline text-blue-600" href="<?php echo base_url().'store/show-all-items'; ?>">go to store</a>
    </div>
<?php endif;?>

<?php foreach ($getUser as $getUsers) : ?>
    <?php
    ?>
    <div class="flex w-full flex-col mb-5">
        <a href="<?php echo site_url('profile/detail-order/' . $getUsers['no_pemesanan']); ?>" class="flex flex-row flex-wrap rounded-lg shadow-xs <?= status_bg_color($getUsers['status']); ?>">
            <div class="lg:flex-1 flex flex-col ml-2 mr-3 p-2">
                <span class="text-gray-600 font-semibold lg:text-sm text-xs">Order Date</span>
                <span class="text-gray-800 font-bold lg:text-base text-xs"><?= $getUsers['tgl_pesan']; ?></span>
            </div>
            <div class="lg:flex-1 flex flex-col p-2">
                <span class="text-gray-600 font-semibold lg:text-sm text-xs">Order ID</span>
                <span class="text-gray-800 font-bold lg:text-base text-xs"><?= $getUsers['no_pemesanan']; ?></span>
            </div>
            <div class="lg:flex-1 flex flex-col p-2">
                <span class="text-gray-600 font-semibold lg:text-sm text-xs">Status</span>
                <span class="text-gray-900 font-bold">
                    <span class="<?= status_order_color($getUsers['status']); ?>"><?= $getUsers['status']; ?></span>
                </span>
            </div>
        </a>
    </div>
<?php endforeach; ?>