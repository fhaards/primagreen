<div class="flex flex-col mt-10 lg:text-base text-xs">
    <div class="flex">
        <span class="text-gray-600 font-bold">
            A few more steps for the item <br> until you can have it <br>
        </span>
    </div>
    <div class="flex mt-8">
        <span class="text-gray-900 font-bold"> Please do transaction by :</span>
    </div>
    <div class="flex flex-col lg:flex-row lg:text-base lg:space-x-10 text-xs">
        <div class="flex-1 mt-4 flex-col">
            <div class="my-4 flex space-x-4 flex-row text-gray-800 font-semibold">
                <span>1</span>
                <span>
                    Transfer to the following bank account number <br>
                    MANDIRI No. Account 1010005381882 Dwi Winarsih</span>
            </div>

            <div class="my-4 flex space-x-4 flex-row text-gray-800 font-semibold">
                <span>2</span>
                <span class="flex flex-col">
                    <span>Confirmation transfer via website </span>
                    <span class="font-bold mt-2">How to :</span>
                    <span>Open youre profile and click the order</span>
                    <span>On details order please upload youre transfer confirmation notes , <br> photos or scan</span>
                </span>
            </div>
            <div class="my-4 flex space-x-4 flex-row text-gray-800 font-semibold">
                <span>3</span>
                <span>
                    We will process youre order <br>
                    <span class="font-bold">Notes :</span>
                    <br>
                    * To view the order status , open Profile > My order<br>
                    * Duration of delivery depends on youre location<br>
                </span>
            </div>
        </div>

        <div class="flex-1 flex-col mt-4 lg:mt-0">
            <div class="flex flex-row my-4 space-x-4  text-gray-800 font-semibold">
                <span class="text-gray-600 font-semibold">Status Information</span>
            </div>

            <div class="flex flex-row my-4 space-x-4 text-gray-800 font-semibold border-b border-gray-300 py-4">
                <div class="w-1/3">
                    <?= get_status_order('ONHOLD'); ?>
                </div>
                <div class="w-2/3">
                    <?= status_order_info('ONHOLD'); ?>
                </div>
            </div>

            <div class="my-4 space-x-4 flex flex-row text-gray-800 font-semibold  border-b border-gray-300 py-4">
                <div class="w-1/3">
                    <?= get_status_order('PROCESS'); ?>
                </div>
                <div class="w-2/3">
                    <?= status_order_info('PROCESS'); ?>
                </div>
            </div>

            <div class="my-4 space-x-4 flex flex-row text-gray-800 font-semibold  border-b border-gray-300 py-4">
                <div class="w-1/3">
                    <?= get_status_order('PACKING'); ?>
                </div>
                <div class="w-2/3">
                    <?= status_order_info('PACKING'); ?>
                </div>
            </div>

            <div class="my-4 space-x-4 flex flex-row text-gray-800 font-semibold  border-b border-gray-300 py-4">
                <div class="w-1/3">
                    <?= get_status_order('COMPLETE'); ?>
                </div>
                <div class="w-2/3">
                    <?= status_order_info('COMPLETE'); ?>
                </div>
            </div>

        </div>
    </div>
</div>