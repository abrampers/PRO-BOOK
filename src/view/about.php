<?php
function render_template(string $username) {
  return <<<HTML

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <link rel='stylesheet' href='src/view/static/css/common.css'>
  <link rel='stylesheet' href='src/view/static/css/main.css'>
  <link rel='stylesheet' href='src/view/static/css/about.css'>
  <script type='module' src='src/view/static/js/main.js'></script>
  <link rel="stylesheet" href="src/view/static/css/fonts.css" type='text/css'>
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
        <h1 class='about-title'>About Us</h1>
      </div>
      <div class='about-content-container'>
        <div class='about-content-column-container'>
          <div class='about-content-picture-container'>
            <img class='profile-picture' src='src/model/profile/nicho.jpg' alt='Nicholas Rianto Putra'>
          </div>
          <div class='about-content-name-container'>
            <h3 class='name'>Nicholas Rianto Putra</h3>
            <h3 class='title'>Query Master</h3>
          </div>
          <div class='about-content-detail-container'>
            <div class='about-content-row-container'>
              <div class='about-content-icon-container'>
                <img class='icon' src='src/view/static/img/icon_email.svg'>
              </div>
              <div class='about-content'>
                <a href='mailto:nicholasmagbanua@gmail.com'><p>nicholasmagbanua@gmail.com</p></a>
              </div>
            </div>
            <div class='about-content-row-container'>
              <div class='about-content-icon-container'>
                <img class='icon' src='src/view/static/img/icon_github.svg'>
              </div>
              <div class='about-content'>
                <a href='https://github.com/Nicholaz99'><p>Nicholaz99</p></a>
              </div>
            </div>
            <div class='about-content-row-container'>
              <div class='about-content-icon-container'>
                <img class='icon' src='src/view/static/img/icon_linkedin.svg'>
              </div>
              <div class='about-content'>
                <a href='https://www.linkedin.com/in/nicholas-rp/'><p>Nicholas Rianto Putra</p></a>
              </div>
            </div>
            <div class='about-content-row-container'>
              <div class='about-content-icon-container'>
                <img class='icon' src='src/view/static/img/icon_twitter.svg'>
              </div>
              <div class='about-content'>
                <a href='https://twitter.com/nicho_cholas'><p>@nicho_cholas</p></a>
              </div>
            </div>
            <div class='about-content-row-container'>
              <div class='about-content-icon-container'>
                <img class='icon' src='src/view/static/img/icon_instagram.svg'>
              </div>
              <div class='about-content'>
                <a href='https://www.instagram.com/nicholasr.p/'><p>@nicholasr.p</p></a>
              </div>
            </div>
            <div class='about-content-row-container'>
              <div class='about-content-icon-container'>
                <img class='icon' src='src/view/static/img/icon_facebook.svg'>
              </div>
              <div class='about-content'>
                <a href='https://www.facebook.com/nicholas.uzumaki'><p>Nicholas R Putra</p></a>
              </div>
            </div>
          </div>
        </div>
        <div class='about-content-column-container'>
          <div class='about-content-picture-container'>
            <img class='profile-picture' src='src/model/profile/abram.jpg' alt='Abram Situmorang'>
          </div>
          <div class='about-content-name-container'>
            <h3 class='name'>Abram Situmorang</h3>
            <h3 class='title'>PHP Master</h3>
          </div>
          <div class='about-content-detail-container'>
            <div class='about-content-row-container'>
              <div class='about-content-icon-container'>
                <img class='icon' src='src/view/static/img/icon_email.svg'>
              </div>
              <div class='about-content'>
                <a href='mailto:abram.perdanaputra@gmail.com'><p>abram.perdanaputra@gmail.com</p></a>
              </div>
            </div>
            <div class='about-content-row-container'>
              <div class='about-content-icon-container'>
                <img class='icon' src='src/view/static/img/icon_github.svg'>
              </div>
              <div class='about-content'>
                <a href='https://github.com/abrampers'><p>abrampers</p></a>
              </div>
            </div>
            <div class='about-content-row-container'>
              <div class='about-content-icon-container'>
                <img class='icon' src='src/view/static/img/icon_linkedin.svg'>
              </div>
              <div class='about-content'>
                <a href='https://www.linkedin.com/in/abrampers/'><p>Abram Situmorang</p></a>
              </div>
            </div>
            <div class='about-content-row-container'>
              <div class='about-content-icon-container'>
                <img class='icon' src='src/view/static/img/icon_twitter.svg'>
              </div>
              <div class='about-content'>
                <a href='https://twitter.com/abrampers'><p>@abrampers</p></a>
              </div>
            </div>
            <div class='about-content-row-container'>
              <div class='about-content-icon-container'>
                <img class='icon' src='src/view/static/img/icon_instagram.svg'>
              </div>
              <div class='about-content'>
                <a href='https://www.instagram.com/abrampers/'><p>@abrampers</p></a>
              </div>
            </div>
            <div class='about-content-row-container'>
              <div class='about-content-icon-container'>
                <img class='icon' src='src/view/static/img/icon_facebook.svg'>
              </div>
              <div class='about-content'>
                  <a href='https://www.facebook.com/abram.perdanaputra'><p>Abram Perdanaputra</p></a>
              </div>
            </div>
          </div>
        </div>
        <div class='about-content-column-container'>
          <div class='about-content-picture-container'>
            <img class='profile-picture' src='src/model/profile/faza.jpg' alt='Faza Fahleraz'>
          </div>
          <div class='about-content-name-container'>
            <h3 class='name'>Faza Fahleraz</h3>
            <h3 class='title'>JS x CSS Master</h3>
          </div>
          <div class='about-content-detail-container'>
            <div class='about-content-row-container'>
              <div class='about-content-icon-container'>
                <img class='icon' src='src/view/static/img/icon_email.svg'>
              </div>
              <div class='about-content'>
                <a href='mailto:ffahleraz@gmail.com'><p>ffahleraz@gmail.com</p></a>
              </div>
            </div>
            <div class='about-content-row-container'>
              <div class='about-content-icon-container'>
                <img class='icon' src='src/view/static/img/icon_github.svg'>
              </div>
              <div class='about-content'>
                <a href='https://github.com/ffahleraz'><p>ffahleraz</p></a>
              </div>
            </div>
            <div class='about-content-row-container'>
              <div class='about-content-icon-container'>
                <img class='icon' src='src/view/static/img/icon_linkedin.svg'>
              </div>
              <div class='about-content'>
                <a href='https://www.linkedin.com/in/ffahleraz/'><p>Faza Fahleraz</p></a>
              </div>
            </div>
            <div class='about-content-row-container'>
              <div class='about-content-icon-container'>
                <img class='icon' src='src/view/static/img/icon_twitter.svg'>
              </div>
              <div class='about-content'>
                <a href='https://twitter.com/ffahleraz'><p>@ffahleraz</p></a>
              </div>
            </div>
            <div class='about-content-row-container'>
              <div class='about-content-icon-container'>
                <img class='icon' src='src/view/static/img/icon_instagram.svg'>
              </div>
              <div class='about-content'>
                <a href='https://www.instagram.com/ffahleraz/'><p>@ffahleraz</p></a>
              </div>
            </div>
            <div class='about-content-row-container'>
              <div class='about-content-icon-container'>
                <img class='icon' src='src/view/static/img/icon_facebook.svg'>
              </div>
              <div class='about-content'>
                <a href='https://www.facebook.com/ffahleraz'><p>Faza Fahleraz</p></a>
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
