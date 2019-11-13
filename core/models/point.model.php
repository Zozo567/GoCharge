<?php

class Point extends Main {

    function __construct(){

        // self::$html_path = HTML_PATH .'/main.html';

        $test;
    }

    public function read(){

        $this->readFormate();
    }

    private function readFormate(){

        $this->list_point();
        
    }

    private function list_point(){

        $db = $this->getDB();

        $points = $db->getAll("SELECT * FROM ?n", 'point');
        
        return $points;
    }
}