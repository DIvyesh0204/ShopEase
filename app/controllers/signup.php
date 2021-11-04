<?php

namespace Controller;

class Signup {

    public function get() {
        \Controller\Util::check_session_ifset("/itemlist-user","id");
        echo \View\Loader::make()->render("templates/signup.twig",array(
            "incorrectPassword"=> false,
        ));
    }

    public function post() {
        \Controller\Util::check_post("/","email","password");
        $email = $_POST["email"];
        $password = $_POST["password"];
        $row = \Model\Sign::check($email);
        if(strlen($row[0])>0) {
            echo \View\Loader::make()->render("templates/signup.twig",array(
                "incorrectPassword"=> true,
            ));
        }
        else {
            $hashpwd = hash("sha256",$password);
            \Model\Sign::insert($email,$hashpwd);
            $row = \Model\Sign::get_id($email);
            $_SESSION['id'] = $row[0];
            header("Location: /itemlist-user");
        }
    }

}