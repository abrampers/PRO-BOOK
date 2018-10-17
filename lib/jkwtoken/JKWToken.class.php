<?php
class JKWToken {
  // private $user_id;
  // private $value;
  // public function __contruct($user_id) {
  //   $this->user_id = $user_id;
  //   $this->value = bin2hex(openssl_random_pseudo_bytes(4));
  // }
  public function generateJKWToken() {
    return bin2hex(openssl_random_pseudo_bytes(4));
  }
}
