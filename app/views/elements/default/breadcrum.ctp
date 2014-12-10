	<div class="container breadcrub">
	    <div>
			<a class="homebtn left" href="#"></a>
			<div class="left">
				<ul class="bcrumbs">
					<li>/</li>
          <?= $this->Html->tag('li', $this->Html->link($seccion['Section']['title'], array('controller' => $funciones->sanitize_title_to_controller_name($seccion['Section']['title']), 'action' => 'index')))?>
					<li>/</li>
					<?= $funciones->handle_breadcrum($seccion['Section']['id'], $nodo_actual)?>
				</ul>				
			</div>
			<a class="backbtn right" href="#"></a>
		</div>
		<div class="clearfix"></div>
		<div class="brlines"></div>
	</div>	