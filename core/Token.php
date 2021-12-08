<?php 
namespace core;

//Token usando JSON Web Tokens - https://jwt.io
/*
  Token::create() recebe um array como parâmetro 
  informando os dados que será criado o token 
  e retorna o token gerado.

  Token::validate() recebe um array como parâmetro 
  o token gerado para validar, se for válido retornará um array (Object)
  [
    $payload => [dados do token]
    $validate => true
  ]
  se não for válido retornará false.
  
*/

class Token {

  private function signature($header_b64, $payload_b64){
    $signature = hash_hmac("sha256", $header_b64.".".$payload_b64, $_ENV['JWT_SECRET_SIGNATURE'], true);

    return $this->b64urlEncode($signature);
  }

  public function create($data) {

      $header = json_encode(
        array(
          "typ" => "JWT",
          "alg" => "HS256"
        )
      );
      $payload = json_encode($data);

      $header_b64 = $this->b64urlEncode($header);
      $payload_b64 = $this->b64urlEncode($payload);
      $signature_b64 = $this->signature($header_b64, $payload_b64);

      $jwt = $header_b64.".".$payload_b64.".".$signature_b64;
      return $jwt;
  }

  public function validate($token){
    $array = array();

    $token_split = explode('.', $token);

    if(count($token_split) == 3){
      $signature_b64 = $this->signature($token_split[0], $token_split[1]);
      if($signature_b64 == $token_split[2]) {
        $array = (Object) [
          'payload' => (Array) json_decode($this->b64urlDecode($token_split[1])),
          'validate' => true
        ];
      } else {
        $array = false;
      }
    }
    return $array;
  }

  private function b64urlEncode( $data ){
    return rtrim( strtr( base64_encode( $data ), '+/', '-_'), '=');
  }
  
  private function b64urlDecode( $data ){
    return base64_decode( strtr( $data, '-_', '+/') . str_repeat('=', 3 - ( 3 + strlen( $data )) % 4 ));
  }

}