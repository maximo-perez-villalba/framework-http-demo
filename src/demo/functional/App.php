<?php
namespace demo\functional;

use framework\environment\Env;
use framework\http\controller\request\HTTPRequestsRoutes;

abstract class App
{
    
    /**
     * 
     * @param string $urn
     * @return string
     */
    static public function pathView( string $urn = '' ): string
    {
        return Env::path( "/src/demo/views/{$urn}" ); 
    }
    
    /**
     * 
     * @return string
     */
    static public function urlCurrent(): string
    {
        $urn = ( isset( $_GET[ 'urn' ] ) && !empty( $_GET[ 'urn' ] ) ) ? $_GET[ 'urn' ] : 'home';
        return self::urlBase().$urn;
    }

    /**
     * 
     * @return string
     */
    static public function urlBase(): string
    {
        return Env::urlbase();
    }
   
    /**
     * 
     * @return string
     */
    static public function urnCurrent(): string
    {
        return HTTPRequestsRoutes::currentURN();
    }
}