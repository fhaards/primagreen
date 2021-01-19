<div class="lg:w-2/3 mt-10">
    <?php echo validation_errors(); ?>
    <?php echo form_open('contact-us/guest'); ?>
    <label class="block text-sm py-2">
        <span class="text-gray-700 font-semibold">Email</span>
        <input name="email" type="email" class="block w-full mt-1 text-sm dark:border-gray-600 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" placeholder="Type youre email" />
    </label>
    <label class="block text-sm py-2">
        <span class="text-gray-700 font-semibold">Name</span>
        <input name="name" type="text" class="block w-full mt-1 text-sm dark:border-gray-600 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" placeholder="Type youre name" />
    </label>
    <label class="block text-sm py-2 mt-5 border-t border-gray-300">
        <span class="text-gray-700 font-semibold">Subject</span>
        <input name="subject" type="text" maxlength="150" class="block w-full mt-1 text-sm dark:border-gray-600 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" placeholder="Type your subject , max 150 char" />
    </label>
    <label class="block text-sm py-2 mt-5">
        <span class="text-gray-700 font-semibold">Messages</span>
        <textarea name="msg" type="text" rows="10" class="block w-full mt-1 text-sm dark:border-gray-600 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" placeholder="Type your messages"></textarea>
    </label>

    <label>
        <div class="mt-4 ">
            <?php echo $show_captcha; ?>
        </div>
    </label>
    <label>

        <button type="submit" class="flex items-center mt-8 shadow-lg w-full text-sm font-bold  text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
            <div class="mx-auto flex flex-row space-x-2 py-2 items-center">
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
                </svg>
                <span class=""> Send Messages </span>
            </div>
        </button>
    </label>
    <?php echo form_close(); ?>
</div>