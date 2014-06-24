<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'detalle-orden-compra-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'orden_compra_id',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldGroup($model,'cotizacion_id',array('class'=>'span5')); ?>

	<?php 
        echo $form->select2Group(
			$model,
			'producto_id',
                      
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                                    
                                    'asDropDownList' => true,
                                    'data'      => CHtml::listData(Producto::model()->findAll(), "id","nombre"),
					'options' => array(
						'placeholder' =>'Seleccione producto', 
                                                //'tags'=>'de',
                                                'width' => '40%', 
						'tokenSeparators' => array(',', ' ')
					),
				)
			)
		);
        //echo CHtml::hiddenField('CargoespecSearch', '', array('class' => 'span5'));
        
//        echo $form->select2Group(
//			$model,
//			'producto_id',
//			array(
//				'wrapperHtmlOptions' => array(
//					'class' => 'col-sm-5',
//				),
//				'widgetOptions' => array(
//                                    'asDropDownList' => false,
//                                   // CHtml::listData(Producto::model()->findAll(), "id","nombre"),
//					'options' => array(
//						'placeholder' =>'Seleccione producto', 
//                                                //'tags'=>'de',
//                                                //'width' => '40%', 
//						//'tokenSeparators' => array(',', ' '),
//                                                'minimumInputLength'=>'2',
//                                                'ajax' => array(
//                                                'url' => Yii::app()->controller->createUrl('Producto/FiltroProducto'),
//                                                    'type'=>'GET',
//                                                    'dataType' => 'json',
//                                                    'quietMillis'=> 100,
//                                                    'data' => 'js: function(text,page) {
//                                                    return {
//                                                                //get im my controller
//                                                                q: text, 
//                                                              //  page_limit: 10,
//                                                               // page: page,
//                                                            };
//                                                        }',
//                                                    'results'=>'js:function(data,page) { var more = (page * 10) < data.total; return {results: data, more:more }; }',
//                                                ),
//					),
//				)
//			)
//		);
        
       /* $this->widget('ext.select2.ESelect2',array(
            'selector' => '#CargoespecSearch',
            'options'  => array(
                'allowClear'=>true,
                'placeholder'=>'Selecione o Cargo Específico',
                'minimumInputLength' => 4, 
                'ajax' => array(
                'url' => Yii::app()->createUrl('curriculo/filtrocargo'),
                'type'=>'GET',
                'dataType' => 'json',
                'quietMillis'=> 50,
                'data' => 'js: function(text,page) {
                return {
                            //get im my controller
                            q: text, 
                            page_limit: 10,
                            page: page,
                        };
                    }',
                'results'=>'js:function(data,page) { var more = (page * 10) < data.total; return {results: data, more:more }; }',
            ),
       ),
         
        ));*/
        
       // echo $form->textFieldGroup($model,'producto_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'cantidad',array('class'=>'span5')); ?>

	<?php echo $form->textAreaGroup($model,'observacion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldGroup($model,'precio_unitario',array('class'=>'span5','maxlength'=>10, 'width'=>'40px')); ?>

	<?php //echo $form->textFieldGroup($model,'subtotal',array('class'=>'span5','maxlength'=>10)); ?>

	<?php //echo $form->textFieldGroup($model,'impuesto',array('class'=>'span5','maxlength'=>10)); ?>

	<?php //echo $form->textFieldGroup($model,'total',array('class'=>'span5','maxlength'=>10)); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
