<!-- <ul id="menu" class="fixed top-0 flex flex-col z-40">
    <li data-menuanchor="firstPage"><a href="#firstPage">First slide</a></li>
    <li data-menuanchor="secondPage"><a href="#secondPage">Second slide</a></li>
    <li data-menuanchor="3rdPage"><a href="#3rdPage">Third slide</a></li>
</ul> -->
<div id="fullpage">
    <div class="section" id="section0">
        <div class="container mx-auto px-6 text-gray-800 w-full md:mt-16 mt-32 grid md:grid-cols-3">
            <div class="relative p-2 my-auto">
                <div class="absolute top-0 left-0 w-10 h-10 bg-red-500 text-white rounded-full items-center flex">
                    <p class="mx-auto text-lg font-black">1</p>
                </div>
                <div class="flex-col bg-white shadow-lg p-8 rounded-md shadow-xs w-full">
                    <div class="howtobuy-1 md:hidden mx-auto mb-10" style="width:150px; height:100px;"></div>
                    <h1 class="mt-5 text-gray-800 md:text-3xl tracking-wide md:font-black text-xl font-bold">Select a Plants</h1>
                    <p class="tracking-wide text-gray-600 md:text-lg text-sm font-semibold ">Select a variety of beautiful Plants that you can get, there are many choices.</p>
                    <a href="<?= base_url('store') ?>" type="button" class="flex w-full mt-8 mx-auto space-x-2 shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                        <div class="flex flex-row space-x-4 items-center mx-auto">
                            <svg class="w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            <span class="tracking-widest"> GO TO STORE </span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-span-2 p-10 md:block hidden">
                <div class="howtobuy-1" style="max-height:500px;height:500px;"></div>
            </div>
        </div>
    </div>
    <div class="section" id="section1">
        <div class="intro">
            <div class="container mx-auto px-6 text-gray-800 w-full md:mt-16 mt-32">
                <h1>fullPage.js</h1>
                <p>Configure the CSS3 easing effect!</p>
            </div>
        </div>
    </div>
    <div class="section" id="section2">
        <div class="intro">
            <div class="container mx-auto px-6 text-gray-800 w-full md:mt-16 mt-32">
                <h1>fullPage.js</h1>
                <p>Configure the CSS3 easing effect!</p>
            </div>
        </div>
    </div>
</div>