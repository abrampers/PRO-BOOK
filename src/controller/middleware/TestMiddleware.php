<?php
class TestMiddleware implements MiddlewareInterface {
  public function run(Request $request) {
    if($request->num != 1) {
      echo '<h1>huyuasdfasdf</h1>';
      return False;
    } else {
      return True;
    }
  }
}
