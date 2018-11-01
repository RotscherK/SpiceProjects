<?php

use controller\ChargingController;

$d = new DateTime();
echo $d->format( 'Y-m-t' );
echo $d->format( 'Y-m-d' );

//if($d->format( 'Y-m-t' ) == $d->format( 'Y-m-d' )){
    ChargingController::charging();
//}

?>