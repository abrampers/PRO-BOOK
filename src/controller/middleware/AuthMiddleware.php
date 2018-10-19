<?php
class AuthMiddleware implements MiddlewareInterface {
  public function run(Request $request) {
    $token = $_COOKIE['token'];
    $db = new MarufDB($_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    if (is_null($token)) {
      header("Location: http://{$_ENV['SERVER_NAME']}:{$_ENV['SERVER_NAME']}/login");
      return False;
    } else {
      return True;
    }
  }
}
