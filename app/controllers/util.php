<?php

namespace Controller;

class Util {

    public static function check_session_ifset($redirect,...$parameters) {
        $flag = false;
        foreach($parameters as $parameter) {
            if(!isset($_SESSION["$parameter"])) {
                $flag = true;
            }
        }
        if(!$flag) {
            header("Location: ".$redirect);
        }
    }

    public static function check_session_ifnotset($redirect,...$parameters) {
        $flag = false;
        foreach($parameters as $parameter) {
            if(!isset($_SESSION["$parameter"])) {
                $flag = true;
            }
        }
        if($flag) {
            header("Location: ".$redirect);
        }
    }

    public static function check_post($redirect,...$parameters) {
        $flag = false;
        foreach($parameters as $parameter) {
            if(!isset($_POST["$parameter"])) {
                $flag = true;
            }
        }
        if($flag) {
            header("Location: ".$redirect);
        }
    }

}