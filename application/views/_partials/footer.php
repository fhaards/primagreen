<section class="w-full bg-gray-800 mt-20 py-20 inset-x-0 bottom-0">
    <div class="container mx-auto items-center px-6">
        <div class="flex md:flex-row flex-col md:space-x-10 md:space-y-0 space-y-10">
            <div class="flex-1">
                <ul class="text-sm">
                    <li class="font-bold text-white mb-1 md:mb-4">Who We Are</li>
                    <li class="py-1">
                        <!-- <p class="hover:text-gray-500 hover:underline text-gray-400 font-semibold">
                            Stay in the loop with special offers, plant-parenting tips, and more.
                        </p> -->
                        <p class="text-gray-400 font-semibold md:w-2/3 text-justify">
                            <?php
                            $this_slice_about =
                                "Primagreen is a startup that tries to bring green space wherever you are. 
                                Both in Indonesia or other parts of the world. We start a business 
                                by bridging farmers who have crops or services but they don't get very good results";
                            ?>
                            <?= substr($this_slice_about, 0, 350).'... '; ?>
                            <a class="underline" href="<?= base_url().'about-us'; ?>"> read more </a>

                        </p>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col">
                <ul class="text-sm">
                    <li class="font-bold text-white mb-1 md:mb-4">Company</li>
                    <li class="py-1"><a class="hover:text-gray-500 hover:underline text-gray-400 font-semibold" href="">About Us</a></li>
                </ul>
            </div>
            <div class="flex flex-col">
                <?php
                if (!isLoggedIn()) : $whoThis = "guest";
                else : $whoThis = "send-messages";
                endif;
                ?>
                <ul class="text-sm">
                    <li class="font-bold text-white mb-1 md:mb-4">Support</li>
                    <li class="py-1"><a class="hover:text-gray-500 hover:underline text-gray-400 font-semibold" href="">How to buy</a></li>
                    <li class="py-1"><a href="<?= base_url() . 'contact-us/' . $whoThis; ?>" class="hover:text-gray-500 hover:underline text-gray-400 font-semibold" href="">Contact us</a></li>
                    <li class="py-1"><a href="<?= base_url() . 'faq'; ?>" class="hover:text-gray-500 hover:underline text-gray-400 font-semibold" href="">FAQ</a></li>
                </ul>
            </div>
            <div class="flex flex-col">
                <ul class="text-sm">
                    <li class="font-bold text-white mb-1 md:mb-4">Follow</li>
                    <li class="py-1"><a class="hover:text-gray-500 hover:underline text-gray-400 font-semibold" href=""> @ <?= getCompanyData()['instagram']; ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="w-full bg-gray-900 py-5 inset-x-0 bottom-0">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row space-x-5 items-center">
            <a class="inline-block px-5 py-1 font-bold bg-white rounded-md md:mb-0 mb-2" href="<?= base_url(); ?>">
                <img class="md:h-6 h-4 object-cover" src="<?php echo base_url() . 'uploads/company/' . getCompanyData()['logo']; ?>" alt="" loading="lazy" />
            </a>
            <span class="md:text-sm text-xs font-semibold text-gray-600 center"> © COPYRIGHT 2020 - ALL RIGHTS RESERVED </span>
        </div>
    </div>
</section>