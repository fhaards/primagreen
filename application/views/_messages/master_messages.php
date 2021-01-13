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
    <!-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;700;800;900&display=swap" rel="stylesheet"> -->
    <!-- Tailwind -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/tailwind/css/tailwind.output.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/tailwind/css/tailwinds.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/thisweb_assets/css/thisweb.css'; ?>" />
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <?php $this->load->view($content); ?>
    </div>
    <script>
        var BASE_URL = "<?php echo base_url(); ?>";
        var SITE_URL = "<?php echo site_url(); ?>";
        const el = document.getElementById('messages')
        el.scrollTop = el.scrollHeight
    </script>
    <!-- Load Js -->
    <script src="<?php echo base_url() . 'assets/jquery/jquery-2.2.3.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/tailwind/js/alpine.min.js'; ?>" defer></script>
    <script src="<?php echo base_url() . 'assets/tailwind/js/init-alpine.js'; ?>" language="javascript"></script>
    <script>
      
    </script>
</body>

</html>