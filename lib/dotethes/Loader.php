<?php
class Loader {
  protected $filePath;
  public $variableNames = array();

  public function __construct($filePath) {
    $this->filePath = $filePath;
  }

  public function load() {
    $filePath = $this->filePath;
    $lines = $this->readLinesFromFile($filePath);
    foreach ($lines as $line) {
      if (!$this->isComment($line) && $this->isSetter($line)) {
        $this->setEnvironmentVariable($line);
      }
    }
    return $lines;
  }

  protected function readLinesFromFile($filePath) {
    $autodetect = ini_get('auto_detect_line_endings');
    ini_set('auto_detect_line_endings', '1');
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    ini_set('auto_detect_line_endings', $autodetect);
    return $lines;
  }

  protected function isComment($line) {
    $line = ltrim($line);
    return isset($line[0]) && $line[0] === '#';
  }

  protected function isSetter($line) {
    return strpos($line, '=') !== false;
  }

  protected function splitLine($line) {
    return explode("=", $line);
  }

  public function setEnvironmentVariable($line) {
    list($name, $value) = $this->splitLine($line);
    $this->variableNames[] = $name;
    if ($this->getEnvironmentVariable($name) !== null) {
      return;
    }
    $_ENV[$name] = $value;
    $_SERVER[$name] = $value;
  }

  public function clearAllEnvironmentVariables() {
    foreach($this->variableNames as $name) {
      unset($_ENV[$name], $_SERVER[$name]);
    }
  }

  public function getEnvironmentVariable($name)
  {
    switch (true) {
      case array_key_exists($name, $_ENV):
        return $_ENV[$name];
      case array_key_exists($name, $_SERVER):
        return $_SERVER[$name];
      default:
        $value = getenv($name);
        return $value === false ? null : $value;
    }
  }
}
