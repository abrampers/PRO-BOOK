<?php
function render_template(string $id, string $name, string $username, string $email, string $address, string $phoneNumber) {
  return <<<HTML

<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' href='src/view/static/css/common.css'>
  <link rel='stylesheet' href='src/view/static/css/main.css'>
  <link rel='stylesheet' href='src/view/static/css/edit.css'>
  <script type='module' src='src/view/static/js/main.js'></script>
  <script type='module' src='src/view/static/js/profile.js'></script>
  <link href='https://fonts.googleapis.com/css?family=Bungee' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Bungee+Shade' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Chathura' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Mono' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Kite+One' rel='stylesheet'>
  <title>Profile</title>
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
            <button id='logoutButton' class='main-logout-button' type='submit' form='logoutForm'>
              <div id='logoutButtonIcon' class='main-logout-button-icon'></div>
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
        <div id='profileTab' class='main-menu-tab tab-selected'>
          <h3>Profile</h3>
        </div>
      </div>
    </div>

    <div class='main-content-container'>
      <div class='edit-detail-container'>
        <div class='edit-detail-title-container'>
          <h2 class='edit-detail-title'>Edit Profile</h2>
        </div>
        <form id='editForm' action='/edit' method='post'>
          <div>
            <div></div>
            <div></div>
          </div>
          <input hidden name='userid' value='{$id}'>
          <div class='edit-detail-content-container'>
            <div class='edit-detail-content-row-container'>
              <div class='edit-detail-content-row-label-container'>
                <img class='edit-detail-content-row-label-icon' src='src/view/static/img/icon_username.svg' alt='Username icon'>
                <p class='edit-detail-content-row-label'>Name</p>
              </div>
              <div class='edit-detail-content-row-content-container'>
                <input class='edit-detail-content-row-content' type='text' name='name' value='{$name}'>
              </div>
            </div>
            <div class='edit-detail-content-row-container'>
              <div class='edit-detail-content-row-label-container'>
                <img class='edit-detail-content-row-label-icon' src='src/view/static/img/icon_address.svg' alt='Address icon'>
                <p class='edit-detail-content-row-label'>Address</p>
              </div>
              <div class='edit-detail-content-row-content-container'>
                <input class='edit-detail-content-row-content' type='textarea' name='address' value='{$address}'>
              </div>
            </div>
            <div class='edit-detail-content-row-container'>
              <div class='edit-detail-content-row-label-container'>
                <img class='edit-detail-content-row-label-icon' src='src/view/static/img/icon_phone.svg' alt='Phone Number icon'>
                <p class='edit-detail-content-row-label'>Phone Number</p>
              </div>
              <div class='edit-detail-content-row-content-container'>
                <input class='edit-detail-content-row-content' type='textarea' name='phonenumber' value='{$phoneNumber}'>
              </div>
            </div>
          </form>
          <div class='edit-button-container'>
            <div>
              <a href='/profile'>
                <button type='submit'>
                  BACK
                </button>
              </a>
            </div>
            <div>
              <button type='submit' form='editForm'>
                SUBMIT
              </button>
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
