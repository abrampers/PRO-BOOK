<?php
include_once "lib/router/MiddlewareInterface.interface.php";
include_once "lib/request/Request.class.php";
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
