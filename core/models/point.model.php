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
        $out_point_list = [];

        foreach( $points as $point ){

            // $sql_one_point = "SELECT * FROM ?n WHERE `ID` = ?i";
            $sql_one_point_static_wire = "SELECT COUNT(ID) FROM ?n WHERE `pid` = ?i AND `type` = 1 AND `label` = ?s";
            $sql_one_point_sale_wire = "SELECT COUNT(ID) FROM ?n WHERE `pid` = ?i AND `type` = 2 AND `label` = ?s";
            $sql_one_point_disp_pow = "SELECT COUNT(ID) FROM ?n WHERE `pid` = ?i AND `type` = 1 AND `label` = ?s";
            $sql_one_point_no_disp_pow = "SELECT COUNT(ID) FROM ?n WHERE `pid` = ?i AND `type` = 2 AND `label` = ?s";
            $sql_one_point_tool = "SELECT COUNT(ID) FROM ?n WHERE `pid` = ?i AND `label` = ?s";
            $sql_one_point_charge = "SELECT COUNT(ID) FROM ?n WHERE `pid` = ?i AND `label` = ?s";

            $out_point_list[$i]['info_point'] = $point;

            $out_point_list[$i]['wirestatic0usb_a'] = $db->getAll( $sql_one_point_static_wire, 'wire', $point['ID'], 'usb_a' )[0]['COUNT(ID)'];
            $out_point_list[$i]['wirestatic0micro_usb_b'] = $db->getAll( $sql_one_point_static_wire, 'wire', $point['ID'], 'micro_usb_b' )[0]['COUNT(ID)'];
            $out_point_list[$i]['wirestatic0usb_type_c'] = $db->getAll( $sql_one_point_static_wire, 'wire', $point['ID'], 'usb_type_c' )[0]['COUNT(ID)'];
            $out_point_list[$i]['wirestatic0iphone_lightning'] = $db->getAll( $sql_one_point_static_wire, 'wire', $point['ID'], '-iphone_lightning' )[0]['COUNT(ID)'];

            $out_point_list[$i]['wiresale0micro_usb_b'] = $db->getAll( $sql_one_point_sale_wire, 'wire', $point['ID'], 'micro_usb_b' )[0]['COUNT(ID)'];
            $out_point_list[$i]['wiresale0usb_type_c'] = $db->getAll( $sql_one_point_sale_wire, 'wire', $point['ID'], 'usb_type_c' )[0]['COUNT(ID)'];
            $out_point_list[$i]['wiresale0iphone_lightning'] = $db->getAll( $sql_one_point_sale_wire, 'wire', $point['ID'], '-iphone_lightning' )[0]['COUNT(ID)'];

            $out_point_list[$i]['powdisp0micro_usb_b'] = $db->getAll( $sql_one_point_disp_pow, 'wire', $point['ID'], 'micro_usb_b' )[0]['COUNT(ID)'];
            $out_point_list[$i]['powdisp0usb_type_c'] = $db->getAll( $sql_one_point_disp_pow, 'wire', $point['ID'], 'usb_type_c' )[0]['COUNT(ID)'];
            $out_point_list[$i]['powdisp0iphone_lightning'] = $db->getAll( $sql_one_point_disp_pow, 'wire', $point['ID'], '-iphone_lightning' )[0]['COUNT(ID)'];

            $out_point_list[$i]['pownodisp0anker'] = $db->getAll( $sql_one_point_no_disp_pow, 'wire', $point['ID'], 'anker' )[0]['COUNT(ID)'];
            $out_point_list[$i]['pownodisp0samsung'] = $db->getAll( $sql_one_point_no_disp_pow, 'wire', $point['ID'], 'samsung' )[0]['COUNT(ID)'];

            $out_point_list[$i]['tools0walking_generator'] = $db->getAll( $sql_one_point_tool, 'wire', $point['ID'], 'walking_generator' )[0]['COUNT(ID)'];
            $out_point_list[$i]['tools0cycling_generator'] = $db->getAll( $sql_one_point_tool, 'wire', $point['ID'], 'cycling_generator' )[0]['COUNT(ID)'];
            $out_point_list[$i]['tools0solar_charger'] = $db->getAll( $sql_one_point_tool, 'wire', $point['ID'], '-solar_charger' )[0]['COUNT(ID)'];

            $out_point_list[$i]['charge0samsung_charger'] = $db->getAll( $sql_one_point_charge, 'wire', $point['ID'], 'samsung_charger' )[0]['COUNT(ID)'];
            $out_point_list[$i]['charge0iphone_charger'] = $db->getAll( $sql_one_point_charge, 'wire', $point['ID'], 'iphone_charger' )[0]['COUNT(ID)'];




            $i++;

        }

        // foreach( $points as $point ){

        //     $usb_a = 0;
        //     $micro_usb = 0;
        //     $usb_a = 0;
        //     $usb_type_c = 0;
        //     $disposable_charger = 0;

        //     $point_meta = $this->getMeta( self::$model_name, $point['ID'], false );

        //     if( $point_meta ){
                
        //         foreach( $point_meta as $item ){

        //             if( $item['name'] == 'powerbank'){

        //                 $powerbank = $db->getOne("SELECT `wire` FROM ?n WHERE `ID` = ?i", 'powerbank', $item['value']);

        //                 $$powerbank++;
        //             }
        //         }
        //     }

        //     $points[$i]['powerbanks'] = [
        //         'usb_a' => $usb_a,
        //         'micro_usb' => $micro_usb,
        //         'usb_type_c' => $usb_type_c,
        //         'disposable_charger' => $disposable_charger
        //     ];

        //     $i++;
        // }

        return ['status' => true, 'content' => $out_point_list];
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

            foreach( $item as $it ){

                if( !in_array($it['pid'], $filter_id_list) )
                    $filter_id_list[] = $it['pid'];

                // if( is_array( $item ) ){
                //     foreach( $item as $check ){
                //         if( !in_array($check, $filter_id_list) )
                //             $filter_id_list[] = $check;
                //     }
                // }else{
                //     if( !in_array($item, $filter_id_list) )
                //         $filter_id_list[] = $item;
                // }
            }

            
        }

        $out_point_list=[];

        $i = 0;


        foreach( $filter_id_list as $point_id ){

            $sql_one_point = "SELECT * FROM ?n WHERE `ID` = ?i";
            $sql_one_point_static_wire = "SELECT COUNT(ID) FROM ?n WHERE `pid` = ?i AND `type` = 1 AND `label` = ?s";
            $sql_one_point_sale_wire = "SELECT COUNT(ID) FROM ?n WHERE `pid` = ?i AND `type` = 2 AND `label` = ?s";
            $sql_one_point_disp_pow = "SELECT COUNT(ID) FROM ?n WHERE `pid` = ?i AND `type` = 1 AND `label` = ?s";
            $sql_one_point_no_disp_pow = "SELECT COUNT(ID) FROM ?n WHERE `pid` = ?i AND `type` = 2 AND `label` = ?s";
            $sql_one_point_tool = "SELECT COUNT(ID) FROM ?n WHERE `pid` = ?i AND `label` = ?s";
            $sql_one_point_charge = "SELECT COUNT(ID) FROM ?n WHERE `pid` = ?i AND `label` = ?s";

            $one_point = $db->getAll( $sql_one_point, 'point', $point_id );

            $out_point_list[$i]['info_point'] = $one_point[0];

            $out_point_list[$i]['wirestatic0usb_a'] = $db->getAll( $sql_one_point_static_wire, 'wire', $point_id, 'usb_a' )[0]['COUNT(ID)'];
            $out_point_list[$i]['wirestatic0micro_usb_b'] = $db->getAll( $sql_one_point_static_wire, 'wire', $point_id, 'micro_usb_b' )[0]['COUNT(ID)'];
            $out_point_list[$i]['wirestatic0usb_type_c'] = $db->getAll( $sql_one_point_static_wire, 'wire', $point_id, 'usb_type_c' )[0]['COUNT(ID)'];
            $out_point_list[$i]['wirestatic0iphone_lightning'] = $db->getAll( $sql_one_point_static_wire, 'wire', $point_id, '-iphone_lightning' )[0]['COUNT(ID)'];

            $out_point_list[$i]['wiresale0micro_usb_b'] = $db->getAll( $sql_one_point_sale_wire, 'wire', $point_id, 'micro_usb_b' )[0]['COUNT(ID)'];
            $out_point_list[$i]['wiresale0usb_type_c'] = $db->getAll( $sql_one_point_sale_wire, 'wire', $point_id, 'usb_type_c' )[0]['COUNT(ID)'];
            $out_point_list[$i]['wiresale0iphone_lightning'] = $db->getAll( $sql_one_point_sale_wire, 'wire', $point_id, '-iphone_lightning' )[0]['COUNT(ID)'];

            $out_point_list[$i]['powdisp0micro_usb_b'] = $db->getAll( $sql_one_point_disp_pow, 'wire', $point_id, 'micro_usb_b' )[0]['COUNT(ID)'];
            $out_point_list[$i]['powdisp0usb_type_c'] = $db->getAll( $sql_one_point_disp_pow, 'wire', $point_id, 'usb_type_c' )[0]['COUNT(ID)'];
            $out_point_list[$i]['powdisp0iphone_lightning'] = $db->getAll( $sql_one_point_disp_pow, 'wire', $point_id, '-iphone_lightning' )[0]['COUNT(ID)'];

            $out_point_list[$i]['pownodisp0anker'] = $db->getAll( $sql_one_point_no_disp_pow, 'wire', $point_id, 'anker' )[0]['COUNT(ID)'];
            $out_point_list[$i]['pownodisp0samsung'] = $db->getAll( $sql_one_point_no_disp_pow, 'wire', $point_id, 'samsung' )[0]['COUNT(ID)'];

            $out_point_list[$i]['tools0walking_generator'] = $db->getAll( $sql_one_point_tool, 'wire', $point_id, 'walking_generator' )[0]['COUNT(ID)'];
            $out_point_list[$i]['tools0cycling_generator'] = $db->getAll( $sql_one_point_tool, 'wire', $point_id, 'cycling_generator' )[0]['COUNT(ID)'];
            $out_point_list[$i]['tools0solar_charger'] = $db->getAll( $sql_one_point_tool, 'wire', $point_id, '-solar_charger' )[0]['COUNT(ID)'];

            $out_point_list[$i]['charge0samsung_charger'] = $db->getAll( $sql_one_point_charge, 'wire', $point_id, 'samsung_charger' )[0]['COUNT(ID)'];
            $out_point_list[$i]['charge0iphone_charger'] = $db->getAll( $sql_one_point_charge, 'wire', $point_id, 'iphone_charger' )[0]['COUNT(ID)'];

            $i++;
        
        }

        return ['status' => true, 'content' => $out_point_list];
    }
}

