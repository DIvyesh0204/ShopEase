<?php

session_start();

require __DIR__."/../vendor/autoload.php";
Toro::serve(array(
    "/"=>"\Controller\Home",
    "/signin"=>"Controller\Signin",
    "/signup"=>"Controller\Signup",
    "/admin"=>"Controller\Admin",
    "/itemlist-user"=>"Controller\ILUser",
    "/itemlist-admin"=>"Controller\ILAdmin",
    "/additem"=>"Controller\AddItem",
    "/remove"=>"Controller\Remove",
    "/give"=>"Controller\Give",
    "/deny"=>"Controller\Deny",
    "/cart"=>"Controller\Cart",
    "/payment"=>"Controller\Payment",
    "/redirect"=>"Controller\Redirect",
    "/updatecost"=>"Controller\Updatecost",
    "/updatequant"=>"Controller\Updatequant",
    "/removefromcart"=>"Controller\Removefromcart"
));