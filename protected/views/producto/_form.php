<?php
/* @var $this ProductoController */
/* @var $model Producto */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'producto-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldGroup($model,'nombre',array('class'=>'span5')); ?>

		<?php echo $form->textAreaGroup($model,'descripcion',array('class'=>'span5', 'rows'=>6, 'cols'=>50)); ?>

		<?php echo $form->dropDownListGroup($model,'tipo_producto_id',
                        array(
                             'wrapperHtmlOptions'=>array(
                                'class' => 'col-sm-5',
                            ),
                            'widgetOptions'=>array(
                                'data'=>CHtml::listData($model->getTipoOptions(),'id','tipo_producto'),
                                'options'=>array()
                            )
                        )
                    ); ?>
		<?php echo $form->dropDownListgroup($model,'presentacion_id', 
                        array(  
                            'wrapperHtmlOptions'=>array(
                                'class' => 'col-sm-5',
                            ),
                            'widgetOptions'=>array(
                                'data'=>CHtml::listData($model->getPresentacionOptions(),'id','presentacion'),
                                'options'=>array()
                            )
                        )
                    );?>
		<?php echo $form->dropDownListGroup($model,'unidad_medida_id',
                        array(
                            'wrapperHtmlOptions'=>array(
                                'class' => 'col-sm-5',
                            ),
                            'widgetOptions'=>array(
                                'data'=>CHtml::listData($model->getUndMedidaOptions(),'id','unidad_medida'),
                                'options'=>array()
                            )
                        )
                        ); ?>
		<?php echo $form->dropDownListGroup($model,'fabricante_id',
                        array(
                            'wrapperHtmlOptions'=>array(
                                'class' => 'col-sm-5',
                            ),
                            'widgetOptions'=>array(
                                'data'=>CHtml::listData($model->getFabricanteOptions(),'id','fabricante'),
                                'options'=>array()
                            )
                        )
                        ); ?>
		<?php echo $form->textFieldGroup($model,'minimo_stock',array('class'=>'span5')); ?>
		
                <?php echo $form->textFieldGroup($model,'stock',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'descontinado',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'precio',array('class'=>'span5')); ?>

		<?php echo $form->textAreaGroup($model,'observacion',array('class'=>'span5','rows'=>6, 'cols'=>50)); ?>
        <div class="form-actions">
		<?php 
                $this->widget('booster.widgets.TbButton',array(
                    'buttonType'=>'submit',
                    'context'=>'primary',
                    'label'=>$model->isNewRecord ? 'Create' : 'Save',
                )); ?>
        </div>
<?php $this->endWidget(); ?>

<?php $this->renderPartial('//CaracteristicaProducto/_form',array('model'=>CaracteristicaProducto::model())) ?>        
        