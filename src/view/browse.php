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
          <div class='main-title-zstack'>
            <h1 class='main-title-background'>PRO-BOOK</h1>
          </div>
          <div class='main-title-zstack'>
            <h1 class='main-title'><span class='main-title-first'>PRO</span>-BOOK</h1>
          </div>
        </div>
        <div class='main-misc-container'>
          <div class='main-greeting-container'>
            <h3>Hi, Cebong!</h3>
          </div>
          <div class='main-logout-button-container'>
            <button class='main-logout-button'>
              <h4>Logout</h4>
            </button>
          </div>
        </div>
      </div>
      <div class='main-header-bottom-container'>
        <div class='main-menu-tab tab-selected'>
          <h2>Browse</h2>
        </div>
        <div class='main-menu-tab tab-mid'>
          <h2>History</h2>
        </div>
        <div class='main-menu-tab'>
          <h2>Profile</h2>
        </div>
      </div>
    </div>
	</div>
</body>
</html>

HTML;
}
