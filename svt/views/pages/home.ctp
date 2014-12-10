<?php
if (isset($filePresent)):
	if (!class_exists('ConnectionManager')) {
		require LIBS . 'model' . DS . 'connection_manager.php';
	}
	$db = ConnectionManager::getInstance();
	@$connected = $db->getDataSource('default');
endif;
?>
<?php
if (Configure::read() > 0):
	Debugger::checkSecurityKeys();
endif;
?>
<div class="alert alert-info fade in margtop20">
	<h2>Instrucciones:</h2>
	<p>Por favor, lea la información dentro de cada panel, esta será muy útil para comprender el proceso de cada función.</p><br/>
	<p>Si usted tiene alguna pregunta o comentario por favor escriba a shagy.gnx@gmail.com o póngase en contacto conmigo al teléfono (506) 8848-2120.</p>
</div>