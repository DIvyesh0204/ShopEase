<?php

namespace Controller;

class Signin {

    public function get() {
        \Controller\Util::check_session_ifset("/itemlist-user","id");
        echo \View\Loader::make()->render("templates/signin.twig",array(
            "incorrectPassword"=> false,
        ));
    }

    public function post() {
        \Controller\Util::check_post("/","email","password");
        $email = $_POST["email"];
        $password = $_POST["password"];
        $row = \Model\Sign::check($email);
        $hashpwd = hash("sha256",$password);
        if(strlen($row[0])>0) {
            $row = \Model\Sign::verify($email,$hashpwd);
            if($row[2]===$hashpwd) {
                $row = \Model\Sign::get_id($email);
                $_SESSION['id'] = $row[0];
                header("Location: /itemlist-user");
            }
            else {
                echo \View\Loader::make()->render("templates/signin.twig",array(
                    "incorrectPassword"=> true,
                ));
            }
        }
        else {
            header("Location: /signup");
        }
    }
}