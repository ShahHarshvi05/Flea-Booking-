<?php
 //AUthorization - Access COntrol
    //CHeck whether the user is logged in or not
    if(!isset($_SESSION['user'])) //IF user session is not set
    {
        //User is not logged in
        //REdirect to login page with message
        $_SESSION['no-login-message'] = "<strong><center><div class='error'>Please login to access Admin Panel.</div></center></strong><br>";
        //REdirect to Login Page
        header('location: signup.php');
    }
?>