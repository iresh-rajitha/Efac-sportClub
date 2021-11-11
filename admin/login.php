<?php
session_start();
include '../includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/Council%20Logo.png">
    <link rel="stylesheet" href="../assets/css/main.css">
    <style>
        input{
            width: auto !important;
        }
    </style>
</head>
<body>
<div class="container">
    <form method="post" action="../includes/login.php">
        <div class="row">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
        </div>
        <div>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pwd" required>
        </div>
        <input name="submit" type="submit">
    </form>
</div>
</body>
</html>