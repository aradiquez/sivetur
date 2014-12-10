<div class="page-header">
  <h1>Fotos del Album <small><?=$nombre_album?></small></h1>
</div>
<?=$html->link('Agregar nueva foto','/photos/add/'.$idg."/".$key, array('class'=>"btn btn-primary"))?>
<br/><br/>
<div class="well">
  <div class="row">
	    <?foreach($Photos as $row){
        $foto=$row['Photo']['name'];
			  $path='../../../../fotos/';?>
        <div class="col-xs-6 col-md-3">
          <div class="thumbnail <?=$row['Photo']['first'] == 1 ? 'first_active' : ''?>">
            <?= "<a href='".$path.$foto."' data-footer='".$foto."' data-title='".$foto."' data-gallery=\"multiimages\" data-toggle=\"lightbox\"><img src='".$path."img.php?i=".$foto."&amp;w=200&amp;h=113' alt=''/></a>"; ?>
            <div class="caption">
              <p><?=$row['Photo']['details']?>&nbsp;</p>
              <p><?="<strong>Creada:</strong>".$funciones->fnCambiaf_normal($row['Photo']['created'])."<br/>"; ?>
                 <?="<strong>Estado:</strong> ".($row['Photo']['status']=='A'? "Activa":"Inactiva"); ?></p>
              <p><?=$html->link('Editar','/photos/edit/'.$row['Photo']['id'], array('class' => "btn btn-primary"))?>
           		  <?=$html->link('Eliminar',"/photos/delete/{$row['Photo']['id']}",array('class' => "btn btn-default"),'Esta seguro de eliminar esta foto?')?>
                <div style="clear: both;"></div>
                <?= $row['Photo']['first'] == 1 ? "" : $html->link('Poner como Primera',"/photos/set_primary/{$row['Photo']['id']}",array('class' => "btn btn-warning"))?></p>
            </div>
          </div>
        </div>
        <? }//endforeach ?>
        
        <?=count($Photos) == 0 ? "No hay ninguna foto aun... agrege una! " : ""?>
	</div>
  
</div>

<?=$html->link('Agregar nueva foto','/photos/add/'.$idg."/".$key, array('class'=>"btn btn-primary"))?>



