<?php
class JKWToken {
  public function generateJKWToken() {
    return bin2hex(openssl_random_pseudo_bytes(16));
  }
}
