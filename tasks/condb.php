<?php
//connect to the database.
$dbname = "pipago";
$dbhost = "127.0.0.1";
$dbpass = "";
$dbuser = "root";

$dbcon = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
//check if the connection successfully 
if($dbcon!=null)
{
 //print("successfully connected to the database");
} else {
  //  print("cant connect to the database");
}

?>