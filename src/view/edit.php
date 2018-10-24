<?php
function render_template(string $id, string $name, string $username, string $email, string $address, string $phoneNumber, $response = null) {
  // Jangan lupa jon buat message dari response;
  $path = 'src/model/profile/';
  if(file_exists($path . $id .'.jpg')) {
    $path = $path . $id . '.jpg';
  } else {
    $path = 'src/model/profile/avatar_default.jpg';
  }

  $printed = !is_null($response);
  if ($printed) {
    $printed = $printed && !$printed['success'];
  }

  $str = '';
  if ($printed) {
    $str = <<<HTML
    <div id='errorMessageContainer' class='auth-error-message-container'>
      <p>{$response['error'][0]}</p>
    </div>
HTML;
  }

  return <<<HTML

<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' href='src/view/static/css/common.css'>
  <link rel='stylesheet' href='src/view/static/css/main.css'>
  <link rel='stylesheet' href='src/view/static/css/edit.css'>
  <script type='module' src='src/view/static/js/main.js'></script>
  <script type='module' src='src/view/static/js/edit.js'></script>
  <link href='https://fonts.googleapis.com/css?family=Bungee' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Bungee+Shade' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Chathura' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Mono' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Kite+One' rel='stylesheet'>
  <title>Edit Profile</title>
</head>
<body>
HTML
.
$str
.
  <<<HTML
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
        <div class='margin'>
          <form id='editForm' class='edit-form' action='/edit' method='post' enctype='multipart/form-data'>
            <input hidden name='user_id' value='{$id}'>
            <div class='edit-detail-content-container'>
              <div class='edit-detail-picture-container'>
                <div class='profile-main-image-container'>
                  <img class='profile-picture' src={$path} alt='Profile Picture' height='200' width='200'>
                </div>
                <div class='edit-detail-file-upload-content-container'>
                  <h4>Update profile picture</h4>
                  <input class='edit-detail-file-input' type="file" name="fileToUpload" id="fileToUpload">
                  <div class='edit-detail-file-upload-container'>
                    <input id='fileNameTextArea' class='edit-detail-file-input-name' type="textarea">
                    <input type="button" id="browseButton" value="BROWSE...">
                  </div>
                </div>
              </div>
              <div id='nameRowContainer' class='edit-detail-content-row-container'>
                <div class='edit-detail-content-row-label-container'>
                  <img class='edit-detail-content-row-label-icon' src='src/view/static/img/icon_username.svg' alt='Username icon'>
                  <h4>Name</h4>
                </div>
                <div class='edit-detail-content-row-content-container'>
                  <input class='edit-detail-content-row-content' type='textarea' name='name' value='{$name}'>
                </div>
              </div>
              <div class='edit-detail-content-row-container'>
                <div class='edit-detail-content-row-label-container'>
                  <img class='edit-detail-content-row-label-icon' src='src/view/static/img/icon_address.svg' alt='Address icon'>
                  <h4>Address</h4>
                </div>
                <div class='edit-detail-content-row-content-container'>
                  <input class='edit-detail-content-row-content' type='textarea' name='address' value='{$address}'>
                </div>
              </div>
              <div class='edit-detail-content-row-container'>
                <div class='edit-detail-content-row-label-container'>
                  <img class='edit-detail-content-row-label-icon' src='src/view/static/img/icon_phone.svg' alt='Phone Number icon'>
                  <h4>Phone Number</h4>
                </div>
                <div class='edit-detail-content-row-content-container'>
                  <input class='edit-detail-content-row-content' type='textarea' name='phone_number' value='{$phoneNumber}'>
                </div>
              </div>
            </form>
            <div class='edit-button-container'>
              <div>
                <form action='/profile'>
                <button class='edit-back-button' type='submit'>
                  BACK
                </button>
                </form>
                <a href='/profile'>
                </a>
              </div>
              <div>
                <button id='submitButton' form='editForm' type='submit'>
                  SUBMIT
                </button>
              </div>
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
