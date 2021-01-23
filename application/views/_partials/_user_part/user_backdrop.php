<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
  <div class="py-4 text-gray-500 dark:text-gray-400">

    <div class="pl-6 pr-20 py-6">
      <a class="text-lg font-bold" href="<?= base_url() . ''; ?>">
        <img class="object-cover" src="<?php echo base_url() . 'uploads/company/' . getCompanyData()['logo']; ?>" alt="" loading="lazy" />
      </a>
    </div>

    <?php
    $mobile_pages = $this->uri->segment(1);
    $mobile_pages2 = $this->uri->segment(2);
    $activeside = "inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100";
    $inactiveside = "inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200";
    ?>

    <ul>
      <li class="relative px-6 py-3">
        <span class="<?= ($mobile_pages == 'store') ? 'absolute inset-y-0 left-0 w-1 bg-green-500 rounded-tr-lg rounded-br-lg' : ''; ?>" aria-hidden="true"></span>
        <a class="<?= ($mobile_pages == 'store') ? $activeside :  $inactiveside; ?>" href="<?= base_url() . 'store/product-list'; ?>">
          <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
          </svg>
          <span class="ml-4">Store</span>
        </a>
      </li>

      <li>
        <hr class="m-4">
      </li>

      <li class="relative px-6 py-3">
        <span class="<?= ($mobile_pages == 'about-us') ? 'absolute inset-y-0 left-0 w-1 bg-green-500 rounded-tr-lg rounded-br-lg' : ''; ?>" aria-hidden="true"></span>
        <a class="<?= ($mobile_pages == 'about-us') ? $activeside :  $inactiveside; ?>" href="<?= base_url() . 'about-us'; ?>">
          <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
          </svg>
          <span class="ml-4">About Us</span>
        </a>
      </li>

      <li class="relative px-6 py-3">
        <span class="<?= ($mobile_pages == 'contact-us') ? 'absolute inset-y-0 left-0 w-1 bg-green-500 rounded-tr-lg rounded-br-lg' : ''; ?>" aria-hidden="true"></span>
        <a class="<?= ($mobile_pages == 'contact-us') ? $activeside :  $inactiveside; ?>" href="<?= base_url() . 'contact-us'; ?>">
          <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
          </svg>
          <span class="ml-4">Contact Us</span>
        </a>
      </li>

      <li>
        <hr class="m-4">
      </li>


      <!-- SETTING MENU -->
      <?php if (isLoggedIn()) : ?>
        <li class="relative px-6 py-3">
          <span class="<?= ($mobile_pages == 'profile') ? 'absolute inset-y-0 left-0 w-1 bg-green-500 rounded-tr-lg rounded-br-lg' : ''; ?>" aria-hidden="true"></span>
          <button class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" @click="togglePagesMenu" aria-haspopup="true">
            <span class="inline-flex items-center">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
              </svg>
              <span class="ml-4">My Account</span>
            </span>
            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
          </button>
          <template x-if="isPagesMenuOpen">
            <ul x-transition:enter="transition-all ease-in-out duration-300" x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl" x-transition:leave="transition-all ease-in-out duration-300" x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0" class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900" aria-label="submenu">
              <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                <a class="w-full" href="<?= base_url() . 'profile/user-dashboard'; ?>">
                  Account Information
                </a>
              </li>
              <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                <a class="w-full" href="<?= base_url() . 'profile/edit-address'; ?>">
                  My Address
                </a>
              </li>
              <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                <a class="w-full" href="<?= base_url() . 'profile/order-history'; ?>">
                  Order History
                </a>
              </li>
            </ul>
          </template>
        </li>
      <?php endif; ?>
    </ul>


  </div>
</aside>