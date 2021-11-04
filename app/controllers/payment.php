<?php

namespace Controller;

class Payment {
    
    public function get() {
        \Controller\Util::check_session_ifnotset("/","id");
        $row =  \Model\Sign::get_email($_SESSION['id']);
        echo \View\Loader::make()->render("templates/payment.twig");
    }
}