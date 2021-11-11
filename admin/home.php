<?php
session_start();
if (!isset($_SESSION['user'])){
    header("location: login.php");
}

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
</head>
<body>
<div class="container">
    <a href="logout.php" class="btn">Logout</a>
    <a href="event.php" class="btn">Add Event</a>
    <table>
        <thead>
        <tr>
            <th>Topic</th>
            <th>Short description</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $sql = "SELECT * FROM post";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id = $row['postID'];
                if (isset($row['live'])) {
                    $live = $row['live'];
                }
                $topic = $row['topic'];
                $date = $row['date'];
                $s_description = $row['s_description'];
                $card = 'upload/post/card/' . $row['card_photo'];

                echo "
        <tr>
            <td data-column=\"First Name\">".$topic."</td>
            <td data-column=\"Twitter\">".$s_description."</td>
            <td data-column=\"Twitter\">".$date."</td>
            <td data-column=\"Twitter\">
            <a href='../includes/delete-event.php?id=".$id."'  class='btn'>Delete</a>
            <a href='update-event.php?id=".$id."' class='btn'>Update</a>
            </td>
        </tr>";
            }
        }
        ?>
        </tbody>
    </table>
    <br>
    <br>
    <div>
        <!--    <label>Add Sport</label>-->
        <a href="sport.php" class="btn">Add Sport</a>
    </div>
    <table>
        <thead>
        <tr>
            <th>Topic</th>
            <th>Short description</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $sql = "SELECT * FROM Sports";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id=  $row['sportID'];
                $name=  $row['s_name'];
                $short=  $row['s_description'];

                echo "
        <tr>
            <td data-column=\"First Name\">".$name."</td>
            <td data-column=\"Twitter\" style='max-width: 200px'>".$short."</td>
            <td data-column=\"Twitter\">
            <a href='../includes/delete-sport.php?id=".$id."'  class='btn'>Delete</a>
            <a href='update-sport.php?id=".$id."' class='btn'>Update</a>
            </td>
        </tr>";
            }
        }
        ?>
        </tbody>
    </table>
</div>

</body>
<script>

</script>
</html>
?>