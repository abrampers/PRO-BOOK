<?php
function render_template(string $username, $books, $searchTitle) {
  $booksHTML = '';
  $numOfResults = 0;
  $bookId = 0;

  foreach($books as $key => $book) {
    $bookId = $book['id'];
    $imagePath = "src/model/books/".$bookId.".jpg";
    $numOfResults += 1;

    $rating = round($book['rating'], 1);
    $ratingText = "" . $rating;
    if (($rating * 10) % 10 == 0) {
      $ratingText = $ratingText . ".0";
    }

    $voteCount = $book['vote'];
    $voteCountText = "" . $voteCount . " vote";
    if ($voteCount > 1) {
      $voteCountText = $voteCountText . "s";
    }

    $bookHTML = <<<HTML

<div class='search-book-container'>
  <div class='search-book-content-container'>
    <div class='search-book-image-container'>
      <img class='search-book-image' src={$imagePath}/>
    </div>
    <div class='search-book-text-container'>
      <h4 class='book-title'>{$book['title']}</h4>
      <h4 class='book-author'>{$book['author']} - {$ratingText} / 5.0 ({$voteCountText})</h4>
      <p class='book-description'>{$book['synopsis']}</p>
    </div>
  </div>
  <div class='search-detail-button-container'>
    <form id='bookDetail-{$key}' action='/book' method='get'>
      <input hidden name='id' value={$bookId}>
    </form>
    <button class='search-detail-button' type='submit' form='bookDetail-{$key}'>
      <div class='search-detail-button-inner'>
        DETAILS
      </div>
    </button>
  </div>
</div>

HTML;
    $booksHTML = $booksHTML . $bookHTML;
  }

  if (empty($books)) {
    $booksHTML = <<<HTML

<div class='search-not-found-message-container'>
  <h3 class='search-not-found-message'><i>Oops, we didn't find anything that matches '{$searchTitle}'!</i></h3>
</div>

HTML;
  }

  $numOfResultsText = "Found <u>";
  if ($numOfResults > 1) {
    $numOfResultsText = $numOfResultsText . $numOfResults . "</u> results";
  } else {
    $numOfResultsText = $numOfResultsText . $numOfResults . "</u> result";
  }

  return <<<HTML

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <link rel='stylesheet' href='src/view/static/css/common.css'>
  <link rel='stylesheet' href='src/view/static/css/main.css'>
  <link rel='stylesheet' href='src/view/static/css/search.css'>
  <script type='module' src='src/view/static/js/main.js'></script>
  <link rel="stylesheet" href="src/view/static/css/fonts.css" type='text/css'>
  <title>{$searchTitle} - Browse</title>
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
        <div id='browseTab' class='main-menu-tab tab-selected'>
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
      <div class='search-content-container'>
        <div class='search-title-container'>
          <h1 class='search-title'>Search Result</h1>
          <div class='search-result-count-container add-background'>
            <h4 class='search-result-count'>{$numOfResultsText}</h4>
          </div>
        </div>
        <div class='search-result-container'>
          {$booksHTML}
        </div>
      </div>
    </div>
	</div>
</body>
</html>

HTML;
}
