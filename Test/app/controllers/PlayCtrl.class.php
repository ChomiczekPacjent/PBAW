<?php
namespace app\controllers;

use core\App;

class PlayCtrl{
    public function action_play(){
        App::getSmarty()->assign('page_title','Play');
        App::getSmarty()->display('Play.tpl');
    }
}