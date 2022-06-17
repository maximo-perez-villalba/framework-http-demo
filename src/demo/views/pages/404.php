<?php
use demo\functional\App;
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
			<h3 class="text-center">La ruta a la que intentas acceder no existe :)</h3>
			<h4 class="text-center"><?= App::urlCurrent() ?></h4>
		</div>
		<div class="col-md-3">
		</div>
	</div>
</div>
