<div class="cajainfo">
	<h3><?__('Instrucciones:');?></h3>
	<ul>
		<li><?__('Aqu&iacute; podr&aacute;s agregar recursivamente informacion de la empresa adem&aacute;s podr&aacute;s editar la informaci&oacute;n de las ya registradas o bien eliminar una de ellas.')?></li>
		<li>Cada uno de las Empresas tendra una raiz o un nodo padre, el cual al ser eliminado, borrará los demás nodos agregados al mismo.</li>
		<li>Si algun nodo no posee nodo padre significa que el mismo es la raíz del arbol</li>
		<li>La estructura del arbol se mostrara en forma lineal pero identada, con el fin de saber los diferentes niveles del arbol</li>
	</ul>
</div>

<?
$reg=count($Empresas);


 if($reg >=20){
echo $paginator->counter(array(
'format' => __('Pagina %page% de  %pages%, mostrando %current% registros de %count% en total, iniciando en el registro %start%, finalizando en %end%.', true)));
 }

	if($reg > 0)
 	{
?>
<h2>Lista de Empresas: 

</h2>
<table cellpadding="0" cellspacing="0">
<tr>
    <th><?php echo 'Empresas'?></th>
    <th>Agregar nodo hijo</th>
    <th>Fotos</th>
    <th>Acciones</th>
</tr>

<? $i=1;

foreach($Empresas as $dir => $row){
?>
<tr <?=($i%2==0)? "class='altRow'": ''?>>
  
    <td><?=$row?></td>
 	
    <td class="actions"><?=$html->link(__('Agregar',true),array('action' => 'add/',$dir));?></td>
    <td class="actions"><?=$html->link(__('Adminitrar',true),array('controller'=>'photos','action' => 'index/',$dir,'1'));?></td>
    <td class="actions">			
	     <?php echo $html->link(__('Editar', true), array('action'=>'edit', $dir)); ?>
	    <?
	   		echo $html->link(__('Eliminar', true), array('action'=>'delete', $dir), null, sprintf(__('Esta seguro de eliminar este registro # %s?', true), $dir));
	   
	   ?>
    </td>
</tr>
<?
	$i++;
 }//endforeach;
 //aqui salen los inactivos
 if(!empty($Inactivos)){
 	echo "<td colspan='3' style=' background:#E2E2E2;'><span style='color:red; font-weight:bold; text-align:center; display:block;'>Registros Inactivos</span></td>";
 	foreach($Inactivos as $dir => $row){
	?>
	<tr <?=($i%2==0)? "class='altRow'": ''?>>
	  
	    <td><?=$row?></td>
	 
	    <td class="actions"><?=$html->link(__('Agregar',true),array('action' => 'add/',$dir));?></td>
	    
	    <td class="actions">			
		     <?php echo $html->link(__('Editar', true), array('action'=>'edit', $dir)); ?>
		    <?
		   		echo $html->link(__('Eliminar', true), array('action'=>'delete', $dir), null, sprintf(__('Esta seguro de eliminar este registro # %s?', true), $dir));
		   
		   ?>
	    </td>
	</tr>
	<? $i++;
	 }//endforeach;
 	
 }//fin del if Inactiuvos
 
 ?>
</table>
<?
	}#end count
?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Ingresar un nuevo nodo padre', true), array('action'=>'add/')); ?></li>
	</ul>
</div>
