<?php
class BrowseGetController implements ControllerInterface {
  public static function control(Request $request) {
    $template = new Template('src/view/browse.php');
    return $template->render();
  }
}
