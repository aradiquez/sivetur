<div class="panel">
   <h2>Editar parametros:</h2>
	<?
		$ref='/params/edit/';
        echo $javascript->link('fckeditor');
        echo $javascript->link('funciones');

		$ref='edit/';
		echo $form->create('Param',array('action'=>$ref,'type'=>'file'));
		echo $form->input('id', array('type'=>'hidden', 'value'=> $form->value('Param.id')));

if(isset($error)){
            pr($error);
        } 

echo "<fieldset class='fieldset'><legend>Home Slide</legend>";
	echo "<div class='input-group'>";
	      echo $form->input('Param.elementos_slide_home', array('type' => 'text', 'label'=>'Cantidad de elementos para el slide del home: ','size'=>'10','maxlength'=>'3','class'=>"form-control"));
	echo "</div>";
  echo "<br/>";
	echo "<div class='input-group'>";
        echo "<span>Categoria de elementos para el slide del home:</span>";
        echo $tree->createSelectRelated('Param/categoria_elementos_slide_home/ProgramasCircuito/name/id', $categorias, $form->value('Param.categoria_elementos_slide_home'));
	      #echo $form->input('Param.categoria_elementos_slide_home', array('type' => 'text', 'label'=>'Categoria de elementos para el slide del home: ','size'=>'10','maxlength'=>'3','class'=>"form-control"));
	echo "</div>";
echo "</fieldset>";

echo "<fieldset class='fieldset'><legend>General</legend>";
	echo "<div class='input-group'>";
	      echo $form->input('Param.correo_general', array('type' => 'text', 'label'=>'Correo para contacto: ','size'=>'30','maxlength'=>'100','class'=>"form-control"));
	echo "</div>";
	echo "<div class='input-group'>";
	      echo $form->input('Param.correo_alternativo', array('type' => 'text', 'label'=>'Correo alternativo: ','size'=>'30','maxlength'=>'100','class'=>"form-control"));
	echo "</div>";
	echo "<div class='input-group'>";
      echo "<span>Tama&ntilde;o de la paginaci&oacute;n: </span>";
      echo $form->input('Param.paginacion',  array( 'type' => 'select','label'=>false,'options'=>$paginacionArray,'selected'=>$paginacionPrioridad, 'empty'=>false, 'class'=>"form-control"));
      #echo $form->input('Param.paginacion', array('type' => 'text', 'label'=>'Tama&ntilde;o de la paginaci&oacute;n: ','size'=>'10','maxlength'=>'2','class'=>"form-control"));
	echo "</div>";
echo "</fieldset>";

echo "<fieldset class='fieldset'><legend>Social Media Links</legend>";
	echo "<div class='input-group'>";
	      echo $form->input('Param.link_facebook', array('type' => 'text', 'label'=>'Link a la pagina de facebook: ','size'=>'40','maxlength'=>'250','class'=>"form-control"));
	echo "</div>";
	
	echo "<div class='input-group'>";
	      echo $form->input('Param.link_twitter', array('type' => 'text', 'label'=>'Link a la pagina de twitter: ','size'=>'40','maxlength'=>'250','class'=>"form-control"));
	echo "</div>";
	
	echo "<div class='input-group'>";
	      echo $form->input('Param.link_google', array('type' => 'text', 'label'=>'Link a la pagina de google plus: ','size'=>'40','maxlength'=>'250','class'=>"form-control"));
	echo "</div>";
	
	echo "<div class='input-group'>";
	      echo $form->input('Param.link_youtube', array('type' => 'text', 'label'=>'Link a la pagina de youtube: ','size'=>'40','maxlength'=>'250','class'=>"form-control"));
	echo "</div>";
echo "</fieldset>";

