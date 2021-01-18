<?php
$user_modal_page = $this->uri->segment(1);
$user_modal_page_2 = $this->uri->segment(2);
if($user_modal_page_2 == 'detail-order') :
    // MODAL TRANSFER PROOF
    $this->load->view('frontend/profile/modal_transfer');
endif;


?>