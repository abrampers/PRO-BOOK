<?php
class LoginRegisterMiddleware implements MiddlewareInterface {
  public function run(Request $request) {
    $token = $_COOKIE['token'];
    if (!is_null($token)) {
      header("Location: http://{$_ENV['HOST_NAME']}:{$_ENV['HOST_PORT']}/");
      return False;
    } else {
      return True;
    }
  }
}
