<?php
namespace app\controllers;

use core\App;

class MainCtrl{
    public function action_showMainPage(){
        App::getSmarty()->assign('page_title','Artist');
        App::getSmarty()->display('MainPage.tpl');
    }
}