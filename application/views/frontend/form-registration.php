<div class="container px-6 py-3  mx-auto grid min-h-screen">
    <section class="w-full mx-auto bg-white mt-20 lg:mt-32">
        <div class="container w-full mx-auto lg:flex">
            <div class="flex-1">
                <div class="w-full z-30 top-0">
                    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-3">
                        <span class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                            Sign Up
                        </span>
                    </div>
                </div>
                <div class="lg:w-2/3">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('registration'); ?>
                    <label>
                        <span class="text-green-600">Account</span>
                    </label>
                    <label class="block text-sm py-2">
                        <span class="text-gray-700 dark:text-gray-400">Email <strong id="email_result" class="float-right"></strong></span>
                        <input name="email" required type="email" id="email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Type youre email" />

                    </label>
                    <label class="block text-sm py-2">
                        <span class="text-gray-700 dark:text-gray-400">Password <span class="text-xs">( at least 7 character )</span></span>
                        <input name="password" type="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Type youre password" />
                    </label>
                    <label class="block text-sm py-2">
                        <span class="text-gray-700 dark:text-gray-400">Re-Password</span>
                        <input name="password_confirm" type="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Type youre confirm password" />
                    </label>
                    <label>
                        <hr class="my-8">
                        <span class="text-green-600">Personal Data</span>
                    </label>
                    <label class="block text-sm py-2">
                        <span class="text-gray-700 dark:text-gray-400">Full Name</span>
                        <input name="nama" type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Type youre name" />
                    </label>
                    <label class="block text-sm py-2">
                        <span class="text-gray-700 dark:text-gray-400">Telp. Number</span>
                        <input name="tlp" type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="+628 " />
                    </label>
                    <label class="block text-sm py-2">
                        <span class="text-gray-700 dark:text-gray-400">Address</span>
                        <textarea name="alamat" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Type youre address"></textarea>
                    </label>
                    <label>
                        <div class="mt-4">
                            <?php echo $show_captcha; ?>
                            <?php echo form_error('g-recaptcha-response'); ?>
                        </div>
                    </label>
                    <label>
                        <button type="submit" class="flex mt-8 shadow-lg w-full px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                            <div class="mx-auto flex flex-row space-x-2 items-center">
                                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                <span class=""> Sign Up </span>
                            </div>
                        </button>
                    </label>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div class="flex-1  h-full lg:block hidden">
                <div class="signup-banner"></div>
            </div>
        </div>
    </section>
</div>