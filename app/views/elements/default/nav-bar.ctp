 <? $navegador = $this->requestAction('/homes/getNavegador'); ?>
			<!-- Navigation-->
			  <div class="navbar-header">
				<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<a href="/" class="navbar-brand"><?=$this->Html->image('logo.png',  array('alt'=>__('_TITULO', true), 'title'=>__('_TITULO', true), 'class' => "logo"))?></a>
				<h1><?=$SEOH1?></h1>
			  </div>
			  <div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
		          <? foreach ($navegador as $nav) {
						   echo $html->tag("li", $html->link($nav['Section']['title'], $nav['Section']['direccion'], array()) );
		          } ?>
				</ul>
			  </div>
			  <!-- /Navigation-->