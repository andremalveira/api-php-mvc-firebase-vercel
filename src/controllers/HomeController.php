<?php
namespace src\controllers;
use \core\Auth;
use \core\Controller;
use \src\models\Posts;

class HomeController extends Controller {
    public function index() {
        $status = Auth::checkout('status');
        $status["data"] = Posts::get();
        echo json_encode($status);
    }
}