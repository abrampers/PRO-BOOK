<?php
echo "<h1>Served Index file</h1>";
/** Get Server Path
* For http://localhost:5000/user/login, We get
* /user/login
**/
echo "Server Path </br>";
foreach($_SERVER as $k => $v) {
    echo $k . " => " . $v . "<br>";
}

echo "<br><br>";

foreach($_POST as $k => $v) {
    echo $k . " => " . $v . "<br>";
}

// Then we split the path to get the corresponding controller and method to work with
echo "<br/><br/>Path Split<br/>";
print_r(explode('/', ltrim($path)));
/** Then we have our controller name has [1]
* method name as [2]
**/
// We now need to match controllers and methods
?>