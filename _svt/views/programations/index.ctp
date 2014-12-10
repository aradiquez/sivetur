<div class="cajainfo">
	<h3>Instrucciones:</h3>
	<ul>
		<li>Con estas opciones podr&aacute;s agregar un nuevo programa a la lista, editar la informaci&oacute;n de los ya registrados, o bien eliminar uno de ellas.</li>
	</ul>
</div>
<?
echo $paginator->counter(array(
'format' => __('Pagina %page% de  %pages%, mostrando %current% registros de %count% en total, iniciando en el registro %start%, finalizando en %end%.', true)));
 

	if(count($Programations)>0)
 	{
?>
<h2><?php __('Lista de Programations');?></h2>
<table cellpadding="0" cellspacing="0">
<thead>
<tr>
    <th><?php echo $paginator->sort('Nombre','name');?></th>
    <th><?php echo $paginator->sort('Estado','status');?></th>
    <th>Fotos</th>
    <th>Acciones</th>
</tr>
    </thead>
<tbody>
<? $i=1;

//pr($Programations);
   foreach($Programations as $row)
   {
?>
<tr <?=($i%2==0)? "class='altRow'": ''?>>
    <td><?php echo $row['Programation']['name'];?></td>
    <td class="estados"><?=$row['Programation']['status']=='A'? 'Activa':'Inactiva'?></td>
    <td class="actions"><?=$html->link(__('Adminitrar',true),array('controller'=>'photos','action' => 'index/',$row['Programation']['id'],'2'));?></td>
    
    <td class="actions">
	<?php echo $html->link(__('Editar', true), array('action'=>'edit', $row['Programation']['id'])); ?>
	<?php echo $html->link(__('Eliminar', true), array('action'=>'delete', $row['Programation']['id']), null, sprintf(__('Esta seguro de eliminar este registro # %s?', true), $row['Programation']['id']));?>
  
    </td>
</tr>
<? $i++; }#endforeach;?>
</tbody>
</table>
<?
	}#end count
	
	//$top=count($Topicos);
	$top=2;
	if($top > 0)
	{
?>
<ul class="actions">
    <li><?=$html->link('Agregar nuevo Programa','add')?></li>
</ul>
<? 	} ?>