echo "<fieldset class='fieldset'><legend>Home Main Sections</legend>";
	echo "<div class='input-group'>";
	      echo $form->input('Param.last_minute_title', array('type' => 'text', 'label'=>'Titulo last Minute: ','size'=>'10','maxlength'=>'100','class'=>"form-control"));
	echo "</div>";

	echo "<div class='input-group'>";
	      echo $form->input('Param.elementos_last_minute', array('type' => 'text', 'label'=>'Cantidad de elementos para last Minute: ','size'=>'10','maxlength'=>'3','class'=>"form-control"));
	echo "</div>";
	
	echo "<div class='input-group'>";
	      echo $form->input('Param.start_date_last_minute', array('type' => 'text', 'label'=>'start date last minute: ','size'=>'10','maxlength'=>'10', 'class' => 'datepicker form-control'));
	echo "</div>";
	
	echo "<div class='input-group'>";
	      echo $form->input('Param.end_date_last_minute', array('type' => 'text', 'label'=>'end date last minute: ','size'=>'10','maxlength'=>'10', 'class' => 'datepicker form-control'));
	echo "</div>";
	
	echo "<div class='input-group'>";
	      echo $form->input('Param.early_booking_title', array('type' => 'text', 'label'=>'Titulo Early Booking: ','size'=>'10','maxlength'=>'100','class'=>"form-control"));
	echo "</div>";

	echo "<div class='input-group'>";
	      echo $form->input('Param.elementos_early_booking', array('type' => 'text', 'label'=>'Cantidad de elementos para Early Booking: ','size'=>'3','maxlength'=>'3','class'=>"form-control"));
	echo "</div>";
	
	echo "<div class='input-group'>";
	      echo $form->input('Param.start_date_early_booking', array('type' => 'text', 'label'=>'start date early booking: ','size'=>'10','maxlength'=>'10', 'class' => 'datepicker form-control'));
	echo "</div>";
	
	echo "<div class='input-group'>";
	      echo $form->input('Param.end_date_early_booking', array('type' => 'text', 'label'=>'end date early booking: ','size'=>'10','maxlength'=>'10', 'class' => 'datepicker form-control'));
	echo "</div>";
	
	echo "<div class='input-group'>";
	      echo $form->input('Param.hot_deals_title', array('type' => 'text', 'label'=>'Titulo Hot Deals: ','size'=>'10','maxlength'=>'100','class'=>"form-control"));
	echo "</div>";
	
	echo "<div class='input-group'>";
	      echo $form->input('Param.start_date_hot_deals', array('type' => 'text', 'label'=>'start date hot deals: ','size'=>'10','maxlength'=>'10', 'class' => 'datepicker form-control'));
	echo "</div>";
	
	echo "<div class='input-group'>";
	      echo $form->input('Param.end_date_hot_deals', array('type' => 'text', 'label'=>'end date hot deals: ','size'=>'10','maxlength'=>'10', 'class' => 'datepicker form-control'));
	echo "</div>";
echo "</fieldset>";
	
echo "<fieldset class='fieldset'><legend>Middle Sections</legend>";	
	echo "<div class='input-group'>";
	      echo $form->input('Param.top_deals_title', array('type' => 'text', 'label'=>'Titulo Top Deals: ','size'=>'10','maxlength'=>'100','class'=>"form-control"));
	echo "</div>";

	echo "<div class='input-group'>";
	      echo $form->input('Param.elementos_top_deals', array('type' => 'text', 'label'=>'Cantidad de elementos para Top Deals: ','size'=>'10','maxlength'=>'3','class'=>"form-control"));
	echo "</div>";
	
	echo "<div class='input-group'>";
        echo "<span>categoria elementos top deals:</span>";
        echo $tree->createSelectRelated('Param/categoria_elementos_top_deals/ProgramasCircuito/name/id', $categorias, $form->value('Param.categoria_elementos_top_deals'));
	      #echo $form->input('Param.categoria_elementos_hot_deals', array('type' => 'text', 'label'=>'categoria elementos hot deals: ','size'=>'10','maxlength'=>'10','class'=>"form-control"));
	echo "</div>";
	
	echo "<div class='input-group'>";
	      echo $form->input('Param.feature_offers_title', array('type' => 'text', 'label'=>'Titulo feature offers: ','size'=>'10','maxlength'=>'100','class'=>"form-control"));
	echo "</div>";

	echo "<div class='input-group'>";
	      echo $form->input('Param.elementos_feature_offers', array('type' => 'text', 'label'=>'elementos feature offers: ','size'=>'10','maxlength'=>'3','class'=>"form-control"));
	echo "</div>";
	echo "<br/>";
	echo "<div class='input-group'>";
        echo "<span>categoria elementos feature offers:</span>";
        echo $tree->createSelectRelated('Param/categoria_elementos_feature_offers/ProgramasCircuito/name/id', $categorias, $form->value('Param.categoria_elementos_feature_offers'));
	      #echo $form->input('Param.categoria_elementos_feature_offers', array('type' => 'text', 'label'=>'categoria elementos feature offers: ','size'=>'10','maxlength'=>'3','class'=>"form-control"));
	echo "</div>";
