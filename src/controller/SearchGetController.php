<?php
class SearchGetController implements ControllerInterface {
  public static function control(Request $request) {
    $db = new MarufDB();
    $books = $db->searchBook($request->title);
    $template = new Template('src/view/search.php');
    $username = $db->getUsername($_COOKIE['token']);
    return $template->render($username, $books, $request->title);
  }
}
