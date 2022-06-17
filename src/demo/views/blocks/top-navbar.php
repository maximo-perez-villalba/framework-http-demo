<?php
use demo\functional\DemoApp;
$item = DemoApp::menuItemSelected();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="<?= DemoApp::urlbase() ?>"><?= DemoApp::siteTitle() ?></a>
        <span class="navbar-text"><?= $item[ 'label' ] ?></span>            	
	</div>
</nav>