<?php

class Point extends Main {

    // function __construct(){

    //     self::$html_path = HTML_PATH .'/main.html';
    // }

    public function read(){

        $this->readFormate();
    }

    private function readFormate(){

        $this->list_point();
        
    }

    private function list_point(){

        $db = $this->getDB();

        // alekseychernavskiy: 
        // TODO
        // points? Check DB and Model
        $points = $db->getAll("SELECT * FROM ?n", 'points');
        
        return $points;
    }
}