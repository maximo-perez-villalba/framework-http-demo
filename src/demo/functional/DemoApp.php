<?php
namespace demo\functional;

use demo\ui\models\ItemMenu;
use framework\environment\Env;
use framework\http\controller\request\HTTPRequestsRoutes;
use DirectoryIterator;

class DemoApp extends App
{
    
    /**
     * 
     * @var string
     */
    const DEMO_APP_STATE_HOME = 'home';
    
    /**
     *
     * @var string
     */
    const DEMO_APP_STATE_REQUESTS = 'requests';
    
    /**
     *
     * @var string
     */
    const DEMO_APP_STATE_RESPONSES = 'responses';
    
    /**
     *
     * @var string
     */
    const DEMO_APP_STATE_STRUCTURE = 'structure';
    
    /**
     *
     * @var string
     */
    const DEMO_APP_STATE_VIEW_BLOCKS = 'view-blocks';
    
    /**
     *
     * @var string
     */
    const DEMO_APP_STATE_VIEW_PAGES = 'view-pages';
    
    /**
     * @var array
     */
    static private array $itemsStructure = [];
    
    /**
     * @var array
     */
    static private array $itemsViewsBlocks = [];
    
    /**
     * @var array
     */
    static private array $itemsViewsPages = [];
    
    /**
     * @var array
     */
    static private array $itemsRequests = [];
    
    /**
     * @var array
     */
    static private array $itemsResponses = [];
    
    /**
     * @var ItemMenu
     */
    static private ?ItemMenu $home = NULL;
    
    /**
     * @var ItemMenu
     */
    static private ?ItemMenu $itemMenuSelected = NULL;
    
    /**
     * 
     * @var string
     */
    static private ?string $subMenuSelected = NULL;
    
    /**
     * 
     */
    static public function start()
    {
        self::dataSetting();
        self::stateSetting();
    }

    /**
     * 
     */
    static private function dataSetting()
    {
        self::$home = new ItemMenu
        (
            'welcome',
            Env::url( 'welcome' ),
            App::pathView( 'pages/home.php' ),
            'Inicio'
            );
        
        self::$itemsRequests = self::itemsMenuFromDirectory( '/src/demo/controllers/requests' );
        self::$itemsResponses = self::itemsMenuFromDirectory( '/src/demo/controllers/responses' );
        self::$itemsViewsBlocks = self::itemsMenuFromDirectory( '/src/demo/views/blocks' );
        self::$itemsViewsPages = self::itemsMenuFromDirectory( '/src/demo/views/pages' );
        
        self::$itemsStructure[ 'index' ] = self::itemMenuFromFile( 'index', 'index.php', '/index.php' );
        self::$itemsStructure[ 'app-config' ] = self::itemMenuFromFile( 'app-config', 'app-config.php', '/app-config.php' );
        self::$itemsStructure[ 'routes-config' ] = self::itemMenuFromFile( 'routes-config', 'routes-config.php', '/routes-config.php' );
        self::$itemsStructure[ 'composer' ] = self::itemMenuFromFile( 'composer', 'composer.json', '/composer.json' );
        self::$itemsStructure[ 'htaccess' ] = self::itemMenuFromFile( 'htaccess', '.htaccess', '/.htaccess' );
    }
    
    /**
     * 
     */
    static private function stateSetting()
    {
        $itemSelectedKey = substr( DemoApp::urnCurrent(), 1 );
        
        if ( $itemSelectedKey == 'welcome' )
        {
            self::$itemMenuSelected = self::$home;
            self::$subMenuSelected = DemoApp::DEMO_APP_STATE_HOME;
        }
        elseif( isset( self::$itemsStructure[ $itemSelectedKey ] ) )
        {
            self::$itemMenuSelected = self::$itemsStructure[ $itemSelectedKey ];
            self::$subMenuSelected = DemoApp::DEMO_APP_STATE_STRUCTURE;
        }
        elseif( isset( self::$itemsRequests[ $itemSelectedKey ] ) )
        {
            self::$itemMenuSelected = self::$itemsRequests[ $itemSelectedKey ];
            self::$subMenuSelected = DemoApp::DEMO_APP_STATE_REQUESTS;
        }
        elseif( isset( self::$itemsResponses[ $itemSelectedKey ] ) )
        {
            self::$itemMenuSelected = self::$itemsResponses[ $itemSelectedKey ];
            self::$subMenuSelected = DemoApp::DEMO_APP_STATE_RESPONSES;
        }
        elseif( isset( self::$itemsViewsBlocks[ $itemSelectedKey ] ) )
        {
            self::$itemMenuSelected = self::$itemsViewsBlocks[ $itemSelectedKey ];
            self::$subMenuSelected = DemoApp::DEMO_APP_STATE_VIEW_BLOCKS;
        }
        elseif( isset( self::$itemsViewsPages[ $itemSelectedKey ] ) )
        {
            self::$itemMenuSelected = self::$itemsViewsPages[ $itemSelectedKey ];
            self::$subMenuSelected = DemoApp::DEMO_APP_STATE_VIEW_PAGES;
        }
    }

    /**
     * 
     * @return ItemMenu|NULL
     */
    static public function itemMenuSelected(): ?ItemMenu
    {
        return self::$itemMenuSelected;
    }

    /**
     * 
     * @return string
     */
    static public function subMenuSelected(): ?string
    {
        return self::$subMenuSelected;
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
        return ( HTTPRequestsRoutes::currentURN() == '/' ) ? '/welcome': HTTPRequestsRoutes::currentURN();
    }
    
    /**
     * 
     * @return ItemMenu[]
     */
    static private function itemsMenuFromDirectory( string $aRelativePath ): array
    {
        $items = [];
        $aFullPath = Env::path( $aRelativePath );
        $iterator = new DirectoryIterator( $aFullPath );
        foreach ( $iterator as $fileinfo ) 
        {
            if (!$fileinfo->isDot())
            {
                $filename = $fileinfo->getFilename();
                $urn = substr( $filename, 0, -4 );
                $items[ $urn ] = new ItemMenu
                (
                    $urn, 
                    Env::url( $urn ), 
                    App::pathView( 'pages/show-file.php' ),
                    $filename,
                    "{$aFullPath}/{$filename}"
                );
            }
        }
        return $items;
    }

    /**
     * 
     * @param string $urn
     * @param string $aRelativeFilePath
     * @return ItemMenu
     */
    static private function itemMenuFromFile( string $urn, string $aLabel, string $aRelativeFilePath ): ItemMenu
    {
        $aFullPath = Env::path( $aRelativeFilePath );
        $item = new ItemMenu
        (
            $urn,
            Env::url( $urn ),
            App::pathView( 'pages/show-file.php' ),
            $aLabel,
            $aFullPath
        );
        return $item;
    }
    
    /**
     * 
     * @return ItemMenu
     */
    static public function home(): ItemMenu
    {
        return self::$home;
    }
    
    /**
     * 
     * @return ItemMenu[]
     */
    static public function itemsStructure(): array
    {
        return self::$itemsStructure;
    }
    
    /**
     *
     * @return ItemMenu[]
     */
    static public function itemsRequests(): array
    {
        return self::$itemsRequests;
    }
    
    /**
     *
     * @return ItemMenu[]
     */
    static public function itemsResponses(): array
    {
        return self::$itemsResponses;
    }
    
    /**
     *
     * @return ItemMenu[]
     */
    static public function itemsViewsBlocks(): array
    {
        return self::$itemsViewsBlocks;
    }
    
    /**
     *
     * @return ItemMenu[]
     */
    static public function itemsViewsPages(): array
    {
        return self::$itemsViewsPages;
    }
}

