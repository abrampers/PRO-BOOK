<?php
class ReviewPostController implements ControllerInterface {
  public static function control(Request $request) {
    $db = new MarufDB();
    $result = $db->addReview($request->userId, $request->username, $request->bookId, $request->rating, $request->comment);
    return header("Location: http://{$_ENV['HOST_NAME']}:{$_ENV['HOST_PORT']}/history");
  }
}
