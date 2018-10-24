<?php
class RegisterPostController implements ControllerInterface {
  public static function control(Request $request) {
    $db = new MarufDB();
    $result = $db->addProfile($request->name, $request->username, $request->email, $request->password, $request->address, $request->phoneNumber);
    if ($result == 1) {
      return LoginPostController::control($request);
    } else {
      $template = new Template('src/view/register.php');
      return $template->render();
    }
  }
}
