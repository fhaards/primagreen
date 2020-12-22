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
                    Transfer To The Following Account Number <br>
                    MANDIRI No. Account 1010005381882 Dwi Winarsih</span>
            </div>

            <div class="my-4 flex space-x-4 flex-row text-gray-800 font-semibold">
                <span>2</span>
                <span class="flex flex-col">
                    <span>Money Transfer Confirm Via Website Or Email</span>
                    <span class="font-bold mt-2">On Website :</span>
                    <span>Open Your Order History From Account Page & Upload Your Transfers Note</span>
                    <span class="font-bold mt-2">On Email :</span>
                    <ul class="border border-green-500 mx-auto my-4 p-4 rounded-sm">
                        <li><span class="font-bold">to:</span> twodstore18@gmail.com</li>
                        <li><span class="font-bold">cc:</span> order_code_yourname</li>
                        <li><span class="font-bold">message content:</span> transfer notes / transfer proof</li>
                    </ul>
                </span>
            </div>
            <div class="my-4 flex space-x-4 flex-row text-gray-800 font-semibold">
                <span>3</span>
                <span>
                    We Will Process Your Order <br>
                    <span class="font-bold">On Website :</span>
                    <br>
                    * To View The Order Process, You Open It On The Account Page<br>
                    * Duration Of Delivery Depends On Your Location<br>
                </span>
            </div>
        </div>

        <div class="flex-1 flex-col mt-4 lg:mt-0">
            <div class="flex flex-row my-4 space-x-4  text-gray-800 font-semibold">
                <span class="text-gray-600 font-semibold">Status Information</span>
            </div>

            <div class="flex flex-row my-4 space-x-4 text-gray-800 font-semibold border-b border-gray-300 py-4">
                <div class="w-1/3 uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl">
                    <span class="<?= status_order_color('ONHOLD'); ?>">ONHOLD</span>
                </div>
                <div class="w-2/3">The order was succcesfully , you must transfer to our bank account and validate transfer proof in website profile account</div>
            </div>

            <div class="my-4 space-x-4 flex flex-row text-gray-800 font-semibold  border-b border-gray-300 py-4">
                <div class="w-1/3 uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl">
                    <span class="<?= status_order_color('PROCESS'); ?>">PROCESS</span>
                </div>
                <div class="w-2/3">
                    Administrator will check youre transfer proof. If the transfer proof was valid , we will packing your order and send to youre destination
                </div>
            </div>

            <div class="my-4 space-x-4 flex flex-row text-gray-800 font-semibold  border-b border-gray-300 py-4">
                <div class="w-1/3 uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl">
                    <span class="<?= status_order_color('PACKING'); ?>">PACKING</span>
                </div>
                <div class="w-2/3">
                    The items was packing and we will send to your destination. Destination is same as your address or youre input in checkout.
                </div>
            </div>

            <div class="my-4 space-x-4 flex flex-row text-gray-800 font-semibold  border-b border-gray-300 py-4">
                <div class="w-1/3 uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl">
                    <span class="<?= status_order_color('COMPLETE'); ?>">COMPLETE</span>
                </div>
                <div class="w-2/3">
                    The Order was complete, and enjoy our products :) .
                </div>
            </div>

        </div>
    </div>
</div>