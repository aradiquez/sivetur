<div class="cajainfo">
	<h3><?__('Instrucciones:');?></h3>
	<ul>
		<li><?__('Aqu&iacute; podr&aacute;s agregar un nuevo comentario, adem&aacute;s podr&aacute;s editar la informaci&oacute;n de las ya registradas o bien eliminar una de ellas.')?></li>
		<li><?__('Usted querido usuario como administrador del sitio debera aprobar los comentarios para que estos salgan publicos en el sitio, usted debera comprobar que su contenido es apto para su sitio.')?></li>
	</ul>
</div>

<?
$reg=count($Comments);


 if($reg >=20){
echo $paginator->counter(array(
'format' => __('Pagina %page% de  %pages%, mostrando %current% registros de %count% en total, iniciando en el registro %start%, finalizando en %end%.', true)));
 }

	if($reg > 0)
 	{
?>
<h2>Lista Comentarios: 

</h2>
<table cellpadding="0" cellspacing="0">
<tr>
    <th><?php echo 'Nombre'?></th>
    <th><?php echo 'Estado'?></th>
    <th>Acciones</th>
</tr>

<? $i=1;
foreach($Comments as $row){
?>
<tr <?=($i%2==0)? "class='altRow'": ''?>>
  
    <td><?=$row['Comment']['name']?></td>
    <td class="estados"><?=$row['Comment']['status']=='A'? 'Activa':($row['Comment']['status']=='P'? '<span style="color:red;">Pendiente</span>': 'Inactiva')?></td>
 
    <td class="actions">
		<?  //=$html->link('Ver','/Topics/view/'.$row['Topic']['id'])?>
	<?php //echo $html->link(__('View', true), array('action'=>'view', $row['Topic']['id'])); ?>
			
	     <?php echo $html->link(__('Editar', true), array('action'=>'edit', $row['Comment']['id'])); ?>
			
	    <?
		//if($row['Topic']['id']!='1' and $row['Topic']['id']!='2')
			   echo $html->link(__('Eliminar', true), array('action'=>'delete', $row['Comment']['id']), null, sprintf(__('Esta seguro de eliminar este registro # %s?', true), $row['Comment']['id']));
			   
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
		<li><?php echo $html->link(__('Ingresar un nuevo comentario', true), array('action'=>'add/')); ?></li>
	</ul>
</div>
