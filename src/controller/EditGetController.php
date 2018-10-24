<?php
class EditGetController implements ControllerInterface {
  public static function control(Request $request) {
    $template = new Template('src/view/edit.php');
    $db = new MarufDB;
    $user = $db->getUser($_COOKIE['token']);
    // print_r($user);
    return $template->render($user['id'], $user['name'], $user['username'], $user['email'], $user['address'], $user['phonenumber']);
  }
}
