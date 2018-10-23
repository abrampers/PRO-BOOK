<?php
class BrowseGetController implements ControllerInterface {
  public static function control(Request $request) {
    $template = new Template('src/view/browse.php');
    $db = new MarufDB;
    $username = $db->getUsername($_COOKIE['token']);
    return $template->render($username);
  }
}
