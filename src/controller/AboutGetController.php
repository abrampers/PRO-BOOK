<?php
class AboutGetController implements ControllerInterface {
  public static function control(Request $request) {
    $db = new MarufDB;
    $username = $db->getUsername($_COOKIE['token']);
    $template = new Template('src/view/about.php');
    return $template->render($username);
  }
}
