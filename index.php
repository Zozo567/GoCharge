<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

require_once 'core/settings.php';

try {
    $Project = new GoCharge();
} catch( Exception $e ){
    print $e->getMessage();
}

// new GoCharge( BOOT_FULL );