<section class="w-full mx-auto bg-white mt-20 lg:mt-32">
    <div class="container w-full mx-auto lg:flex pt-2 pb-2">
        <div class="flex-1">
            <div class="w-full z-30 top-0 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-3">
                    <span class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                        Sign Up
                    </span>
                </div>
            </div>
            <div class="lg:w-2/3">
                <span class="text-sm text-red-700"> <?php echo validation_errors(); ?></span>
                <?php echo form_open('registration'); ?>
                <label class="block text-sm py-2">
                    <span class="text-gray-700 dark:text-gray-400">Email</span>
                    <input name="email" type="email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Type youre username" />
                </label>
                <label class="block text-sm py-2">
                    <span class="text-gray-700 dark:text-gray-400">Password</span>
                    <input name="password" type="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Type youre password" />
                </label>
                <label class="block text-sm py-2">
                    <span class="text-gray-700 dark:text-gray-400">Re-Password</span>
                    <input name="password_confirm" type="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Type youre confirm password" />
                </label>
                <label>
                    <button type="submit" class="mt-8 shadow-lg w-full px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                        <p class="tracking-widest"> Sign Up </p>
                    </button>
                </label>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="flex-1 lg:block hidden">
            <div class="signup-banner">
                <h4 class="text-white p-6 rounded-lg">
                </h4>
            </div>
        </div>
    </div>
</section>