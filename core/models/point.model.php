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

        $db = $this->getDB();

        $post = $_POST;

        $filters_disp_powerbank = [];
        $filters_no_disp_powerbank = [];

        $filters_sale_wire = [];
        $filters_static_wire = [];

        $filters_tools = [];
        $filters_charges = [];

        $test = [];

        $static_wire_arr = [
            0 => 'usb_a',
            1 => 'micro_usb_b',
            2 => 'usb_type_c',
            3 => 'iphone_lightning',
        ];

        $sale_wire_arr = [
            0 => 'micro_usb_b',
            1 => 'usb_type_c',
            2 => 'iphone_lightning'
        ];

        $disp_pow_arr = [
            0 => 'micro_usb_b',
            1 => 'usb_type_c',
            2 => 'iphone_lightning'
        ];

        $no_disp_pow_arr = [
            0 => 'anker',
            1 => 'samsung',
        ];

        $tools_arr = [
            0 => 'walking_generator',
            1 => 'cycling_generator',
            2 => 'solar_charger'
        ];

        $charge_arr = [
            0 => 'samsung_charger',
            1 => '-iphone_charger',
            2 => 'solar_charger'
        ];

        foreach( $post as $key => $value ){

            if( $key == 'action' )
                continue;

            if( explode('-', $key)[0] == 'wirestatic' )
                $filters_static_wire[] = explode('-', $key)[1];

            if( explode('-', $key)[0] == 'wiresale' )
                $filters_sale_wire[] = explode('-', $key)[1];

            if( explode('-', $key)[0] == 'powdisp' )
                $filters_disp_powerbank[] = explode('-', $key)[1];

            if( explode('-', $key)[0] == 'pownodisp' )
                $filters_no_disp_powerbank[] = explode('-', $key)[1];

            if( explode('-', $key)[0] == 'tools' )
                $filters_tools[] = explode('-', $key)[1];

            if( explode('-', $key)[0] == 'charge' )
                $filters_charges[] = explode('-', $key)[1];
        }

        if( $filters_static_wire != [] ){

            $sql_static_wire = "SELECT  DISTINCT `pid` FROM ?n WHERE `type` = 1 AND 1=1";
        
            foreach( $filters_static_wire as $static_wire ){
                $sql_static_wire = $sql_static_wire . " OR `label` = " . "'". $static_wire . "'";
            }
    
            // $static_wire_ = $db->getAll( $sql_static_wire, 'wire');
            $test['static_wire'] = $db->getAll( $sql_static_wire, 'wire');
        }

        if( $filters_sale_wire != [] ){

            $sql_sale_wire = "SELECT  DISTINCT `pid` FROM ?n WHERE `type` = 2 AND 1=1";
        
            foreach( $filters_sale_wire as $sale_wire ){
                $sql_sale_wire = $sql_sale_wire . " OR `label` = " . "'". $sale_wire . "'";
            }

            $sale_wire_ = $db->getAll( $sql_sale_wire, 'wire');
            $test['sale_wire'] = $db->getAll( $sql_sale_wire, 'wire');
        }

        if( $filters_disp_powerbank != [] ){

            $sql_disp_powerbank = "SELECT  DISTINCT `pid` FROM ?n WHERE `type` = 1 AND 1=1";
        
            foreach( $filters_disp_powerbank as $disp_powerbank ){
                $sql_disp_powerbank = $sql_disp_powerbank . " OR `label` = " . "'". $disp_powerbank . "'";
            }
    
            // $disp_powerbank_ = $db->getAll( $sql_disp_powerbank, 'powerbank');
            $test['disp_powerbank'] = $db->getAll( $sql_disp_powerbank, 'powerbank');
        }

        if( $filters_no_disp_powerbank != [] ){

            $sql_no_disp_powerbank = "SELECT  DISTINCT `pid` FROM ?n WHERE `type` = 2 AND 1=1";

            foreach( $filters_no_disp_powerbank as $no_disp_powerbank ){
                $sql_no_disp_powerbank = $sql_no_disp_powerbank . " OR `label` = " . "'". $no_disp_powerbank . "'";
            }
    
            // $no_disp_powerbank_ = $db->getAll( $sql_no_disp_powerbank, 'powerbank');
            $test['no_disp_powerbank'] = $db->getAll( $sql_no_disp_powerbank, 'powerbank');
        }

        if( $filters_tools != [] ){

            $sql_tools = "SELECT  DISTINCT `pid` FROM ?n WHERE 1=1";

            foreach( $filters_tools as $tools ){
                $sql_tools = $sql_tools . " OR `label` = " . "'". $tools . "'";
            }
    
            // $tools_ = $db->getAll( $sql_tools, 'charge_tool');
            $test['tools'] = $db->getAll( $sql_tools, 'charge_tool');
        }

        if( $filters_charges != [] ){

            $sql_charges = "SELECT  DISTINCT `pid` FROM ?n WHERE 1=1";

            foreach( $filters_charges as $charges ){
                $sql_charges = $sql_charges . " OR `label` = " . "'". $charges . "'";
            }
    
            // $charges_ = $db->getAll( $sql_charges, 'charge');
            $test['charges'] = $db->getAll( $sql_charges, 'charge');
        }

        $filter_id_list = [];

        foreach( $test as $item ){

            if( is_array( $item ) ){
                foreach( $item as $check ){
                    if( !in_array($check, $filter_id_list) )
                        $filter_id_list[] = $check;
                }
            }else{
                if( !in_array($item, $filter_id_list) )
                    $filter_id_list[] = $item;
            }
        }

        $out_point_list=[];

        $static_wire_arr = [
            0 => 'usb_a',
            1 => 'micro_usb_b',
            2 => 'usb_type_c',
            3 => 'iphone_lightning',
        ];

        $sale_wire_arr = [
            0 => 'micro_usb_b',
            1 => 'usb_type_c',
            2 => 'iphone_lightning'
        ];

        $disp_pow_arr = [
            0 => 'micro_usb_b',
            1 => 'usb_type_c',
            2 => 'iphone_lightning'
        ];

        $no_disp_pow_arr = [
            0 => 'anker',
            1 => 'samsung',
        ];

        $tools_arr = [
            0 => 'walking_generator',
            1 => 'cycling_generator',
            2 => 'solar_charger'
        ];

        $charge_arr = [
            0 => 'samsung_charger',
            1 => '-iphone_charger',
            2 => 'solar_charger'
        ];


        foreach( $filter_id_list as $point_id ){

            $sql_one_point = "SELECT * FROM ?n WHERE `ID` = ?i";
            $sql_one_point_static_wire = "SELECT COUNT(ID) FROM ?n WHERE `pid` = ?i AND `type` = 1 AND `label` = ?s";
            $sql_one_point_sale_wire = "SELECT COUNT(ID) FROM ?n WHERE `pid` = ?i AND `type` = 2 AND `label` = ?s";
            $sql_one_point_disp_pow = "SELECT COUNT(ID) FROM ?n WHERE `pid` = ?i AND `type` = 1 AND `label` = ?s";
            $sql_one_point_no_disp_pow = "SELECT COUNT(ID) FROM ?n WHERE `pid` = ?i AND `type` = 2 AND `label` = ?s";
            $sql_one_point_tool = "SELECT COUNT(ID) FROM ?n WHERE `pid` = ?i AND `label` = ?s";
            $sql_one_point_charge = "SELECT COUNT(ID) FROM ?n WHERE `pid` = ?i AND `label` = ?s";

            $one_point = $db->getAll( $sql_one_point, 'point', $point_id );

            $out_point_list[$one_point['ID']] = $one_point;

            $out_point_list[$one_point['ID']]['wirestatic-usb_a'] = $db->getAll( $sql_one_point_static_wire, 'wire', $point_id, 'usb_a' );
            $out_point_list[$one_point['ID']]['wirestatic-micro_usb_b'] = $db->getAll( $sql_one_point_static_wire, 'wire', $point_id, 'micro_usb_b' );
            $out_point_list[$one_point['ID']]['wirestatic-usb_type_c'] = $db->getAll( $sql_one_point_static_wire, 'wire', $point_id, 'usb_type_c' );
            $out_point_list[$one_point['ID']]['wirestatic-iphone_lightning'] = $db->getAll( $sql_one_point_static_wire, 'wire', $point_id, '-iphone_lightning' );

            $out_point_list[$one_point['ID']]['wiresale-micro_usb_b'] = $db->getAll( $sql_one_point_sale_wire, 'wire', $point_id, 'micro_usb_b' );
            $out_point_list[$one_point['ID']]['wiresale-usb_type_c'] = $db->getAll( $sql_one_point_sale_wire, 'wire', $point_id, 'usb_type_c' );
            $out_point_list[$one_point['ID']]['wiresale-iphone_lightning'] = $db->getAll( $sql_one_point_sale_wire, 'wire', $point_id, '-iphone_lightning' );

            $out_point_list[$one_point['ID']]['powdisp-micro_usb_b'] = $db->getAll( $sql_one_point_disp_pow, 'wire', $point_id, 'micro_usb_b' );
            $out_point_list[$one_point['ID']]['powdisp-usb_type_c'] = $db->getAll( $sql_one_point_disp_pow, 'wire', $point_id, 'usb_type_c' );
            $out_point_list[$one_point['ID']]['powdisp-iphone_lightning'] = $db->getAll( $sql_one_point_disp_pow, 'wire', $point_id, '-iphone_lightning' );

            $out_point_list[$one_point['ID']]['pownodisp-anker'] = $db->getAll( $sql_one_point_no_disp_pow, 'wire', $point_id, 'anker' );
            $out_point_list[$one_point['ID']]['pownodisp-samsung'] = $db->getAll( $sql_one_point_no_disp_pow, 'wire', $point_id, 'samsung' );

            $out_point_list[$one_point['ID']]['tools-walking_generator'] = $db->getAll( $sql_one_point_tool, 'wire', $point_id, 'walking_generator' );
            $out_point_list[$one_point['ID']]['tools-cycling_generator'] = $db->getAll( $sql_one_point_tool, 'wire', $point_id, 'cycling_generator' );
            $out_point_list[$one_point['ID']]['tools-solar_charger'] = $db->getAll( $sql_one_point_tool, 'wire', $point_id, '-solar_charger' );

            $out_point_list[$one_point['ID']]['charge-samsung_charger'] = $db->getAll( $sql_one_point_charge, 'wire', $point_id, 'samsung_charger' );
            $out_point_list[$one_point['ID']]['charge-iphone_charger'] = $db->getAll( $sql_one_point_charge, 'wire', $point_id, 'iphone_charger' );
        
        }

        return ['status' => true, 'content' => $out_point_list];
    }
}

