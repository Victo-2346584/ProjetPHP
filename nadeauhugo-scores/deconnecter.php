<?php
require "./include/configuration.inc";
if (isset($_SESSION['active'])) {
    unset($_SESSION['active']);   // détruit la variable de session
    unset($_SESSION['bienvenue']);
}


session_destroy();
header("location: index.php");
 