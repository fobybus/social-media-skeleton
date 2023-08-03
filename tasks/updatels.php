<?php 
require('condb.php');

$postedemail = $_GET['email'];

// Get id from the url sent to this page 
$search = "SELECT * FROM users WHERE email=?";
$stmt = mysqli_prepare($dbcon, $search);
mysqli_stmt_bind_param($stmt, "s", $postedemail);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// For debugging only not for users message 
if ($result) {
    //  echo("successfully parsed id");
} else {
    // echo("can't parse id");
    // echo mysqli_error($dbcon);
}

// Find id 
$row = $result->fetch_assoc();
$uid = $row['id'];

// Update user last seen whenever user navigates from one page to another 
$ls = date('Y/m/d/H/i/s');
$update_query = "UPDATE users SET last_seen=? WHERE id=?";
$stmt = mysqli_prepare($dbcon, $update_query);
mysqli_stmt_bind_param($stmt, "si", $ls, $uid);
mysqli_stmt_execute($stmt);

// For debugging only not for users message 
if ($stmt->affected_rows > 0) {
    // echo("successfully updated");
} else {
    // echo("can't update ");
    // echo mysqli_error($dbcon);
}

$dbcon->close();
?>
