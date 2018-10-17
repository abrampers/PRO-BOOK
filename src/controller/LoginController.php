<?php
include_once "lib/request/Request.class.php";
include_once "src/model/MarufDB.class.php";
include_once "lib/jkwtoken/JKWToken.class.php";
function loginController(Request $request) {
  $db = new MarufDB('localhost', 'probook', 'root', '');
  $user_id = $db->checkLogin($request->username, $request->password);
  if($user_id != -1) {
    $JKWToken = new JKWToken();
    $token = $JKWToken->generateJKWToken();
    if ($db->addSession($user_id, $token) == 1) {
      setcookie("PHPSESSID", $token, time() + 300,'/');
      return '<h1>huyuhuyuhuyuhuyu</h1>';
    } else {
      return '<h1>Failed</h1>';
    }
  } else {
    $template = new Template('src/view/login.php');
    return $template->render(True);
  }
}
