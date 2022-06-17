<?php 
use demo\functional\DemoApp;
?>
<div class="list-group">
<?php foreach ( DemoApp::menuItems() as $id => $item ) : $activeItem = ( $id == DemoApp::urnCurrent() ) ? 'active' : '' ?>
    <a href="<?= $item[ 'url' ] ?>" class="list-group-item list-group-item-action <?= $activeItem ?>" aria-current="true">
    	<?= $item[ 'label' ] ?>
    </a>
<?php endforeach; ?>
</div>    				
