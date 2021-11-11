<?php
session_start();
if (isset($_POST['submit'])){
    $user= $_POST['username'];
    $pwd= $_POST['pwd'];
    if (!strcmp( 'sports',$user )  && !strcmp('efac@123', $pwd ) ){
        $_SESSION['user']= 'user123';
        header("location: ../admin/home.php");
    }else{
        echo 'fail';
    }
}
