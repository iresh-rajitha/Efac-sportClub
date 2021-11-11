<?php
include 'includes/connection.php';

$sql = "SELECT * FROM Sports";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/Council%20Logo.png">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css"/>
    <link rel="stylesheet" href="assets/css/fontawesome.css"/>
    <link rel="stylesheet" href="assets/css/solid.css"/>
    <link rel="stylesheet" href="assets/css/brands.css"/>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<div class="topnav">
    <div class="top-container">
        <button onclick="collapse()">
            <i class="fas fa-align-left"></i>
        </button>
        <img class="col-4 " src="images/Council%20Logo.png">
        <ul class="col-8 top-menu">

            <li><a class="active" href="index.html">Home</a></li>
            <li><a  href="Sport.php">Sport</a></li>
            <li><a  href="Event.php">Event</a></li>
            <li class="sublist"><a href="#">Colours <i class="fas fa-chevron-down"></i></a>
                <ul class="active-sub">
                    <li><a href="Colours-Uni.html">University</a></li>
                    <li><a href="Colour-SLUSA.html">SLUSA</a></li>
                    <li><a href="ColursSpecial.html">Special Award</a></li>
                </ul>
            </li>
            <li class="sublist"><a href="#"> Achievements <i class="fas fa-chevron-down"></i></a>
                <ul class="active-sub">
                    <li><a href="FacultyMeet.html">Faculty Meet</a></li>
                    <li><a href="UniMeet.html">University Meet</a></li>
                </ul>
            </li>
            <li><a href="About.html">About</a></li>
            <li><a href="Contact.html">Contact</a></li>
        </ul>
    </div>
</div>


<div class="page-header" data-parallax="scroll" >
    <div class="parallax round-bottom" style="background-image: url('images/baylee-gramling-x1XJKF-xH1I-unsplash.jpg')">
        <div class="page-header-container">
            <h1 class="sblue-text title-1 no-margin">Sports</h1>
            <h1 class="title-2 no-margin"></h1>
        </div>
    </div>
</div>

<!--<div class="parallelogram">-->
<!--</div>-->
<div class="container">
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id=  $row['sportID'];
                $name=  $row['s_name'];
                $short=  $row['s_description'];
                $card= 'upload/sport/card/'.$row['cover_photo'];

                echo ' <div class="col-s-8 col-3">
            <div class="body-content">
                <div class="property-card">
                    <a href="sport-page.php?id='.$id.'">
                        <div class="property-image"  style="background-image: url(\' '.$card.' \')">
                            <div class="property-image-title">
                                <!-- Optional <h5>Card Title</h5> If you want it, turn on the CSS also. -->
                            </div>
                        </div></a>
                    <div class="property-description">
                        <h5> '.$name.' </h5>
                        <p>'.$short.'</p>
                    </div>
                </div>
            </div>
        </div>';
            }
        }else{
            trigger_error('Invalid query: ' . $conn->error);
        }



        ?>


    </div>
</div>



    <div class="footer">
        <div class="row">
            <div class="col-4 col-s-12">
                <h4>EFac-Sport Club</h4>
                <img src="images/Council%20Logo.png">
                <p>
                <span>
                The Sports Club of the Faculty of Engineering,  University of Ruhuna is one of the prominent and active  clubs in the  faculty. Join hands with us to explore the prowess of our fellow sportsmen.
                </span>
                </p>
            </div>
            <div class="col-4 col-s-12">
                <h4>Follow Us On Facebook</h4>
                <div class="footer_box_body">
                    <iframe src=" https://www.facebook.com/v9.0/plugins/page.php?adapt_container_width=true&app_id=113869198637480&channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df1c6e763f154ac%26domain%3Ddevelopers.facebook.com%26origin%3Dhttps%253A%252F%252Fdevelopers.facebook.com%252Ff2c3547c3f8a14c%26relation%3Dparent.parent&container_width=734&hide_cover=false&href=https%3A%2F%2Fwww.facebook.com%2FEFacSportsRununa&locale=en_US&sdk=joey&show_facepile=true&small_header=false&tabs=timeline"
                            width="340" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
                <div>
                    <ul class="footer-social">
                        <li><a href="#"><i class="fab fa-facebook"></i> </a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i> </a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i> </a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i> </a></li>
                        <li><a href="#"><i class="fab fa-pinterest"></i> </a></li>
                        <li><a href="#"><i class="fab fa-facebook-messenger"></i> </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-4 col-s-12">
                <h4>Contact us</h4>
                <div class="footer_box_body">
                    <div class="footer_header">
                        <i class="fas fa-mobile-alt"></i>&nbsp Sudheera  &nbsp- 071 241 5963 <br>
                        <i class="fas fa-mobile-alt"></i>&nbsp Sithira &nbsp&nbsp&nbsp&nbsp- 077 608 1013 <br>
                        <i class="fas fa-mobile-alt"></i>&nbsp Ashen  &nbsp&nbsp&nbsp&nbsp&nbsp - 071 308 0854 <br>
                    </div>
                    <h5 class="footer_title">
                        Email:
                    </h5>
                    <form action="mailto:sportsclub.foe.uor@gmail.com" method="post" enctype="text/plain">
                        <div class="newsletter_form">
                            <div class="row">
                                <input type="email" class="form-control" placeholder="E-Mail here">
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-rounded btn-block btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-bottom">&copy; Copyright <script>document.write(new Date().getFullYear());</script> EFac-Sport Club</div>
    </div>
</body>
<script type="text/javascript" src="assets/js/main.js"></script>
<script rel="script" src="assets/js/jquery-3.4.1.min.js"></script>
</html>