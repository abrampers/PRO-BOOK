<?php
class RatingGetController implements ControllerInterface {
  public static function control(Request $request) {
    $db = new MarufDB();
    $token = $_COOKIE['token'];
    $book = $db->getBookDetail($request->id);
    $user_id = $db->getUserId($token);
    $username = $db->getUsername($token);
    $template = new Template('src/view/rating.php');
    return $template->render($book, $username, $user_id);
  }
}
