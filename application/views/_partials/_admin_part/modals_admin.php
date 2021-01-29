<?php
$modal_page = $this->uri->segment(1);
$modal_page_2 = $this->uri->segment(2);
if ($modal_page == 'order') :
    // MODAL CHANGE STATUS
    $this->load->view('_adminpages/order/change_status');
endif;

if($modal_page == 'sold') :
    // MODAL REPORT ORDER
    $this->load->view('_adminpages/sold/report_order');
endif;


if($modal_page_2 == 'faq') :
    // MODAL FAQ
    $this->load->view('_adminpages/faq/form_add');
    $this->load->view('_adminpages/faq/form_edit');
endif;

if($modal_page == 'product') :
    // MODAL REPORT ORDER
    $this->load->view('_adminpages/related/features/form_edit_features_modals');
endif;


?>

