<?php
namespace src;

class Config {
  const BASE_DIR = '/api';
  
  // - In your Development Environment/Local Server use 'Authorization'
  // - When deploying to vercel change it to 'authorization' with a lowercase 'A'! 
  // - Em seu Ambiente de Desenvolvimento/ Servidor Local use 'Authorization'
  // - Quando for fazer deploy para vercel mude para 'authorization' com 'A' minúsculo!
    const AUTH_NAME = 'Authorization'; //authorization

  // - Key name of the JWT payload data that will be checked against the database,
  // - the name of this key has to be the same in the database Ex: user | username |id 
  // - Nome da chave do dado do payload JWT que será verificada ao banco de dados, 
  // - o nome dessa chave tem que ser a mesma no banco de dados Ex: user | username |id  
    const PAYLOAD_TO_VALIDATE = 'user';

  const ERROR_CONTROLLER = 'ErrorController';
  const DEFAULT_ACTION = 'index';
}