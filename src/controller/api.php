<?php
class Api {
  public static function validateUsername(string $username) {
    $db = new MarufDB('localhost', 'probook', 'root', '');
    return array('valid' => (bool) $db->validateUsername($username));
  }

  public static function validateEmail(string $email) {
    $db = new MarufDB('localhost', 'probook', 'root', '');
    return array('valid' => (bool) $db->validateEmail($email));
  }
}
