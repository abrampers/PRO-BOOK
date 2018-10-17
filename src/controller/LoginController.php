<?php
include_once "lib/request/Request.class.php";
include_once "src/model/MarufDB.class.php";
include_once "lib/jkwtoken/JKWToken.class.php";
function loginController(Request $request) {
  $db = new MarufDB('localhost', 'probook', 'root', 'Nicho01');
  $user_id = $db->checkLogin($request->username, $request->password);
  if($user_id != -1) {
    $JKWToken = new JKWToken();
    if ($db->addSession($user_id. $JKWToken) == 1) {
      setcookie("PHPSESSID", $JKWToken->generateJKWToken(), time() + 300,'/');
      return '<h1>huyuhuyuhuyuhuyu</h1>';
    } else {
      return '<h1>Failed</h1>';
    }
  } else {
    $template = new Template('src/view/login.php');
    return $template->render(True);
  }
}
