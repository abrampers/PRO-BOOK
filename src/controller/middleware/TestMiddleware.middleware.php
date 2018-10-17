<?php
include_once "lib/router/MiddlewareInterface.php";
include_once "lib/request/Request.php";
class TestMiddleware implements MiddlewareInterface {
  public function run(Closure $callback, Request $request) {
    if($request->num == 1) {
      return $callback($request);
    } else {
      return '<h1>huyuasdfasdf</h1>';
    }
  }
}
