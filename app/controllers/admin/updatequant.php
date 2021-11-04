<?php

namespace Controller;

class Updatequant{

public function post(){

        \Controller\Util::check_session_ifnotset("/","admin");
        \Controller\Util::check_post("/","iditem");
        $newquant = $_POST["newquant"];
        \Model\Item::quantupdate($_POST["iditem"],$newquant);
        header("Location: /itemlist-admin");
}

}