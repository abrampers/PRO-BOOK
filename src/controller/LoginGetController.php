<?php
class LoginGetController implements ControllerInterface {
  public static function control(Request $request) {
    $template = new Template('src/view/login.php');
    $redirect = (is_null($request->redirected) ? False : $request->redirected);
    return $template->render(False, $redirect);
  }
}
