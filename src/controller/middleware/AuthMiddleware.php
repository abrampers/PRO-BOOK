<?php
class AuthMiddleware implements MiddlewareInterface {
  public function run(Request $request) {
    $token = $_COOKIE['token'];
    if (is_null($token)) {
      header("Location: http://{$request->serverName}:{$request->serverPort}/login");
      return False;
    } else {
      return True;
    }
  }
}
