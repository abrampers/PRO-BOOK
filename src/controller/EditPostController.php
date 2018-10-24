<?php
class EditPostController implements ControllerInterface {
  private static function isName($value) {
    return preg_match("/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/", $value);
  }

  private static function isNum($value) {
    return preg_match('/^\d+$/', $value);
  }

  public static function control(Request $request) {
    $db = new MarufDB();
    $user = $db->getUser($_COOKIE['token']);
    $userId = $user['id'];

    $response = array('error' => array());
    $response['success'] = False;

    if ($_FILES['fileToUpload']['size'] > 0) {
      $targetDir = "src/model/profile/";
      $targetFile = $targetDir . $userId . '.jpg';
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($targetDir . basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));

      if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          $response['error'][] = 'File is not an image.';
          $uploadOk = 0;
        }
      }

      if($imageFileType != "jpg" ) {
        $response['error'][] = 'Sorry, only JPG files are allowed.';
        $uploadOk = 0;
      }

      if ($uploadOk == 0) {
        $response['success'] = False;
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
          $response['success'] = True;
        } else {
          $response['success'] = False;
        }
      }
    }

    $result = 0;
    if (!(EditPostController::isName($request->name) && strlen($request->name) > 0 && strlen($request->name) <= 20)) {
      $response['success'] = False;
      $response['error'][] = 'Name invalid.';
    } else if (strlen($request->address) == 0) {
      $response['success'] = False;
      $response['error'][] = 'Address invalid.';
    } else if (!(EditPostController::isNum($request->phoneNumber) && strlen($request->phoneNumber) >= 9 && strlen($request->phoneNumber) <= 12)) {
      $response['success'] = False;
      $response['error'][] = 'Phone number invalid.';
    } else {
      $response['success'] = True;
      $result = $db->editProfile(null, $request->name, $request->address, $request->phoneNumber, $request->userId);
    }
    if ($result) {
      $response = json_encode($response);
    } else {
      $response['success'] = False;
      $response['error'][] = 'Internal error.';
      $response = json_encode($response);
    }

    $template = new Template('src/view/edit.php');
    return $template->render($user['id'], $user['name'], $user['username'], $user['email'], $user['address'], $user['phonenumber'], $response);
  }
}
