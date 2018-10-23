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
          <div id="logoutButtonContainer" class='main-logout-button-container'>
            <form id='logoutForm' action='/logout' method='get'></form>
            <button id="logoutButton" class='main-logout-button' type='submit' form='logoutForm'>
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
    <div class='main-content-container'>
      <div class='profile-main-container'>
        <div class='profile-main-left-container'></div>
        <div class='profile-main-center-container'>
          <div class='profile-main-image-container'></div>
          <p class='profile-main-name'>{$name}</p>
        </div>
        <div class='profile-main-right-container'>
          <form id='editProfileForm' action='/profile/edit' method='get'></form>
          <button type='submit' form='editProfileForm'></button>
        </div>
      </div>
      <div class='profile-detail-container'>
        <p class='profile-detail-title'>My Profile</p>
        <div class='profile-detail-content-container'>
          <div class='profile-detail-content-row-container'>
            <div class='profile-detail-content-row-title-container'>
              <img src='' alt='Username icon'>
              <p class='profile-detail-content-row-title'>Username</p>
            </div>
            <div class='profile-detail-content-row-content-container'>
              <p class='profile-detail-content-row-content'>{$username}</p>
            </div>
          </div>
          <div class='profile-detail-content-row-container'>
            <div class='profile-detail-content-row-title-container'>
              <img src='' alt='Email icon'>
              <p class='profile-detail-content-row-title'>Email</p>
            </div>
            <div class='profile-detail-content-row-content-container'>
              <p class='profile-detail-content-row-content'>{$email}</p>
            </div>
          </div>
          <div class='profile-detail-content-row-container'>
            <div class='profile-detail-content-row-title-container'>
              <img src='' alt='Address icon'>
              <p class='profile-detail-content-row-title'>Address</p>
            </div>
            <div class='profile-detail-content-row-content-container'>
              <p class='profile-detail-content-row-content'>{$address}</p>
            </div>
          </div>
          <div class='profile-detail-content-row-container'>
            <div class='profile-detail-content-row-title-container'>
              <img src='' alt='Phone Number icon'>
              <p class='profile-detail-content-row-title'>Phone Number</p>
            </div>
            <div class='profile-detail-content-row-content-container'>
              <p class='profile-detail-content-row-content'>{$phoneNumber}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>
</body>
</html>

HTML;
}
