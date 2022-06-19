<?php
namespace demo\functional;

use framework\environment\Env;
use framework\http\controller\request\HTTPRequestsRoutes;
use DirectoryIterator;
use demo\ui\models\ItemMenu;

class DemoApp extends App
{
    
    /**
     *
     * @return ItemMenu[]
     */
    static public function menuItems(): array
    {
        $appUrlBase = App::urlBase();
        return
        [
            'home' => new ItemMenu
            ( 
                'home', 
                "{$appUrlBase}home", 
                App::pathView( 'pages/home.php' ),
                "Inicio"
            ), 
            'demo' => new ItemMenu
            (
                'demo', 
                "{$appUrlBase}demo?attr1=xyz&attr2=lmn", 
                App::pathView( 'pages/demo.php' ), 
                "Demo"
            ),
            'routes' => new ItemMenu
            (
                'routes', 
                "{$appUrlBase}routes", 
                App::pathView( 'pages/routes.php' ), 
                "Routes"
            ),
            'htaccess' => new ItemMenu
            (
                'htaccess', 
                "{$appUrlBase}htaccess", 
                App::pathView( 'pages/file.php' ), 
                ".HTAccess",
                '/.htaccess'
            ),
            'index' => new ItemMenu
            (
                'index', 
                "{$appUrlBase}index", 
                App::pathView( 'pages/file.php' ), 
                "index.php",
                '/index.php'
            )
        ];
    }
    
    /**
     * 
     * @return array
     */
    static public function menuItemSelected(): ItemMenu
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
        $iterator = new DirectoryIterator( Env::path( '/src/demo/views/blocks/' ) );
        foreach ( $iterator as $fileinfo ) 
        {
            if (!$fileinfo->isDot())
            {
                $items[] = $fileinfo->getFilename();
            }
        }
        return $items;
    }
}

