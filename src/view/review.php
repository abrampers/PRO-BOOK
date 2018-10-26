<?php
function render_template(string $username, $book, $user_id, $order_id) {
  $img_name = "src/model/books/".$book['id'].".jpg";
  $book_id = $book['id'];
  $template = <<<HTML

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <link rel='stylesheet' href='src/view/static/css/common.css'>
  <link rel='stylesheet' href='src/view/static/css/main.css'>
  <link rel='stylesheet' href='src/view/static/css/review.css'>
  <script type='module' src='src/view/static/js/main.js'></script>
  <script type='module' src='src/view/static/js/review.js'></script>
  <link rel="stylesheet" href="src/view/static/css/fonts.css" type='text/css'>
  <title>{$book['title']} - History</title>
</head>
<body>
  <div id='inputValidationMessageContainer' class='main-input-validation-message-container'>
    <p id='inputValidationMessage' class='main-input-validation-message'></p>
  </div>
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
      <div class='review-content-container'>
        <div class='review-book-container'>
          <div class='review-book-left-container'>
            <h3 class='review-book-title'>{$book['title']}</h3>
            <h4 class='review-book-author'>{$book['author']}</h4>
          </div>
          <div class='review-book-right-container'>
            <div class='review-book-image-container'>
              <img class='review-book-image' src={$img_name}/>
            </div>
          </div>
        </div>
        <form id='reviewForm' class='review-form-container' action='/review' method='POST'>
          <div class='review-rating-container'>
            <h3 class='review-rating-title'>Add Rating</h3>
            <input id='ratingField' type='number' name='rating' value='0' hidden>
            <div class='review-rating-stars-container'>
              <div class='review-rating-stars add-background'>
                <div id='1' class='review-star'></div>
                <div id='2' class='review-star'></div>
                <div id='3' class='review-star'></div>
                <div id='4' class='review-star'></div>
                <div id='5' class='review-star'></div>
              </div>
            </div>
          </div>
          <div class='review-comment-container'>
            <h3 class='review-comment-title'>Add Comment</h3>
            <textarea id='commentField' class='review-textbox-input' type='text' name='comment' placeholder='Input your comment...'></textarea>
            <input hidden name='username' value={$username}>
            <input hidden name='user_id' value={$user_id}>
            <input hidden name='book_id' value={$book_id}>
            <input hidden name='order_id' value={$order_id}>
          </div>
          <div class='review-button-container'>
            <div class='review-back-container'>
              <a href='/history'>
                <button class='review-back-button' type='button'>
                  BACK
                </button>
              </a>
            </div>
            <div id='submitButtonContainer' class='review-submit-container'>
              <button id='submitButton' type='submit' form='reviewForm' disabled>
                SUBMIT
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
	</div>
</body>
</html>
HTML;

return $template;
}
