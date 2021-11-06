<?php

namespace Controller;

class Redirect {
    
    public function post() {
        \Controller\Util::check_session_ifnotset("/","id");
        $row1 = \Model\Item::updatelog();
        $row=\Model\Itemlist::update();
        echo \View\Loader::make()->render("templates/redirect.twig");
    }
}