<?php

function validateUsername(string $username) {
  $db = new MarufDB('localhost', 'probook', 'root', '');
  return array('valid' => (bool) $db->validateUsername($username));
}
