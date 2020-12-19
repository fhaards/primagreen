<section class="w-full bg-gray-50 mt-12 py-20 inset-x-0 bottom-0">
    <div class="container mx-auto items-center px-6">
        <div class="flex flex-shrink">
            <div class="flex-1">
                <span class="text-sm text-gray-600"> © Copyright 2020 </span>
                <a class="text-lg font-bold" href="<?= base_url(); ?>">
                    <img class="h-6 object-cover" src="<?php echo base_url() . 'uploads/company/' . getCompanyData()['logo']; ?>" alt="" loading="lazy" />
                </a>
            </div>
            <div class="flex-1 items-center text-center">

            </div>
            <div class="">
                <p>Follow us </p>
                <a class="text-sm text-right text-gray-600" href="#">
                    @ <?= getCompanyData()['instagram']; ?>
                </a>
            </div>
        </div>
    </div>
</section>