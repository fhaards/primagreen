<div class="container px-6 py-3  mx-auto grid min-h-screen">
    <section class="w-full mx-auto mt-20 md:mt-24">
        <?php echo $breadcrumb; ?>
        <div class="container flex flex-wrap w-full my-5">
            <div class="flex flex-col w-full my-5">
                <div class="flex flex-col">
                    <h2 class="uppercase tracking-wide no-underline hover:no-underline font-black text-sm md:text-xl ">
                        About
                    </h2>
                    <h2 class="uppercase font-bold text-sm md:text-xl tracking-wide text-gray-700 md:-mt-2 -mt-1">
                        Our Story
                    </h2>
                </div>
            </div>

            <div class="flex md:flex-row flex-col my-5 md:space-x-10">
                <div class="w-full about-1-banner md:h-full h-48 md:my-0 mb-10 rounded-md"></div>
                <div class="flex flex-row md:w-5/5 w-full ">
                    <div class="flex md:w-full mx-auto">
                        <div class="text-md text-gray-800">
                            <div class="md:p-0 md:text-base text-gray-700"><?php echo getCompanyData()['about']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap w-full my-5 border border-green-500 rounded-md">
                <div class="w-full mx-auto p-10 content-center">
                    <h2 class="title-text text-center text-xl md:text-4xl text-green-500 mx-auto my-auto justify-between center">
                        "This simple idea was the seed for <br> what would become a modern plant destination <br> for the modern plant lover."
                    </h2>
                </div>
                <div class="md:w-3/5 "></div>
            </div>
        </div>
        <div class="w-full flex md:flex-row md:space-x-10 flex-col">
            <div class="w-1/3 flex flex-col">
                <h2 class="text-gray-800 font-bold text-xl mb-5">Contact Us </h2>
                <div class="mb-5">
                    <p class="text-gray-900 font-bold text-base">Phone :</p>
                    <p class="text-base text-gray-600 font-semibold">
                        <?= objectSocmed('whatsapp'); ?>
                    </p>
                </div>
                <div class="mb-5">
                    <p class="text-gray-900 font-bold text-base">Instagram :</p>
                    <p class="text-base text-gray-600 font-semibold">
                        <?= objectSocmed('Instagram'); ?>
                    </p>
                </div>
            </div>
            <div class="md:w-2/3 w-full md:mt-0 mt-10">
                <div id="map" class="rounded-md"></div>
            </div>
        </div>
    </section>
</div>