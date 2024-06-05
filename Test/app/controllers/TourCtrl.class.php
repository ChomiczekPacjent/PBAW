<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;

class TourCtrl {

    public function action_Tour(){
        echo"hej";

        $name = "luka";
        $email = "chocho@wp.pl";
        $password = "didolo";
        $signupdate = date("Y-m-d H:i:s");

        //dodanie do bd
        App::getDB()->insert("user",[
            "name" => $name,
            "email" => $email,
            "password" => $password,
            "signupdate" => $signupdate,
            
           ]);
           //odczyt z bd
          
           echo"hej";
           
    }
        public function action_showResults(){

            $wyniki = App::getDB()->select("user", "*",);

           echo'<table cellpadding = "10">';

           foreach($wyniki as $wiersz){
            
                echo"<tr>";
                echo "<td>".$wiersz["name"]."</td>";
                echo "<td>".$wiersz["email"]."</td>";
                echo "<td>".$wiersz["password"]."</td>";
                echo "<td>".$wiersz["signupdate"]."</td>";
                echo"</tr>";

           }
            echo"</table>";
        }
}