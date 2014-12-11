<? 
echo $html->metatitle($seccion['Section']['title']." | ".__('_TITULO', true));

$this->set('SEOH1',$seccion['Section']['title']." | ".__('_TITULO', true).__('_INICIO', true));
	
echo $html->meta('keywords', $seccion['Section']['keyword'].__('_KEYWORDS', true), array('inline' => false))."\n";
	
echo $html->meta('description', $seccion['Section']['description'].__('_DESCRIPCION', true), array('inline' => false))."\n";
?>
<div class="container mt25 offset-0">
			<!-- LEFT CONTENT -->
			<div class="col-md-8 pagecontainer2 offset-0">

				<div class="padding30 grey">
					<span class="size16px bold dark left">Reservaci&oacute;n</span>
					<div class="clearfix"></div>
					<div class="line4"></div>
					<?php echo $this->Form->create('Contacto', array('controller' => 'contacto', 'action' => 'send')); ?>
  					<div class="col-md-4 textright">
  						<div class="margtop15"><span class="dark">Nombre Completo:</span><span class="red">*</span></div>
  					</div>
  					<div class="col-md-8">
  						<?php echo $this->Form->input('Contacto.name', array('label' => false, 'maxlength' => 100, 'placeholder' => 'Nombre', 'class' => 'form-control margtop10')); ?>
  					</div>
  					<div class="clearfix"></div>

  					<div class="col-md-4 textright">
  						<div class="margtop15"><span class="dark">Tel&eacute;fono:</span><span class="red">*</span></div>
  					</div>
  					<div class="col-md-8">
  						<?php echo $this->Form->input('Contacto.phone', array('label' => false, 'maxlength' => 100, 'placeholder' => 'Teléfono', 'class' => 'form-control margtop20')); ?>
  					</div>
  					<div class="clearfix"></div>
				
  					<div class="col-md-4 textright">
  						<div class="margtop15"><span class="dark">Email:</span><span class="red">*</span></div>
  					</div>
  					<div class="col-md-8">
  						<?php echo $this->Form->input('Contacto.email', array('label' => false, 'maxlength' => 100, 'placeholder' => 'Email', 'class' => 'form-control margtop20')); ?>
  					</div>
  					<div class="clearfix"></div>
            
            <div class="col-md-4 textright">
  						<div class="margtop15"><span class="dark">Fecha de reservaci&oacute;n:</span><span class="red">*</span></div>
  					</div>
  					<div class="col-md-4">
  						<?php echo $this->Form->input('Contacto.checkin', array('label' => false, 'maxlength' => 100, 'placeholder' => 'Check in', 'class' => 'form-control datepicker margtop20')); ?>
  					</div>
  					<div class="col-md-4">
  						<?php echo $this->Form->input('Contacto.checkout', array('label' => false, 'maxlength' => 100, 'placeholder' => 'Check out', 'class' => 'form-control datepicker margtop20')); ?>
  					</div>
  					<div class="clearfix"></div>
            
						<br/>
						<div class="col-md-4">
              &nbsp;
            </div>
						<div class="col-md-8">	
							<div class="w50percent">
    						<div class="col-md-6 textright">
    							<div class="margtop7"><span class="dark">Adultos:</span><span class="red">*</span></div>
    						</div>
								<div class="col-md-6">
									<select class="form-control mySelectBoxClass">
									  <option selected>01 JAN</option>
									  <option>02 FEB</option>
									  <option>03 MAR</option>
									  <option>04 APR</option>
									  <option>05 MAY</option>
									  <option>06 JUN</option>
									  <option>07 JUL</option>
									  <option>08 AUG</option>
									  <option>09 SEP</option>
									  <option>10 OCT</option>
									  <option>11 NOV</option>
									  <option>12 DEC</option>
									</select>						
								</div>
							</div>
							<div class="w50percentlast">
    						<div class="col-md-6 textright">
    							<div class="margtop7"><span class="dark">Ni&ntilde;os:</span><span class="red">*</span></div>
    						</div>
								<div class="col-md-6 right">
									<select class="form-control mySelectBoxClass">
									  <option selected>01 JAN</option>
									  <option>02 FEB</option>
									  <option>03 MAR</option>
									  <option>04 APR</option>
									  <option>05 MAY</option>
									  <option>06 JUN</option>
									  <option>07 JUL</option>
									  <option>08 AUG</option>
									  <option>09 SEP</option>
									  <option>10 OCT</option>
									  <option>11 NOV</option>
									  <option>12 DEC</option>
									</select>			
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="col-md-4 textleft">
						</div>
						<div class="clearfix"></div>
            
            
  					<div class="col-md-4 textright">
  						<div class="margtop15"><span class="dark">Comentarios:</span><span class="red">*</span></div>
  					</div>
  					<div class="col-md-8">
  						<?php echo $this->Form->input('Contacto.message', array('label' => false, 'cols' => 50, 'rows' => 9, 'class' => 'form-control margtop10')); ?>
  					</div>
  					<div class="clearfix"></div>
			      <br/>
  					<div class="pull-right red">* required fields.</div><br/>		
            
					  <? echo $this->Form->button("Limpiar", array('type'=>'reset', 'class'=>"btn-search5 margtop20 pull-right"));?>
            <? echo $this->Form->button("Enviar Email", array('type'=>'submit', 'class'=>"bluebtn margtop20 pull-right"));?>
            
            <div class="clearfix"></div>
            
					<?php echo $this->Form->end(); ?>
			
				</div>
		
			</div>
			<!-- END OF LEFT CONTENT -->			
			
			<?php echo $this->element("default/ofertas/_reservation_right_side", array('oferta', $oferta)); ?>	
			
		</div>