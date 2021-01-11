<div class="container flex-col lg:flex-row w-full bg-white overflow-hidden rounded-lg shadow-xs p-4">
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