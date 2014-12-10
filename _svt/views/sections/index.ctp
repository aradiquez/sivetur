<h1>Lista de Secciones</h1>
<table class="inav" cellpadding="0" cellspacing="0">
 
<tr>
    <th>Secci&oacute;n</th>
     <th>Acciones</th>
</tr>
 
<? $i=1;
foreach($Sections as $row){?>
<tr <? echo ($i%2==0)? "class='altRow'": '';?>>
    <td><?=$row['Section']['title']?></td>

    <td class="actions"> 
        <?=$html->link('Editar','/sections/edit/'.$row['Section']['id'])?>
    </td>
</tr>
<? $i++; }#endforeach;?>
</table>
 
 