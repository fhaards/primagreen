<section class="w-full mx-auto bg-white mt-20 md:mt-32">
    <div class="container w-full mx-auto lg:flex">
        <div class="flex-1">
            <div class="w-full z-30 top-0 py-1">
                <div class="w-full container mx-auto flex flex-wrap justify-between mt-0">
                    <span class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                        Login
                    </span>
                </div>
            </div>
            <div class="lg:w-2/3">
                <?php echo validation_errors(); ?>
                <?php echo form_open('login'); ?>
                <label class="block text-sm py-2">
                    <span class="text-gray-700 dark:text-gray-400">Email</span>
                    <input name="email" type="email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Type youre emal" />
                </label>
                <label class="block text-sm py-2">
                    <span class="text-gray-700 dark:text-gray-400">Password</span>
                    <input name="password" type="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Type youre password" />
                </label>
                <label>
                    <div class="mt-4">
                        <?php echo $show_captcha; ?>
                    </div>
                </label>
                <label>
                    <button type="submit" class="mt-8 shadow-lg w-full px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                        <p class="tracking-widest"> Login </p>
                    </button>
                </label>
                <?php echo form_close(); ?>
                <label>
                    <p class="mt-8 text-sm">
                        New User? Registration or Signup Click -<a href="<?php echo base_url() . 'registration' ?>" class="text-blue-600 underline hover:text-blue-700"> Here</a>
                    </p>
                </label>
            </div>
        </div>
        <div class="flex-1 lg:block hidden">
            <div class="login-banner h-full"></div>
        </div>

    </div>
</section>