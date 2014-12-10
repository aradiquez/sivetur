	<?php 
	$errors = '';
	if (!empty($this->validationErrors)) {
		echo '<div class="alert alert-danger fade in margtop20">
			  <button class="close" type="button" data-dismiss="alert" aria-hidden="true">×</button>';
		foreach($this->validationErrors as $assoc) {
		    foreach ($assoc as $k => $v) {
		        $errors .= $this->Html->tag('li', $v);  
		    }
		}
		echo $this->Html->tag('ul', $errors);
		echo "</div>";
	}
	?>