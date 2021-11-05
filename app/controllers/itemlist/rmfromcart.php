<?php

namespace Controller;


class Removefromcart{


        public static function post(){

        \Controller\Util::check_session_ifnotset("/","admin");
        \Controller\Util::check_post("/","iditem");
        \Model\Itemlist::rm_cart($_POST["iditem"]);
        header("Location: /cart");

        }
}