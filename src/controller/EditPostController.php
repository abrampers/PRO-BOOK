<?php
class EditPostController implements ControllerInterface {
  public static function control(Request $request) {
    $db = new MarufDB();
    $result = $db->editProfile(null, $request->name, $request->address, $request->phonenumber, $request->userid);
    return header("Location: http://{$_ENV['HOST_NAME']}:{$_ENV['HOST_PORT']}/profile");
  }
}
