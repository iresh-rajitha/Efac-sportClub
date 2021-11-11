<?php

include "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = $sql = "DELETE FROM sports WHERE sportID=$id";

    if ($conn->query($sql) === TRUE) {
        echo 'success<br>';
        echo '<a href="../admin/home.php">back to admin page</a> ';
    } else {
        echo 'error';
    }

}