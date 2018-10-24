<?php
class VerifyRegisterMiddleware implements MiddlewareInterface {
  private $db;
  private $usernameInvalid;
  private $emailInvalid;

  public function __construct() {
    $this->db = new MarufDB();
    $this->usernameInvalid = False;
    $this->emailInvalid = False;
  }

  private function isName($value) {
    return preg_match("/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/", $value);
  }

  private function isUsername($value) {
    $this->usernameInvalid = ! (bool) $this->db->validateUsername($value);
    return preg_match('/^[a-zA-Z0-9_]+$/', $value) && !$this->usernameInvalid;
  }

  private function isEmail($value) {
    $this->emailInvalid = ! (bool) $this->db->validateEmail($value);
    return preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $value) && !$this->emailInvalid;
  }

  private function isNum($value) {
    return preg_match('/^\d+$/', $value);
  }

  private function validate($name, $username, $email, $password, $address, $phoneNumber) {
    return (
      $this->isName($name) && strlen($name) > 0 && strlen($name) <= 20
      && $this->isUsername($username)
      && $this->isEmail($email)
      && strlen($password) >= 6
      && strlen($address) > 0
      && $this->isNum($phoneNumber) && strlen($phoneNumber) >= 9 && strlen($phoneNumber) <= 12
    );
  }

  public function run(Request $request) {
    if ($this->validate($request->name, $request->username, $request->email, $request->password, $request->address, $request->phoneNumber)) {
      return True;
    } else {
      $usernameInvalid = (int) $this->usernameInvalid;
      $emailInvalid = (int) $this->emailInvalid;
      header("Location: http://{$_ENV['HOST_NAME']}:{$_ENV['HOST_PORT']}/register?invalid_username={$usernameInvalid}&invalid_email={$emailInvalid}");
      return False;
    }
  }
}
