<?php 
use demo\functional\DemoApp;
use framework\environment\Env;
//Env::console( DemoApp::menuItemsViewsBlocks() );
?>
<div class="list-group">
<?php foreach ( DemoApp::menuItems() as $item ) : $activeItem = ( "/{$item->id()}" == DemoApp::urnCurrent() ) ? 'active' : '' ?>
    <a href="<?= $item->url() ?>" class="list-group-item list-group-item-action <?= $activeItem ?>" aria-current="true">
    	<?= $item->label() ?>
    </a>
<?php endforeach; ?>
</div>    				
