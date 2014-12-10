<div class="categories view">
<h2><?php  __('Tipo');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $Tipos['Tipo']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name '); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $Tipos['Tipo']['name']; ?>
			&nbsp;
		</dd>		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo ($Tipos['Tipo']['status']=='A'? 'Activa':'Inactiva'); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Creada'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $Tipos['Tipo']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modificada'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $Tipos['Tipo']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Editar Tipo', true), array('action'=>'edit', $Tipos['Tipo']['id'])); ?> </li>
		<li><?php echo $html->link(__('Borrar Tipo', true), array('action'=>'delete', $Tipos['Tipo']['id']), null, sprintf(__('Esta segur@ de querer eliminarla # %s?', true), $Tipos['Tipo']['id'])); ?> </li>
		<li><?php echo $html->link(__('Lista de Tipo', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('Ingresar nueva Tipo', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
