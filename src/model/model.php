<?php
// include('MarufDB.class.php');
// include('../../lib/dotethes/DotEthes.class.php');

// $dotethes = new DotEthes(__DIR__);
// $dotethes->load();
echo $_ENV['DB_HOST'];
echo $_ENV['DB_NAME'];
// echo $_ENV['DB_USERNAME'];
echo $_ENV['DB_PASSWORD'];

// echo bin2hex(openssl_random_pseudo_bytes(16));
// echo strtotime(date("Y-m-d"));
// $db = new MarufDB('localhost', 'probook', 'root', 'Nicho01');
// // $login =
// // $db->getAllUsers();
// // $result = $db->addProfile('Erick Thohir', 'sayacebong', 'asu@gmail.com', 'bowoanjing', 'san siro', '123456789');
// echo $result;
// if ($db->checkLogin("sayacebong", 'bowoanjing') == 1) {
//     echo 'memek';
// } else {
//     echo 'asu';
// }
// $query = $dbh->query("SELECT * FROM Users");
// while ($row = $query->fetch()) {
//     echo "<br>".print_r($row)."<br />\n";
// }
