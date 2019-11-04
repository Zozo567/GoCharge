<?php

require_once 'core/settings.php';

try {
    $Project = new GoCharge();
} catch( Exception $e ){
    print $e->getMessage();
}