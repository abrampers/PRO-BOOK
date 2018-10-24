<?php
class ApiAuthMiddleware implements MiddlewareInterface {
  public function run(Request $request) {
    $token = $_COOKIE['token'];
    $db = new MarufDB();
    if (is_null($token)) {
      header("{$request->serverProtocol} 401 Unauthorized");
      return False;
    } else {
      return True;
    }
  }
}
