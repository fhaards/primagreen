<div x-show="isModalSearchOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed w-full inset-0 z-30 flex items-start bg-black bg-opacity-50  sm:justify-center">
    <!-- Modal -->
    <div id="searchModal" class="container flex mx-auto mt-20">
        <div x-show="isModalSearchOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform -translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform -translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="px-6 md:mx-6 py-4 md:shadow-lg bg-white overflow-hidden sm:m-4 sm:rounded-md w-full" role="dialog" id="modal-search">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->

            <header class="flex flex-col w-full">
                <div class="relative text-gray-600  w-full ">
                    <input id="searching" placeholder="Type to search .. " name="nama" value="" type="text" class="searchKey w-full bg-white  text-xl font-bold tracking-wide py-5 border-none focus:border-green-400 focus:outline-none focus:shadow-outline-none " />
                    <span class="absolute right-0 top-0 py-6 md:px-5 px-4">
                        <svg class="w-6 h-6 fillCurrent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                </div>
            </header>
            <!-- Modal body -->

            <div id="mainSearch" class="hidden py-5 grid grid-cols-1 gap-2 border-gray-300 transition ease-out duration-150">
                <span id="loadingSearch" class="loadingSearch flex">
                    <div class="flex mx-auto py-5 items-center">
                        <svg class="spin h-5 w-5 mr-3 fullCurrent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        <span> Searching Something .. </span>
                    </div>
                </span>

                <div class="grid md:grid-cols-1 gap-5 ">
                    <div id="searchResultProducts" class="flex-col"></div>
                </div>

            </div>

        </div>
    </div>
</div>