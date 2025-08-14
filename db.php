<?php
// Database connection code
$host = '160.187.5.190';
$dbname = 'reports_Location_record';
$username = 'reports_Location_record';
$password = 'FCZkJJ4^kc?oD&#,';
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");
// echo "Connected successfully";

///live database
// $host = '101.53.136.253';
// $dbname = 'baris_db';
// $username = 'beatle_live';
// $password = 'Htrahdis@9876';

// $conn = new mysqli($host, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// $conn->set_charset("utf8");
// echo "Connected successfully";

?>
x