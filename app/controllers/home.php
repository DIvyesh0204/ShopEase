<?php

namespace Controller;

class Home {

    public function get() { 
        \Controller\Util::check_session_ifset("/itemlist-admin","admin");
        \Controller\Util::check_session_ifset("/itemlist-user","id");
        \Model\Itemlist::update_all_qreq();
        echo \View\Loader::make()->render("templates/home.twig"); 
    }

    public function post() {
        unset($_SESSION['id']);
        unset($_SESSION['admin']);
        header("Location: /");
    }
    
}