echo "</fieldset>";


echo "<fieldset class='fieldset'><legend>Footer Home Page</legend>";
	echo "<div class='input-group'>";
	      echo $form->input('Param.titulo_footer_bloquea', array('type' => 'text', 'label'=>'Titulo para elemento del footer A: ','size'=>'50','maxlength'=>'50','class'=>"form-control"));
	echo "</div>";
	echo "<br/>";
	echo "<div class='input-group'>";
        echo "<span>Categoria para elemento del footer A:</span>";
        echo $tree->createSelectRelated('Param/categoria_footer_bloquea/ProgramasCircuito/name/id', $categorias, $form->value('Param.categoria_footer_bloquea'));
	      #echo $form->input('Param.categoria_footer_bloquea', array('type' => 'text', 'label'=>'Categoria para elemento del footer A: ','size'=>'10','maxlength'=>'11','class'=>"form-control"));
	echo "</div>";
	
	echo "<div class='input-group'>";
	      echo $form->input('Param.titulo_footer_bloqueb', array('type' => 'text', 'label'=>'Titulo para elemento del footer B: ','size'=>'50','maxlength'=>'50','class'=>"form-control"));
	echo "</div>";
	
	echo "<div class='input-group'>";
        echo "<span>Categoria para elemento del footer B:</span>";
        echo $tree->createSelectRelated('Param/categoria_footer_bloqueb/ProgramasCircuito/name/id', $categorias, $form->value('Param.categoria_footer_bloqueb'));
	      #echo $form->input('Param.categoria_footer_bloqueb', array('type' => 'text', 'label'=>'Categoria para elemento del footer B: ','size'=>'10','maxlength'=>'11','class'=>"form-control"));
	echo "</div>";
	
	echo "<div class='input-group'>";
	      echo $form->input('Param.titulo_footer_telefono', array('type' => 'text', 'label'=>'Titulo para elemento telefono: ','size'=>'50','maxlength'=>'50','class'=>"form-control"));
	echo "</div>";
	
	echo "<div class='input-group'>";
	      echo $form->input('Param.footer_telefono', array('type' => 'text', 'label'=>'Numero de telefono: ','size'=>'50','maxlength'=>'50','class'=>"form-control"));
	echo "</div>";
	
	echo "<div class='input-group'>";
	      echo $form->input('Param.footer_correo', array('type' => 'text', 'label'=>'correo para mostrar en el footer: ','size'=>'50','maxlength'=>'100','class'=>"form-control"));
	echo "</div>";
echo "</fieldset>";

echo "<div style='clear: both;'></div>";

echo "<div class='input-group'>";
	echo $form->label('Param.privacy', 'privacy: ');
    echo $form->textarea('Param.privacy', array('rows'=>"8", 'cols'=>"150",'class'=>"form-control"));
echo "</div>"; 
echo "<div style='clear: both;'></div><br/>";
echo '<div class="input-group">';
	echo $form->end(array('label' => 'Actualizar', 'class' => 'btn btn-primary btn-lg'));
echo "</div>";   

?>
 </div>