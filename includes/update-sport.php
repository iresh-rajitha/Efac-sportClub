<?php
include 'connection.php';

if(isset($_POST['submit'])){
//    print_r($_POST);

    $id =$_POST['id'];
    $name ='';
    $des = $_POST['description'];
    $sdes = $_POST['s_description'];


    $sql = "SELECT * FROM Sports where sportID=".$id;
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()) {
            $name =$row['s_name'];
            $cover_name=$row['cover_photo'];
            $sport_name=$row['s_photo'];
            $card_name=$row['s_card_photo'];
        }
    } else {
        echo "0 results";
    }
//    $card= $_FILES['card'];
//    print_r($_FILES['card']);

//    $cover_name='';
//    $card_name='';
//    $sport_name='';

//    if(!($_FILES['card']['error'] && $_FILES['event']['error'] && $_FILES['cover']['error'])){

    if (!$_FILES['card']['error']){
        $card_ext= explode(".",$_FILES['card']['name'])[1];;
        $card_temp= $_FILES['card']['tmp_name'];
        $card_name=$name.".".$card_ext;
        $card_upload= '../upload/sport/card/'.$card_name ;
        if(move_uploaded_file($card_temp,$card_upload)){
            echo 'card pic updated <br>';
        }
    }
    if (!$_FILES['sport']['error']){
        $sport_ext= explode(".",$_FILES['sport']['name'])[1];
        $sport_temp= $_FILES['sport']['tmp_name'];
        $sport_name=$name.".".$sport_ext;
        $sport_upload='../upload/sport/sport/'.$sport_name ;
        if(move_uploaded_file($sport_temp,$sport_upload)){
            echo 'sport pic updated <br>';
        }
    }
    if (!$_FILES['cover']['error']){
        $cover_ext= explode(".",$_FILES['cover']['name'])[1];
        $cover_temp= $_FILES['cover']['tmp_name'];
        $cover_name=$name.".".$cover_ext;
        $cover_upload='../upload/sport/cover/'.$cover_name ;
        if (move_uploaded_file($cover_temp,$cover_upload)){
            echo 'cover pic updated <br>';
        }
    }

    ////= "UPDATE stock SET volume='$broughtVolume',margin='$profitMargin' WHERE id=$id";
    $sql = "UPDATE sports SET description='$des',s_description='$sdes',cover_photo='$cover_name' ,s_card_photo='$card_name',s_photo='$sport_name' WHERE sportID='$id'";

    if(mysqli_query($conn, $sql)){
        echo 'updated succesfully <br>';
        echo '<a href="../admin/home.php">back to admin page</a> ';
//        header("location:../View_Stock.php?success=1");
    }else{
//        header("location:../add-stock.php?error=1");
//        die('error'.mysqli_error());
        die('Error: ' . mysqli_error($conn));
    }
}