<?php
/* @var $this CaracteristicaProductoController */
/* @var $model CaracteristicaProducto */
/* @var $form CActiveForm */
//Creando la variable de sesion para el arreglo de datos

$_SESSION['arrayCaracteristica']=array();
        

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'caracteristica-producto-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'producto_id'); ?>
		<?php echo $form->textField($model,'producto_id'); ?>
		<?php echo $form->error($model,'producto_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'caracteristica_id'); ?>
		<?php echo $form->dropDownList($model,'caracteristica_id',CHtml::listData(Producto::model()->getCaracteristicaOptions(),'id','caracteristica')); ?>
		<?php echo $form->error($model,'caracteristica_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valor'); ?>
		<?php echo $form->textField($model,'valor'); ?>
		<?php echo $form->error($model,'valor'); ?>
	</div>
        
       
        
            

	<div class="row buttons">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
                <?php echo CHtml::Button('send', array(
                    'submit'=> CController::createUrl('//caracteristicaProducto/addArray'))
                        );
                        ?>    
            
                <?php echo CHtml::ajaxSubmitButton('add',
                        CController::createUrl('caracteristicaProducto/addArray'),
                        array(
                            //'data'=>
                            'update'=>'#value_e')
                        );
                        ?>
            <?php

                    echo CHtml::ajaxSubmitButton(
                        'Submit request',
                        array('caracteristicaProducto/reqTest03'),
                        array(
                            'update'=>'#req_res02',
                        )
                        );
?>

	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

 <div id="value_e"> 
            <?php $this->renderPartial('_viewCaracteristicas',array('data'=>$_SESSION['arrayCaracteristica'])); ?>
 </div>

<div id="req_res02">...</div>
