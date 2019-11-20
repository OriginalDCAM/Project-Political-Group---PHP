<?php
require_once 'includes/config.php';

include "includes/top.php";

session_start();

if(!isset($_SESSION['is_admin'])){
    header('Location: logout.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM users LIMIT 200;");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>PVDI | Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <link href="includes/master.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="green" data-image="assets/img/sidebar-5.jpg">

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="javascript:;" class="simple-text">
                      PVDI
                    </a>
                </div>
                <ul class="nav">
                                        <li>
                        <a class="nav-link" href="dashboard.php">
                            <i class="fa fa-align-justify"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="dashboard-users.php">
                            <i class="nc-icon nc-icon nc-paper-2"></i>
                            <p>Gebruikers</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="dashboard-contact.php">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Contact</p>
                        </a>
                    </li>

                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <!-- Navbar -->

            <nav class="navbar navbar-expand-lg" color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">Gebruikers</a> <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation"></button>

                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item"><a href="#" class="nav-link" data-toggle="dropdown"><span class="d-lg-none">Dashboard</span></a></li>
                            <li class="nav-item"><a href="#" class="nav-link"><span class="d-lg-block">&nbsp;Search</span></a></li>
                        </ul>

                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="logout.php"><span class="no-icon">Uitloggen</span></a></li>
                        </ul>
                    </div>
                </div>
            </nav><!-- End Navbar -->

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header">
                                    <h4 class="card-title">Gebruikers</h4>

                                    <p class="card-category">Alle gebruikers in de database</p>
                                </div>

                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>

                                                <th>Gebruikersnaam</th>

                                                <th>E-mailadres</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ( $result as $key => $value){ ?>
                                                    <tr>
                                                     <td><?php echo $value['id'] ?></td>
                                                     <td><?php echo $value['user_username'] ?></td>
                                                     <td><?php echo $value['user_mail'] ?></td>
                                                    <?php if($value['is_blocked'] === "0" && $value['is_admin'] === "1"){
                                                    echo "<td><ul>
                                                    <li class='nav-item dropdown'>
                                                    <a class='nav-link dropdown-toggle text-success' href='http://example.com' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    <span class='no-icon text-success'>Acties</span>
                                                    </a>
                                                    <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                                                    <a class='dropdown-item' type='submit' name='opties' href='includes/dashboard-users.inc.php?sleutel=".$result[$key]['id'].
                                                    "&manier=is_gast'>Gast maken</a>
                                                    <a class='dropdown-item' type='submit' name='opties' href='includes/dashboard-users.inc.php?sleutel=".$result[$key]['id'].
                                                    "&manier=is_blocked'>Blokeren</a>
                                                    <a class='dropdown-item' type='submit' name='opties' href='includes/dashboard-users.inc.php?sleutel=".$result[$key]['id'].
                                                    "&manier=verwijderen'>Verwijderen</a>
                                                  </li></ul></td>";

                                                     }else if($value['is_blocked'] === "1" && $value['is_admin'] === "0"){
                                                    echo "<td><ul>
                                                    <li class='nav-item dropdown'>
                                                    <a class='nav-link dropdown-toggle text-success' href='http://example.com' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    <span class='no-icon text-success'>Acties</span>
                                                    </a>
                                                    <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                                                    <a class='dropdown-item' type='submit' name='opties' href='includes/dashboard-users.inc.php?sleutel=".$result[$key]['id'].
                                                    "&manier=is_admin'>Beheerder maken</a>
                                                    <a class='dropdown-item' type='submit' name='opties' href='includes/dashboard-users.inc.php?sleutel=".$result[$key]['id'].
                                                    "&manier=is_unblocked'>Deblokeren</a>
                                                    <a class='dropdown-item' type='submit' name='opties' href='includes/dashboard-users.inc.php?sleutel=".$result[$key]['id'].
                                                    "&manier=verwijderen'>Verwijderen</a>
                                                  </li></ul></td>";

                                                    }else if($value['is_blocked'] === "1" && $value['is_admin'] === "1"){
                                                    echo "<td><ul>
                                                    <li class='nav-item dropdown'>
                                                    <a class='nav-link dropdown-toggle text-success' href='http://example.com' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    <span class='no-icon text-success'>Acties</span>
                                                    </a>
                                                    <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                                                    <a class='dropdown-item' type='submit' name='opties' href='includes/dashboard-users.inc.php?sleutel=".$result[$key]['id'].
                                                    "&manier=is_gast'>Gast maken</a>
                                                    <a class='dropdown-item' type='submit' name='opties' href='includes/dashboard-users.inc.php?sleutel=".$result[$key]['id'].
                                                    "&manier=is_unblocked'>Deblokeren</a>
                                                    <a class='dropdown-item' type='submit' name='opties' href='includes/dashboard-users.inc.php?sleutel=".$result[$key]['id'].
                                                    "&manier=verwijderen'>Verwijderen</a>
                                                  </li></ul></td>";

                                                    }else if($value['is_blocked'] === "0" && $value['is_admin'] === "0"){
                                                    echo "<td><ul>
                                                    <li class='nav-item dropdown'>
                                                    <a class='nav-link dropdown-toggle text-success' href='http://example.com' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    <span class='no-icon text-success'>Acties</span>
                                                    </a>
                                                    <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                                                    <a class='dropdown-item' type='submit' name='opties' href='includes/dashboard-users.inc.php?sleutel=".$result[$key]['id'].
                                                    "&manier=is_admin'>Beheerder maken</a>
                                                    <a class='dropdown-item' type='submit' name='opties' href='includes/dashboard-users.inc.php?sleutel=".$result[$key]['id'].
                                                    "&manier=is_blocked'>Blokeren</a>
                                                    <a class='dropdown-item' type='submit' name='opties' href='includes/dashboard-users.inc.php?sleutel=".$result[$key]['id'].
                                                    "&manier=verwijderen'>Verwijderen</a>
                                                  </li></ul></td>";

                                                    }
                                                } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li><a href="index.php">Home</a></li>

                            <li><a href="overons.php">Partij</a></li>
                        </ul>

                        <p class="copyright text-center">©
                        <script type="text/javascript">
                            document.write(new Date().getFullYear());
                        </script>
                        <a href="index.php">PVDI</a></p>
                    </nav>
                </div>
            </footer>
        </div>
    </div><!--   -->
    <!-- <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>

        <ul class="dropdown-menu">
                        <li class="header-title"> Sidebar Style</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Background Image</p>
                    <label class="switch">
                        <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <p>Filters</p>
                    <div class="pull-right">
                        <span class="badge filter badge-black" data-color="black"></span>
                        <span class="badge filter badge-azure" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-purple active" data-color="purple"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Sidebar Images</li>

            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-1.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-3.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="..//assets/img/sidebar-4.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-5.jpg" alt="" />
                </a>
            </li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard" target="_blank" class="btn btn-info btn-block btn-fill">Download, it's free!</a>
                </div>
            </li>

            <li class="header-title pro-title text-center">Want more components?</li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard-pro" target="_blank" class="btn btn-warning btn-block btn-fill">Get The PRO Version!</a>
                </div>
            </li>

            <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>

            <li class="button-container">
                                <button id="twitter" class="btn btn-social btn-outline btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> · 256</button>
                <button id="facebook" class="btn btn-social btn-outline btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> · 426</button>
            </li>
        </ul>
    </div>
</div>
 -->
    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript">
</script><script src="assets/js/core/popper.min.js" type="text/javascript">
</script><script src="assets/js/core/bootstrap.min.js" type="text/javascript">
</script><!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="assets/js/plugins/bootstrap-switch.js" type="text/javascript">
</script><!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE">
</script><!--  Chartist Plugin  -->
    <script src="assets/js/plugins/chartist.min.js" type="text/javascript">
</script><!--  Notifications Plugin    -->
    <script src="assets/js/plugins/bootstrap-notify.js" type="text/javascript">
</script><!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=2.0.0" type="text/javascript">
</script><!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js" type="text/javascript">
</script>
</body>
</html>
