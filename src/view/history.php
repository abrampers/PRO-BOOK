<?php
function render_template($orders) {
  $template = <<<HTML

<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' href='src/view/static/css/common.css'>
  <link rel='stylesheet' href='src/view/static/css/main.css'>
  <link rel='stylesheet' href='src/view/static/css/history.css'>
  <script type='module' src='src/view/static/js/main.js'></script>
  <script type='module' src='src/view/static/js/history.js'></script>
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
            <h3>Hi, Cebong!</h3>
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
        <div id='browseTab' class='main-menu-tab'>
          <h2>Browse</h2>
        </div>
        <div id='historyTab' class='main-menu-tab tab-mid tab-selected'>
          <h2>History</h2>
        </div>
        <div id='profileTab' class='main-menu-tab'>
          <h2>Profile</h2>
        </div>
      </div>
    </div>
    <div class='main-content-container'>
      <div class='history-title-container'>
        <h1>History</h1>
      </div>
HTML;
foreach($orders as $order) {
  $order_date = date("j F Y", $order['order_timestamp']);
  $review_text = $order['is_review'] == 1 ? "Anda sudah memberikan review" : "Belum Review";
  $img_name = "src/view/static/img/".$order['book_id'].".jpg";
  $order_template = <<<HTML
      <div class='history-order-container'>
        <img src={$img_name}/>
        <div class='history-order-1-content'>
          <div class='history-order-title-container'>
            <div class='order-title'>{$order['title']}</div>
          </div>
          <p>Jumlah : {$order['amount']}</p>
          <p>{$review_text}</p>
        </div>
        <div class='history-order-2-content'>
          <div class='order-2'>{$order_date}</div>
          <div class='order-2'>Nomor Order: #{$order['id']}</div>
        </div>
      </div>
HTML;
  $template = $template.$order_template;
};

$template = $template.<<<HTML
    </div>
	</div>
</body>
</html>
HTML;

return $template;
}
