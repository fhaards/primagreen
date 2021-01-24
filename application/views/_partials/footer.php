<?php $whatext = "Hello, .. "; ?>
<section class="w-full bg-gray-900 mt-20 py-20 inset-x-0 bottom-0 footer-bg">
    <div class="container mx-auto items-center px-6">
        <div class="flex items-center md:flex-col flex-col md:space-y-0 space-y-10">
            <div class="flex flex-col mx-auto md:w-1/3 text-center mb-10">
                <div class="font-bold text-white mb-1 md:mb-4">Who We Are</div>
                <div class="py-1">
                    <!-- <p class="hover:text-gray-500 hover:underline text-gray-100 font-semibold">
                            Stay in the loop with special offers, plant-parenting tips, and more.
                        </p> -->
                    <p class="text-gray-100 font-semibold">
                        <?php
                        $this_slice_about =
                            "Primagreen is a startup that tries to bring green space wherever you are. 
                                Both in Indonesia or other parts of the world. We start a business 
                                by bridging farmers who have crops or services but they don't get very good results";
                        ?>
                        <?= substr($this_slice_about, 0, 350) . '... '; ?>
                        <a class="underline" href="<?= base_url() . 'about-us'; ?>"> read more </a>

                    </p>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-5">
                <div class="flex flex-col">
                    <ul class="md:text-sm text-xs">
                        <li class="font-bold text-white mb-1 md:mb-4">Company</li>
                        <li class="py-1"><a class="hover:text-gray-500 hover:underline text-gray-100 font-semibold" href="">About Us</a></li>
                    </ul>
                </div>

                <div class="flex flex-col">
                    <?php
                    if (!isLoggedIn()) : $whoThis = "guest";
                    else : $whoThis = "send-messages";
                    endif;
                    ?>
                    <ul class="md:text-sm text-xs">
                        <li class="font-bold text-white mb-1 md:mb-4">Support</li>
                        <li class="py-1"><a class="hover:text-gray-500 hover:underline text-gray-100 font-semibold" href="">How to buy</a></li>
                        <li class="py-1"><a href="<?= base_url() . 'contact-us/' . $whoThis; ?>" class="hover:text-gray-500 hover:underline text-gray-100 font-semibold" href="">Contact us</a></li>
                        <li class="py-1"><a href="<?= base_url() . 'faq'; ?>" class="hover:text-gray-500 hover:underline text-gray-100 font-semibold" href="">FAQ</a></li>
                    </ul>
                </div>

                <div class="flex flex-col">
                    <ul class="md:text-sm text-xs">
                        <li class="font-bold text-white mb-1 md:mb-4">Follow</li>
                        <li class="py-1">
                            <a class="hover:text-gray-500 hover:underline text-gray-100 font-semibold items-center " href="">
                                <?= objectSocmed('Instagram'); ?>
                            </a>
                        </li>
                        <li class="py-1">
                            <a target="_blank" href="https://wa.me/6281317352815/?text=<?php echo $whatext; ?>" class="hover:text-gray-500 hover:underline text-gray-100 font-semibold items-center " href="">
                                <?= objectSocmed('Whatsapp'); ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="w-full bg-gray-900 py-5 inset-x-0 bottom-0">
    <div class="container mx-auto flex ">
        <div class="flex flex-row py-5  items-center mx-auto space-x-5">
            <a class="inline-block px-5 py-1 font-bold bg-gray-100 rounded-sm md:mb-0 mb-2" href="<?= base_url(); ?>">
                <img class="md:h-4 h-4 object-cover" src="<?php echo base_url() . 'uploads/company/' . getCompanyData()['logo']; ?>" alt="" loading="lazy" />
            </a>
            <span class="md:md:text-sm text-xs text-xs font-semibold text-gray-600 center"> © COPYRIGHT 2020 - ALL RIGHTS RESERVED </span>
        </div>
    </div>
</section>

<div class="whatsapp fixed bottom-0 right-0 md:mr-10 md:mb-10">
    <a target="_blank" href="https://wa.me/6281317352815/?text=<?php echo $whatext; ?>" class="">
        <div class="flex space-x-2 items-center bg-white md:rounded-full shadow-lg hover:bg-green-500 p-2 hover:shadow-md text-gray-500 hover:text-white">
            <!-- <img src="<?= base_url() . 'assets/image/objects_image/whatsapp.png'; ?>" class="w-10 h-10 py-2 px-2" /> -->
            <svg class="md:w-8 md:h-8 h-6 w-6 " fill="currentColor" viewBox="0 0 24 24" stroke="none">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
            </svg>
        </div>
    </a>
</div>