<?php
function render_template(string $username, $orders) {
  $listOfOrders = '';

  foreach($orders as $order) {
    $orderDate = date("j F Y", $order['order_timestamp']);
    $reviewLink = "/rating?id=".$order['book_id'];
    $bookId = $order['id'];
    $reviewStatusText = $order['is_review'] == 1 ? "You have already reviewed this purchase." : "You haven't reviewed this purchase yet.";
    $imagePath = "src/view/static/img/".$order['book_id'].".jpg";

    $str = <<<HTML

<div class='history-order-container'>
  <div class='history-order-content-container'>
    <div class='history-order-image-container'>
      <img class='history-order-image' src={$imagePath}/>
    </div>
    <div class='history-order-text-container'>

      <h4 class='order-title'>{$order['title']}</h4>
      <p class='order-amount'>Amount: {$order['amount']}</p>
      <p class='order-review-status'>{$reviewStatusText}</p>
      <p class='order-date'>{$orderDate}</p>
      <p class='order-number'>Order Number: #{$order['id']}</p>

    </div>
  </div>
</div>

HTML;
//     if ($order['is_review'] == 1) {
//       $review_template = <<<HTML

//     </div>
//   </div>
// </div>

// HTML;
//     } else {
//       $review_template = <<<HTML

//       <div class='review-button-container'>
//         <form id='formRating' action='/rating' method='get'><input hidden name="id" value={$book_id}></form>
//         <button id='reviewButton' type='submit' form='formRating'>
//           <div id='reviewButtonInner' class='review-button-inner'>
//             REVIEW
//           </div>
//         </button>
//       </div>
//     </div>
//   </div>
// </div>

// HTML;
//     }

    $listOfOrders = $listOfOrders . $str;
  }

  return <<<HTML

<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' href='src/view/static/css/common.css'>
  <link rel='stylesheet' href='src/view/static/css/main.css'>
  <link rel='stylesheet' href='src/view/static/css/history.css'>
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
      <div class='history-content-container'>
        <div class='history-title-container'>
          <h1 class='history-title'>History</h1>
        </div>
        <div class='history-content-container'>
          {$listOfOrders}
        </div>
      </div>
    </div>
	</div>
</body>
</html>

HTML;
}
