<section class="store-banner min-w-full w-full mx-auto flex md:items-center bg-cover bg-right" style="height:500px;">
    <div class="container mx-auto px-6 text-gray-800 w-full md:mt-16 mt-32">
        <div class="flex flex-col items-center tracking-wide md:mx-0 mx-auto ">
            <h1 class="uppercase font-black md:text-5xl text-2xl tracking-wide text-white">Shop All Items </h1>
            <h1 class="uppercase md:-mt-5 font-bold md:text-4xl text-xl tracking-wide py-0 text-white">Find the fortune ones</h1>
            <a href="<?= base_url('store/all-items') ?>" class="mt-10 flex flex-row space-x-3 text-gray-800 border-2 border-white py-1 px-4 bg-white rounded-md font-bold hover:bg-gray-800 hover:text-white hover:border-gray-800">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
                <span> Shop All Items </span>
            </a>
        </div>
    </div>
</section>

<?php $this->load->view('frontend/section_features');?>