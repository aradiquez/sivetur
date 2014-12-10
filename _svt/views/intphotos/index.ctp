<?
//pr($Intphotos);
?>

<h2>Fotos para encabezado <strong><?/*
if(!empty($Intphotos[0]['Intciones']['titulo_intcion_e']))
echo $Intphotos[0]['Intciones']['titulo_intcion_e'];*/ ?></strong>
</h2>

<p>El tama&ntilde;o recomendado para las imagenes es de 709 X 244 pixeles</p>

<?=$html->link('Agregar nueva foto','/intphotos/add/')?>&nbsp;
<?//=$html->link('Ir lista de productos','/productos/index')?>
<? 
	$patha='../../fotos/rotativas/';
		
	$numreg=count($Intphotos);
	if($numreg>0)
 	{
 	?>
	<br/><br/>
	<table cellpadding="0" cellspacing="0">
	<?
	$i=0;
	$j=3;
	  foreach($Intphotos as $row){
	   // $cl=$row['Intphoto']['producto_id'];
	 	
	 	if($i==0)echo '<tr>';
	 	
		 if($i==$j){$i=0;echo "</tr><tr>";}
	 	?>
	
	    <td class="estados">
		<?
             $foto=$row['Intphoto']['filename'];
			 //$path=$patha.'tn_'.$foto;
			 $path=$patha.$foto;
			 $path2=$patha.$foto;
             //echo "<a href='$path2' class='lightview' rel='gallery[myset]'><img src='$path' alt='' width='160'/></a>";
			 echo $html->image($path, array('url' => $path,'width' => '160'));
			 
			  echo "<br/><strong>Foto:</strong> ".$foto."<br/>";
              echo "<strong>Creada:</strong>".$funciones->fnCambiaf_normal($row['Intphoto']['created'])."<br/>";
             // echo "<strong>Estado:</strong> ";
             // echo $row['Intphoto']['estado']=='A'? "Activa":"Inactiva";
              echo "<br/><br/>";
        ?>
	     <?=$html->link('Editar','/intphotos/edit/'.$row['Intphoto']['id'])?>
		 <?=$html->link('Eliminar',"/intphotos/delete/{$row['Intphoto']['id']}",null,'Esta seguro de eliminar esta foto?')?>
	
	     </td>
	
	<?
	 $i++;
	 }//endforeach;
	 if($i==1) echo '<td colspan="2"></td></tr>';
	 if($i==2) echo '<td colspan="1"></td></tr>';
	 ?>
	</table>
	
<ul class="actions">
    <li><?=$html->link('Agregar nueva foto','/intphotos/add/')?></li>
</ul>
<?
}#end count
 if($numreg>9){
?>
		<a href="#arriba">Ir arriba...</a><a name="abajo"></a>
  	<? }?>




