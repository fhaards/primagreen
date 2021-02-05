<?php
$user_js_page = $this->uri->segment(1);
$user_js_page_2 = $this->uri->segment(2);
?>

<?php if ($user_js_page == 'profile') : ?>
    <script src="<?php echo base_url() . 'assets/thisweb_assets/conf_ajax/frontend/config_profile.js'; ?>"></script>
<?php endif; ?>

<?php if ($user_js_page == 'how-to-buy') : ?>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/fullPageJs/fullpage.js'; ?>"></script>
    <!-- <script type="text/javascript" src="examples.js"></script> -->
    <script type="text/javascript">
        var myFullpage = new fullpage('#fullpage', {
            sectionsColor: ['#F3F4F6', '#F3F4F6', '#F3F4F6', '#F3F4F6', '#F3F4F6'],
            anchors: ['firstPage', 'secondPage', '3rdPage'],
            navigation: true,
            navigationTooltips: ['Page 1', 'Page 2', 'Any text!'],
            showActiveTooltip: true,
            menu: '#menu'
        });
    </script>
<?php endif; ?>