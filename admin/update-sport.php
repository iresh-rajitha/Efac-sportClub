<?php
session_start();
if (!isset($_SESSION['user'])){
    header("location: login.php");
}
include '../includes/connection.php';
$id=1;
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
}

$sql = "SELECT * FROM Sports where sportID=".$id;
//$result = $conn->query($sql);
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
    while($row = $result->fetch_assoc()) {
        $name=$row['s_name'];
        $description=$row['description'];
        $s_description=$row['s_description'];
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
    <title>Sport</title>
</head>
<body>
<form id="sport_form" method="post" action="../includes/update-sport.php" enctype="multipart/form-data">
    <div class="row">
        <input  type="hidden" name="id" value="<?php echo $id?>">
    </div>
    <div class="row">
        <label class="col-2">Name</label>
        <input class="col-6" style="color: white" type="text" name="name" placeholder="Name" value="<?php echo $name?>" disabled>
    </div>
    <div class="row">
        <label class="col-2">Short Description</label>
        <textarea class="col-8" name="s_description" placeholder="Short Description"><?php echo $s_description?> </textarea>
    </div>
    <div class="row">
        <label class="col-2"> Full Description</label>
        <textarea class="col-8" name="description" placeholder="Description"> <?php echo $description?></textarea>
    </div>
    <div class="row">
        <label class="col-2">Card</label>
        <input class="col-8" type="file" name="card" placeholder="card photo">
    </div>
    <div class="row">
        <label class="col-2">Sport Photo</label>
        <input class="col-8" type="file" name="sport" placeholder="Sport photo">
    </div>
    <div class="row">
        <label class="col-2">Cover Photo</label>
        <input class="col-8" type="file" name="cover" placeholder="cover photo">
    </div>
    <div class="row">
        <input type="submit" name="submit" placeholder="Submit">
    </div>
</form>
</body>
</html>
