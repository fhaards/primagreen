<div class="flex flex-wrap" id="tabs-id">
    <div class="w-full">
        <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center mt-2">
                <a class="text-xs font-bold uppercase px-5 py-3 shadow-xs rounded block leading-normal text-white bg-green-600" onclick="changeAtiveTab(event,'tab-profile')">
                    ONHOLD
                </a>
            </li>
            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center mt-2">
                <a class="text-xs font-bold uppercase px-5 py-3 shadow-xs rounded block leading-normal text-green-600 bg-white" onclick="changeAtiveTab(event,'tab-settings')">
                    PROCESS
                </a>
            </li>
            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center mt-2">
                <a class="text-xs font-bold uppercase px-5 py-3 shadow-xs rounded block leading-normal text-green-600 bg-white" onclick="changeAtiveTab(event,'tab-options')">
                    PACKING
                </a>
            </li>
        </ul>
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6">
            <div class="py-5 flex-auto">
                <div class="tab-content tab-space">
                    <div class="block" id="tab-profile">
                        <?php 
                            $this->load->view('frontend/profile/order_status/onhold');
                        ?>
                    </div>
                    <div class="hidden" id="tab-settings">
                        <p>
                            Completely synergize resource taxing relationships via
                            premier niche markets. Professionally cultivate one-to-one
                            customer service with robust ideas.
                            <br />
                            <br />
                            Dynamically innovate resource-leveling customer service for
                            state of the art customer service.
                        </p>
                    </div>
                    <div class="hidden" id="tab-options">
                        <p>
                            Efficiently unleash cross-media information without
                            cross-media value. Quickly maximize timely deliverables for
                            real-time schemas.
                            <br />
                            <br />
                            Dramatically maintain clicks-and-mortar solutions
                            without functional solutions.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
