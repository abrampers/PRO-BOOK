<?php
include_once 'lib/request/Request.php';
interface MiddlewareInterface {
    public function run(Closure $callback, Request $request);
}
