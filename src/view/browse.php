<?php
function render_template(bool $error = FALSE) {
  return <<<HTML

<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' href='src/view/static/css/common.css'>
  <link rel='stylesheet' href='src/view/static/css/main.css'>
  <script type='module' src='src/view/static/js/browse.js'></script>
  <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Bungee+Shade' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Chathura' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Mono' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css?family=Kite+One" rel="stylesheet">
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
          <div id="logoutButtonContainer" class='main-logout-button-container'>
            <form id='logoutForm' action='/logout' method='get'></form>
            <button id="logoutButton" class='main-logout-button' type='submit' form='logoutForm'>
              <div id="logoutButtonIcon" class='main-logout-button-icon'>
            </button>
          </div>
        </div>
      </div>
      <div class='main-header-bottom-container'>
        <div id='browseTab' class='main-menu-tab tab-selected'>
          <h2>Browse</h2>
        </div>
        <div id='historyTab' class='main-menu-tab tab-mid'>
          <h2>History</h2>
        </div>
        <div id='profileTab' class='main-menu-tab'>
          <h2>Profile</h2>
        </div>
      </div>
    </div>
    <div class='main-content-container'>
      <p>huyuuuuuuuu 7777</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
      <p>huyuuuuuuuu</p>
    </div>
	</div>
</body>
</html>

HTML;
}
