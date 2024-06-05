<?php

namespace app\controllers\auth;

use app\forms\auth\LoginForm;
use core\App;
use core\ParamUtils;
use core\RoleUtils;
use core\SessionUtils;
use core\Utils;
use core\Validator;
use PDOException;

class LoginCtrl {

    private $form;
    private $user_data;

    public function __construct() {
        $this->form = new LoginForm();
    }


    public function validate(): bool {
        if(!empty(SessionUtils::load("id", true))) return true;

        $this->form->nickname = ParamUtils::getFromRequest('name');
        $this->form->password = ParamUtils::getFromRequest('password');

        $v = new Validator();
        $v->validate($this->form->nickname,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Login jest wymagany',
            'min_length' => 3,
            'max_length' => 64,
            'validator_message' => 'Login powinien zawierać od 3 do 64 znaków'
        ]);

        $v->validate($this->form->password,[
            'required' => true,
            'required_message' => 'Hasło jest wymagane',
        ]);

        if(App::getMessages()->isError()) return false;

        try{
            $this->user_data = App::getDB()->get("user", ["id", "name"],[
                "name" => $this->form->name,
                "password" => md5($this->form->password)
            ]);
            if(empty($this->user_data)){
                Utils::addErrorMessage("Nieprawidłowa nazwa użytkownika lub hasło");
            }
        }catch(PDOException $e){
            Utils::addErrorMessage("Brak połącznia z bazą danych.");
        }

        return !App::getMessages()->isError();
    }

    private function addRoles(): bool{
        try{
            $roles = App::getDB()->select("user_role", ["role_name"], ["user_id" => $this->user_data["id"]]);
            if(is_null($roles)) {
                Utils::addErrorMessage("Brak posiadanej roli."); //useless, system will pass anyway
                return true;                                           //cause return true
            };

            foreach($roles as $role){
                RoleUtils::addRole($role["role_name"]);
            }
            return true;
        }catch(PDOException $e){
            Utils::addErrorMessage("Brak połącznia z bazą danych.");
        }
        return false;
    }

    public function action_login_show() {
        $this->generateView();
    }
    public function action_login() {
        if($this->validate() && $this->addRoles()){
            SessionUtils::store("id", $this->user_data["id"]);
            SessionUtils::store("nickname", $this->user_data["name"]);
            App::getRouter()->redirectTo("MainPage.tpl");
        }else{
            $this->form->password = "";
            $this->generateView();
        }

    }
    public function action_logout() {
        SessionUtils::remove("id");
        SessionUtils::remove("name");

        $_SESSION = null;
        session_destroy();
        App::getRouter()->redirectTo('login_show');
    }

    public function generateView(){
        App::getSmarty()->assign("form", $this->form);
        App::getSmarty()->display("Login.tpl");
    }

}