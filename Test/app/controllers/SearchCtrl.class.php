<?php
/**
 * Created by PhpStorm.
 * User: TalarPC
 * Date: 22.06.2019
 * Time: 16:11
 */

namespace app\controllers;

use app\forms\SearchForm;
use core\App;
use core\ParamUtils;
use core\Utils;

class SearchControl
{
    public $form;
    public $where = [];
    public $search_params = [];
    public $query;

    public function __construct(){
        $this->form = new SearchForm();
    }

    public function getParams(){
        $this->form->shopName = ParamUtils::getFromGet("shopName");
        $this->form->address = ParamUtils::getFromGet("address");
        $this->form->type = ParamUtils::getFromGET('type');
        if(!empty($_GET['category'])) {
            foreach ($_GET['category'] as $selected) {
                $this->form->category [] = $selected;
            }
        }
    }

    public function validateStatement(){
        if(!empty($this->form->shopName)) $this->where['markers.name[~]'] = $this->form->shopName . '%';
        if(!empty($this->form->address)) $this->where['markers.address[~]'] = '%' .$this->form->address . '%';
        if(!empty($this->form->type)) $this->where['markers.type'] = $this->form->type;
        if(!is_null($this->form->category)) $this->where['marker_details.category'] = json_encode($this->form->category);
        $this->where['LIMIT'] = 50;
        $this->where['ORDER'] = [
            'marker_details.votes' => "DESC"
        ];

        $num_params = sizeof($this->where);
        if ($num_params > 1) {
            $this->search_params = ["AND" => &$this->where];
        } else {
            $this->search_params = &$this->where;
        }

        if(empty($this->where)) Utils::addErrorMessage("Brak kryteriów wyszukiwania!");

        if(!App::getMessages()->isError()) return true;
        else return false;
    }

    public function queryToDB(){
        $this->where['LIMIT'] = 50;

        try{
           $this->query = App::getDB()->select("markers",[
                "[>]marker_details" => ["id" => "id_marker"],
           ],[
                'markers.id',
                'markers.name',
                'markers.address',
                'markers.type',
                'marker_details.category[JSON]',
                'marker_details.votes'
           ], $this->where);
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }

    public function generateView(){
        App::getSmarty()->assign("page_title", "Wyszukiwarka");
        App::getSmarty()->assign("query", $this->query);
        App::getSmarty()->display("ResultsView.tpl");
    }

    public function action_search(){
        $this->getParams();
        if($this->validateStatement()){
            $this->queryToDB();
        }
        $this->generateView();
    }

}