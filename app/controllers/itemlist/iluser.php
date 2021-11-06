<?php

namespace Controller;

class ILUser {
    
    public function get() {
        \Controller\Util::check_session_ifnotset("/","id");
        $row =  \Model\Sign::get_email($_SESSION['id']);
        echo \View\Loader::make()->render("templates/iluser.twig",array(
            "items"=> \Model\Itemlist::get_all(),
            "id" => $_SESSION['id'],
            "email" => $row[1],
        ));
    }

    public function post() {
        \Controller\Util::check_session_ifnotset("/","id");
        $itemid = $_POST['iditem'];
        $qreq = $_POST['qreq'];
        $rows = \Model\Itemlist::get_qavail($itemid);
        $qavail = $rows[0];
        // echo $qreq;
        if($qavail>=$qreq&&$qreq>0) {
            \Model\Itemlist::update_qreq($qreq,$itemid);
            
        }
        
        header("Location: /itemlist-user");
    }

}