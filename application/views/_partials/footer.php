<section class="w-full bg-gray-200 mt-20 py-10 inset-x-0 bottom-0">
    <div class="container mx-auto items-center px-6">
        <div class="flex md:flex-row flex-col md:space-x-10 md:space-y-0 space-y-10">
            <div class="flex-1">
                <a class="text-lg font-bold bg-white" href="<?= base_url(); ?>">
                    <img class="h-6 object-cover" src="<?php echo base_url() . 'uploads/company/' . getCompanyData()['logo']; ?>" alt="" loading="lazy" />
                </a>
                <span class="text-sm font-semibold text-gray-600"> © 2020 </span>
            </div>
            <div class="flex flex-col">
                <ul class="text-sm">
                    <li class="font-bold text-gray-800 mb-1 md:mb-4">Company</li>
                    <li><a class="hover:text-gray-500 hover:underline text-gray-600 font-semibold" href="">About Us</a></li>
                    <li></li>
                </ul>
            </div>
            <div class="flex flex-col">
                <?php 
                    if(!isLoggedIn()): $whoThis = "guest"; else: $whoThis="send-messages"; endif;
                ?>
                <ul class="text-sm">
                    <li class="font-bold text-gray-800 mb-1 md:mb-4">Support</li>
                    <li><a class="hover:text-gray-500 hover:underline text-gray-600 font-semibold" href="">How to buy</a></li>
                    <li><a href="<?= base_url().'contact-us/'.$whoThis;?>"  class="hover:text-gray-500 hover:underline text-gray-600 font-semibold" href="">Contact us</a></li>
                    <li></li>
                </ul>
            </div>
            <div class="flex flex-col">
                <ul class="text-sm">
                    <li class="font-bold text-gray-800 mb-1 md:mb-4">Follow</li>
                    <li><a class="hover:text-gray-500 hover:underline text-gray-600 font-semibold" href="">  @ <?= getCompanyData()['instagram']; ?></a></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>
</section>