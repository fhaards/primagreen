<section class="w-full mx-auto bg-white mt-20 lg:mt-32">
    <div class="container w-full mx-auto lg:flex pt-2 pb-2">
        <div class="flex-1">
            <div id="new-items" class="w-full z-30 top-0 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-3">
                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                        Login
                    </a>
                </div>
            </div>
            <div class="grid gap-4 lg:grid-cols-1">
                <?php echo validation_errors(); ?>
                <?php echo form_open('login'); ?>
                <label class="block text-sm py-2">
                    <span class="text-gray-700 dark:text-gray-400">Email</span>
                    <input name="email" type="email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Type youre username" />
                </label>
                <label class="block text-sm py-2">
                    <span class="text-gray-700 dark:text-gray-400">Password</span>
                    <input name="password" type="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Type youre password" />
                </label>
                <label>
                    <button type="submit" class="mt-6 inline-block w-full items-center px-4 py-2 text-md tracking-wide font-bold leading-5 text-white transition-colors  duration-150 bg-green-500 border border-transparent rounded-lg active:bg-green-800 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                        <span>Login</span>
                    </button>
                </label>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="lg:flex-1"></div>
        <div class="flex-1">
            <div id="new-items" class="w-full z-30 top-0 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-3">
                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                        Sign Up
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>