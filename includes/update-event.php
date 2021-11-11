<?php
include 'connection.php';

if(isset($_POST['submit'])){
//    print_r($_POST);
    $id =$_POST['id'];
    $des = $conn->real_escape_string($_POST['description']);
    $sdes =  $conn->real_escape_string($_POST['s_description']);
    if ($_POST['live']){
        $live=1;
    }else{
        $live=0;
    }

    //= "UPDATE stock SET volume='$broughtVolume',margin='$profitMargin' WHERE id=$id";
    $sql = "UPDATE post SET live='$live',description='$des',s_description='$sdes' where postID='$id'";

    if(mysqli_query($conn, $sql)){
        echo 'update succesfully <br>';
        echo '<a href="../admin/home.php">back to admin page</a> ';
//        header("location:../View_Stock.php?success=1");
    }else{
//        header("location:../add-stock.php?error=1");
//        die('error'.mysqli_error());
        die('Error: ' . mysqli_error($conn));
    }
}
?>