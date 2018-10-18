<?php
class RegisterController implements ControllerInterface {
  public static function control(Request $request) {
    $db = new MarufDB($_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);

  }
}
