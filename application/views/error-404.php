<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html :class="{}" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url() . 'uploads/company/' . getCompanyData()['icon']; ?>">
    <!-- Font style -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Tailwind -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/tailwind/css/tailwind.output.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/tailwind/css/tailwinds.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/tailwind/css/chart.min.css'; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/primagreen.css'; ?>" />
</head>

<body>
    <div class="flex h-screen bg-gray-50 items-center" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Main -->
        <div class="flex flex-col flex-1 w-full">
            <!-- Main Content -->
            <main class="h-full">
                <div class="container px-6 py-3 mx-auto h-full">
                    <div class="grid grid-cols-2 gap-6 p-6">
                        <div class="flex-1 flex flex-col">
                            <h2 class="text-6xl font-semibold -mt-2 mb-4 text-gray-700">Oops !! </h2>
                            <div>
                                <h2 class="text-lg font-semibold -mt-2 mb-4 text-gray-500">This page is not found</h2>
                                <button onclick="window.history.go(-1); return false;" class="block space-x-3 items-center px-4 py-2 text-sm font-black rounded-md text-white transition-colors duration-150 bg-gray-800 active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                                    GO BACK
                                </button>
                            </div>
                        </div>
                        <div class="flex-1 h-full">
                            <img class="object-fit-cover" src="<?= base_url() . 'assets/image/404.svg'; ?>">
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- Load Js -->
    <script src="<?php echo base_url() . 'assets/tailwind/js/alpine.min.js'; ?>" defer></script>
    <script src="<?php echo base_url() . 'assets/tailwind/js/init-alpine.js'; ?>" language="javascript"></script>
</body>

</html>