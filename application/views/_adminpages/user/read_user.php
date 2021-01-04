<div class="my-6 flex">
    <div class="flex-1">
        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
            User
        </h2>
        <p class="">List of table User</p>
    </div>
</div>
<div class="py-3"></div>
<div class="w-full bg-white overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table id="primaTable" class="w-full whitespace-no-wrap stripe hover" width="100%">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Join Date</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y">
                <?php foreach ($userList as $row) : ?>
                    <tr class="lg:h-12 text-gray-700">
                        <td><a class="text-blue-500 hover:text-blue-600 underline font-semibold" href="<?=base_url().'user/user-detail/'.$row['id_user'];?>"><?= $row['nama']; ?></a></td>
                        <td><?= $row['email']; ?></td>
                        <td>
                            <span class="hidden"> <?= strftime("%d-%M-%Y-%H:%M", strtotime($row['join_date'])); ?></span>
                            <?= strftime("%d-%M-%Y / %H:%M", strtotime($row['join_date'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>