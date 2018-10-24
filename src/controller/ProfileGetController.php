<?php
class ProfileGetController implements ControllerInterface {
  public static function control(Request $request) {
    $template = new Template('src/view/profile.php');
    $db = new MarufDB;
    $user = $db->getUser($_COOKIE['token']);
    return $template->render($user['id'], $user['name'], $user['username'], $user['email'], $user['address'], $user['phonenumber']);
  }
}
