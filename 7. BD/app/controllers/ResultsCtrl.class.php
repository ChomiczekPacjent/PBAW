<?php

namespace app\controllers;

class ResultsCtrl {
    
    private $records; // pobrane z bazy rekordy

    public function action_results(){

                try { 
                    $database = new \Medoo\Medoo([
                        'type' => 'mysql',
                        'host' => 'localhost',
                        'database' => 'kredyt',
                        'username' => 'root',
                        'password' => '',
                        'charset' => 'utf8',
                        'collation' => 'utf8_polish_ci',
                        'port' => 3306,
                        'option' => [
                            \PDO::ATTR_CASE => \PDO::CASE_NATURAL,
                            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                        ],    
                        
                    ]);
                $this->records = $database->select("wynik",[
                    "kwota",
                    "lat",
                    "procent",
                    "rata",
                    "total",
                    "data"
                ]);
            } catch (\PDOException $e) {
                getMessages()->addError("DB Error: ".$e->getMessage());

            }


            $this->generateView();
    }
    /**
     * Wygenerowanie widoku
     */
    public function generateView(){
            getSmarty()->assign('user',unserialize($_SESSION['user']));
            getSmarty()->assign('page_title','Kalkulator kredytowy');
            getSmarty()->assign('page_description','Obliczanie miesięcznej raty kredytu.');
            getSmarty()->assign('page_header','Kalkulator');	

            getSmarty()->assign('raty',$this->records);  // lista rekordów z bazy danych
            
            getSmarty()->display('results_view_kredytowy.tpl');
    }
}
