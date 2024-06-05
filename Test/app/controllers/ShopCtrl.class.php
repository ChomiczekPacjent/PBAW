<?php
namespace app\controllers;

use core\App;

class ShopCtrl{
    public function action_showShop(){
        App::getSmarty()->assign('page_title','Shop');
        App::getSmarty()->display('Shop.tpl');
    }
}