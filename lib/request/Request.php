<?php
include_once 'RequestInterface.php';
class Request implements RequestInterface {
  function __construct() {
    $this->importServerVariables();
  }

  private function importServerVariables() {
    foreach($_SERVER as $key => $value) {
      $this->{Request::toCamelCase($key)} = $value;
    }
  }

  private static function toCamelCase($string) {
    $result = strtolower($string);

    preg_match_all('/_[a-z]/', $result, $matches);
    foreach($matches[0] as $match) {
      $c = str_replace('_', '', strtoupper($match));
      $result = str_replace($match, $c, $result);
    }
    return $result;
  }

  public function getBody() {
    if ($this->requestMethod === "GET") {
      return;
    }
    if ($this->requestMethod == "POST") {
      $result = array();
      foreach($_POST as $key => $value) {
          $result[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
      }
      return $result;
    }

    return $body;
  }
}
