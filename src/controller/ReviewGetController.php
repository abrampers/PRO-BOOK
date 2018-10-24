<?php
class ReviewGetController implements ControllerInterface {
  public static function control(Request $request) {
    $db = new MarufDB();
    $token = $_COOKIE['token'];
    $book = $db->getBookDetail($request->id);
    $user_id = $db->getUserId($token);
    $username = $db->getUsername($token);
    $template = new Template('src/view/review.php');
    print_r($user_id);
    return $template->render($username, $book, $user_id);
  }
}
