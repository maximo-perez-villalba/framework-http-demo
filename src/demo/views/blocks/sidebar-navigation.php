<?php 
use demo\functional\DemoApp;
use demo\ui\components\listables\lists\ListGroupComponent;
use framework\http\controller\request\HTTPRequestsRoutes;

$response = HTTPRequestsRoutes::currentHTTPRequest()->response();

$listHomeComponent = new ListGroupComponent( 'HomeAction' );
$listHomeComponent->itemSelected( DemoApp::urnCurrent() );
$listHomeComponent->addItem( DemoApp::home()->label(), DemoApp::home()->url() );

$listRequestComponent = new ListGroupComponent( 'RequestsAction' );
$listRequestComponent->itemSelected( DemoApp::urnCurrent() );
foreach ( DemoApp::itemsRequests() as $itemMenu )
{
    $listRequestComponent->addItem( $itemMenu->label(), $itemMenu->url() );
}

$listResponsesComponent = new ListGroupComponent( 'ResponsesAction' );
$listResponsesComponent->itemSelected( DemoApp::urnCurrent() );
foreach ( DemoApp::itemsResponses() as $itemMenu )
{
    $listResponsesComponent->addItem( $itemMenu->label(), $itemMenu->url() );
}

$listStructuresComponent = new ListGroupComponent( 'StructuresAction' );
$listStructuresComponent->itemSelected( DemoApp::urnCurrent() );
foreach ( DemoApp::itemsStructure() as $itemMenu )
{
    $listStructuresComponent->addItem( $itemMenu->label(), $itemMenu->url() );
}

$listViewBlocksComponent = new ListGroupComponent( 'ViewBlocksAction' );
$listViewBlocksComponent->itemSelected( DemoApp::urnCurrent() );
foreach ( DemoApp::itemsViewsBlocks() as $itemMenu )
{
    $listViewBlocksComponent->addItem( $itemMenu->label(), $itemMenu->url() );
}

$listViewPagesComponent = new ListGroupComponent( 'ViewPagesAction' );
$listViewPagesComponent->itemSelected( DemoApp::urnCurrent() );
foreach ( DemoApp::itemsViewsPages() as $itemMenu )
{
    $listViewPagesComponent->addItem( $itemMenu->label(), $itemMenu->url() );
}

//print $listHomeComponent->toHtml();
print '<br><h4>Requests</h4>';
print $listRequestComponent->toHtml();
print '<br><h4>Responses</h4>';
print $listResponsesComponent->toHtml();
print '<br><h4>Project structure</h4>';
print $listStructuresComponent->toHtml();
print '<br><h4>Views/Blocks</h4>';
print $listViewBlocksComponent->toHtml();
print '<br><h4>Views/Pages</h4>';
print $listViewPagesComponent->toHtml();
?>