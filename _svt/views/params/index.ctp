<div class="cajainfo">
	<h3>Instrucciones:</h3>
	<ul>
		<li>Con estas opciones podr&aacute;s agregar un nuevo usuario a la lista, editar la informaci&oacute;n de los ya registrados, o bien eliminar uno de ellos.</li>
		<li> Estos usuarios seran los que podran hacer cambios en sus anuncios y demas, ellos podran estar relacionados a una provincia, canton y distrito.</li>	
	</ul>
</div>

<? 
	//pr($Params);
	//exit;
	
	if(count($Params)>0)
 	{
                
/*echo $paginator->counter(array(
'format' => __('Pagina %page% de  %pages%, mostrando %current% registros de %count% en total, iniciando en el registro %start%, finalizando en %end%.', true)));
 */
?>
<h2>Parametros del sitio</h2>

<table cellpadding="0" cellspacing="0">
 <thead>
<tr>
    <th>Contacto</th>
    <th>Facebook</th>
    <th>Twitter</th>
    <th>Paginaci&oacute;n</th>
    <th>Acciones</th>
</tr>
  </thead>
<tbody>
<? $i=1; 
foreach($Params as $row){
?>
<tr <?=($i%2==0)? "class='altRow'": ''?>>
    <td class="actions"><?=$row['Param']['correo']?></td>
    <td class="actions"><?=$row['Param']['facebook']?></td>
    <td class="actions"><?=$row['Param']['twitter']?></td>
    <td class="actions"><?=$row['Param']['paginacion']?></td>

    <td class="actions" >
	    <?=$html->link('Editar','/params/edit/'.$row['Param']['id'])?>
    </td>
</tr>
<? 
	$i++; 
	}#endforeach;
?>
</tbody>
</table>
<?
	}#end count
?>
<div class="paging">
        <?
/*        
if(count($Params)>0)
 	{ 
        ?>
	<?php //echo $paginator->prev('<< '.__('anterior', true), array(), null, array('class'=>'disabled'));?> | <?php echo $paginator->numbers();?>
	<?php  //echo $paginator->next(__('siguiente', true).' >>', array(), null, array('class'=>'disabled'));?>
<?
    } */
?>
</div>
