 <h2>Vista de los datos de la noticia</h2>

 <table cellpadding="0" cellspacing="0">
    
    <tr>
       <td style="width:120px"><?='Tópico:'?></td>
       <td><?='<strong>'.$Noticia['Topico']['topico_e'].'</strong>'?></td>
    </tr>
	
	<tr class="altRow">
       <td><?='Título:'?></td>
       <td><?='<strong>'.$Noticia['Noticia']['titulo_e'].'</strong>'?></td>
    </tr>
	<tr>
       <td><?='Título: (ing)'?></td>
       <td><?=$Noticia['Noticia']['titulo_i']?></td>
    </tr>
    <tr class="altRow">
       <td><?='Encabezado:'?></td>
       <td><?=$Noticia['Noticia']['encabezado_e']?></td>
    </tr>
    <tr>
       <td><?='Encabezado: (ing)'?></td>
       <td><?=$Noticia['Noticia']['encabezado_i']?></td>
    </tr>
    
    <tr class="altRow">
       <td><?='Introducción:'?></td>
       <td><?=$Noticia['Noticia']['intro_e']?></td>
    </tr>
     <tr>
       <td><?='Introducción: (ing)'?></td>
       <td><?=$Noticia['Noticia']['intro_i']?></td>
    </tr>
    
    <tr class="altRow">
       <td><?='Descripción:'?></td>
       <td><?=$Noticia['Noticia']['detalle_e']?></td>
    </tr>
     <tr>
       <td><?='Descripción: (ing)'?></td>
       <td><?=$Noticia['Noticia']['detalle_i']?></td>
    </tr>

    <tr class="altRow">
       <td><?='Estado :'?></td>
       <td><?='<strong>'.($Noticia['Noticia']['estado']=='A'? 'Activo':'Inactivo').'</strong>'?></td>
    </tr>
	
	<tr>
       <td><?='<strong>Fotos:</strong>'?></td>
       <td>
	   <?
	    $path='../../../fotos/tn_';
        $path2='../../../fotos/';
        
		$foto1=$Noticia['Noticia']['foto1'];
		$foto2=$Noticia['Noticia']['foto2'];
		$foto3=$Noticia['Noticia']['foto3'];
		//$foto4=$Clientes['Cliente']['foto4'];
		//$foto5=$Clientes['Cliente']['foto5'];
		
		if (!empty($foto1))
		{
          echo "<div class='imgn'><a href='".$path2.$foto1."' target='_blank' title='foto 1'><img src='".$path.$foto1."' alt='foto 1'/></a></div>";
        }
        if (!empty($foto2))
		{
          echo "<div class='imgn'><a href='".$path2.$foto2."' target='_blank' title='foto 2'><img src='".$path.$foto2."' alt='foto 2'/></a></div>";
        }
		if (!empty($foto3))
		{
          echo "<div class='imgn'><a href='".$path2.$foto3."' target='_blank'><img src='".$path.$foto3."' alt='' /></a></div>";
        } 
		/*if (!empty($foto4))
		{
          echo "<div class='imgn'><a href='".$path2.$foto4."' target='_blank'><img src='".$path.$foto4."'/></a></div>";
        } 
		if (!empty($foto5))
		{
          echo "<div class='imgn'><a href='".$path2.$foto5."' target='_blank'><img src='".$path.$foto5."'/></a></div>";
        } */   
		?>
       </td>
    </tr>      
</table>

<ul class="actions">
	<li><?=$html->link('Ir lista de noticias','/noticias/index')?></li>
    <li><?=$html->link('Editar esta noticia','/noticias/edit/'.$Noticia['Noticia']['id'])?></li>
    <li><?=$html->link('Ingresar nueva noticia','/noticias/add/')?></li>
</ul>
 

