<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
  <div class="py-4 text-gray-500 dark:text-gray-400">

    <div class="pl-6 pr-20 py-6">
      <a class="text-lg font-bold" href="<?= base_url(); ?>dashboard">
        <img class="object-cover" src="<?php echo base_url() . 'uploads/company/' . getCompanyData()['logo']; ?>" alt="" loading="lazy" />
      </a>
    </div>

    <ul class="mt-6 py-3"></ul>

    <?php
    $hal = $this->uri->segment(1);
    $hal2 = $this->uri->segment(2);
    $activeside = "inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100";
    $inactiveside = "inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200";
    ?>

    <ul>
    <li class="relative px-6 py-3">
        <span class="<?= ($hal == 'dashboard') ? 'absolute inset-y-0 left-0 w-1 bg-green-500 rounded-tr-lg rounded-br-lg' : ''; ?>" aria-hidden="true"></span>
        <a class="<?= ($hal == 'dashboard') ? $activeside :  $inactiveside; ?>" href="<?= base_url(); ?>dashboard">
          <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
          </svg>
          <span class="ml-4">Dashboard</span>
        </a>
      </li>

      <li class="relative px-6 py-3">
        <span class="<?= ($hal == 'product') ? 'absolute inset-y-0 left-0 w-1 bg-green-500 rounded-tr-lg rounded-br-lg' : ''; ?>" aria-hidden="true"></span>
        <button class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" @click="togglePagesMenu" aria-haspopup="true">
          <span class="inline-flex items-center">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
            <span class="ml-4">Products</span>
          </span>
          <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </button>
        <template x-if="isPagesMenuOpen">
          <ul x-transition:enter="transition-all ease-in-out duration-300" x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl" x-transition:leave="transition-all ease-in-out duration-300" x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0" class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900" aria-label="submenu">
            <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
              <a class="w-full" href="<?= base_url(); ?>product/product-list">
                Product/ Plant List
              </a>
            </li>
            <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
              <a class="w-full" href="<?= base_url(); ?>product/type-list">
                Type
              </a>
            </li>
            <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
              <a class="w-full" href="<?= base_url(); ?>product/features-list">
                Features
              </a>
            </li>
            <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
              <a class="w-full" href="<?= base_url(); ?>product/courier-list">
                Courier
              </a>
            </li>
          </ul>
        </template>
      </li>

      <li class="relative px-6 py-3">
        <span class="<?= ($hal == 'order' || $hal == 'order-list') ? 'absolute inset-y-0 left-0 w-1 bg-green-500 rounded-tr-lg rounded-br-lg' : ''; ?>" aria-hidden="true"></span>
        <a class="<?= ($hal == 'order' || $hal2 == 'order-list') ? $activeside :  $inactiveside; ?>" href="<?= base_url(); ?>order/order-list">
          <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
          </svg>
          <span class="ml-4">Order</span>
        </a>
      </li>

      <li class="relative px-6 py-3">
        <span class="<?= ($hal == 'sold' || $hal2 == 'sold-list') ? 'absolute inset-y-0 left-0 w-1 bg-green-500 rounded-tr-lg rounded-br-lg' : ''; ?>" aria-hidden="true"></span>
        <a class="<?= ($hal == 'sold' || $hal2 == 'sold-list') ? $activeside :  $inactiveside; ?>" href="<?= base_url(); ?>sold/sold-list">
          <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          <span class="ml-4">Purchased</span>
        </a>
      </li>
      <div class="px-6 my-6">
        <a href="<?= base_url(); ?>product/product-add" class="flex space-x-2 items-center shadow-lg px-4 py-2 text-sm font-bold leading-5  transition-colors duration-150 text-white border border-green-600 bg-green-500 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-green-600 focus:outline-none focus:shadow-outline-green">
          New Product
          <span class="ml-2" aria-hidden="true">+</span>
        </a>
      </div>


      <li>
        <hr class="m-4">
      </li>


      <!-- SETTING MENU -->
      <li class="relative px-6 py-3">
        <span class="<?= ($hal == 'user') ? 'absolute inset-y-0 left-0 w-1 bg-green-500 rounded-tr-lg rounded-br-lg' : ''; ?>" aria-hidden="true"></span>
        <a class="<?= ($hal == 'user') ? $activeside :  $inactiveside; ?>" href="<?= base_url(); ?>user/user-list">
          <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path>
          </svg>
          <span class="ml-4">User List</span>
        </a>
      </li>

      <li class="relative px-6 py-3">
        <button class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" @click="toggleSettingsMenu" aria-haspopup="true">
          <span class="inline-flex items-center">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
            </svg>
            <span class="ml-4">Settings</span>
          </span>
          <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </button>
        <template x-if="isSettingMenuOpen">
          <ul x-transition:enter="transition-all ease-in-out duration-300" x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl" x-transition:leave="transition-all ease-in-out duration-300" x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0" class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900" aria-label="submenu">
            <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
              <a class="w-full" href="<?= base_url(); ?>company/profile">
                Company Profile
              </a>
            </li>
            <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
              <a class="w-full" href="<?= base_url()?>banner/image-gallery">
                Banner
              </a>
            </li>
          </ul>
        </template>
      </li>

    </ul>


  </div>
</aside>