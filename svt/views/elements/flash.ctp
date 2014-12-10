<? if($this->Session->check('Message.flash')) { 
	$this_message = $this->Session->read('Message.flash'); 
	switch ($this_message['params']['class']) {
		case 'success':
			$class = 'success';
		break;
		case 'error':
			$class = 'danger';
		break;
		default:
			$class = 'info';
		break;

	}?>
	<div class="alert alert-<?=$class?> fade in margtop20">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
		<?php echo $this->Session->flash(); ?>
	</div>
<? } ?>