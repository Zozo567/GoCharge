<?php

class Point extends Main
{

    protected static $model_name = null;
    protected static $method_name = null;

    private static $class_name = null;

    protected static $db = null;

    protected static $params = [];

    protected static $html_path = null;

    function __construct(){

        // self::$html_path = HTML_PATH .'/main.html';

        $model_name = 'point';

        self::$model_name = $model_name;
    }

    public function read(){

        return $this->readFormate();
    }

    private function readFormate(){

        $db = $this->getDB();

        $points = $db->getAll("SELECT * FROM ?n", 'point');

        $i = 0;

        foreach( $points as $point ){

            $usb_a = 0;
            $micro_usb = 0;
            $usb_a = 0;
            $usb_type_c = 0;
            $disposable_charger = 0;

            $point_meta = $this->getMeta( self::$model_name, $point['ID'], false );

            if( $point_meta ){
                
                foreach( $point_meta as $item ){

                    if( $item['name'] == 'powerbank'){

                        $powerbank = $db->getOne("SELECT `wire` FROM ?n WHERE `ID` = ?i", 'powerbank', $item['value']);

                        $$powerbank++;
                    }
                }
            }

            $points[$i]['powerbanks'] = [
                'usb_a' => $usb_a,
                'micro_usb' => $micro_usb,
                'usb_type_c' => $usb_type_c,
                'disposable_charger' => $disposable_charger
            ];

            $i++;
        }

        return ['status' => true, 'content' => $points];
    }

    public function getFilter(){

        return $this->readFormate();
    }
}