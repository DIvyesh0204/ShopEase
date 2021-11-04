<?php

namespace Controller;

class Remove {

    public function post() {
        \Controller\Util::check_session_ifnotset("/","admin");
        \Controller\Util::check_post("/","itemid");
        \Model\Item::remove($_POST["itemid"]); 
        header("Location: /itemlist-admin"); 
    }

}