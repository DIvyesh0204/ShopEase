<?php

namespace Model;

Use \DateTime;
class Item {

    public static function add($name,$category,$cost,$qavail) {
        $db = \DB::get_instance();
        $stmt=$db->prepare("INSERT INTO items (name,category,cost,qavail) VALUES (?,?,?,?)");
        $stmt->execute([$name,$category,$cost,$qavail]);
    }

    public static function remove($itemid) {
        $db = \DB::get_instance();
        $stmt=$db->prepare("DELETE FROM items WHERE id = ?");
        $stmt->execute([$itemid]);
    }


    public static function costupdate($iditem,$newcost){
        $db = \DB::get_instance();        
        $stmt=$db->prepare("UPDATE items SET cost = ? WHERE id = ?");
        $stmt->execute([$newcost,$iditem]);
    }

    public static function quantupdate($iditem,$newquant){
        $db = \DB::get_instance();
        $stmt=$db->prepare("UPDATE items SET qavail = ? WHERE id = ?");
        $stmt->execute([$newquant,$iditem]);
    }
    public static function updatelog(){
        $db = \DB::get_instance();        
        $stmt=$db->prepare("SELECT * FROM items where qreq > 0 ");
        $stmt->execute();
        $rows=$stmt->fetchAll();   
        foreach($rows as $i){
        $dx = \DB::get_instance();
        $stmt=$dx->prepare("INSERT INTO purchasehistory (userid,itemid,itemname,quantity,purchase_cost) VALUES (?,?,?,?,?)"); 
        $stmt->execute([$_SESSION["id"],$i[0],$i[1],$i[5],$i[5]*$i[2]]);         
        }

    }
}