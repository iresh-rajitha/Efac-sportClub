<?php
include 'connection.php';

if(isset($_POST['submit'])){
    $name =$_POST['name'];
    $des = $conn->real_escape_string($_POST['description']);
    $sdes =  $conn->real_escape_string($_POST['s_description']);
    if ($_POST['live']){
        $live=1;
    }else{
        $live=0;
    }
    $iframe = '';
    if (isset($_POST['iframe'])){
        $iframe=$conn->real_escape_string($_POST['iframe']);
    }

    echo $live;

//    $card= $_FILES['card'];
//    print_r($_FILES['card']);

    $cover_name='';
    $card_name='';
    $event_name='';

    if(!($_FILES['card']['error'] && $_FILES['cover']['error'])){

        $card_ext= explode(".",$_FILES['card']['name'])[1];;
        $card_temp= $_FILES['card']['tmp_name'];
        $card_name=$name.".".$card_ext;
        $card_upload= '../upload/post/card/'.$card_name ;



        $cover_ext= explode(".",$_FILES['cover']['name'])[1];
        $cover_temp= $_FILES['cover']['tmp_name'];
        $cover_name=$name.".".$cover_ext;
        $cover_upload='../upload/post/cover/'.$cover_name;

//        print_r($_FILES['event']);
        if ($_FILES['event']['error']==0){
            $event_ext= explode(".",$_FILES['event']['name'])[1];
            $event_temp= $_FILES['event']['tmp_name'];
            $event_name=$name.".".$event_ext;
            $event_upload='../upload/post/event/'.$event_name;
             move_uploaded_file($event_temp,$event_upload);
        }
         move_uploaded_file($card_temp,$card_upload);
         move_uploaded_file($cover_temp,$cover_upload);
    }
    $date= date("Y-m-d");




    $sql = "INSERT INTO post (topic,live,iframe,description,s_description,cover_photo,card_photo,post_photo,date) VALUES('$name','$live','$iframe','$des','$sdes','$cover_name','$card_name','$event_name','$date')";

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
?>