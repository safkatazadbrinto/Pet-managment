<?php
session_start();
print_r($_SESSION);

if ( isset($_SESSION['profile_id']) )
{
    //echo '<script>alert("hoise")</script>';
    session_destroy();
    header('location:profile.php');


}
else
{
    header('location:index.php');
    //echo 'session cancel hoye gese';
}

