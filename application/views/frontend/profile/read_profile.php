<div class="w-full mx-auto mt-32 py-4">
    <div class="container flex items-center flex-wrap">

        <div class="flex lg:flex-row flex-col w-full">
            <div class="w-1/3 mb-4">
                <nav id="new-items" class="w-full top-0 py-1">
                    <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
                        <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                            Profile
                        </a>
                    </div>
                </nav>
            </div>

            <div class="w-1/3">
                <div class="flex flex-col">
                    <div class="mb-2">
                        <label>
                            <p class="text-gray-600 font-semibold text-sm">Name</p>
                            <p class="text-gray-800 font-bold text-md"><?= getUserData()['nama']; ?></p>
                        </label>
                    </div>
                    <div class="my-2">
                        <label>
                            <p class="text-gray-600 font-semibold text-sm">Email</p>
                            <p class="text-gray-800 font-bold text-md"><?= getUserData()['email']; ?></p>
                        </label>
                    </div>
                </div>
            </div>

            <div class="w-1/3">
                <div class="flex flex-col">
                    <div class="mb-2">
                        <label>
                            <p class="text-gray-600 font-semibold text-sm">Telphone</p>
                            <p class="text-gray-800 font-bold text-md"><?= getUserData()['tlp']; ?></p>
                        </label>
                    </div>
                    <div class="my-2">
                        <label>
                            <p class="text-gray-600 font-semibold text-sm">Address</p>
                            <p class="text-gray-800 font-bold text-md"><?= getUserData()['alamat']; ?></p>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="flex flex-col mt-8 w-full">
            <?php $this->load->view('frontend/profile/read_order'); ?>
        </div>
    </div>
</div>