<?php

namespace Controller;

class ILAdmin {
    
    public function get() {
        \Controller\Util::check_session_ifnotset("/","admin");
        echo \View\Loader::make()->render("templates/iladmin.twig",array(
            "items"=> \Model\Itemlist::get_all(),
        ));
    }

}