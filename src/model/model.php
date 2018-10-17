<?php
include('MarufDB.class.php');
echo bin2hex(openssl_random_pseudo_bytes(16));
$db = new MarufDB('localhost', 'probook', 'root', '');
// $login =
// $db->getAllUsers();
// $result = $db->addProfile('Erick Thohir', 'sayacebong', 'asu@gmail.com', 'bowoanjing', 'san siro', '123456789');
echo $result;
if ($db->checkLogin("sayacebong", 'bowoanjing') == 1) {
    echo 'memek';
} else {
    echo 'asu';
}
// $query = $dbh->query("SELECT * FROM Users");
// while ($row = $query->fetch()) {
//     echo "<br>".print_r($row)."<br />\n";
// }
