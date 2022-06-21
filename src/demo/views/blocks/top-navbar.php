<?php
use demo\functional\DemoApp;
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="<?= DemoApp::urlbase() ?>"><?= DemoApp::siteTitle() ?></a>
        <span class="navbar-text"><?= DemoApp::itemMenuSelected()->label() ?></span>            	
	</div>
</nav>