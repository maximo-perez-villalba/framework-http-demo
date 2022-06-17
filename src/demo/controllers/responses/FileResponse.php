<?php
namespace demo\controllers\responses;

use demo\functional\DemoApp;
use framework\environment\Env;
use framework\http\controller\response\HTTPResponse;

class FileResponse extends HTTPResponse
{
    
    public function __construct()
    {
        $this->pathTemplate = 'pages/file.php';
    }
    
    public function execute()
    {}
    
    /**
     * 
     * @return string
     */
    public function titlePage(): string
    {
        $item = DemoApp::menuItemSelected();
        return $item[ 'label' ];
    }
    
    /**
     * 
     * @return string
     */
    public function pathFileSource(): string
    {
        $item = DemoApp::menuItemSelected();
        return Env::path( $item[ 'file' ] );
    }
    
}

