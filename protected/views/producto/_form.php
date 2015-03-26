<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'producto-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with') ;?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>

<?php echo $form->errorSummary($model) ?>
<div style="width: 100%">
    
    <div style="width: 45%; float:left">
    
	<?php echo $form->textFieldGroup($model,'codigo',array('class'=>'span5','maxlength'=>100)); ?>
        
        <?php echo $form->textFieldGroup($model,'codigo_barra',array('class'=>'span5','maxlength'=>100)); ?>
        
        <?php echo $form->textAreaGroup($model,'descripcion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
        
        <div style="float: left">
            <?php echo $form->textFieldGroup($model,'precio_compra',array('class'=>'span5')); ?>
            
        </div>
        <div style="width: 13%; float: left"> &nbsp </div>
        <div style="float: left">
            <?php echo $form->textFieldGroup($model,'porcentaje_ganancia',array('class'=>'span5')); ?>
        </div>
        
        <div style="width: 0%; float: left"> &nbsp </div>
        <div style="float: left">
            <?php echo $form->textFieldGroup($model,'minimo_stock',array('class'=>'span5')); ?>
        </div>
        
        <div style="float: left">
            <?php //echo $form->textFieldGroup($model,'precio_venta',array('class'=>'span5')); ?>
        </div>
        <div style="width: 10%; float: left"> &nbsp </div>
        <div style="float: left">
        <?php echo $form->switchGroup($model,'descontinuado',
                array('class'=>'span5',
                        'widgetOptions'=>array(
                            'options'=>array(
                                'size'=>'small',
                                'onText'=>'SI',
                                'offText'=>'NO',
                                'onColor' => 'danger',
                                'offColor' => 'primary', 
                                )
                    )
                )
                
                ); ?>
        </div>
        <div style="width: 45%; float: left"> &nbsp </div>
        <div style="float: left">
            <?php // echo $form->textFieldGroup($model,'ventaUnd',array('class'=>'span5')); ?>
        </div>
        
</div>
    
    <div style="width: 5%; float: left"> &nbsp </div>
    
    <div style=" width: 50%; float: left ">
        <?php echo $form->textFieldGroup($model,'nombre',array('class'=>'span5','maxlength'=>100)); ?>

	<?php 
        
         echo $form->select2Group(
			$model,
			'tipo_producto_id',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
                                
				'widgetOptions' => array(
				'asDropDownList' => true,
                                    'data'      => CHtml::listData($model->getTipoOptions(),'id','tipo_producto'),
					'options' => array(
						//'tags' => array('clever', 'is', 'better', 'clevertech'),
						'placeholder' => 'elija por favor.',
						/* 'width' => '40%', */
						//'tokenSeparators' => array(',', ' ')
					)
				)
			)
		);
        ?>
	<?php  echo $form->select2Group(
			$model,
			'presentacion_id',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
                                
				'widgetOptions' => array(
				'asDropDownList' => true,
                                    'data'      => CHtml::listData($model->getPresentacionOptions(),'id','presentacion'),
					'options' => array(
						//'tags' => array('clever', 'is', 'better', 'clevertech'),
						'placeholder' => 'eliga por favor.',
						/* 'width' => '40%', */
						//'tokenSeparators' => array(',', ' ')
					)
				)
			)
		); ?>

	<?php echo $form->select2Group(
			$model,
			'unidad_medida_id',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
                                
				'widgetOptions' => array(
				'asDropDownList' => true,
                                    'data'      => CHtml::listData($model->getUndMedidaOptions(),'id','unidad_medida'),
					'options' => array(
						//'tags' => array('clever', 'is', 'better', 'clevertech'),
						'placeholder' => 'eliga por favor.',
						/* 'width' => '40%', */
						//'tokenSeparators' => array(',', ' ')
					)
				)
			)
		);
        ?>
        <?php
	 echo $form->select2Group(
			$model,
			'fabricante_id',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
                                
				'widgetOptions' => array(
				'asDropDownList' => true,
                                    'data'      => CHtml::listData (Fabricante::model()->findAll(), "id","fabricante"),
					'options' => array(
						//'tags' => array('clever', 'is', 'better', 'clevertech'),
						'placeholder' => 'eliga por favor.',
						/* 'width' => '40%', */
						//'tokenSeparators' => array(',', ' ')
					)
				)
			)
		);
         ?>
    </div>
    <div style="width: 100%; float: left"> &nbsp </div>
    <?php echo $form->textAreaGroup($model,'observacion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
</div>
    
<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? yii::t('app','Create') : yii::t('app','Save'),
		)); ?>
</div>

<?php $this->endWidget(); ?>

<?php //$this->renderPartial('//CaracteristicaProducto/_form',array('model'=>CaracteristicaProducto::model())) ?>    