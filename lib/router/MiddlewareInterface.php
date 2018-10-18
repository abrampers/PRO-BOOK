<?php
interface MiddlewareInterface {
  public function run(Request $request);
}
