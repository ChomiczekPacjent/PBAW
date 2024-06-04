<?php

namespace app\controllers\auth;

use app\forms\auth\RegisterForm;
use core\App;
use core\ParamUtils;
use core\RoleUtils;
use core\SessionUtils;
use core\Utils;
use core\Validator;
use PDOException;

class RegisterCtrl {

    private $form;
    private $user_data;

    public function __construct() {
        $this->form = new RegisterForm();
        $this->user_data = array();
    }


    public function validate(): bool {
        if(!empty(SessionUtils::load("id", true))) return true;

        $this->form->name = ParamUtils::getFromRequest('name');
        $this->form->email = ParamUtils::getFromRequest('email');
        $this->form->password = ParamUtils::getFromRequest('password');
        $this->form->repeatedPassword = ParamUtils::getFromRequest('repeatedPassword');


        $v = new Validator();

        $v->validate($this->form->name,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Nazwa użytkownika jest wymagana',
            'min_length' => 3,
            'max_length' => 32,
            'validator_message' => 'Nazwa użytkownika powinna zawierać od 3 do 32 znaków'
        ]);


        $v->validate($this->form->email,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Email jest wymagany',
            'min_length' => 3,
            'max_length' => 320,
            'regexp' => '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',
            'validator_message' => 'Email powinien zawierać od 3 do 320 znaków i być poprawny'
        ]);

        $v->validate($this->form->password,[
            'required' => true,
            'required_message' => 'Hasło jest wymagane',
            'min_length' => 4,
            'max_length' => 64,
            'validator_message' => 'Hasło powinno zawierać od 4 do 64 znaków'
        ]);

        if($this->form->password != $this->form->repeatedPassword){
            Utils::addErrorMessage("Podane hasła się różnią");
        }

        if(App::getMessages()->isError()) return false;

        //check if unique
        try {
            $isNicknameOccupied = App::getDB()->has("users", ["nickname" => $this->form->nickname]);
            $isEmailOccupied = App::getDB()->has("users", ["email" => $this->form->email]);

            if($isNicknameOccupied) Utils::addErrorMessage("Nazwa użytkownika jest już zajęta");
            if($isEmailOccupied) Utils::addErrorMessage("Email jest już zajęty");

            if(App::getMessages()->isError()) return false;


        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }

        return !App::getMessages()->isError();
    }

    private function addUser(){
        try{
            App::getDB()->insert("users", [
                "nickname" => $this->form->nickname,
                "email" => $this->form->email,
                "password" => md5($this->form->password)
            ]);
            $this->user_data["id"] = App::getDB()->id();

            //add rodo policy values
            App::getDB()->update("users", ["updatedBy" => $this->user_data["id"], "createdBy" => $this->user_data["id"]], ["id" => $this->user_data["id"]]);

            //add default role
            App::getDB()->insert("user_role", ["user_id" => $this->user_data["id"], "role_name" => "user"]);

            return true;
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
        return false;
    }

    public function action_register_show() {
        $this->generateView();
    }
    public function action_register() {
        if($this->validate() && $this->addUser()){
            Utils::addInfoMessage("Pomyślnie utworzono konto.");
            App::getRouter()->forwardTo("login_show");
        }else{
            $this->form->password = "";
            $this->form->repeatedPassword = "";
            $this->generateView();
        }

    }

    public function generateView(){
        App::getSmarty()->assign("form", $this->form);
        App::getSmarty()->display("auth/Register.tpl");
    }

}