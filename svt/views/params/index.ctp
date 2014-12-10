<div class="alert alert-info fade in margtop20">
	<h3>Instrucciones:</h3>
	<ul>
		<li>Con estas opciones podr&aacute;s agregar un nuevo usuario a la lista, editar la informaci&oacute;n de los ya registrados, o bien eliminar uno de ellos.</li>
		<li> Estos usuarios seran los que podran hacer cambios en sus anuncios y demas, ellos podran estar relacionados a una provincia, canton y distrito.</li>	
	</ul>
</div>

<?  if(count($Params)>0){ ?>
	<div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading">Parametros del sitio</div>
		<table class='table'>
		 <thead>
			<tr>
			    <th>Contacto General</th>
			    <th>Correo Alternativo</th>
			    <th>Paginaci&oacute;n</th>
			    <th>Acciones</th>
			</tr>
		  </thead>
			<tbody>
			<? $i=1; 
			foreach($Params as $row){ ?>
			<tr <?=($i%2==0)? "class='altRow'": ''?>>
			    <td class="actions"><?=$row['Param']['correo_general']?></td>
			    <td class="actions"><?=$row['Param']['correo_alternativo']?></td>
			    <td class="actions"><?=$row['Param']['paginacion']?></td>

			    <td class="actions" >
				    <?=$html->link('Editar','/params/edit/'.$row['Param']['id'], array('class'=>"btn btn-warning", 'role'=>"button"))?>
			    </td>
			</tr>
			<?  $i++;  }#endforeach; ?>
			</tbody>
		</table>
	</div>
<? }#end count ?>


