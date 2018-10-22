<?php
class RegisterController implements ControllerInterface {
  public static function control(Request $request) {
    $db = new MarufDB();
    $result = $db->addProfile($request->name, $request->username, $request->email, $request->password, $request->address, $request->phonenumber);
    if ($result == 1) {
      return LoginController::control($request);
    } else {
      $template = new Template('src/view/register.php');
      return $template->render();
    }
  }
}
