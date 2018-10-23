<?php
class BookGetController implements ControllerInterface {
  public static function control(Request $request) {
    $db = new MarufDB;
    $username = $db->getUsername($_COOKIE['token']);
    $book = $db->getBookDetail($request->id);
    $reviews = $db->getReviews($book['id']);
    $template = new Template('src/view/book.php');
    return $template->render($username, $book, $reviews);
  }
}
