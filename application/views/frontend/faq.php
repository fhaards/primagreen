<div class="container px-6 py-3  mx-auto grid min-h-screen">
    <section class="about w-full mt-20 md:mt-24 mx-auto ">
        <?php echo $breadcrumb; ?>

        <div class="container flex flex-wrap w-full my-5 py-5 pb-2">
            <div class="flex flex-col w-full">
                <div class="flex flex-col">
                    <h2 class="uppercase tracking-wide no-underline hover:no-underline font-black text-sm md:text-xl ">
                        Frequently Ask And Question
                    </h2>
                    <h2 class="font-bold text-sm md:text-xl tracking-wide text-gray-800 md:-mt-2 -mt-1">
                        Customer Support
                    </h2>
                </div>
            </div>
        </div>

        <div class="w-full flex md:flex-row md:space-x-10 flex-col mt-10">
            <div class="flex-1 flex flex-col">
                <?php foreach ($getFaq as $row) : ?>
                    <?php $faqId = $row['id_faq'];?>
                    <div class="text-xs md:text-sm">
                        <div class="bg-gray-300 text-gray-800 py-2 px-4 flex flex-row space-x-5 rounded-md my-1 items-center">
                            <div class="flex-1 font-bold text-justify"><?= $row['question']; ?></div>
                            <button class="" onclick="openThisFaq(<?= $faqId; ?>)">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </button>
                        </div>
                        <div id="this_faq_<?= $faqId; ?>" class="hidden bg-white border-2 border-gray-300 text-gray-800 py-4 px-4 flex flex-col rounded-md my-1 mb-5">
                            <label class="text-sm">Answer :</label>
                            <span class="font-semibold text-justify"><?= $row['answer']; ?></span>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
            <div class="w-1/3 flex-col md:block hidden text-right">
                <h3 class="uppercase font-bold md:text-sm text-xs tracking-wide text-gray-800">
                    Support
                </h3>
                <?php
                if (!isLoggedIn()) : $whoThis = "guest";
                else : $whoThis = "send-messages";
                endif;
                ?>
                <ul class="text-sm">
                    <li><a class="hover:text-gray-500 hover:underline text-gray-600 font-semibold" href="">How to buy</a></li>
                    <li><a href="<?= base_url() . 'contact-us/' . $whoThis; ?>" class="hover:text-gray-500 hover:underline text-gray-600 font-semibold" href="">Contact us</a></li>
                    <li><a href="<?= base_url() . 'faq'; ?>" class="hover:text-gray-500 hover:underline text-gray-600 font-semibold" href="">FAQ</a></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </section>
</div>