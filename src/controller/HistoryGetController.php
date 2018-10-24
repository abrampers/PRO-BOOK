<?php
class HistoryGetController implements ControllerInterface {
  public static function control(Request $request) {
    $template = new Template('src/view/history.php');
    $db = new MarufDB();
    $user_id = $db->getUserId($_COOKIE['token']);
    $orders = $db->getHistory($user_id);
    $username = $db->getUsername($_COOKIE['token']);
    return $template->render($username, $orders);
  }
}
