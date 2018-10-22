<?php
class VerifyLoginMiddleware implements MiddlewareInterface {
  private function isName($value) {
    return preg_match($value, "/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/");
  }

  private function isUsername($value) {
    return preg_match($value, '/^[a-zA-Z0-9_]+$/');
  }

  private function isEmail($value) {
    return preg_match($value, '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/');
  }

  private function isNum($value) {
    return preg_match($value, '/^\d+$/');
  }

  private function validate($name, $username, $email, $password, $address, $phoneNumber) {
    $db = new MarufDB();
    return (
      $this->isName($value) && strlen($name) > 0 && strlen($name) <= 20
      && $this->isUsername($username) && (bool) $db->validateUsername($username)
      && $this->isEmail($email) && (bool) $db->validateEmail($email)
      && strlen($password) >= 6
      && strlen($address) > 0
      && $this->isPhoneNumber($phoneNumber) && strlen($phoneNumber) >= 9 && strlen($phoneNumber) <= 12
    );
  }

  public function run(Request $request) {
    if ($this->validate($request->name, $request->username, $request->email, $request->password, $request->phoneNumber)) {
      return True;
    } else {
      header("{$this->request->serverProtocol} 400 Bad Request");
      return False;
    }
  }
}
