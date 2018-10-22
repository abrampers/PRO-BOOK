<?php
class VerifyRegisterMiddleware implements MiddlewareInterface {
  private $db;
  private $usernameValid;
  private $emailValid;

  public function __construct() {
    $this->db = new MarufDB();
    $this->usernameValid = False;
    $this->emailValid = False;
  }

  private function isName($value) {
    return preg_match($value, "/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/");
  }

  private function isUsername($value) {
    $this->usernameValid = (bool) $this->db->validateUsername($value);
    return preg_match($value, '/^[a-zA-Z0-9_]+$/') && $this->usernameValid;
  }

  private function isEmail($value) {
    $this->emailValid = (bool) $this->db->validateEmail($value);
    return preg_match($value, '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/') && $this->emailValid;
  }

  private function isNum($value) {
    return preg_match($value, '/^\d+$/');
  }

  private function validate($name, $username, $email, $password, $address, $phoneNumber) {
    $db = new MarufDB();
    return (
      $this->isName($value) && strlen($name) > 0 && strlen($name) <= 20
      && $this->isUsername($username)
      && $this->isEmail($email)
      && strlen($password) >= 6
      && strlen($address) > 0
      && $this->isPhoneNumber($phoneNumber) && strlen($phoneNumber) >= 9 && strlen($phoneNumber) <= 12
    );
  }

  public function run(Request $request) {
    if ($this->validate($request->name, $request->username, $request->email, $request->password, $request->phoneNumber)) {
      return True;
    } else {
      header("Location: http://{$_ENV['HOST_NAME']}:{$_ENV['HOST_PORT']}/register?usernameValid={$this->usernameValid}&emailValid={$this->emailValid}");
      return False;
    }
  }
}
