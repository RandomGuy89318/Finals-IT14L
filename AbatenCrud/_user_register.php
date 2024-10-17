<?php
    require '_functions.php';

    if(isset($_POST['login'])) {
        ('Location:login.php');
    }

    if(isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['userpassword'];
    
        $request = registeruser($username, $password);

        if($request == true) {
            header("location: register.php?note=Registered");
        } else {
            header("location: register.php?note=Error");
        }
    } else {
        header("location: register.php?note=Invalid");
    }
    
?>