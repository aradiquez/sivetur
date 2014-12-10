<?= $javascript->link('ckeditor/ckeditor.js')?>
<? echo  "<div class='panel'>"; 
 
 echo "<h2>Nuevo Colaboradore</h2>";
 
    echo $form->create('Colaboradore', array('type' => 'file'));
?> 
<?php echo $this->element("form_errors"); ?>

<fieldset>
    <div class="input-group">
        <?= $this->Html->tag('span', 'Nombre: <span style="color:red">*</span>',array('class'=>"input-group-addon")); ?>
        <?=$form->input('Colaboradore.nombre', array('type' => 'text', 'label'=> false,'size' => '35','maxlength'=>'100','class'=>"form-control"))?>
    </div>
    <br/>
    <div class="input-group">
        <?= $this->Html->tag('span', 'Departamento:',array('class'=>"input-group-addon")); ?>
        <?=$form->input('Colaboradore.departamento', array('type' => 'text', 'label'=> false,'size' => '35','maxlength'=>'100','class'=>"form-control"))?>
    </div>
    <br/>
  	<div class='require'>
  		  <?=$form->label("Colaboradore.detalle", 'Detalle: <div style="clear:both;"></div>');?>
  	   	<br/><div style='clear: both;'></div>
  	   	<?=$form->input('Colaboradore.detalle', array('type' => 'textarea', 'label'=>'','size'=>'50','maxlength'=>'250'));?>
  	   	<?=$fck->load('Colaboradore/detalle');?>
  	</div>
    <br/>
    <div class="input-group">
        <?= $this->Html->tag('span', 'Facebook: <span style="color:red">*</span>',array('class'=>"input-group-addon")); ?>
        <?=$form->input('Colaboradore.facebook', array('type' => 'text', 'label'=> false,'size' => '35','maxlength'=>'100','class'=>"form-control"))?>
    </div>
    <br/>
    <div class="input-group">
        <?= $this->Html->tag('span', 'LinkedIn: <span style="color:red">*</span>',array('class'=>"input-group-addon")); ?>
        <?=$form->input('Colaboradore.linkedin', array('type' => 'text', 'label'=> false,'size' => '35','maxlength'=>'100','class'=>"form-control"))?>
    </div>
    <br/>
    <div class="input-group">
        <?= $this->Html->tag('span', 'Google+: <span style="color:red">*</span>',array('class'=>"input-group-addon")); ?>
        <?=$form->input('Colaboradore.googleplus', array('type' => 'text', 'label'=> false,'size' => '35','maxlength'=>'100','class'=>"form-control"))?>
    </div>
    <br/>
    <div class="input-group">
        <?= $this->Html->tag('span', 'Twitter: <span style="color:red">*</span>',array('class'=>"input-group-addon")); ?>
        <?=$form->input('Colaboradore.twitter', array('type' => 'text', 'label'=> false,'size' => '35','maxlength'=>'100','class'=>"form-control"))?>
    </div>
    <br/>
    <div class="input-group">
        <?= $this->Html->tag('span', 'Skype: <span style="color:red">*</span>',array('class'=>"input-group-addon")); ?>
        <?=$form->input('Colaboradore.skype', array('type' => 'text', 'label'=> false,'size' => '35','maxlength'=>'100','class'=>"form-control"))?>
    </div>
    <br/>
    <div class="input-group">
         <?= $this->Html->tag('span', 'Estado:',array('class'=>"input-group-addon")); ?>
         <?=$form->input('Colaboradore.estado',  array( 'type' => 'select','label'=>false,'options'=>$estadoArray,'selected'=>$selectedEstado, 'empty'=>false,'class'=>"form-control"));?>
    </div>
    <div class='input-group'>
        <span style="color:red"><strong>*</strong></span>  Indica que la informaci&oacute;n del campo es requerida.
    </div>      
    <br/>
    <div class="input-group">    
        <?=$form->end(array('label' => 'Guardar', 'class' => 'btn btn-primary btn-lg'));?>
    </div>
</fieldset>    

    <div style="clear: both;"></div>
    <br/>
    <hr/>
    <div class="optional">   
        <?php echo $html->link('Lista de tags', '/tags/index')?>
    </div>   
</div>