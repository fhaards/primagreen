<section class="w-full mx-auto mt-4 py-4 my-4 mt-32">
    <div class="success-banner w-full flex lg:flex-row flex-col py-8">
        <div class="flex flex-1">
            <div class="w-full py-2">
                <h2 class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-900 text-4xl" href="#">
                    Thank you
                </h2>
                <h4 class="uppercase tracking-wide no-underline -mt-2 hover:no-underline font-bold text-gray-700 text-2xl">
                    For order that items
                </h4>
            </div>
        </div>

        <div class="flex text-right py-2 flex flex-col">
            <div class="bg-green-500 p-10 rounded-lg">
                <div class="flex flex-col">
                    <span class="font-bold text-white text-1xl">This is youre order code</span>
                    <span class="font-bold text-white text-2xl"><?= $getNoPemesanan; ?></span>
                </div>
            </div>
            <button class="shadow-lg px-4 py-2 my-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                <p class="tracking-widest"> Check Status Order </p>
            </button>
        </div>
    </div>

    <div class="flex flex-col mt-10">
        <div class="flex">
            <span class="text-gray-600 font-bold">
                A few more steps for the item <br> until you can have it <br>
            </span>
        </div>
        <div class="flex mt-8">
            <span class="text-gray-900 font-bold"> Please do transaction by :</span>
        </div>
        <div class="flex mt-4 flex-col">
            <div class="my-4 flex space-x-4 flex-row text-gray-800 font-semibold">
                <span>1</span>
                <span>
                    Transfer To The Following Account Number <br>
                    MANDIRI No. Account 1010005381882 Dwi Winarsih</span>
            </div>
            <div class="my-4 flex space-x-4 flex-row text-gray-800 font-semibold">
                <span>2</span>
                <span>
                    Money Transfer Confirm Via Website Or Email <br>
                    <span class="font-bold">On Website :</span>
                    <br>
                    Open Your Order History From Account Page & Upload Your Transfers Note
                    <br>
                    <span class="font-bold">On Email :</span> <br>
                    <span class="blockquotes"> <pre>
                        to: twodstore18@gmail.com
                        cc: order_code_yourname
                        message content: transfer notes / transfer proof </pre>
                    </span>
                </span>
            </div>
            <div class="my-4 flex space-x-4 flex-row text-gray-800 font-semibold">
                <span>3</span>
                <span>
                    We Will Process Your Order <br>
                    <span class="font-bold">On Website :</span>
                    <br>
                    - To View The Order Process, You Open It On The Account Page<br>
                    - Duration Of Delivery Depends On Your Location<br>
                    - And You Can Have Those Items :)</span>
                </span>
            </div>
        </div>
    </div>
</section>