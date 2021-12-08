<?php
namespace src\controllers;

use \core\Auth;
use \core\Controller;
use \core\Database;



class GenshinController extends Controller {

    private function checkData($data) {
        $status = Auth::checkout('status');
        if(count($data) > 0) {
            $status['status'] = 200;
            $status['data'] = $data;
            return json_encode($status);
        } else {
            $ErrorController = new ErrorController();
            $ErrorController->index();
            return false;
        }
    }


    public function index() {
        $data = Database::public('genshinimpact');
        echo self::checkData($data);
    }

    public function characters() {
        $data = Database::public('genshinimpact/characters');
        echo self::checkData($data);
    }
/* 
    public function characterId($params) {
        $id = $params['id'];
   
        if(preg_match('/[0-9]/', $id) >= 1){
            $data = Gi_character::select()->where('id', $id)->execute();
        } else if(preg_match('/[a-z]/', $id) >= 1){
            $data = Gi_character::select()->where('nome', $id)->execute();
        }

        echo self::checkData($data);
    
    } */

}