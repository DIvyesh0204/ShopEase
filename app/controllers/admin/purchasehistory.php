<?php

namespace Controller;


class Purchasehistory{


    public static function get(){
        \Controller\Util::check_session_ifnotset("/","admin");
        // \Controller\Util::check_post("/","iditem");
        echo \View\Loader::make()->render("templates/purchasehistory.twig");
    }

    public static function post(){

        \Controller\Util::check_session_ifnotset("/","admin");
        echo \View\Loader::make()->render("templates/viewhist.twig",array(
            "purchaselist"=>\Model\Itemlist::get_purchist($_POST["from"],$_POST["till"])
        ));
    }




}