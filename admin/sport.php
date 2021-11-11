<?php
session_start();
if (!isset($_SESSION['user'])){
    header("location: login.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Sport</title>
</head>
<body>
<form id="sport_form" method="post" action="../includes/add-sport.php" enctype="multipart/form-data">
    <div class="row">
        <label class="col-2">Name</label>
        <input class="col-6" type="text" name="name" placeholder="Name" id="name" onkeyup="checkName()">
    </div>
    <div class="row">
        <label class="col-2">Short Description</label>
        <textarea class="col-8" name="s_description" placeholder="Short Description" onkeyup="checkSDesc()" id="sdesc" > </textarea>
    </div>
    <div class="row">
        <label class="col-2"> Full Description</label>
        <textarea class="col-8" name="description" placeholder="Description" onkeyup="checkDes()" id="desc"> </textarea>
    </div>
    <div class="row">
        <label class="col-2">Card</label>
        <input class="col-8" type="file" name="card" onchange="checkCard()" placeholder="card photo" id="card">
    </div>
    <div class="row">
        <label class="col-2">Sport Photo</label>
        <input class="col-8" type="file" name="sport" onchange="checkSport()" placeholder="Sport photo" id="sport">
    </div>
    <div class="row">
        <label class="col-2">Cover Photo</label>
        <input class="col-8" type="file" name="cover" onchange="checkCover()" placeholder="cover photo" id="cover">
    </div>
    <div class="row">
        <input type="submit" name="submit" placeholder="Submit" id="btn">
    </div>
</form>
</body>
<script>
    let isName=false;
    let isDes=false;
    let isSdes=false;
    let isCover=false;
    let isSport=false;
    let isCard=false;
    disbleBtn();

    function checkName() {
        isName =document.getElementById('name').value.trim().length ==0 ? false : true;
        disbleBtn();
    }
    function checkDes() {
        isDes =document.getElementById('desc').value.trim().length ==0 ? false : true;
        disbleBtn();
    }
    function checkSDesc() {
        isSdes =document.getElementById('sdesc').value.trim().length ==0 ? false : true;
        disbleBtn();
    }
    function checkCover() {
        isCover =document.getElementById('cover').files.length==0 ? false : true;
        disbleBtn();;
    }
    function checkCard() {
        isCard =document.getElementById('card').files.length==0 ? false : true;
        disbleBtn();
    }
    function checkSport() {
        isSport =document.getElementById('sport').files.length==0 ? false : true;
        disbleBtn();
    }
    function disbleBtn() {
        if (isName && isDes && isSdes && isCover && isCard && isSport){
            document.getElementById('btn').disabled = false;
        }else {
            document.getElementById('btn').disabled = true;
        }
    }


</script>
</html>
