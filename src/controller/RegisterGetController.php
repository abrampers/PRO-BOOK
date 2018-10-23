<?php
class RegisterGetController implements ControllerInterface {
  public static function control(Request $request) {
    $template = new Template('src/view/register.php');
    $invalidUsername = (is_null($request->invalidUsername) ? False : $request->invalidUsername);
    $invalidEmail = (is_null($request->invalidEmail) ? False : $request->invalidEmail);
    return $template->render($invalidUsername, $invalidEmail);
  }
}
