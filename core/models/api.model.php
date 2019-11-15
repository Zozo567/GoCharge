<?php

class Api extends Main
{

    protected static $model_name = null;
    protected static $method_name = null;
    protected static $method = null;

    function __construct(){

        $method = $_SERVER['REQUEST_METHOD'];

        self::$method = $method;

        $request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

        $this->check_method_exist( $request );
        
        switch ( $method ) {
            case 'PUT':
                parse_put( $request, $parameters );
                break;
            case 'POST':
                parse_post( $request, $parameters );  
                break;
            case 'GET':
                parse_get( $request );  
                break;
            default:
                handle_error( $request );  
                break;
        }
    }

    private function check_method_exist(){

        $action = explode('/', $request);

        self::$model_name = $action[0];
        self::$method_name = $action[1];

        if( !method_exists(self::$model_name, self::$method_name ) )
            $this->get_error( 'bad_request' );
    }

    private function parse_get( $request )
    {
        $return = $this->getModel()->{self::$method_name}();

        if( $return['status'] )
            print json_encode( $return['response'] );
        else
            get_error( $return['error_code'] )

        die();
        
    }

    private function parse_post( $request, $parameters )
    {

        if( !$parameters )
            $this->get_error( 'no_parameters' );

        $return = $this->getModel()->{self::$method_name}();
        
        if( $return['status'] )
            print json_encode( $return['response'] );
        else
            get_error( $return['error_code'] )

        die();
        
    }

    private function parse_put( $request, $parameters )
    {
        if( !$parameters )
            $this->get_error( 'no_parameters' );

        $return = $this->getModel()->{self::$method_name}();

        if( $return['status'] )
            print json_encode( $return['response'] );
        else
            get_error( $return['error_code'] )

        die();
        
    }

    private function get_error( $code ){
        
        switch ( $code ) {
            case 'no_parameters':
                response_400( 'Parameters are not exist' );
                break;
            case 'bad_parameters':
                response_400( 'Parameters are not correct' );
                break;
            default:
                response_400( 'Bad request' );
                    break;
        }

        print json_encode( $return['response'] );

        die();
    }

    private function response_400( $reason ){
        $request = [
            'code' => 400,
            'message' => $reason,
        ];

        print json_encode( $request );

        die();
    }
}
