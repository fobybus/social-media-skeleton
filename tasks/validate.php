<?php
//validator php  foby bus @msf black eagles 
//created 2023/08
//last update=2023/08  
function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validateText($text)
{
    return preg_match("/^[A-Za-z]+$/", $text);
}

function validateDate($date)
{
    return boolval(strtotime($date));
}

function validateGender($gender)
{
    if ($gender == "male" || $gender == "female" || $gender == "other")
        return true;
    else
        return false;
}

//minimum 8 characters 
function validatePass($pass)
{
    return preg_match("/^.{8,}$/", $pass);
}


//comntinu letter 
function validateSignup($email, $pass, $fname, $lname, $gender, $date, $city)
{
    if (validateEmail($email) && validatePass($pass) && validateText($fname) && validateText($lname) && validateGender($gender) && validateText($city) && validateDate($date))
        return true;
    else
        return false;
}

function validateUserInfo($email, $fname, $lname, $city)
{
    if (validateEmail($email) && validateText($fname) && validateText($lname) && validateText($city))
        return true;
    else
        return false;
}

?>
