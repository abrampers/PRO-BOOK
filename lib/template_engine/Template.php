<?php
class Template {
  private $template_file_path;

  function __construct(string $template_file_path) {
    $this->template_file_path = $template_file_path;
  }

  function render() {
    $args = func_get_args();
    include_once $this->template_file_path;
    return call_user_func_array(render_template, $args);
  }
}
