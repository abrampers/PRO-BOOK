<?php
class RegisterController implements ControllerInterface {
  public static function control(Request $request) {
    if ($request->name != '' && $request->username != '' && $request->email != '' && $request->password != '' && $request->address != '' && $request->phonenumber != '') {
      $db = new MarufDB($_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
      $result = $db->addProfile($request->name, $request->username, $request->email, $request->password, $request->address, $request->phonenumber);
      if ($result == 1) {
        return LoginController::control($request);
      } else {
        $template = new Template('src/view/register.php');
        return $template->render();
      }
    } else {
      $template = new Template('src/view/register.php');
      return $template->render();
    }
  }
}
