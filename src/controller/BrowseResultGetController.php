<?php
class BrowseResultGetController implements ControllerInterface {
  public static function control(Request $request) {
    $db = new MarufDB();
    $books = $db->searchBook($request->title);
    $template = new Template('src/view/browseresult.php');
    return $template->render($books);
  }
}
