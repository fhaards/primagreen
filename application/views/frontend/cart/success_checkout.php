<section class="w-full mx-auto mt-20 lg:mt-32 py-4 my-4">
    <div class="container flex flex-col">

        <div class="flex flex-col lg:flex-row lg:items-center success-banner">
            <div class="flex flex-1">
                <div class="">
                    <h2 class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-900 lg:text-4xl" href="#">
                        Thank you
                    </h2>
                    <h4 class="uppercase tracking-wide no-underline -mt-2 hover:no-underline font-bold text-gray-700 lg:text-2xl">
                        For order that items
                    </h4>
                </div>
            </div>

            <div class="flex flex-col py-2">
                <div class="bg-green-500 p-10 rounded-lg">
                    <div class="flex flex-col">
                        <span class="font-bold text-white lg:text-1xl">This is youre order code</span>
                        <span class="font-bold text-white lg:text-2xl"><?= $getNoPemesanan; ?></span>
                    </div>
                </div>
                <a href="<?php echo base_url() . 'profile/detail-order/' .  $getNoPemesanan; ?>" class="shadow-lg px-4 py-2 my-2 text-sm font-bold text-center leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                    <p class="tracking-widest"> Check Status Order </p>
                </a>
            </div>
        </div>

        <?php $this->load->view('frontend/cart/success_checkout_info');?>
    </div>
</section>