<?php
use demo\controllers\requests\ShowFileRequest;
use demo\functional\DemoApp;
use framework\http\controller\request\HTTPRequestsRoutes;
use framework\environment\Env;

/**
 * 
 * @var demo\controllers\requests\ShowFileRequest $response
 */
$response = HTTPRequestsRoutes::currentHTTPRequest()->response();
?>
<div class="container-fluid">
	<div class="row" style="display: flex; min-height: 90vh;">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
					<?php include_once( DemoApp::pathView( '/blocks/sidebar-navigation.php' ) );?>
				</div>
				<div class="col-md-9 d-flex flex-column">
					<h3><?= $response->titlePage() ?></h3>
					<hr>
					<?= show_source( $response->pathFileSource(), TRUE ); ?>
				</div>
			</div>
		</div>
	</div>
</div>