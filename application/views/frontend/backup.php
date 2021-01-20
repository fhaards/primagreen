<!-- ADD FAVORITES -->
<!-- <?php if (isLoggedIn()) : ?>
    <?php
            $getIdUser2 = getUserData()['id_user'];
            $getIdBarang2 = $someItemsValue['id_barang'];
?>
<?php if (in_array($getIdBarang2, $favItems)) : ?>
    <?php
                $classFav2 = 'w-5 text-red-500';
                $classFillFav2 = 'currentColor';
    ?>
<?php else : ?>
    <?php
                $classFav2 = 'w-5 text-gray-500 hover:text-red-500';
                $classFillFav2 = 'none';
    ?>
<?php endif; ?>
<button data-itemsid="<?= $getIdBarang2; ?>" data-userid="<?= $getIdUser2; ?>" class="add_favorites absolute items-center bg-white p-1 rounded-br-lg">
    <svg class="<?= $classFav2; ?>" fill="<?= $classFillFav2; ?>" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
    </svg>
</button>
<?php else : ?>
<a href="<?= base_url() . 'login'; ?>" class="absolute items-center bg-white p-1 rounded-br-lg">
    <svg class="h-6 text-gray-600 right-0 hover:text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
    </svg>
</a>
<?php endif; ?> -->