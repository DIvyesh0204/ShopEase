<?php

namespace Controller;

class Admin {

    public function get() {
        \Controller\Util::check_session_ifset("/itemlist-admin","admin");
        echo \View\Loader::make()->render("templates/admin.twig",array(
            "incorrectPassword"=> false,
        ));
    }

    public function post() {
        \Controller\Util::check_post("/","password");
        $password = $_POST["password"];
        if(hash("sha256",$password)==="ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f") {
            $_SESSION['admin']=true;
            header("Location: /itemlist-admin");
        }
        else {
            echo \View\Loader::make()->render("templates/admin.twig",array(
                "incorrectPassword"=> true,
            ));
        }           
    }
}