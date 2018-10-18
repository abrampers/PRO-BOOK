<?php
include_once "lib/router/MiddlewareInterface.interface.php";
include_once "lib/request/Request.class.php";
include_once "src/model/MarufDB.class.php";
class AuthMiddleware implements MiddlewareInterface {
  public function run(Request $request) {
    $token = $_COOKIE['token'];
    $db = new MarufDB('localhost', 'probook', 'root', '');
    if (is_null($token)) {
      header("Location: http://{$request->serverName}:{$request->serverPort}/login");
      return False;
    } else {
      return True;
    }
  }
}
