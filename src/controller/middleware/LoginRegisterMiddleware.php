<?php
class LoginRegisterMiddleware implements MiddlewareInterface {
  public function run(Request $request) {
    $token = $_COOKIE['token'];
    if (!is_null($token)) {
      header("Location: /");
      return False;
    } else {
      return True;
    }
  }
}
