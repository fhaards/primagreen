<?php 
    if(!isLoggedIn()){
        $this->load->view("frontend/messages/msg_guest/read_msg_guest");
    } else {
        $this->load->view("frontend/messages/msg_user/read_msg");
    }
?>