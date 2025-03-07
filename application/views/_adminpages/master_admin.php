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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/DataTables/datatables.min.css'; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/DataTables/css/dataTables.tailwind.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/tailwind/css/chart.min.css'; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/thisweb_assets/css/thisweb.css'; ?>" />
    <script src="<?php echo base_url() . 'assets/sweetalert/sweetalert_1/sweetalert.min.js'; ?>" language="javascript"></script>

    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/sweetalert/sweetalert2.min.css'; ?>">
    <script src="<?php echo base_url() . 'assets/sweetalert/sweetalert2.min.js'; ?>" language="javascript"></script>
    <script src="<?php echo base_url() . 'assets/sweetalert/sweetalert2.js'; ?>" language="javascript"></script> -->

</head>

<body class="scrollbar-none">
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <?php $this->load->view('_partials/content_alert'); ?>
        <!-- sidebar -->
        <?php $this->load->view('_partials/_admin_part/sidebar'); ?>
        <!-- Backdrop -->
        <?php $this->load->view('_partials/_admin_part/backdrop'); ?>
        <!-- Main -->
        <div class="flex flex-col flex-1 w-full">
            <!-- Header Menu -->
            <?php $this->load->view('_partials/_admin_part/header'); ?>
            <div id="popup-notif" class="fixed right-0 mt-20 mr-10 flex flex-col z-40">
                <div class="order-notif hidden bg-blue-200 text-blue-600 font-semibold border border-blue-300 shadow-xs px-4 py-1 rounded-md mb-2">
                    Some user order a products
                </div>
            </div>
            <!-- Main Content -->
            <main class="h-full overflow-y-auto">
                <div class="container px-6 py-3 mx-auto grid">
                    <?php $this->load->view("_partials/_admin_part/page_title"); ?>
                    <?php $this->load->view($content); ?>
                </div>
            </main>
        </div>
    </div>
    <?php $this->load->view('_partials/_admin_part/modals_admin'); ?>
    <script>
        var BASE_URL = "<?php echo base_url(); ?>";
        var SITE_URL = "<?php echo site_url(); ?>";
    </script>
    <!-- Load Js -->
    <script src="<?php echo base_url() . 'assets/jquery/jquery-2.2.3.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/tailwind/js/alpine.min.js'; ?>" defer></script>
    <script src="<?php echo base_url() . 'assets/tailwind/js/init-alpine.js'; ?>" language="javascript"></script>
    <script src="<?php echo base_url() . 'assets/tailwind/js/charts.min.js'; ?>" defer></script>
    <script src="<?php echo base_url() . 'assets/tailwind/js/charts-lines.js'; ?>" defer></script>
    <script src="<?php echo base_url() . 'assets/tailwind/js/charts-pie.js'; ?>" defer></script>
    <script src="<?php echo base_url() . 'assets/DataTables/datatables.min.js'; ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'assets/thisweb_assets/conf_ajax/adminpages/config_dataTables.js'; ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'assets/thisweb_assets/conf_ajax/config_base.js'; ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'vendor/tinymce/tinymce/tinymce.min.js'; ?>"></script>
    <?php $this->load->view('_partials/_admin_part/js_control'); ?>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
        var pusher = new Pusher('a666a399a7a6016c0bf0', {
            cluster: 'ap1'
        });
        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            // alert(JSON.stringify(data));
            $(".order-notif").show("slow",function (){
                setTimeout(function(){
                    $(".order-notif").hide();
                },4000);
            });
        });
    </script>
    <script>
        // $("#order-notif").show(function() {
        //     setTimeout(function() {
        //         $("#popup-notif .order-notif").hide();
        //     }, 4000);
        // });
        $("#resi_no").hide();
        $(document).ready(function() {
            $("#change_status_order").on('change', 'select', function() {
                if (this.value == "COMPLETE") {
                    $("#resi_no").show();
                } else {
                    $("#resi_no").hide();
                }
            });
        });

        tinymce.remove();
        tinymce.init({
            selector: '.tiny-mce'
        });
    </script>
</body>

</html>