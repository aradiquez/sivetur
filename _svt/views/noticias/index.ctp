<div class="cajainfo">
	<h3>Instrucciones:</h3>
	<ul>
		<li>Con estas opciones podr&aacute;s agregar una nueva noticia a la lista, editar la informaci&oacute;n de las ya registradas, o bien eliminar una de ellas. Cada noticia pertenece a un t&oacute;pico previamente creado.</li>
		
		<li>Si el t&oacute;pico al que deseas agregar la noticia no existe, puedes crearlo haciendo <strong><?=$html->link('click aqui','/topics/add')?></strong>.</li>
		
	</ul>
</div>
<?
echo $paginator->counter(array(
'format' => __('Pagina %page% de  %pages%, mostrando %current% registros de %count% en total, iniciando en el registro %start%, finalizando en %end%.', true)));
 

	if(count($Noticias)>0)
 	{
?>
<h2><?php __('Lista de Noticias');?></h2>
<table cellpadding="0" cellspacing="0">
<thead>
<tr>
    <th><?php echo $paginator->sort('Noticia','name');?></th>
    <th><?php echo $paginator->sort('Topico','topic_id');?></th>
    <th><?php echo $paginator->sort('Estado','status');?></th>
    <th>Acciones</th>
</tr>
    </thead>
<tbody>
<? $i=1;

   foreach($Noticias as $row)
   {
?>
<tr <?=($i%2==0)? "class='altRow'": ''?>>
    <td><?php echo $row['Noticia']['name'];?></td>
    <td class="estados"><?=$row['Topics']['name']?></td>
    <td class="estados"><?=$row['Noticia']['status']=='A'? 'Activa':'Inactiva'?></td>
    
    <td class="actions" >
		<?php echo $html->link(__('Editar', true), array('action'=>'edit', $row['Noticia']['id'])); ?>
		<?php echo $html->link(__('Eliminar', true), array('action'=>'delete', $row['Noticia']['id']), null, sprintf(__('Esta seguro de eliminar este registro # %s?', true), $row['Noticia']['id']));?>
    </td>
</tr>
<? $i++; }#endforeach;?>
</tbody>
</table>
<?
	if(count($Noticias) >=20){
?>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('anterior', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('siguiente', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
	
	
 <br/><br/>
 <?  }?>

<?
	}#end count

	//$top=count($Topicos);
	$top=2;
	if($top > 0)
	{
?>
<ul class="actions">
    <li><?=$html->link('Agregar nueva Noticia','add')?></li>
    <li><br/><?=$html->link('Crear nuevo topico','/topics/add')?></li>
</ul>
<?
	}
	//else{
	//	echo "<div class='curvacaja'>";
	//	echo '<strong>&nbsp;No existen topicos registrados...para agregar uno nuevo haga '.$html->link('click aquí','/topicos/add').'</strong>';
	//	echo"</div>";
	//}
?>