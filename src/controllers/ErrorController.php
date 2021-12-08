<?php
namespace src\controllers;
use \core\Auth;
use \core\Controller;

class ErrorController extends Controller {

    public function index($status) {
        $status = Auth::checkout('status');
        $status['status'] = 404;
        $status['message'] = 'Parameter Not Found!';
        echo json_encode($status);
    }

}