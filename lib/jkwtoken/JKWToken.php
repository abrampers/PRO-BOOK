<?php
class JKWToken {
  public function generateJKWToken() {
    return bin2hex(openssl_random_pseudo_bytes((int)$_ENV['JKWTOKEN_BYTES_LENGTH']));
  }
}
