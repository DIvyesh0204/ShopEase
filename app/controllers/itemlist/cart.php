<?php

namespace Controller;

class Cart {
    
    public function get() {
        \Controller\Util::check_session_ifnotset("/","id");
        $row =  \Model\Sign::get_email($_SESSION['id']);
        echo \View\Loader::make()->render("templates/cart.twig",array(
            "items"=> \Model\Itemlist::get_all(),
            "id" => $_SESSION['id'],
            "email" => $row[1],
        ));
    }
}