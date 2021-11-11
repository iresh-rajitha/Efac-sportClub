<?php
session_start();
if (!isset($_SESSION['user'])){
    header("location: login.php");
}
include '../includes/connection.php';

$id= $_REQUEST['id'];
$sql = "SELECT * FROM post where postID=".$id;
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
    while($row = $result->fetch_assoc()) {
        $id= $row['postID'];
        $live= $row['live'];
        $topic= $row['topic'];
        $s_description=$row['s_description'];
        $description=$row['description'];
    }
} else {
    echo "0 results";
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
<form id="sport_form" method="post" action="../includes/update-event.php" enctype="multipart/form-data">
    <div class="row">
        <input type="hidden" name="id"  value="<?php echo $id?>" >
    </div>
    <div class="row">
        <label class="col-2">Event Name</label>
        <input class="col-6" type="text" name="name" style="color: white" placeholder="Name" value="<?php echo $topic?>" disabled>
    </div>
    <div class="row">
        <label class="col-2">Short Description</label>
        <textarea class="col-8" name="s_description" placeholder="Short Description"> <?php echo $s_description?></textarea>
    </div>
    <div class="row">
        <label class="col-2"> Full Description</label>
        <textarea class="col-8" name="description" placeholder="Description"> <?php echo $description?></textarea>
    </div>
    <div class="row">
        <label class="col-2">Live</label>
        <div class="col-8">
            <input type="radio" id="yes" name="live" value="true"  >
              <label for="html">Yes</label><br>
            <input type="radio" id="no" name="live" value="false" checked>
              <label for="html">No</label><br>
        </div>
    </div>
    <div class="row">
        <input type="submit" name="submit" placeholder="Submit">
    </div>
</form>
</body>
<script>
    // isLive(true);
    // function isLive(arg) {
    //     // console.log(arg);
    //     if (arg){
    //         document.getElementById('iframe').style.display='block';
    //         document.getElementById('event_photo').style.display='none';
    //     }else {
    //         document.getElementById('iframe').style.display='none';
    //         document.getElementById('event_photo').style.display='block';
    //     }
    //
    // }
</script>
</html>
