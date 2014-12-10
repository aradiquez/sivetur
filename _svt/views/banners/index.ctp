<?	

$tipo="banners";
$showtipo="banner";

?>
<div class="cajainfo">
	<h3><?__('Instrucciones:');?></h3>
	<ul>
		<li><?__('Aqu&iacute; podr&aacute;s agregar un nuevo banner a la lista. adem&aacute;s podr&aacute;s editar la informaci&oacute;n de los ya registrados o bien eliminar uno de ellos.')?></li>
		
		

	</ul>
</div>

<?
$reg=count($Banners);


 if($reg >30){
echo $paginator->counter(array(
'format' => __('Pagina %page% de  %pages%, mostrando %current% registros de %count% en total, iniciando en el registro %start%, finalizando en %end%.', true)));
 }

	if($reg > 0)
 	{
		//pr($yearActivo);
?>
<h2>Lista de Promociones</strong>

</h2>
<table cellpadding="0" cellspacing="0">
<tr>
<th><?php echo $paginator->sort('Banner','name',array());?></th>
	<th><?php echo $paginator->sort('Tipo','tipo');?></th>
    <th><?php echo $paginator->sort('Estado','state');?></th>
    <th>Acciones</th>
</tr>

<? $i=1;
///pr($categories);
foreach($Banners as $row){
?>
<tr <?=($i%2==0)? "class='altRow'": ''?>>
  
    <td><?=$row['Banner']['name']?></td>
    
    <td class="estados"><? 
    switch($row['Banner']['tipo']){
    	case '1':
			echo "Banner 965X102";
		break;
		case '2':
			echo "Panel Izquierdo 164X523";
		break;
		case '3':
			echo "Footer 234X60";
		break;
    }
    ?></td>
    
    <td class="estados"><?=$row['Banner']['state']=='A'? 'Activa':'Inactiva'?></td>
 
    <td class="actions">
		<?  //=$html->link('Ver','/Banner.s/view/'.$row['Banner.']['id'])?>
	<?php //echo $html->link(__('View', true), array('action'=>'view', $row['Banner.']['id'])); ?>
			
	     <?php echo $html->link(__('Editar', true), array('action'=>'edit', $row['Banner']['id'])); ?>
			
	    <?
		//if($row['Banner.']['id']!='1' and $row['Banner.']['id']!='2')
			   echo $html->link(__('Eliminar', true), array('action'=>'delete', $row['Banner']['id']), null, sprintf(__('Esta seguro de eliminar este registro # %s?', true), $row['Banner']['id']));
			   
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
	
	if($reg >30){
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
		<li><?php echo $html->link(__('Ingresar nuevo', true), array('action'=>'add')); ?></li>
	</ul>
</div>
