<?php
class BooksGetController implements ControllerInterface {
  public static function control(Request $request) {
    $db = new MarufDB();
    $books = $db->searchBook($request->title);
    print_r($books);
    // $template = new Template('src/view/books.php');
    // return $template->render($books);
  }
}
