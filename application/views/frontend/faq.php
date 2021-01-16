<div class="container px-6 py-3  mx-auto grid min-h-screen">
    <section class="about w-full mt-20 mx-auto py-8 my-8">
        <div class="container flex flex-wrap w-full pt-4 pb-2">
            <div class="flex flex-col w-full">
                <div class="flex flex-col">
                    <h3 class="uppercase font-bold md:text-2xl text-2xl tracking-wide text-gray-800">
                        Frequently <br> Ask & Question
                    </h3>
                </div>
            </div>
        </div>

        <div class="w-full flex md:flex-row md:space-x-10 flex-col mt-10">
            <div class="flex-1 flex flex-col">
                <?php foreach ($getFaq as $row) : ?>
                    <div class="mb-5">
                        <div class="bg-gray-800 text-white p-5 flex flex-col">
                            <label class="text-sm">Question :</label>
                            <span class="font-bold "><?= $row['question']; ?></span>
                        </div>
                        <div class="bg-gray-600 text-white p-5 flex flex-col">
                            <label class="text-sm">Answer :</label>
                            <span class="font-bold "><?= $row['answer']; ?></span>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
            <div class="flex flex-col md:block hidden">
                <h3 class="uppercase font-bold md:text-2xl text-2xl tracking-wide text-gray-800">
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