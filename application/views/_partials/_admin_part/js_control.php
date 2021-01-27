<?php
$js_page = $this->uri->segment(1);
$js_page_2 = $this->uri->segment(2);
?>

<?php if ($js_page == 'order') : ?>
    <script src="<?php echo base_url() . 'assets/thisweb_assets/conf_ajax/adminpages/config_order.js'; ?>"></script>
<?php endif; ?>

<?php if ($js_page == 'product') : ?>
    <script src="<?php echo base_url() . 'assets/thisweb_assets/conf_ajax/adminpages/config_product.js'; ?>"></script>
<?php endif; ?>

<?php if ($js_page_2 == 'faq') : ?>
    <script src="<?php echo base_url() . 'assets/thisweb_assets/conf_ajax/adminpages/config_faq.js'; ?>"></script>
<?php endif; ?>