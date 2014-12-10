<?php
/* SVN FILE: $Id: home.ctp 7118 2008-06-04 20:49:29Z gwoo $ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2008, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2008, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.cake.libs.view.templates.pages
 * @since			CakePHP(tm) v 0.10.0.1076
 * @version			$Revision: 7118 $
 * @modifiedby		$LastChangedBy: gwoo $
 * @lastmodified	$Date: 2008-06-04 13:49:29 -0700 (Wed, 04 Jun 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
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
<div style="width:85%;margin:0 auto;">
	<h2>Instrucciones:</h2>
	<p>Por favor, lea la información dentro de cada panel, esta será muy útil para comprender el proceso de cada función.</p><br/>
	<p>Si usted tiene alguna pregunta o comentario por favor escriba a info@zews.co.cr o póngase en contacto con nosotros por teléfono (506) 770-5005 de la Zona de Estrategias Web del Sur, ZEWS S.A.</p>
<br/>
	<p>	Para aprender más sobre nosotros visite el sitio web de ZEWS, <a href="http://www.zews.co.cr" target="_blank" title="www.zews.co.cr">click here</a>.</p>
	
	<br/><br/><br/><br/><br/><br/>
</div>