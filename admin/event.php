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
    <title>Event</title>
</head>
<body>
<form id="sport_form" method="post" action="../includes/add-Event.php" enctype="multipart/form-data">
    <div class="row">
        <label class="col-2">Event Name</label>
        <input class="col-6" type="text" name="name" onkeyup="nameE()" placeholder="Name" id="name">
    </div>
    <div class="row">
        <label class="col-2">Short Description</label>
        <textarea class="col-8" name="s_description" onkeyup="short_d()" placeholder="Short Description" id="short"> </textarea>
    </div>
    <div class="row">
        <label class="col-2"> Full Description</label>
        <textarea class="col-8" name="description" onkeyup="descrip()" placeholder="Description" id="des"> </textarea>
    </div>
    <div class="row">
        <label class="col-2">Card</label>
        <input class="col-8" type="file" name="card" onchange="card_photo()" placeholder="card photo" id="card">
    </div>
    <div class="row">
        <label class="col-2">Cover Photo</label>
        <input class="col-8" type="file" name="cover" onchange="cover_photo()" placeholder="cover photo" id="cover">
    </div>

    <div class="row">
        <label class="col-2">Live</label>
        <div class="col-8">
            <input type="radio" id="yes" name="live" value="true" onclick="isLive(true)" checked>
              <label for="html">Yes</label><br>
            <input type="radio" id="no" name="live" value="false" onclick="isLive(false)">
              <label for="html">No</label><br>
        </div>
    </div>
    <div class="row" id="event_photo">
        <label class="col-2">Sport Photo</label>
        <input class="col-8" type="file" name="event" placeholder="Sport photo">
    </div>
    <div class="row" id="iframe">
        <label class="col-2">Embedded Iframe</label>
        <input class="col-6" type="text" name="iframe" placeholder="Iframe">
    </div>
    <div class="row">
        <input type="submit" name="submit" placeholder="Submit" id="btn">
    </div>
</form>
</body>
<script>
    let name = false;
    let shortD= false;
    let desc= false;
    let card_p= false;
    let cover_p= false;
    disableBtn();

    isLive(true);
    function isLive(arg) {
        // console.log(arg);
        if (arg){
            document.getElementById('iframe').style.display='block';
            document.getElementById('event_photo').style.display='none';
        }else {
            document.getElementById('iframe').style.display='none';
            document.getElementById('event_photo').style.display='block';
        }

    }
    function nameE() {
        name =document.getElementById('name').value.trim().length ==0 ? false : true;
        disableBtn();
    }
    function short_d() {
        // console.log('test');
        shortD =document.getElementById('short').value.trim().length ==0 ? false : true;
        disableBtn();
    }
    function descrip() {
        // console.log('test');
        desc =document.getElementById('des').value.trim().length ==0 ? false : true;
        disableBtn();
    }
    function card_photo() {
        card_p = document.getElementById('card').files.length==0 ? false : true;
        disableBtn();
    }
    function cover_photo() {
        cover_p = document.getElementById('cover').files.length==0 ? false : true;
        disableBtn();
    }
    function disableBtn() {
        if (name && shortD && desc && card_p && cover_p){
            document.getElementById('btn').disabled = false;
        }else{
            document.getElementById('btn').disabled = true;
        }

    }
</script>
</html>
