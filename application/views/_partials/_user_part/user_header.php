<header id="header-nav" class="nav-header fixed z-40 bg-white h-20 py-5 top-0 w-full mx-auto border-b-2 border-gray-300">
  <div class="container flex items-center justify-between h-full mx-auto px-6">
    <!-- Mobile hamburger -->
    <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">
      <svg class="w-6 h-6 fill-current text-green-500" aria-hidden="true" fill="" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
      </svg>
    </button>

    <?php
    $hal = $this->uri->segment(1);
    $hal2 = $this->uri->segment(2);
    $activeside = "py-1 px-4 uppercase bg-gray-200 tracking-widest items-center text-sm font-bold transition-colors duration-150 text-gray-800 hover:bg-gray-100 mx-auto rounded-md";
    $inactiveside = "py-1 px-4 uppercase tracking-widest items-center text-sm font-bold transition-colors duration-150 text-gray-800 hover:bg-gray-200 mx-auto rounded-md focus:bg-gray-200";
    ?>

    <!-- Logo -->
    <div class="hidden md:block mr-10 items-center">
      <div class="mx-auto w-full items-center">
        <a class="text-lg font-bold" href="<?= base_url(); ?>">
          <img class="h-6 w-100 pr-4 object-cover" src="<?php echo base_url() . 'uploads/company/' . getCompanyData()['logo']; ?>" alt="" loading="lazy" />
        </a>
      </div>
    </div>

    <!-- Desktop Menu -->
    <div class="hidden md:block items-center ">
      <div class="mx-auto focus-within:text-green-500 flex flex-row space-x-2">
        <!-- <a href="<?= base_url(); ?>store/product-list" class="<?= ($hal == 'store') ? $activeside :  $inactiveside; ?> store-trigger" onmouseover="openSubNav()" onmouseout="closeSubNav()"> -->
        <a href="<?= base_url(); ?>store/product-list" class="<?= ($hal == 'store') ? $activeside :  $inactiveside; ?> store-trigger">
          Store
        </a>
        <a href="<?= base_url(); ?>about-us" class="<?= ($hal == 'about-us') ? $activeside :  $inactiveside; ?>">
          About Us
        </a>
      </div>
    </div>

    <div class="flex-1 items-center py-2">
      <ul class="flex flex-row-reverse">


        <li class="relative">
          <button style="cursor:pointer;" class="flex flex-row md:space-x-5 focus:outline-none <?= ($hal == 'profile') ? $activeside :  $inactiveside; ?>" @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true">
            <svg class="md:w-5 md:h-5 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <?php if (isUser()) : ?><label class="md:block hidden"><?= getUserData()['nama']; ?></label> <?php endif; ?>
          </button>
          <template x-if="isProfileMenuOpen">
            <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700" aria-label="submenu">
              <?php if (isUser()) : ?>
                <li class="flex">
                  <a href="<?= base_url(); ?>profile/user-account/<?= getUserData()['username']; ?>" class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                    <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                      <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>My Account</span>
                  </a>
                </li>
              <?php endif; ?>

              <li class="flex">
                <?php if (isLoggedIn()) { ?>
                  <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="<?= base_url(); ?>logout">
                    <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                      <path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    <span>Logout</span>
                  </a>
                <?php } else { ?>
                  <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="<?= base_url(); ?>login">
                    <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                      <path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    <span>Login / Sign Up</span>
                  </a>
                <?php } ?>
              </li>
            </ul>
          </template>
        </li>

        <li id="cart_icons" class="relative  mr-2">
          <button class="show-cart-menu align-middle focus:outline-none <?= ($hal == 'cart') ? $activeside :  $inactiveside; ?>">
            <svg class="md:w-5 md:h-5 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <!-- -mt-5 right-10 -->
            <div id="notif-cart">
              <span class="absolute w-3 h-3 -mt-6 ml-1 bg-green-600 border-2 border-white rounded-full"></span>
            </div>
          </button>
        </li>
      </ul>
    </div>


  </div>
</header>

<section id="sub-nav" onmouseover="openSubNav()" onmouseout="closeSubNav()" class="fixed w-full z-40 mt-20 overflow-y-hidden bg-gray-100">
  <div class="container flex mx-auto px-6 my-8">
    <div class="flex flex-col mr-20">
      <div class="flex"><span class="text-gray-800 font-bold leading-5 mb-5 leading-5 tracking-widest">Store</span> </div>
      <ul>
        <li class="py-1"><a href="#" class="text-gray-600 font-semibold hover:text-gray-500">Show All Items</a></li>
        <li class="py-1"><a href="#" class="text-gray-600 font-semibold hover:text-gray-500">Show All Items</a></li>
        <li class="py-1"><a href="#" class="text-gray-600 font-semibold hover:text-gray-500">Show All Items</a></li>
      </ul>
    </div>
    <div class="flex-col mr-20">
      <div class="flex"><span class="text-gray-800 font-bold leading-5 mb-5 leading-5 tracking-widest">Features</span> </div>
      <ul>
        <li class="py-1"><a href="#" class="text-gray-600 font-semibold hover:text-gray-500">Lastest add</a></li>
        <li class="py-1"><a href="#" class="text-gray-600 font-semibold hover:text-gray-500">Discount Up 25%</a></li>
      </ul>
    </div>
    <div class="flex">
      <div class="image-subnav bg-red-200">
        <img class="object-cover w-full h-full" src="<?php echo base_url() . 'assets/image/subnav.jpg'; ?>">
      </div>
    </div>
  </div>
</section>


<!-- <li class="flex">
  <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
    <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
      <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
    </svg>
    <span>Profile</span>
  </a>
</li>
<li class="flex">
  <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
    <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
      <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
      <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
    </svg>
    <span>Settings</span>
  </a>
</li> -->