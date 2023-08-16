<?php
include("tasks/condb.php");
include("tasks/passw.php");
//handle the form 
$uemail=htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
$upass=$_POST["password"];
$ufname=htmlspecialchars($_POST["fname"], ENT_QUOTES, 'UTF-8');
$ulname=htmlspecialchars($_POST["lname"], ENT_QUOTES, 'UTF-8');
$ugender=htmlspecialchars($_POST['gender'], ENT_QUOTES, 'UTF-8');
$ubdate=htmlspecialchars($_POST['bdate'], ENT_QUOTES, 'UTF-8');
$uelevel=htmlspecialchars($_POST['elevel'], ENT_QUOTES, 'UTF-8');
$ucity=htmlspecialchars($_POST['city'], ENT_QUOTES, 'UTF-8');

//prevent sql injection here 
$uemail=mysqli_real_escape_string($dbcon,$uemail);
$upass=mysqli_real_escape_string($dbcon,$upass);
$ufname=mysqli_real_escape_string($dbcon,$ufname);
$ulname=mysqli_real_escape_string($dbcon,$ulname);
$ugender=mysqli_real_escape_string($dbcon,$ugender);
$ubdate=mysqli_real_escape_string($dbcon,$ubdate);
$uelevel=mysqli_real_escape_string($dbcon,$uelevel);
$ucity=mysqli_real_escape_string($dbcon,$ucity);


$lseen=date("Y/m/d/H/i/s");
//using mysql now() 2nd alt 
//before inserting check if the email already exist 
$query="select * from users where email='$uemail'";
$result=mysqli_query($dbcon,$query);
//if available 
if($result->num_rows==0)
{
//
$salt=generateSalt();
$upass=hashPass($upass,$salt);
//insert to database.
$query="insert into users (email,password,fname,lname,gender,bday,edu,city,last_seen,joined) values('$uemail','$upass','$ufname','$ulname','$ugender','$ubdate','$uelevel','$ucity','$lseen','$lseen')";
$result=mysqli_query($dbcon,$query);
//if successfully inseerted true 
if($result==true)
{
    //get id 
    $query="select * from users where email='$uemail'";
    $result=mysqli_query($dbcon,$query);
    if($result->num_rows!=0)
    {
        $row=$result->fetch_assoc();
        $i=$row["id"];
        //save sal
        $query="insert into usersalt (uid,salt) values ('$i','$salt')";
        $result=mysqli_query($dbcon,$query);
        if($result==true)
        echo("you have successfully registered,login now");
        else 
        echo("something went wrong!");
        require('login.html');
    } else {
        echo("something went wrong!");
    }
    

} else {
    echo mysqli_error($dbcon)."<br>";
    die("unknow error occured");
}
}  else {
    echo("<p style='color:red;text-align:center;font-size:20px;'>the email address you inserted is taken </p>");
    require('signup.html');
    exit();
}

$dbcon->close();



?>


