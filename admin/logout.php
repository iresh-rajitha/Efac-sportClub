<?php
session_start();
$_SESSION['user']= null;
header("location: login.php");
