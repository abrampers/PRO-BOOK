<?php
class ReviewPostController implements ControllerInterface {
  public static function control(Request $request) {
    $db = new MarufDB();
    $result = $db->addReview($request->userId, $request->username, $request->bookId, $request->rating, $request->comment, $request->orderId);
    return header("Location: /history");
  }
}
