<?php
include_once "lib/request/Request.class.php";
include_once "src/model/MarufDB.class.php";
function loginController(Request $request) {
  if($db->checkLogin($request->username, $request->password)) {
    // cookie
    return '<h1>huyuhuyuhuyuhuyu</h1>';
  } else {
    $template = new Template('src/view/login.php');
    return $template->render(True);
  }
}
