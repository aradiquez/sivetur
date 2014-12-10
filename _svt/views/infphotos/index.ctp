<h2>Fotos de Informacion <strong><?=$nombre_info['Informacione']['name_e']?></strong></h2>
<?=$html->link('Agregar nueva foto','/infphotos/add/'.$idg)?>&nbsp;
<?//=$html->link('Ir lista de productos','/productos/index')?>
<? 
	$numreg=count($Infphotos);
	if($numreg>0)
 	{
                
         
                
 		if($numreg>9)
		{
?>
			<?="&nbsp;&nbsp;".$html->link('Eliminar todas','/infphotos/deleteall/'.$idg,null,'Esta seguro de eliminar todas las fotos?')?>&nbsp;
			&nbsp;<a href="#abajo">Ir al final</a><a name="arriba"></a>
	 <? }?>
	<br/><br/>
	<table cellpadding="0" cellspacing="0">
	<?
	$i=0;
	$j=3;
	  foreach($Infphotos as $row){
	   // $cl=$row['Photo']['producto_id'];
	 	
	 	if($i==0)echo '<tr>';
	 	
		 if($i==$j){$i=0;echo "</tr><tr>";}
	 	?>
	
	    <td class="estados">
		<?
             $foto=$row['Infphoto']['filename'];
			 $path='../../../fotos/informationes/tn_'.$foto;
			 $path2='../../../fotos/informationes/'.$foto;
             echo "<a href='$path2' class='lightview' rel='gallery[myset]'><img src='$path' alt=''/></a>";
             
	   // echo $html->link($row['Photo']['filename'], '../../fotos/tn_'.$row['Photo']['filename']); 
              if(!empty($row['Infphoto']['description_e']))
              	echo "<br/><strong>Texto:</strong> ".$row['Infphoto']['description_e'];
              if(!empty($row['Infphoto']['description_i']))
				echo "<br/><strong>Texto Ing:</strong> ".$row['Infphoto']['description_i']."<br/>";
              
			  echo "<br/><strong>Foto:</strong> ".$foto."<br/>";
              echo "<strong>Creada:</strong>".$funciones->fnCambiaf_normal($row['Infphoto']['created'])."<br/>";
              echo "<strong>Estado:</strong> ";
              echo $row['Infphoto']['state']=='A'? "Activa":"Inactiva";
              echo "<br/><br/>";
        ?>
	     <?=$html->link('Editar','/infphotos/edit/'.$row['Infphoto']['id'])?>
		 <?=$html->link('Eliminar',"/infphotos/delete/{$row['Infphoto']['id']}",null,'Esta seguro de eliminar esta foto?')?>
	
	     </td>
	
	<?
	 $i++;
	 }//endforeach;
	 if($i==1) echo '<td colspan="2"></td></tr>';
	 if($i==2) echo '<td colspan="1"></td></tr>';
	 ?>
	</table>
	
<ul class="actions">
    <li><?=$html->link('Agregar nueva foto','/infphotos/add/'.$idg)?></li>
    <li><?//=$html->link('Eliminar todas','/photos/deleteall/'.$idg.'/'.$clave,null,'Esta seguro de eliminar todas las fotos?')?></li> 
    <li><?=$html->link('Ir lista de informaciones','/informaciones/index')?></li>
</ul>
<?
}#end count
 if($numreg>9){
?>
		<a href="#arriba">Ir arriba...</a><a name="abajo"></a>
  	<? }?>
