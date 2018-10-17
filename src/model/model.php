<?php
include('dbconnection.class.php');
$db = new DBConnection('localhost', 'probook', 'root', 'Nicho01');
// $login =
// $db->getAllUsers();
if ($db->check_login("cebong", 'bowobangsat') == 1) {
    echo 'memek';
} else {
    echo 'asu';
}
// $query = $dbh->query("SELECT * FROM Users");
// while ($row = $query->fetch()) {
//     echo "<br>".print_r($row)."<br />\n";
// }
