<!-- STORE ITEMS -->
<section class="w-full mx-auto mt-20 lg:mt-24 bg-white">
    <div class="flex w-full md:space-x-4">

        <!-- FILTER  -->
        <?php
        $hal = $this->uri->segment(1);
        $hal2 = $this->uri->segment(2);
        ?>
        <!-- PRODUCT LIST -->

        <div class="flex flex-col w-5/5">
            <nav id="store" class="w-full mb-6">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
                    <h2 class="uppercase py-2 tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                        Store
                    </h2>
                    <button class="open_filter md:hidden block flex space-x-2 shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-200 rounded-md active:bg-gray-300 hover:shadow-none hover:bg-gray-300 focus:outline-none focus:shadow-outline-gray">
                        <div class="mx-auto flex space-x-2">
                            <svg class="w-4 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                        </div>
                    </button>
                    <div id="sorted">
                        <select class="sort_selector sorted block w-full py-1 font-semibold text-sm text-gray-600 bg-gray-100 focus:bg-white form-select focus:border-green-400 focus:outline-none focus:shadow-outline-green ">
                            <option value="NMASC"> Sort by</option>
                            <option value="NMASC"> Name : A - Z</option>
                            <option value="NMDESC"> Name : Z - A</option>
                            <option value="HRGASC"> Price : Low - High</option>
                            <option value="HRGDESC"> Price : High - Low</option>
                        </select>
                        <input type="hidden" id="get-sorted" value="" name="send-sorted">
                    </div>
                </div>
            </nav>
            <div class="w-full flex flex-row md:space-x-4">
                <div class="filter_store flex w-full md:w-1/4">
                    <ul class="lg:text-base text-xs">
                        <li class="">
                            <span class="text-gray-800 text-md font-bold">Filter </span>
                        </li>
                        <li class="my-4">
                            <span class="text-gray-600 text-md font-bold">by Type </span>
                        </li>
                        <?php
                        foreach ($type_data->result_array() as $row) {
                        ?>
                            <li class="checkbox">
                                <label class="text-gray-500 text-md font-semibold space-x-3 flex flex-row items-center"><input type="checkbox" class="common_selector type" value="<?php echo $row['id_type']; ?>"> <span><?php echo $row['nm_type']; ?></span></label>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="my-4">
                            <span class="text-gray-600 text-md font-bold">by Size </span>
                        </li>
                        <?php
                        foreach ($size_data->result_array() as $row) {
                        ?>
                            <li class="checkbox">
                                <label class="text-gray-500 text-md font-semibold space-x-3 flex flex-row items-center"><input type="checkbox" class="common_selector size" value="<?php echo $row['size']; ?>"> <span><?php echo $row['size']; ?></span></label>
                            </li>
                        <?php
                        }
                        ?>

                        <li class="my-4">
                            <span class="text-gray-600 text-md font-bold">by Price Range </span>
                        </li>
                        <li>
                            <!-- <div class="slidecontainer">
                            <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                        </div> -->

                            <input type="hidden" id="hidden_minimum_price" value="1000" />
                            <input type="hidden" id="hidden_maximum_price" value="1000000" />
                            <p id="price_show" class="text-gray-500 text-md font-semibold space-x-3 flex flex-row items-center">1,000 - 1,000,000</p>
                            <div id="price_range"></div>
                        </li>


                    </ul>
                </div>
                <div class="store_items flex flex-col md:w-3/4 w-full">
                    <div id="filter_data" class="filter_data grid grid-cols-2 md:grid-cols-4 gap-6 w-full "> </div>
                    <div class="store-pagination mt-8">
                        <div id="pagination_link"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>