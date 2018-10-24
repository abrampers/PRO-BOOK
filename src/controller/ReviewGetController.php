<?php
class ReviewGetController implements ControllerInterface {
  public static function control(Request $request) {
    $db = new MarufDB();
    $token = $_COOKIE['token'];
    $book = $db->getBookDetail($request->id);
    $user_id = $db->getUserId($token);
    $username = $db->getUsername($token);
    $template = new Template('src/view/review.php');
    return $template->render($username, $book, $user_id);
  }
}
