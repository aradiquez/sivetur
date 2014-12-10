<div class="cajainfo">
	<h3><?__('Instrucciones:');?></h3>
	<ul>
		<li><?__('Aqu&iacute; podr&aacute;s agregar una nueva Encuesta, adem&aacute;s podr&aacute;s editar la informaci&oacute;n de las ya registradas o bien eliminar una de ellas.')?></li>
		
		<li><?__('Cada Encuesta debera tener opciones para poder agregar el voto.')?></li>

	</ul>
</div>

<?
$reg=count($Encuestas);


 if($reg >=20){
echo $paginator->counter(array(
'format' => __('Pagina %page% de  %pages%, mostrando %current% registros de %count% en total, iniciando en el registro %start%, finalizando en %end%.', true)));
 }

	if($reg > 0)
 	{
?>
<h2>Lista Encuestas: 

</h2>
<table cellpadding="0" cellspacing="0">
<tr>
    <th><?php echo 'Encuestao'?></th>
    <th><?php echo 'Estado'?></th>
    <th><?php echo 'Opciones'?></th>
    <th>Acciones</th>
</tr>

<? $i=1;
foreach($Encuestas as $row){
?>
<tr <?=($i%2==0)? "class='altRow'": ''?>>
  
    <td><?=$row['Encuesta']['name']?></td>
    <td class="estados"><?=$row['Encuesta']['status']=='A'? 'Activa':'Inactiva'?></td>
 	<td class='estados'><?php echo $html->link(__('Agregar', true), array('controller' =>'opciones','action'=>'index', $row['Encuesta']['id'])); ?></td>
    <td class="actions">
		<?  //=$html->link('Ver','/Encuestas/view/'.$row['Encuesta']['id'])?>
	<?php //echo $html->link(__('View', true), array('action'=>'view', $row['Encuesta']['id'])); ?>
			
	     <?php echo $html->link(__('Editar', true), array('action'=>'edit', $row['Encuesta']['id'])); ?>
			
	    <?
		//if($row['Encuesta']['id']!='1' and $row['Encuesta']['id']!='2')
			   echo $html->link(__('Eliminar', true), array('action'=>'delete', $row['Encuesta']['id']), null, sprintf(__('Esta seguro de eliminar este registro # %s?', true), $row['Encuesta']['id']));
			   
			   ?>
    </td>
</tr>
<?
	$i++;
 }//endforeach;
 ?>
</table>
<?
	}#end count
	
	if($reg >=20){
?>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('anterior', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('siguiente', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
	
	
 <br/><br/>
 <?  }?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Ingresar un nueva Encuesta', true), array('action'=>'add/')); ?></li>
	</ul>
</div>
