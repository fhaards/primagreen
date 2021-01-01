<!-- STORE ITEMS -->
<section class="w-full mx-auto mt-20 lg:mt-24 bg-white">
    <div class="flex w-full md:space-x-4">

        <!-- FILTER  -->
        <?php
        $hal = $this->uri->segment(1);
        $hal2 = $this->uri->segment(2);
        ?>
        <div class="w-1/5 md:block">
            <nav id="store" class="w-full">
                <div class="w-full container flex flex-wrap items-center justify-between">
                    <h2 class="py-2 uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                        Filter
                    </h2>
                </div>
            </nav>
            <div class="flex">
                <ul class="">
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
        </div>

        <!-- PRODUCT LIST -->

        <div class="md:w-4/5 w-5/5">
            <nav id="store" class="w-full mb-6">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
                    <h2 class="uppercase py-2 tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                        Store
                    </h2>
                    <select class="form-select">
                        <option> SORT BY</option>
                        <option> NAME : A - Z</option>
                        <option> NAME : Z - A</option>
                        <option> PRICE : HIGH - LOW</option>
                        <option> PRICE : LOW - HIGH</option>
                    </select>
                </div>
            </nav>
            <div class="w-full flex-col flex-wrap">
                <div class="container flex items-center flex-wrap">
                    <div id="filter_data" class="filter_data grid grid-cols-2 lg:grid-cols-4 gap-6"> </div>
                    <div class="store-pagination mt-8">
                        <div id="pagination_link"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>