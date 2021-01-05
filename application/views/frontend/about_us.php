<section class="about w-full mt-20 mx-auto py-8 my-8">
    <div class="container flex flex-wrap w-full pt-4 pb-2">

        <div class="flex flex-col w-full">
            <div class="flex flex-col">
                <h3 class="text-base font-bold -my-4 text-gray-600">
                    About
                </h3>
                <h2 class="title-text uppercase tracking-wide no-underline hover:no-underline font-bold lg:text-4xl text-3xl" href="#">
                    Our Story
                </h2>
            </div>
        </div>

        <div class="flex flex-col lg:w-5/5">
            <div class="w-full about-1-banner md:h-56 h-48 my-20 rounded-lg">
            </div>
            <div class="flex flex-row md:w-5/5 w-full space-x-10">
                <div class="md:w-2/5"></div>
                <div class="flex md:w-3/5 mx-auto">
                    <div class="text-md text-gray-800">
                        <div class="md:p-0 md:text-base text-gray-700"><?php echo getCompanyData()['about']; ?></div>
                        <h2 class="mt-10 text-gray-800 font-bold">Contact Us </h2>
                        <p class="text-sm text-gray-800"><?php echo getCompanyData()['telp']; ?></p>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap w-full my-10">
                <div class="flex md:w-2/5 mx-auto">
                    <h2 class="title-text text-xl md:text-4xl text-green-500 mx-auto my-auto justify-between center">
                        "This simple idea was the seed for what would become a modern plant destination for the modern plant lover."
                    </h2>
                </div>
                <div class="md:w-3/5 "></div>
            </div>
        </div>
    </div>
</section>
<div class="flex md:flex-row w-full flex-col">
    <div class="flex-1 w-5/5">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63388.38883597557!2d107.56579729465307!3d-6.797291613162151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e1a2ffffffff%3A0xb91bf7b23f2727bc!2sGreenspaces.id!5e0!3m2!1sen!2sid!4v1609653776055!5m2!1sen!2sid" class="rounded-lg" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
</div>
<div id="map"></div>