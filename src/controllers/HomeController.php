<?php
namespace src\controllers;
use \core\Auth;
use \core\Controller;

class HomeController extends Controller {
    public function index() {
        $status = Auth::checkout('status');
        $status["APIs"] = array("genshinimpact");
        echo json_encode($status);
    }
}