<div class="grid grid-cols-1 md:grid-cols-3 gap-10">
    <div class="flex flex-col">
        <div class="mb-2">
            <label>
                <p class="text-gray-600 font-semibold text-sm">Your Address</p>
                <p class="my-5 font-semibold text-gray-800 md:text-sm text-xs text-justify">
                    <?= getUserData()['alamat']; ?>
                </p>
            </label>
        </div>
    </div>
</div>
<div class="border-t-2 border-gray-300 py-4 my-4">
    <a href="<?= base_url().'profile/edit-address/edit-form';?>" class="inline-block shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
        <div class="flex flex-row  space-x-2 items-center ">
            <svg class="w-4 h-4" fill="" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg>
            <span class="hidden lg:block">Edit</span>
        </div>
    </a>
</div>