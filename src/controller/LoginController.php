<?php
function loginController(Request $request) {
  $db = new MarufDB($_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
  $user_id = $db->checkLogin($request->username, $request->password);
  if($user_id != -1) {
    $JKWToken = new JKWToken();
    $token = $JKWToken->generateJKWToken();
    if ($db->addToken($user_id, $token) == 1) {
      setcookie("token", $token, time() + (10 * 60), '/');
      return '<h1>huyuhuyuhuyuhuyu</h1>';
    } else {
      return '<h1>Failed</h1>';
    }
  } else {
    $template = new Template('src/view/login.php');
    return $template->render(True);
  }
}
