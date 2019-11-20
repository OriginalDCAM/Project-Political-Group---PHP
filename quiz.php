<?php
include 'includes/top.php';

include 'includes/login.inc.php';

$stmt = $pdo->prepare("SELECT * FROM stellingen LIMIT 5;");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(!isset($_SESSION['user_id'])){
    header('Location: ../index.php');
    exit;
} ?>
<div class="card-body table-full-width table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Stelling</th>

            </tr>
        </thead>

        <tbody>
<?php foreach ( $result as $key => $value){
        echo "<tr>";
         echo "<td>" . $result[$key]['vraag'] . "</td>";
        echo "<td><ul>
        <li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle text-success' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
        <span class='no-icon text-success'>Stem</span>
        </a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
        <a class='dropdown-item' type='submit' name='opties' href='includes/scores.inc.php?sleutel=".$result[$key]['stelling_id'].
        "&anwser=eens'>Eens</a>
        <a class='dropdown-item' type='submit' name='opties' href='includes/scores.inc.php?sleutel=".$result[$key]['stelling_id'].
        "&anwser=oneens'>Oneens</a>
        </li></ul><td>";
      }?>
    </tbody>
</table>
</div>
</div>
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
