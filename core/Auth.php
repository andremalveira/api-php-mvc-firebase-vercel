<?php
namespace core;
use \src\Config;
use \core\Header;
use \core\Token;
use \src\models\Users;


class Auth {
  public static function checkout($param = false) {
    $isAuthenticatedUser = false; $hasAuthorization = false;
      $tokenCheckout = Header::get(Config::AUTH_NAME); 

      if($tokenCheckout){
        $hasAuthorization = true;
        //-------------------------------------------------//
        preg_match('/Bearer\s(\S+)/', $tokenCheckout, $matches);
        $tokenCheckout = $matches[1] ?? false;

        //-------------------------------------------------//
        $token = new Token();
        $tokenDecode = $token->validate($tokenCheckout);

        //-------------------------------------------------//
        $userCheck = ($tokenDecode) ? $tokenDecode->payload[Config::PAYLOAD_TO_VALIDATE] : '';
        $users = Users::get();

        foreach($users as $user){
          $isAuthenticatedUser = ($user[Config::PAYLOAD_TO_VALIDATE] === $userCheck) ? true : false;
        } 
      }
      //-------------------------------------------------//

      $statusCode = (!$isAuthenticatedUser) ? 401 : 200;
      $statusArray = array(
        "isAuthenticatedUser" => $isAuthenticatedUser,
        "hasAuthorizationHeader" => $hasAuthorization,
        "status" => $statusCode,
      );
    
      $ErrorMsg = '';
      if(!$hasAuthorization ) { $ErrorMsg = 'Unauthorized';} 
      elseif($hasAuthorization && !$isAuthenticatedUser) { $ErrorMsg = 'Invalid Token!';} 

      if(!$isAuthenticatedUser) {$statusArray['message'] = $ErrorMsg; echo json_encode($statusArray);}
      
      if($param == 'status'){
        return  $statusArray;
      } else {
        return $isAuthenticatedUser;
      }


  }
}