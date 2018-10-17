<?php
include('MarufDB.class.php');
echo bin2hex(openssl_random_pseudo_bytes(16));
$db = new MarufDB('localhost', 'probook', 'root', 'Nicho01');
// $login =
// $db->getAllUsers();
if ($db->checkLogin("\xbf\x27 OR 1=1 /* ", 'bowobangsat') == 1) {
    echo 'memek';
} else {
    echo 'asu';
}
// $query = $dbh->query("SELECT * FROM Users");
// while ($row = $query->fetch()) {
//     echo "<br>".print_r($row)."<br />\n";
// }
