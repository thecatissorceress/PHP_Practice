<?php 

define('DB_HOST','localhost');
define('DB_USER','carlo');
define('DB_PASS','Xurpas213@!');
define('DB_NAME','php_dev');

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if($conn->connect_error){
    die('Could not connect to MySql Server: '  . $conn->connect_error);
}

?>