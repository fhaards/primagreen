<div class="container px-6 py-3 mx-auto grid min-h-screen">
    <section class="w-full mx-auto bg-white mt-20 md:mt-24">
        <?php echo $breadcrumb; ?>

        <div class="container w-full mx-auto lg:flex my-5 py-5">
            <div class="flex-1">
                <div class="flex flex-col w-full">
                    <div class="flex flex-col">
                        <h2 class="uppercase tracking-wide no-underline hover:no-underline font-black text-sm md:text-xl ">
                            Contact Us
                        </h2>
                        <h2 class="font-bold text-sm md:text-xl tracking-wide text-gray-800 md:-mt-2 -mt-1">
                            Customer Support
                        </h2>
                    </div>
                </div>

                <?php
                if (!isLoggedIn()) {
                    $this->load->view("frontend/messages/msg_guest/read_msg_guest");
                } else {
                    $this->load->view("frontend/messages/msg_user/read_msg");
                }
                ?>
            </div>
            <div class="flex-1 lg:block hidden">
                <div class="contactus-banner h-full relative rounded-md">
                    <div class="absolute bottom-0 flex flex-col p-6 bg-gray-800 mx-5 mb-5 rounded-md">
                        <span class="w-2/3 text-white text-lg font-bold">
                            If you have questions or feedback about an order, here’s how to get in touch.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>