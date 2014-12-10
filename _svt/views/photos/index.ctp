<h2>Fotos del Album <strong><?=$nombre_album?></strong></h2>
<?=$html->link('Agregar nueva foto','/photos/add/'.$idg."/".$keynum)?>&nbsp;
<?//=$html->link('Ir lista de productos','/productos/index')?>
<? 
	$numreg=count($Photos);
	if($numreg>0)
 	{
                
         
                
 		if($numreg>9)
		{
?>
			<?="&nbsp;&nbsp;".$html->link('Eliminar todas','/photos/deleteall/'.$idg."/".$keynum,null,'Esta seguro de eliminar todas las fotos?')?>&nbsp;
			&nbsp;<a href="#abajo">Ir al final</a><a name="arriba"></a>
	 <? }?>
	<br/><br/>
	<table cellpadding="0" cellspacing="0">
	<?
	$i=0;
	$j=3;
	  foreach($Photos as $row){
	   // $cl=$row['Photo']['producto_id'];
	 	
	 	if($i==0)echo '<tr>';
	 	
		 if($i==$j){$i=0;echo "</tr><tr>";}
	 	?>
	
	    <td class="estados">
		<?
             $foto=$row['Photo']['filename'];
			 $path='../../../../fotos/';
			 
             echo "<a href='".$path.$foto."' rel='lightbox'><img src='".$path."img.php?i=".$foto."&amp;w=150&amp;h=113' alt=''/></a>";
             
	   // echo $html->link($row['Photo']['filename'], '../../fotos/tn_'.$row['Photo']['filename']); 
              if(!empty($row['Photo']['details']))
              	echo "<br/><strong>Texto:</strong> ".$row['Photo']['details'];
              
			  echo "<br/><strong>Foto:</strong> ".$foto."<br/>";
              echo "<strong>Creada:</strong>".$funciones->fnCambiaf_normal($row['Photo']['created'])."<br/>";
              echo "<strong>Estado:</strong> ";
              echo $row['Photo']['status']=='A'? "Activa":"Inactiva";
              echo "<br/><br/>";
        ?>
	     <?=$html->link('Editar','/photos/edit/'.$row['Photo']['id'])?>
		 <?=$html->link('Eliminar',"/photos/delete/{$row['Photo']['id']}",null,'Esta seguro de eliminar esta foto?')?>
	
	     </td>
	
	<?
	 $i++;
	 }//endforeach;
	 if($i==1) echo '<td colspan="2"></td></tr>';
	 if($i==2) echo '<td colspan="1"></td></tr>';
	 ?>
	</table>
	
<ul class="actions">
    <li><?=$html->link('Agregar nueva foto','/photos/add/'.$idg."/".$keynum)?></li>
    <li><?//=$html->link('Eliminar todas','/photos/deleteall/'.$idg.'/'.$clave,null,'Esta seguro de eliminar todas las fotos?')?></li> 
    <li><?=($keynum==3? $html->link('Ir lista de Albumes',array('controller' => 'albums','action' => '/index')): '');?></li>
</ul>
<?
}#end count
 if($numreg>9){
?>
		<a href="#arriba">Ir arriba...</a><a name="abajo"></a>
  	<? }?>




