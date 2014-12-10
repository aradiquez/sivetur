<div class="cajainfo">
	<h3><?__('Instrucciones:');?></h3>
	<ul>
		<li><?__('Aqu&iacute; podr&aacute;s agregar una nueva Opcion, o bien modificar una de la existentes.')?></li>
		
		<li><?__('Podra crear tantas opciones como desee para cada encuesta.')?></li>

	</ul>
</div>
<?//pr($Encuesta);?>

<h2>Pregunta: <strong> <?=$Encuesta['Encuesta']['name']?></strong></h2>

<?
$reg=count($Opciones);


 if($reg >=20){
echo $paginator->counter(array(
'format' => __('Pagina %page% de  %pages%, mostrando %current% registros de %count% en total, iniciando en el registro %start%, finalizando en %end%.', true)));
 }

	if($reg > 0)
 	{
?>
<h2>Opciones: 

</h2>
<table cellpadding="0" cellspacing="0">
<tr>
    <th><?php echo 'Opcion'?></th>
    <th><?php echo 'Estado'?></th>
    <th>Acciones</th>
</tr>

<? $i=1; //pr($Opciones);
foreach($Opciones as $row){
?>
<tr <?=($i%2==0)? "class='altRow'": ''?>>
  
    <td><?=$row['Opcione']['name']?></td>
    <td class="estados"><?=$row['Opcione']['status']=='A'? 'Activa':'Inactiva'?></td>
    <td class="actions">
		<?  //=$html->link('Ver','/Encuestas/view/'.$row['Encuesta']['id'])?>
	<?php //echo $html->link(__('View', true), array('action'=>'view', $row['Encuesta']['id'])); ?>
			
	     <?php echo $html->link(__('Editar', true), array('action'=>'edit', $row['Opcione']['id'])); ?>
			
	    <?
		//if($row['Encuesta']['id']!='1' and $row['Encuesta']['id']!='2')
			   echo $html->link(__('Eliminar', true), array('action'=>'delete', $row['Opcione']['id']), null, sprintf(__('Esta seguro de eliminar este registro # %s?', true), $row['Opcione']['id']));
			   
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


<div class="panel">
<h2><?php __('Agregar Opcion');?></h2>
<?

echo $form->create('Opcione',array('type'=>'file', 'action' => '/index'));
echo $form->input('encuesta_id',array('type'=>'hidden', 'value'=> $re));

echo "<div class='opcional'>";
     echo $form->input('Opcione.name', array('type' => 'text', 'label'=>'Nombre: <span style="color:red">*</span>'));
     
     	if(isset($err_reg_unico))
           echo $err_reg_unico;
     
echo "</div>";

echo "<div id='wraper'>";
        echo "<div class='wraperContenedor'>";
            echo "<div class='opcional'>";
                 echo $form->input('Opcione.status', array( 'type' => 'select','label'=>'Estado:','options'=>$estadoArray,'selected'=>$selectedEstado, 'empty'=>false));
            echo "</div>";
        echo "</div>";

echo "</div>";


echo $form->end('Enviar');

echo "</div>";

?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Lista de Encuestas', true), array('controller' =>'encuestas', 'action'=>'index'));?></li>
	</ul>
</div>