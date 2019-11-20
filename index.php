<?php
include 'includes/top.php';

include 'includes/login.inc.php';

?>
<!DOCTYPE html>

<html>
<head>

    <style type="text/css">
.carousel-item {
    height: 100vh;
    min-height: 350px;
    background: no-repeat center center scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    }
    </style>

    <title>PVDI | Wij vormen Nederland</title>
</head>

<body>
    <!-- Navigatie -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">PVDI | Wij vormen Nederland</a>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a></li>                            <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="no-icon">Over de partij</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="politiekjuridisch.php">Politiek juridisch</a>
                            <a class="dropdown-item" href="sociaaleconomisch.php">Sociaaleconomisch</a>
                            <a class="dropdown-item" href="sociaaldemocratisch.php">Sociaaldemocratisch</a>
                        </div>
                    </li>

                    <?php if(isset($_SESSION['user_id']) && !isset($_SESSION['is_admin'])){
                            echo "<li class='nav-item'>
                              <a class='nav-link' href='logout.php'>Uitloggen</a>
                            </li>";
                          }else if (isset($_SESSION['is_admin'])){
                            echo "<li class='nav-item'>
                              <a class='nav-link' href='dashboard.php'>Dashboard</a>
                            </li>";
                            echo "<li class='nav-item'>
                              <a class='nav-link' href='logout.php'>Uitloggen</a>
                            </li>";
                          }
                            else {
                                        echo "        <li class='nav-item'>
                              <a class='nav-link' href='register.php'>Aanmelden</a>
                            </li>";
                            }
                            ?>
                </ul>
            </div>
        </div>
    </nav>

    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->

                <div class="carousel-item active" style="background-image: url('https://www.behindthedoors.nl/wp-content/uploads/2019/03/multiculti.jpeg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4">PVDI</h2>

                        <p class="lead">Wij vormen Nederland!</p>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- Page Content -->

    <section class="py-5">
        <div class="container">
            <h1 class="display-4">Full Page Image Slider</h1>

            <p class="lead">The background images for the slider are set directly in the HTML using inline CSS. The images in this snippet are from <a href="https://unsplash.com">Unsplash</a>, taken by <a href="https://unsplash.com/@joannakosinska">Joanna Kosinska</a>!</p>
        </div>
    </section>
      <footer id="sticky-footer" class="py-4 bg-light text-white-50">
    <div class="container text-center">
      <small>Copyright &copy; PVDI</small>
  </footer>
</body>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
</html>
