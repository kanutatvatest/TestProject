
<?php
@session_start();
define("DB_HOST", "localhost");
define("DB_USER", "eventcruduser");
define("DB_PASSWORD","eventcruduser!@#");
define("DB_DATABASE","eventcrud");
$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysqli_select_db($con,DB_DATABASE);
?>