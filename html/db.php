<?php
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
$servername = "localhost";
$username = "id17175645_root";
$password = "Y/?YG-=\8z!B4/XS";
$database = "id17175645_toor";

$con = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
