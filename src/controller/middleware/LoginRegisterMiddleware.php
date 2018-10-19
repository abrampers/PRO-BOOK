<?php
class LoginRegisterMiddleware implements MiddlewareInterface {
  public function run(Request $request) {
    $token = $_COOKIE['token'];
    if (!is_null($token)) {
      header("Location: http://{$_ENV['SERVER_NAME']}:{$_ENV['SERVER_NAME']}/");
      return False;
    } else {
      return True;
    }
  }
}
