<?php

function validateUsername(string $username) {
  $db = new MarufDB('localhost', 'probook', 'root', '');
  return $db->validateUsername($username);
}
