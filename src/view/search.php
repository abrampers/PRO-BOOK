<?php
function render_template(string $username, $books) {
  $listOfBooks = '';

  foreach($books as $book) {
    $book_id = $book['id'];

    $str = <<<HTML

    <div class='search-book-detail-container'>
      <div class='search-book-detail-image-container'>
        <img src=''>
      </div>
      <div class='search-book-detail-content-container'>
        <p class='book-title'>{$book['title']}</p>
        <p class='book-author'>{$book['author']} - {$book['rating']}/5.0 ({$book['votes']} vote(s))</p>
        <p class='book-description'>{$book['synopsis']}</p>
      </div>
    </div>
    <div class='search-detail-button-container'>
      <form id='bookDetail' action='/book' method='get'>
        <input hidden name='id' value={$book_id}>
      </form>
      <button form='bookDetail' type='submit'>
        <p class='search-detail-button-title'>Detail</p>
      </button>
    </div>

HTML;

    $listOfBooks = $listOfBooks . $str;
  }

  return <<<HTML

<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' href='src/view/static/css/common.css'>
  <link rel='stylesheet' href='src/view/static/css/main.css'>
  <link rel='stylesheet' href='src/view/static/css/browse.css'>
  <script type='module' src='src/view/static/js/main.js'></script>
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
            <h3>Hi, {$username}!</h3>
          </div>
          <div id='logoutButtonContainer' class='main-logout-button-container'>
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
      <div class='search-content-title-container'>
        <p class='search-result-title'>Search Result</p>
        <p class='search-result-number'>Found {$numOfResults} result(s)</p>
      </div>
      <div class='search-content-container'>
        {$listOfBooks}
      </div>
    </div>
	</div>
</body>
</html>

HTML;
}
