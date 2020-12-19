<section class="about w-full mt-32 mx-auto py-8 my-8">
    <div class="container flex items-center flex-wrap pt-4 pb-2">
        <h2 class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-4xl" href="#">
            Our <br> Story
        </h2>

        <div class="flex w-5/5">
            <div class="w-2/5">

            </div>
            <div class="flex-1 text-md text-gray-800">
                <?php echo getCompanyData()['about']; ?>
                <h2 class="mt-10 text-gray-800 font-bold">Contact Us </h2>
                <p class="text-sm text-gray-800"><?php echo getCompanyData()['telp']; ?></p>
            </div>
        </div>

    </div>
</section>