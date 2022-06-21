<?php
include_once( 'vendor/autoload.php' );

use demo\functional\App;
use demo\functional\DemoApp;
use framework\environment\Env;
use framework\http\controller\request\HTTPRequestsRoutes;

Env::init( '/app-config.php' );
HTTPRequestsRoutes::load( '/routes-config.php' );
HTTPRequestsRoutes::start();
DemoApp::start();
HTTPRequestsRoutes::currentHTTPRequest()->response()->execute();
?>
<!DOCTYPE html>
<html lang="es">
	<?php include_once( App::pathView( '/blocks/html-head.php' ) );  ?>
  <body>
  	<div class="container-fluid">
  		<div class="row">
			<?php include_once ( App::pathView( '/blocks/top-navbar.php' ) ); ?>
		</div>
    </div>
    <br>
	<br>
    <br>
	<?php include_once ( DemoApp::itemMenuSelected()->path() ); ?>
    <br>
    <br>
 	<div class="container-fluid">
		<div class="row">
			<?php include_once ( App::pathView( '/blocks/html-footer.php' ) ); ?>
		</div>
	</div>
	<?php include_once ( App::pathView( '/blocks/html-footer-scripts.php' ) ); ?>
  </body>
</html>