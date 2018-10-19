<?php
function render_template(bool $error = FALSE) {
  return <<<HTML

<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' href='src/view/static/css/common.css'>
  <link rel='stylesheet' href='src/view/static/css/main.css'>
  <script type='module' src='src/view/static/js/browse.js'></script>
  <link href='https://fonts.googleapis.com/css?family=Bungee+Shade' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Chathura' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Mono' rel='stylesheet'>
  <title>Browse</title>
</head>
<body>
	<div class='main-page-container'>
    <div class='main-header-container'>
      <div class='main-header-top-container'>
        <div class='main-title-container'>
          <h1 class='main-title'>PRO-BOOK</h1>
        </div>
      </div>
      <div class='main-header-bottom-container'>
        jjjsdf
      </div>
    </div>
	</div>
</body>
</html>

HTML;
}
