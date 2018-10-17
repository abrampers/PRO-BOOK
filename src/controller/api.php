<?php

function validateUsername(string $username) {
  $db = new MarufDB('localhost', 'probook', 'root', '');
  return array('valid' => (bool) $db->validateUsername($username));
}

function validateEmail(string $email) {
  $db = new MarufDB('localhost', 'probook', 'root', '');
  return array('valid' => (bool) $db->validateEmail($username));
}
