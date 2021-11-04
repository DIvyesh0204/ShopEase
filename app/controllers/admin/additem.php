<?php

namespace Controller;

class AddItem {

    public function get() {
        \Controller\Util::check_session_ifnotset("/","admin");
        echo \View\Loader::make()->render("templates/additem.twig");
    }

    public function post() {
        \Controller\Util::check_session_ifnotset("/","admin");
        \Controller\Util::check_post("/","name","category");
        $name = $_POST["name"];
        $category = $_POST["category"];
        $cost = $_POST["cost"];
        $qavail = $_POST["qavail"];
        \Model\Item::add($name,$category,$cost,$qavail); 
        header("Location: /itemlist-admin");        
    }

}