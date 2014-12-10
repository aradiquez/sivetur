<?php  
 /**
 * created by: Esteban Cordero
 * Helper created for extend the FCK Editor on the views
 */

class FckHelper extends Helper {
	function load($id, $toolbar = 'Default') {
		$did = Inflector::camelize(str_replace('/', '_', $id));
		return <<<FCK_CODE
<script type="text/javascript">
CKEDITOR.replace('$did');
</script>
FCK_CODE;
	}
}
?> 