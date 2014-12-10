<?
//pr($Secphotos);
?>

<h2>Fotos para encabezado <strong><?/*
if(!empty($Secphotos[0]['Secciones']['titulo_seccion_e']))
echo $Secphotos[0]['Secciones']['titulo_seccion_e'];*/ ?></strong>
</h2>
<p>El tama&ntilde;o recomendado para las imagenes es de 708 X 184 pixeles</p>
<?=$html->link('Agregar nueva foto','/secphotos/add/')?>&nbsp;
<?//=$html->link('Ir lista de productos','/productos/index')?>
<? 
	$patha='../../fotos/rotativas/';
		
	$numreg=count($Secphotos);
	if($numreg>0)
 	{
 	?>
	<br/><br/>
	<table cellpadding="0" cellspacing="0">
	<?
	$i=0;
	$j=3;
	  foreach($Secphotos as $row){
	   // $cl=$row['Secphoto']['producto_id'];
	 	
	 	if($i==0)echo '<tr>';
	 	
		 if($i==$j){$i=0;echo "</tr><tr>";}
	 	?>
	
	    <td class="estados">
		<?
             $foto=$row['Secphoto']['filename'];
			 //$path=$patha.'tn_'.$foto;
			 $path=$patha.$foto;
			 $path2=$patha.$foto;
             //echo "<a href='$path2' class='lightview' rel='gallery[myset]'><img src='$path' alt='' width='160'/></a>";
			 echo $html->image($path, array('url' => $path,'width' => '160'));
			 
			  echo "<br/><strong>Foto:</strong> ".$foto."<br/>";
              echo "<strong>Creada:</strong>".$funciones->fnCambiaf_normal($row['Secphoto']['created'])."<br/>";
             // echo "<strong>Estado:</strong> ";
             // echo $row['Secphoto']['estado']=='A'? "Activa":"Inactiva";
              echo "<br/><br/>";
        ?>
	     <?=$html->link('Editar','/secphotos/edit/'.$row['Secphoto']['id'])?>
		 <?=$html->link('Eliminar',"/Secphotos/delete/{$row['Secphoto']['id']}",null,'Esta seguro de eliminar esta foto?')?>
	
	     </td>
	
	<?
	 $i++;
	 }//endforeach;
	 if($i==1) echo '<td colspan="2"></td></tr>';
	 if($i==2) echo '<td colspan="1"></td></tr>';
	 ?>
	</table>
	
<ul class="actions">
    <li><?=$html->link('Agregar nueva foto','/Secphotos/add/')?></li>
</ul>
<?
}#end count
 if($numreg>9){
?>
		<a href="#arriba">Ir arriba...</a><a name="abajo"></a>
  	<? }?>




