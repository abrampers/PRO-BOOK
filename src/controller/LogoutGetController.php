<?php
class LogoutGetController implements ControllerInterface {
  public static function control(Request $request) {
    $db = new MarufDB();
    $db->deleteToken($request->token);
    setcookie('token', '', time() - 3600, '/');
    header("Location: /login");
  }
}
