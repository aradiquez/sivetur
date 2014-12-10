<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Lista de Secciones</div>
	<table class="table">
	<thead>
		<tr>
		    <th>Secci&oacute;n</th>
		     <th>Acciones</th>
		</tr>
	</thead>
	<tbody> 
		<? $i=1;
		foreach($Sections as $row){?>
		<tr <? echo ($i%2==0)? "class='altRow'": '';?>>
		    <td><?=$row['Section']['title']?></td>

		    <td class="actions"> 
		        <?=$html->link('Editar','/sections/edit/'.$row['Section']['id'], array('class'=>"btn btn-warning", 'role'=>"button"))?>
            <?= $row['Section']['id'] != 1 && $row['Section']['id'] != 6 ? $html->link('Agregar Fotos','/photos/index/'.$row['Section']['id']."/1", array('class'=>"btn btn-primary", 'role'=>"button")) : ""?>
		    </td>
		</tr>
		<? $i++; }#endforeach;?>
	</tbody>
	</table>
 </div>
 