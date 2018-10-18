<?php
include('Loader.class.php');
class DotEthes {
  protected $filePath;
  protected $loader;

  public function __construct($path, $file = '.ethes') {
    $this->filePath = $this->getFilePath($path, $file);
    $this->loader = new Loader($this->filePath, true);
  }

  public function load() {
    return $this->loadData();
  }

  public function getFilePath($path, $file) {
    if (!is_string($file)) {
      $file = '.ethes';
    }
    $filePath = rtrim($path, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$file;
    return $filePath;
  }

  protected function loadData($overload = false) {
    return $this->loader->setImmutable(!$overload)->load();
  }
}
