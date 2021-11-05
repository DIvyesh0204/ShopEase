<?php

namespace Model;

class Itemlist {

    public static function get_all() {
        $db = \DB::get_instance();
        $stmt=$db->prepare("SELECT * FROM items");
        $stmt->execute();
        $rows=$stmt->fetchAll();
        return $rows;
    }
    
    public static function get_qavail($itemid) {
        $db = \DB::get_instance();
        $stmt=$db->prepare("SELECT qavail FROM items WHERE id = ?");
        $stmt->execute([$itemid]);
        $rows=$stmt->fetch();
        return $rows;
    }
    
    public static function update() {
        $db = \DB::get_instance();
        $stmt=$db->prepare("SELECT * FROM items");
        $stmt->execute();
        $row=$stmt->fetchAll();
        foreach ($row as $i) {
            \Model\Itemlist::update_qavail($i[4]-$i[5],$i[0]);
            \Model\Itemlist::update_qreq(0,$i[0]);
        }
    }
    public static function update_qavail($qavail,$itemid) {
        $db = \DB::get_instance();
        $stmt=$db->prepare("UPDATE items SET qavail = ? WHERE id = ?");
        $stmt->execute([$qavail,$itemid]);
    }
    public static function update_qreq($qreq,$itemid) {
        $db = \DB::get_instance();
        $stmt=$db->prepare("UPDATE items SET qreq = ? WHERE id = ?");
        $stmt->execute([$qreq,$itemid]);
    }

    public static function rm_cart($itemid){
        $db = \DB::get_instance();   
        $stmt=$db->prepare("UPDATE items SET qreq = 0 WHERE id = ?");
        $stmt->execute([$itemid]);
    }
}