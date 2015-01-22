<?php 
$form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'cuenta-cobrar',
        //'type'=>$model->isNewRecord?'inline':'vertical',
	'enableAjaxValidation'=>true,
        'clientOptions' =>array(
            'validateOnSubmit' => true,
            'validateOnChange' => false,
            'validateOnType' => false,
        )
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with') ;?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldGroup($model,'venta_id',array('class'=>'span5')); ?>

	<?php
        //if($model->isNewRecord)
        echo $form->textFieldGroup($model,'monto',array('class'=>'span5','maxlength'=>10)); 
        
        
        
        ?>
       
	<?php //echo $form->textFieldGroup($model,'estado',array('class'=>'span5')); ?>

        <?php 
        //if($model->isNewRecord)
            echo $form->datepickerGroup($model,
                'fecha_vencimiento'
                ,array(
				'widgetOptions' => array(
					'options' => array(
                                           // 'language' => 'es',
                                           //'format'=>'dd/mm/yyyy',
                                            
                                            'format'=>'yyyy-mm-dd',
                                            //'starView'=>2,
                                            //'minViewMode'=>1,
                                            'autoclose'=>true,
                                            'todayHighlight'=>true,
                                            )
				),
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => 'Ingrese fecha.',
				'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
			)
		);
        
        //else
          //   echo $form->textFieldGroup($model,'fecha_vencimiento',array('class'=>'span5','maxlength'=>10));
            //echo $form->datepickerGroup($model,'fecha_vencimiento',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>
                  

        
	<?php 
         if(!$model->isNewRecord)
//             echo $form->datepickerGroup($model,
//                'fecha_pago'
//                ,array(
//				'widgetOptions' => array(
//					'options' => array(
//                                           // 'language' => 'es',
//                                           //'format'=>'dd/mm/yyyy',
//                                            
//                                            'format'=>'yyyy-mm-dd',
//                                            //'starView'=>2,
//                                            //'minViewMode'=>1,
//                                            'autoclose'=>true,
//                                            'todayHighlight'=>true,
//                                            )
//				),
//				'wrapperHtmlOptions' => array(
//					'class' => 'col-sm-5',
//				),
//				'hint' => 'Ingrese fecha.',
//				'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
//			)
//		);
//         else
             echo $form->textFieldGroup($model,'fecha_pago',array('class'=>'span5','maxlength'=>10));
        //echo $form->datepickerGroup($model,'fecha_pago',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>
	
	<?php 
        if(!$model->isNewRecord)
                      echo $form->textFieldGroup($model,'medio_pago',array('class'=>'span5'));
        
//        echo $form->dropDownListGroup($model,
//                        'caracteristica_id',
//                        array(
//                            'wrapperHtmlOptions'=>array(
//                                'class' => 'col-sm-5',
//                            ),
//                            'widgetOptions'=>array(
//                                  'data'=> CHtml::listData(Producto::model()->getCaracteristicaOptions(),'id','caracteristica')),
//                               // 'asDropDownList'=>false,
//                                'options'=>array(
//                                )
//                            )
//                        );
        
        
        ?>

	<?php // echo $form->textFieldGroup($model,'descuento',array('class'=>'span5','maxlength'=>10)); ?>
    <div class="form-actions">
        <?php 
                $this->widget('booster.widgets.TbButton', array(
                       'buttonType'=>'submit',
                       'context'=>'primary',
                       'label'=>$model->isNewRecord ? 'Create' : 'Save',
               )); 
                //$this->endWidget();
               ?>
    </div>
    
    <script type="text/javascript">
        $("#cuenta-cobrar").submit(
            function(e){
                e.preventDefault();
                updateItem($("#cuenta-cobrar").attr('action'));
                return false;
         });
    </script>


<?php $this->endWidget(); ?>