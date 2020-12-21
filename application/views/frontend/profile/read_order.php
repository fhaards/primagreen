<div class="flex w-1/3 mb-4">
    <nav id="new-items" class="w-full top-0 py-1">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
            <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                My Order
            </a>
        </div>
    </nav>
</div>

<?php foreach ($getUser as $getUsers) : ?>
    <?php
    $getStatus = $getUsers['status'];
    if ($getStatus == 'PROCESS') {
        $bgClass = 'bg-blue-100 hover:bg-blue-200';
        $StatusClass = 'bg-blue-300 border-blue-400';
    } else if ($getStatus == 'COMPLETE') {
        $bgClass = 'bg-green-100 hover:bg-green-200';
        $StatusClass = 'bg-green-300 border-green-400';
    } else if ($getStatus == 'PACKING') {
        $bgClass = 'bg-yellow-100 hover:bg-yellow-200';
        $StatusClass = 'bg-yellow-300 border-yellow-400';
    } else {
        $bgClass = 'bg-gray-100 hover:bg-gray-200';
        $StatusClass = 'bg-gray-300 border-gray-400';
    }
    ?>
    <div class="flex w-full flex-col mb-5">
        <a href="#" class="flex flex-row flex-wrap rounded-lg shadow-xs <?= $bgClass; ?>">
            <div class="flex-1 flex flex-col ml-2 mr-3 p-2">
                <span class="text-gray-600 font-semibold lg:text-sm text-xs">Order Date</span>
                <span class="text-gray-800 font-bold lg:text-base text-xs"><?= $getUsers['tgl_pesan']; ?></span>
            </div>
            <div class="flex-1 flex flex-col p-2">
                <span class="text-gray-600 font-semibold lg:text-sm text-xs">Order ID</span>
                <span class="text-gray-800 font-bold lg:text-base text-xs"><?= $getUsers['no_pemesanan']; ?></span>
            </div>
            <div class="flex-1 flex flex-col p-2">
                <span class="text-gray-600 font-semibold lg:text-sm text-xs">Status</span>
                <span class="text-gray-900 font-bold">
                    <div class="inline-block rounded-sm px-4 py-0 lg:text-sm text-xs border <?= $StatusClass; ?>"> <?= $getUsers['status']; ?> </div>
                </span>
            </div>
        </a>
    </div>
<?php endforeach; ?>