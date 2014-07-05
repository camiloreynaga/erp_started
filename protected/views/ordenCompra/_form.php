<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'orden-compra-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>


	<?php //echo $form->textFieldGroup($model,'fecha_orden',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldGroup($model,'proveedor_id',array('class'=>'span5')); ?>

	
<?php echo $form->select2Group(
			$model,
			'proveedor_id',
                      
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                                    
                                    'asDropDownList' => true,
                                    'data'      => CHtml::listData (Proveedor::model()->getProveedores(), "id","nombre_rz"),
					'options' => array(
						'placeholder' =>'Seleccione Proveedor', 
                                                'width' => '40%', 
						'tokenSeparators' => array(',', ' ')
					),
				)
			)
		);

?>
<?php echo $form->textAreaGroup($model,'observaciones',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>


	<?php //echo $form->textFieldGroup($model,'estado',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); 
        
     
        ?>
</div>
<?php $this->endWidget(); ?>
<div>
    <?php
//       $this->widget('booster.widgets.TbSelect2',
//    array(
//          
//        'name' => 'group_id_list',
//        'data' => array('RU' => 'Russian Federation', 'CA' => 'Canada', 'US' => 'United States of America', 'GB' => 'Great Britain'),
//        'htmlOptions' => array(
//            'multiple' => 'multiple',
//            'id' => 'issue-574-checker-select'
//        ),
//    )
//);
    
    ?>
</div>


<?php 


// $this->widget('booster.widgets.TbSelect2' ,array(
//                    'name'      => 'group_id_list',
//                    'asDropDownList' => true,
//                    'data'      => CHtml::listData ($model_proveedor->findAll(), "id","nombre_rz"),
//                    //'val'       => implode(",",$model_proveedor->nombre_rz), //$model->filter_groups),
//                    
//                  'options' => array(
//                        'placeholder'=>'Please make a selection',    
//                       'width' => "60%",
//                        //'tokenSeparators' => array(',', ' '),
//                    ),
//                  'htmlOptions' => array (
//                       //'multiple'  => 'multiple',
//                    ),
//              ));
 
 ?>



    <?php 
    
//    $model_proveedor= new Proveedor();// Proveedor::model();
//    $this->widget('booster.widgets.TbGridView',array(
//            'id'=>'proveedor-grid',
//            'dataProvider'=>$model_proveedor->search(),
//            'filter'=>$model_proveedor,//$model,
//            'ajaxUrl'=>array('Proveedor/Search'),
//            'columns'=>array(
//                            'id',
//                            'nombre_rz',
//                            'ruc',
//                            'direccion',
//                            'ciudad',
//            array(
//            'class'=>'booster.widgets.TbButtonColumn',
//            ),
//        ),
//    )); 
    
    
  
?>
