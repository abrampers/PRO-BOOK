<?php
function render_template(string $username, $book, $reviews) {
  $listOfReviews = '';

  foreach($reviews as $review) {
    $str = <<<HTML

    <div class='book-review-image-content-container'>
      <img src=''>
    </div>
    <div class='book-review-content-container'>
      <p class='book-review-content-username'>{$review['username']}</p>
      <p class='book-review-content'>{$review['comment']}</p>
    </div>
    <div class='book-review-rating-content'>
      <img src='' alt='Star Image'>
      <p class='book-review-rating'>{$review['rating']}</p>
    </div>

HTML;
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
      <div class='book-detail-container'>
        <div class='book-detail-content-container'>
          <p class='book-detail-title'>{$book['title']}</p>
          <p class='book-detail-author'>{$book['author']}</p>
          <p class='bool-detail-synopsis'>{$book['synopsis']}</p>
        </div>
        <div class='book-detail-image-container'>
          <img src=''>
          <div class='book-detail-review-container'>
            <div class='book-detail-review-star-container'>
              huyu buat bintang gimane caranya
            </div>
            <p class='book-detail-review'>{$book['rating']} / 5.0</p>
          </div>
        </div>
      </div>
      <div class='book-order-container'>
        <p class='book-order-title'>Order</p>
        <select name='orderQuantity' id='quantity'>
          <option value='1'>1</option>
          <option value='2'>2</option>
          <option value='3'>3</option>
          <option value='4'>4</option>
          <option value='5'>5</option>
          <option value='6'>6</option>
          <option value='7'>7</option>
        </select>
        <div class='book-order-button'></div>
      </div>
      <div class='book-review-container'>
        <p class='book-review-title'>Reviews</p>
        <div class='book-review-content-container'>
          {$listOfReviews}
        </div>
      </div>
    </div>
	</div>
</body>
</html>

HTML;
}
