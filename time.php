<?php
/*this script returns server time and a random display color in response to an AJAX request*/
session_start();
if($_SESSION['timedateRefreshCount'] ==0)
{
    $greetingColor = "black";
}
else
{
    $red = rand(0,255);
    $green = rand(0,255);
    $blue = rand(0,255);
    $greetingColor="rgb($red,$green,$blue)";
}
$date = date("1, F jS");
$time = date('g:ia');
echo "It's $date.<br/> The time is $time.";
echo "<p hidden id='colorChoice'>$greetingColor</p>";

$_SESSION[timedateRefreshCount] = $_SESSION[timedateRefreshCount] +1;



?>