<?php
include_once "lib/router/MiddlewareInterface.interface.php";
include_once "lib/request/Request.class.php";
include_once "src/model/MarufDB.class.php";
class AuthMiddleware implements MiddlewareInterface {
  public function run(Request $request) {
    $token = $_COOKIE['token'];
    $db = new MarufDB($_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    if (is_null($token)) {
      header("Location: http://{$request->serverName}:{$request->serverPort}/login");
      return False;
    } else {
      return True;
    }
  }
}
