<?php
function render_template(string $username, $book, $user_id) {
  $img_name = "src/model/books/".$book['id'].".jpg";
  $book_id = $book['id'];
  $template = <<<HTML

<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' href='src/view/static/css/common.css'>
  <link rel='stylesheet' href='src/view/static/css/main.css'>
  <link rel='stylesheet' href='src/view/static/css/review.css'>
  <script type='module' src='src/view/static/js/main.js'></script>
  <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Bungee+Shade' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Chathura' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Mono' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css?family=Kite+One" rel="stylesheet">
  <title>History</title>
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
        <div id='historyTab' class='main-menu-tab tab-mid tab-selected'>
          <h3>History</h3>
        </div>
        <div id='profileTab' class='main-menu-tab'>
          <h3>Profile</h3>
        </div>
      </div>
    </div>
    <div class='main-content-container'>
      <div class='review-main-book-container'>
        <div class='review-main-book-detail-container'>
          <div class='review-main-book-title-content'>{$book['title']}</div>
          <div class='review-main-book-author-content'>{$book['author']}</div>
        </div>
        <div class='review-main-book-image-container'>
          <img src={$img_name}/>
        </div>
      </div>
      <form id='browseForm' class='browse-form' action='/rating' method='POST'>
        <div>
          Add Rating
          <input hidden name='rating' value=5>
        </div>
        <div>
          Add Comment
          <input id='queryField' type='text' name='comment' placeholder='Input your comment'>
          <input hidden name='username' value={$username}>
          <input hidden name='user_id' value={$user_id}>
          <input hidden name='book_id' value={$book_id}>
        </div>
      </form>
      <div>
        <button>Back</button>
        <div class='browse-submit-container'>
          <button id='formSubmitButton' type='submit' form='browseForm'>
            <div id='formSubmitButtonInner' class='browse-submit-inner'>
              SUBMIT
            </div>
          </button>
        </div>
      </div>
    </div>
	</div>
</body>
</html>
HTML;

return $template;
}
