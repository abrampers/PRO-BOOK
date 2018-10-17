<?php
include_once 'lib/request/Request.class.php';
interface MiddlewareInterface {
  public function run(Closure $callback, Request $request);
}
