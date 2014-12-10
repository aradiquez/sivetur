<div class="cajainfo">
	<h3><?__('Instrucciones:');?></h3>
	<ul>
		<li><?__('Aqu&iacute; podr&aacute;s agregar un nueva Palabra reservada para validar los comentarios y los correos salientes adem&aacute;s podr&aacute;s editar la informaci&oacute;n de las ya registradas o bien eliminar una de ellas.')?></li>
		
		<li><?__('Cada Palabra reservada servira para verificar el buen lenguaje en los correos y comentarios.')?></li>

	</ul>
</div>

<?
$reg=count($Palabrasreservadas);


 if($reg >=20){
echo $paginator->counter(array(
'format' => __('Pagina %page% de  %pages%, mostrando %current% registros de %count% en total, iniciando en el registro %start%, finalizando en %end%.', true)));
 }

	if($reg > 0)
 	{
?>
<h2>Lista Palabras reservadas: 

</h2>
<table cellpadding="0" cellspacing="0">
<tr>
    <th><?php echo 'Palabrasreservadao'?></th>
    <th><?php echo 'Estado'?></th>
    <th>Acciones</th>
</tr>

<? $i=1;
foreach($Palabrasreservadas as $row){
?>
<tr <?=($i%2==0)? "class='altRow'": ''?>>
  
    <td><?=$row['Palabrasreservada']['name']?></td>
    <td class="estados"><?=$row['Palabrasreservada']['status']=='A'? 'Activa':'Inactiva'?></td>
 
    <td class="actions">
		<?  //=$html->link('Ver','/Palabrasreservadas/view/'.$row['Palabrasreservada']['id'])?>
	<?php //echo $html->link(__('View', true), array('action'=>'view', $row['Palabrasreservada']['id'])); ?>
			
	     <?php echo $html->link(__('Editar', true), array('action'=>'edit', $row['Palabrasreservada']['id'])); ?>
			
	    <?
		//if($row['Palabrasreservada']['id']!='1' and $row['Palabrasreservada']['id']!='2')
			   echo $html->link(__('Eliminar', true), array('action'=>'delete', $row['Palabrasreservada']['id']), null, sprintf(__('Esta seguro de eliminar este registro # %s?', true), $row['Palabrasreservada']['id']));
			   
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
		<li><?php echo $html->link(__('Ingresar un nueva Palabra reservada', true), array('action'=>'add/')); ?></li>
	</ul>
</div>
