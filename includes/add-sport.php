<?php
include 'connection.php';

if(isset($_POST['submit'])){
    $name =$_POST['name'];
    $des = $_POST['description'];
    $sdes = $_POST['s_description'];

//    $card= $_FILES['card'];
//    print_r($_FILES['card']);

    $cover_name='';
    $card_name='';
    $sport_name='';

    if(!($_FILES['card']['error'] && $_FILES['sport']['error'] && $_FILES['cover']['error'])){
//        print_r($_FILES);

        $card_ext= explode(".",$_FILES['card']['name'])[1];;
        $card_temp= $_FILES['card']['tmp_name'];
        $card_name=$name.".".$card_ext;
        $card_upload= '../upload/sport/card/'.$card_name ;

        $sport_ext= explode(".",$_FILES['sport']['name'])[1];
        $sport_temp= $_FILES['sport']['tmp_name'];
        $sport_name=$name.".".$sport_ext;
        $sport_upload='../upload/sport/sport/'.$sport_name ;

        $cover_ext= explode(".",$_FILES['cover']['name'])[1];
        $cover_temp= $_FILES['cover']['tmp_name'];
        $cover_name=$name.".".$cover_ext;
        $cover_upload='../upload/sport/cover/'.$cover_name ;

           echo move_uploaded_file($card_temp,$card_upload);
           echo move_uploaded_file($sport_temp,$sport_upload);
           echo move_uploaded_file($cover_temp,$cover_upload);
    }




    $sql = "INSERT INTO sports (s_name,description,s_description,cover_photo,s_card_photo,s_photo) VALUES('$name','$des','$sdes','$cover_name','$card_name','$sport_name')";

    if(mysqli_query($conn, $sql)){
        echo 'added succesfully <br>';
        echo '<a href="../admin/home.php">back to admin page</a> ';
//        header("location:../View_Stock.php?success=1");
    }else{
//        header("location:../add-stock.php?error=1");
//        die('error'.mysqli_error());
        die('Error: ' . mysqli_error($conn));
    }
}