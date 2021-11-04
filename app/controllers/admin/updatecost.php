<?php

namespace Controller;

class Updatecost{

    public function post(){

        \Controller\Util::check_session_ifnotset("/","admin");
        \Controller\Util::check_post("/","iditem");
        $newcost = $_POST["newcost"];
        \Model\Item::costupdate($_POST["iditem"],$newcost);
        header("Location: /itemlist-admin");
    }



}