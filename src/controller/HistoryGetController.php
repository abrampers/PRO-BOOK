<?php
class HistoryGetController implements ControllerInterface {
  public static function control(Request $request) {
    $db = new MarufDB();
    $user_id = $db->getUserId($_COOKIE['token']);
    $orders = $db->showHistory($user_id);
    $template = new Template('src/view/history.php');
    return $template->render($orders);
  }
}
