<?php
spl_autoload_register(function($className) {
  $extensions = array(".php");
  $root = $_SERVER['DOCUMENT_ROOT'];
  $paths = array(
    '/lib/',
    '/lib/dotethes/',
    '/lib/jkwtoken/',
    '/lib/request/',
    '/lib/router/',
    '/lib/template_engine/',
    '/src/',
    '/src/controller/',
    '/src/controller/middleware/',
    '/src/model'
  );
  foreach ($paths as $path) {
    $filename = $root . $path . DIRECTORY_SEPARATOR . $className;
    foreach ($extensions as $ext) {
      if (is_readable($filename . $ext)) {
        require_once $filename . $ext;
        break;
      }
    }
  }
});
