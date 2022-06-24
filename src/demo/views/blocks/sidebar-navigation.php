<?php 
use demo\functional\DemoApp;
use demo\ui\components\listables\lists\groups\ListGroupComponent;
use framework\environment\Env;

/**
 * @param string $defaultURN
 * @param array $menu
 * @return ListGroupComponent
 */
function listComponent( string $defaultURN, array $menu ): ListGroupComponent
{
    $listComponent = new ListGroupComponent( $defaultURN );
    foreach ( $menu as $itemMenu )
    {
        $active = ( DemoApp::urnCurrent() == $itemMenu->id() );
        $listComponent->addItem( $itemMenu->label(), $itemMenu->url(), $active, $itemMenu->id() );
    }
    return $listComponent;
}

/**
 * 
 * @param ListGroupComponent $list
 * @param string $title
 * @param string $appState
 * @return string
 */
function toHtmlSubmenu( ListGroupComponent $list, string $title, string $appState ): string
{
    $code = '';
    if( DemoApp::subMenuSelected() == $appState )
    {
        $code .= "<h6>{$title}</h6><hr>";
        $code .= $list->toHtml();
        $code .= "<br>";
    }
    else
    {
        $url = Env::url( $list->id() );
        $code .= "<a href=\"{$url}\"><h6>{$title}</h6></a>";
        $code .= "<hr>";
    }
    return $code;
}

$listRequestComponent = listComponent( 'ShowFileRequest', DemoApp::itemsRequests() ); 
$listResponsesComponent = listComponent( 'HomeResponse', DemoApp::itemsResponses() );
$listStructuresComponent = listComponent( 'index', DemoApp::itemsStructure() );
$listViewBlocksComponent = listComponent( 'html-head', DemoApp::itemsViewsBlocks() );
$listViewPagesComponent = listComponent( 'show-file', DemoApp::itemsViewsPages() );


/* Print navigation menu */
print toHtmlSubmenu( $listRequestComponent, 'Requests', DemoApp::DEMO_APP_STATE_REQUESTS );
print toHtmlSubmenu( $listResponsesComponent, 'Responses', DemoApp::DEMO_APP_STATE_RESPONSES );
print toHtmlSubmenu( $listViewBlocksComponent, 'Views/Blocks', DemoApp::DEMO_APP_STATE_VIEW_BLOCKS );
print toHtmlSubmenu( $listViewPagesComponent, 'Views/Pages', DemoApp::DEMO_APP_STATE_VIEW_PAGES );
print toHtmlSubmenu( $listStructuresComponent, 'Project structure', DemoApp::DEMO_APP_STATE_STRUCTURE );
?>