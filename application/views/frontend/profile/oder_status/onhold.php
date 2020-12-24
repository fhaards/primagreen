<?php foreach ($getOrder_Onhold as $keyOrder_Onhold) : ?>
    <?php
    ?>
    <div class="flex w-full flex-col mb-5">
        <a href="<?php echo site_url('profile/detail-order/' . $keyOrder_Onhold['no_pemesanan']); ?>" class="flex flex-row flex-wrap rounded-lg shadow-xs <?= status_bg_color($keyOrder_Onhold['status']); ?>">
            <div class="lg:flex-1 flex flex-col ml-2 mr-3 p-2">
                <span class="text-gray-600 font-semibold lg:text-sm text-xs">Order Date</span>
                <span class="text-gray-800 font-bold lg:text-base text-xs"><?= $keyOrder_Onhold['tgl_pesan']; ?></span>
            </div>
            <div class="lg:flex-1 flex flex-col p-2">
                <span class="text-gray-600 font-semibold lg:text-sm text-xs">Order ID</span>
                <span class="text-gray-800 font-bold lg:text-base text-xs"><?= $keyOrder_Onhold['no_pemesanan']; ?></span>
            </div>
            <div class="lg:flex-1 flex flex-col p-2">
                <span class="text-gray-600 font-semibold lg:text-sm text-xs">Status</span>
                <span class="text-gray-900 font-bold">
                    <span class="<?= status_order_color($keyOrder_Onhold['status']); ?>"><?= $keyOrder_Onhold['status']; ?></span>
                </span>
            </div>
        </a>
    </div>
<?php endforeach; ?>