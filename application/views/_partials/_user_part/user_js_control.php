<?php
$user_js_page = $this->uri->segment(1);
$user_js_page_2 = $this->uri->segment(2);
?>

<?php if ($user_js_page == 'profile') : ?>
    <script src="<?php echo base_url() . 'assets/thisweb_assets/conf_ajax/frontend/config_profile.js'; ?>"></script>
<?php endif; ?>
