<?php
namespace demo\functional;

use framework\environment\Env;
use framework\http\controller\request\HTTPRequestsRoutes;

class DemoApp extends App
{
    
    /**
     *
     * @return array
     */
    static public function menuItems(): array
    {
        $appUrlBase = App::urlBase();
        return
        [
            'home' =>
            [
                'path' => App::pathView( 'pages/home.php' ),
                'url' => "{$appUrlBase}home",
                'label' => "Inicio"
            ],
            'demo' =>
            [
                'path' => App::pathView( 'pages/demo.php' ),
                'url' => "{$appUrlBase}demo?attr1=xyz&attr2=lmn",
                'label' => "Demo"
            ],
            'routes' =>
            [
                'path' => App::pathView( 'pages/routes.php' ),
                'url' => "{$appUrlBase}routes",
                'label' => "Routes"
            ],
            'htaccess' =>
            [
                'path' => App::pathView( 'pages/file.php' ),
                'url' => "{$appUrlBase}htaccess",
                'label' => ".HTAccess",
                'file' => '/.htaccess'
            ],
            'index' =>
            [
                'path' => App::pathView( 'pages/file.php' ),
                'url' => "{$appUrlBase}index",
                'label' => "index.php",
                'file' => '/index.php'
            ]
        ];
    }
    
    /**
     * 
     * @return array
     */
    static public function menuItemSelected(): array
    {
        $menuItems = DemoApp::menuItems();
        return $menuItems[ substr( DemoApp::urnCurrent(), 1 ) ];
    }
    
    /**
     *
     * @return string
     */
    static public function siteTitle(): string
    {
        return "Framework HTTP > Demo";
    }
    
    /**
     *
     * @return string
     */
    static public function urnCurrent(): string
    {
        return ( HTTPRequestsRoutes::currentURN() == '/' ) ? '/home': HTTPRequestsRoutes::currentURN();
    }
    
    /**
     * 
     * @return array
     */
    static public function menuItemsViewsBlocks(): array
    {
        $items = [];
        /*
        $iterator = new DirectoryIterator( Env::path( '/src/demo/views/' ) );
        foreach ( $iterator as $fileinfo ) 
        {
            if (!$fileinfo->isDot())
            {
                $items[] = $entry->getFilename();
            }
        }
        */
        return $items;
    }
}

