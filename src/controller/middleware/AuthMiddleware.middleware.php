<?php
include_once "lib/router/MiddlewareInterface.interface.php";
include_once "lib/request/Request.class.php";
include_once "model/MarufDB.class.php";
class AuthMiddleware implements MiddlewareInterface {
  public function run(Closure $callback, Request $request) {

  }
}
