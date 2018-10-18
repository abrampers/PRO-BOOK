<?php
spl_autoload_register(function($className) {
  include_once $_SERVER['DOCUMENT_ROOT'] . '/lib' . $className;
});

spl_autoload_register(function($className) {
  include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/jkwtoken' . $className;
});

spl_autoload_register(function($className) {
  include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/request' . $className;
});

spl_autoload_register(function($className) {
  include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/router' . $className;
});

spl_autoload_register(function($className) {
  include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/template_engine' . $className;
});

spl_autoload_register(function($className) {
  include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/template_engine' . $className;
});

spl_autoload_register(function($className) {
  include_once $_SERVER['DOCUMENT_ROOT'] . '/src' . $className;
});

spl_autoload_register(function($className) {
  include_once $_SERVER['DOCUMENT_ROOT'] . '/src/controller' . $className;
});

spl_autoload_register(function($className) {
  include_once $_SERVER['DOCUMENT_ROOT'] . '/src/controller/middleware' . $className;
});

spl_autoload_register(function($className) {
  include_once $_SERVER['DOCUMENT_ROOT'] . '/src/controller/model' . $className;
});


