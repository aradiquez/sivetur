<? $this->layout='contacto';?>
<? 
echo $html->metatitle($seccion['Section']['title']." | ".__('_TITULO', true));

$this->set('SEOH1',$seccion['Section']['title']." | ".__('_TITULO', true).__('_INICIO', true));
	
echo $html->meta('keywords', $seccion['Section']['keyword'].__('_KEYWORDS', true), array('inline' => false))."\n";
	
echo $html->meta('description', $seccion['Section']['description'].__('_DESCRIPCION', true), array('inline' => false))."\n";

$parametros = $this->requestAction('/homes/getParams');
?>

<div class="container mt-200 z-index100">		
  <div class="row">
	<div class="col-md-12">
		<div class="bs-example bs-example-tabs cstyle04">
		  <?php echo $this->Form->create('Contacto', array('controller' => 'contacto', 'action' => 'send')); ?>
  			<div class="tab-content">
          <? if ($this->Session->check('Message.flash')) {?>
            <div class="alert alert-success" role="alert">
              <?php echo $this->Session->flash(); ?>
            </div>  
          <? } ?>
  				<div class="col-md-4">
  					<span class="opensans size24 slim"><?= $seccion['Section']['title']?></span>
            <?php echo $this->Form->input('Contacto.name', array('label' => false, 'maxlength' => 100, 'placeholder' => 'Nombre', 'class' => 'form-control logpadding margtop10')); ?>
            <?php echo $this->Form->input('Contacto.phone', array('label' => false, 'maxlength' => 100, 'placeholder' => 'Teléfono', 'class' => 'form-control logpadding margtop20')); ?>
            <?php echo $this->Form->input('Contacto.email', array('label' => false, 'maxlength' => 100, 'placeholder' => 'Email', 'class' => 'form-control logpadding margtop20')); ?>
  				</div>
  				<div class="col-md-4">
            <?php echo $this->Form->input('Contacto.message', array('label' => false, 'cols' => 50, 'rows' => 9, 'class' => 'form-control margtop10')); ?>
  				</div>
  				<div class="col-md-4 opensans grey">
  					Direcci&oacute;n:<br/>
  					<span class="dark">
  						Del edificio Colon, 150 mts norte.<br/> 
              Frente a Rios Tropicales
  					</span>
  					<br/>
  					Tel&eacute;fono<br/>
  					<p class="opensans size30 lblue xslim"><?=$parametros['Params']['footer_telefono']?></p>
  					Email<br/>
  					<a href="mailto:<?=$parametros['Params']['footer_correo']?>" class="green2"><?=$parametros['Params']['footer_correo']?></a>
  				</div>
  			</div>
			
  			<div class="searchbg3">
          <? echo $this->Form->button("Enviar Email", array('type'=>'submit', 'class'=>"btn-search right mr20"));?>
  			</div>
			<?php echo $this->Form->end(); ?>
      
		</div>
	</div>
  </div>
</div>
    
<?php echo $this->Html->script('initialize-google-map-contact'); ?>