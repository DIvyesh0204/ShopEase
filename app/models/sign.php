<?php

namespace Model;

class Sign {

    public static function check($email) {
        $db = \DB::get_instance();
        $stmt=$db->prepare("SELECT * FROM accounts WHERE email = ?");
        $stmt->execute([$email]);
        $row=$stmt->fetch();
        return $row;
    }

    public static function verify($email,$password) {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM accounts WHERE email = ?");
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        return $row;
    }

    public static function insert($email,$password) {
        $db = \DB::get_instance();
        $stmt = $db->prepare("INSERT INTO accounts (email,password) VALUES (?,?)");
        $stmt->execute([$email,$password]);
    }

    public static function get_id($email) {
        $db = \DB::get_instance();
        $stmt=$db->prepare("SELECT * FROM accounts WHERE email = ?");
        $stmt->execute([$email]);
        $row=$stmt->fetch();
        return $row;
    }

    public static function get_email($id) {
        $db = \DB::get_instance();
        $stmt=$db->prepare("SELECT * FROM accounts WHERE id = ?");
        $stmt->execute([$id]);
        $row=$stmt->fetch();
        return $row;
    }
    
}