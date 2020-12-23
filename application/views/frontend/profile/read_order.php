<div class="flex w-1/3 mb-4">
    <nav class="w-full top-0 py-1">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
            <span class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                My Order
            </span>
        </div>
    </nav>
</div>

<div class="flex flex-wrap" id="tabs-id">
    <div class="w-full">
        <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center mt-2">
                <a class="text-xs font-bold uppercase px-5 py-3 shadow-xs rounded block leading-normal text-white bg-green-600" onclick="changeAtiveTab(event,'tab-profile')">
                    ONHOLD
                </a>
            </li>
            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center mt-2">
                <a class="text-xs font-bold uppercase px-5 py-3 shadow-xs rounded block leading-normal text-green-600 bg-white" onclick="changeAtiveTab(event,'tab-settings')">
                    PROCESS
                </a>
            </li>
            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center mt-2">
                <a class="text-xs font-bold uppercase px-5 py-3 shadow-xs rounded block leading-normal text-green-600 bg-white" onclick="changeAtiveTab(event,'tab-options')">
                    PACKING
                </a>
            </li>
        </ul>
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6">
            <div class="py-5 flex-auto">
                <div class="tab-content tab-space">
                    <div class="block" id="tab-profile">
                        <p>
                            Collaboratively administrate empowered markets via
                            plug-and-play networks. Dynamically procrastinate B2C users
                            after installed base benefits.
                            <br />
                            <br />
                            Dramatically visualize customer directed convergence
                            without revolutionary ROI.
                        </p>
                    </div>
                    <div class="hidden" id="tab-settings">
                        <p>
                            Completely synergize resource taxing relationships via
                            premier niche markets. Professionally cultivate one-to-one
                            customer service with robust ideas.
                            <br />
                            <br />
                            Dynamically innovate resource-leveling customer service for
                            state of the art customer service.
                        </p>
                    </div>
                    <div class="hidden" id="tab-options">
                        <p>
                            Efficiently unleash cross-media information without
                            cross-media value. Quickly maximize timely deliverables for
                            real-time schemas.
                            <br />
                            <br />
                            Dramatically maintain clicks-and-mortar solutions
                            without functional solutions.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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