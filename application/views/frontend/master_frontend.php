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
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text&display=swap" rel="stylesheet">
    <!--  
    <link href="https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@300;400;500;700;900&display=swap" rel="stylesheet">-->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" /> -->

    <!-- Tailwind -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/tailwind/css/tailwind.output.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/tailwind/css/tailwinds.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/DataTables/datatables.min.css'; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/DataTables/css/dataTables.tailwind.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/sweetalert/sweetalert2.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/tailwind/css/chart.min.css'; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/primagreen.css'; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/jquery/jquery-ui.css'; ?>" />
    <script src="<?php echo base_url() . 'assets/sweetalert/sweetalert2.min.js'; ?>" language="javascript"></script>
    <script src="<?php echo base_url() . 'assets/sweetalert/sweetalert2.js'; ?>" language="javascript"></script>
</head>

<body>
    <div class="flex h-screen bg-white" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <?php $this->load->view('_partials/content_alert'); ?>
        <!-- Backdrop -->
        <?php $this->load->view('_partials/_user_part/user_backdrop'); ?>
        <!-- Main -->
        <div class="flex flex-col flex-1 w-full ">
            <!-- Header & Cart Menu -->
            <?php $this->load->view('_partials/_user_part/user_header'); ?>
            <?php $this->load->view('frontend/cart/show_cart'); ?>

            <!-- Main Content -->
            <main class="h-full " id="main">
                <div class="container px-6 py-3 mx-auto grid min-h-screen">
                    <?php $this->load->view($content); ?>
                </div>
                <!-- Footer -->
                <?php $this->load->view('_partials/footer'); ?>
            </main>
        </div>
    </div>

    <!-- Modal -->
    <?php
    if (isLoggedIn()) {
        $this->load->view('_partials/modals');
    }
    ?>
    <!-- Load JQ -->
    <script>
        var BASE_URL = "<?php echo base_url(); ?>";
        var SITE_URL = "<?php echo site_url(); ?>";
    </script>
    <script src="<?php echo base_url() . 'assets/jquery/jquery-2.2.3.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/jquery/jquery-ui.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/tailwind/js/alpine.min.js'; ?>" defer></script>
    <script src="<?php echo base_url() . 'assets/tailwind/js/init-alpine.js'; ?>" language="javascript"></script>
    <script>
        $(document).ready(function() {
            $('#detail_cart').load("<?php echo site_url(); ?>cart/load-cart", function() {
                if ($("#cekrowcart").val() == "0" || $("#cekrowcart").val() == null) {
                    $("#checkout-btn").hide();
                    $("#notif-cart").hide();
                } else {
                    $("#checkout-btn").show();
                    $("#notif-cart").show();
                }
            });
            
        });
    </script>
    <script src="<?php echo base_url() . 'assets/js_ajax/config_cart.js'; ?>" language="javascript"></script>
    <script src="<?php echo base_url() . 'assets/js_ajax/config_custom.js'; ?>" language="javascript"></script>
    <script src="<?php echo base_url() . 'assets/js_ajax/config_frontend.js'; ?>" language="javascript"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuxj-0utMuNbJbokRsEEVbfiV5t_t6NRU&callback=initMap"></script> -->
</body>

</html>