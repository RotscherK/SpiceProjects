<?php

require_once("config/Autoloader.php");

use controller\ChargingController;
use controller\Pro;

//Execution of invoicing at the end of the month
$d = new DateTime();

//if($d->format( 'Y-m-t' ) == $d->format( 'Y-m-d' )){
    ChargingController::charging();
//}

//Daily check of expired programs
ProgramController::expirationNotification();

?>