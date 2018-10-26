<?php
function render_template(string $username, $orders) {
  $ordersHTML = '';

  foreach($orders as $key => $order) {
    $orderDate = date("j F Y", $order['order_timestamp']);
    $orderId = $order['order_id'];
    $reviewStatusText = $order['is_review'] == 1 ? "You have already reviewed this purchase." : "You haven't reviewed this purchase yet.";
    $imagePath = "src/model/books/".$order['book_id'].".jpg";

    $reviewButtonHTML = $order['is_review'] == 1 ? '' : <<<HTML

<div class='history-review-button-container'>
  <form id='reviewOrder-{$key}' action='/review' method='get'>
    <input hidden name='id' value={$orderId}>
  </form>
  <button class='history-review-button' type='submit' form='reviewOrder-{$key}'>
    <div class='history-review-button-inner'>
      REVIEW
    </div>
  </button>
</div>

HTML;

    $orderHTML = <<<HTML

<div class='history-order-container'>
  <div class='history-order-content-container'>
    <div class='history-order-image-container'>
      <img class='history-order-image' src={$imagePath}/>
    </div>
    <div class='history-order-left-container'>
      <h4 class='order-title'>{$order['title']}</h4>
      <p class='order-amount'>Amount: {$order['amount']}</p>
      <p class='order-review-status'>{$reviewStatusText}</p>
    </div>
    <div class='history-order-right-container'>
      <div class='history-order-right-text-container'>
        <h4 class='order-date'>{$orderDate}</h4>
        <h4 class='order-number'>Order Number: #{$order['order_id']}</h4>
      </div>
      {$reviewButtonHTML}
    </div>
  </div>
</div>

HTML;

    $ordersHTML = $ordersHTML . $orderHTML;
  }

  if (empty($orders)) {
    $ordersHTML = <<<HTML

<div class='history-empty-message-container'>
  <h3 class='history-empty-message'><i>You haven't purchased any books!</i></h3>
</div>

HTML;
  }

  return <<<HTML

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <link rel='stylesheet' href='src/view/static/css/common.css'>
  <link rel='stylesheet' href='src/view/static/css/main.css'>
  <link rel='stylesheet' href='src/view/static/css/history.css'>
  <script type='module' src='src/view/static/js/main.js'></script>
  <link rel="stylesheet" href="src/view/static/css/fonts.css" type='text/css'>
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
      <div class='history-content-container'>
        <div class='history-title-container'>
          <h1 class='history-title'>Hist<a class='o-button' href='/about'>o</a>ry</h1>
        </div>
        <div class='history-list-container'>
          {$ordersHTML}
        </div>
      </div>
    </div>
	</div>
</body>
</html>

HTML;
}
