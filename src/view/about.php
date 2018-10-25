<?php
function render_template(string $username) {
  return <<<HTML

<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' href='src/view/static/css/common.css'>
  <link rel='stylesheet' href='src/view/static/css/main.css'>
  <link rel='stylesheet' href='src/view/static/css/about.css'>
  <script type='module' src='src/view/static/js/main.js'></script>
  <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Bungee+Shade' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Chathura' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Mono' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css?family=Saira" rel="stylesheet">
  <title>Browse</title>
</head>
<body>
	<div class='main-page-container'>
    <div class='main-header-container'>
      <div class='main-header-top-container'>
        <div id='titleContainer' class='main-title-container'>
          <div class='main-title-zstack'>
            <h1 id='titleShadow' class='main-title-shadow'>PRO-BOOK</h1>
          </div>
          <div class='main-title-zstack'>
            <h1 id='titleBackground' class='main-title-background'>PRO-BOOK</h1>
          </div>
          <div class='main-title-zstack'>
            <h1 id='titleText' class='main-title-text'><span class='main-title-text-first'>PRO</span>-BOOK</h1>
          </div>
        </div>
        <div class='main-misc-container'>
          <div class='main-greeting-container'>
            <h5>Hi, {$username}!</h5>
          </div>
          <div id='logoutButtonContainer' class='main-logout-button-container'>
            <form id='logoutForm' action='/logout' method='get'></form>
            <button id="logoutButton" class='main-logout-button' type='submit' form='logoutForm'>
              <div id="logoutButtonIcon" class='main-logout-button-icon'></div>
            </button>
          </div>
        </div>
      </div>
      <div class='main-header-bottom-container'>
        <div id='browseTab' class='main-menu-tab'>
          <h3>Browse</h3>
        </div>
        <div id='historyTab' class='main-menu-tab tab-mid'>
          <h3>History</h3>
        </div>
        <div id='profileTab' class='main-menu-tab'>
          <h3>Profile</h3>
        </div>
      </div>
    </div>
    <div class='main-content-container'>
      <div class='about-title-container'>
        <h2 class='about-title'>About Us</h2>
      </div>
      <div class='about-content-container'>
        <div class='about-content-column-container'>
          <div class='about-content-picture-container'>
            <img class='profile-picture' src='src/model/profile/nicholas.jpg' alt='Nicholas Rianto Putra'>
          </div>
          <div class='abobut-content-container'>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
          </div>
        </div>
        <div class='about-content-column'>
          <div class='about-content-picture-container'>
            <img class='profile-picture' src='src/model/profile/abram.jpg' alt='Abram Situmorang'>
          </div>
          <div class='abobut-content-container'>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
          </div>
        </div>
        <div class='about-content-column'>
          <div class='about-content-picture-container'>
            <img class='profile-picture' src='src/model/profile/faza.jpg' alt='Faza Fahleraz'>
          </div>
          <div class='abobut-content-container'>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
            <p>huyuuuu</p>
          </div>
        </div>
      </div>
    </div>
	</div>
</body>
</html>

HTML;
}
