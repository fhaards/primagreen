<div class="my-6 flex">
    <div class="flex-1">
        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Detail User
        </h2>
        <p class="text-gray-600">Detail User <?= $userList['nama']; ?></p>
    </div>
</div>

<div class="py-3"></div>

<div class="container flex-col lg:flex-row w-full bg-white overflow-hidden rounded-lg shadow-xs p-4 my-4">
    <div class="w-full">
        <div class="grid cols-2">
            <div class="flex flex-col">
                <label class="my-2">
                    <span class="font-semibold text-gray-600">Nama</span><br>
                    <strong><?= $userList['nama']; ?></strong>
                </label>
                <label class="my-2">
                    <span class="font-semibold text-gray-600">Telp</span><br>
                    <strong><?= $userList['tlp']; ?></strong>
                </label>
                <label class="my-2">
                    <span class="font-semibold text-gray-600">Email</span><br>
                    <strong><?= $userList['email']; ?></strong>
                </label>
                <label class="my-2">
                    <span class="font-semibold text-gray-600">Address</span><br>
                    <strong><?= $userList['alamat']; ?></strong>
                </label>

            </div>
        </div>
    </div>
</div>