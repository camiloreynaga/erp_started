<?php
//$this->breadcrumbs=array(
//	'Cuenta Cobrars'=>array('index'),
//	'Manage',
//);
//
//$this->menu=array(
//array('label'=>'List CuentaCobrar','url'=>array('index')),
//array('label'=>'Create CuentaCobrar','url'=>array('create')),
//);
//
//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//$('.search-form').toggle();
//return false;
//});
//$('.search-form form').submit(function(){
//$.fn.yiiGridView.update('cuenta-cobrar-grid', {
//data: $(this).serialize()
//});
//return false;
//});
//");
?>

<h3> <?php echo yii::t('app','Manage'); ?>   Cuenta por cobrar</h3>

<!--<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<!--<div class="search-form" style="display:none">
	<?php // $this->renderPartial('_search',array(
//	'model'=>$model,
//)); 
        ?>
</div> search-form -->

<?php

$model->venta_id=isset($_GET['pid'])? $_GET['pid']: 0; // $_GET['pid'];
$this->widget('booster.widgets.TbGridView',array(
            'id'=>'cuenta-cobrar-grid',
            'type'=>'striped bordered',
            //'fixedHeader' => true,
            //'headerOffset' => 40,    
            'dataProvider'=>$model->search(),
            //'filter'=>$model,
            'columns'=>array(

                                 array(
                                'class'=>'CCheckBoxColumn', // Checkboxes
                                'selectableRows'=>2,        // Allow multiple selections 
                                ),
                               // 'id',
                                'monto',
                                'fecha_vencimiento',
                                'fecha_pago',
                                'medio_pago',
                                'estado',
                                
                                array(
                                    'header'=>'Acción',
                                    'class'=>'booster.widgets.TbButtonColumn',
                                    'template'=>'{er}',
                                    'buttons'=>array(
                                        'er'=>
                                            array(
                                                'label'=>'<i class="glyphicon glyphicon-usd"></i>',
                                                'url'=>'Yii::app()->createUrl("cuentaCobrar/update", array("id"=>$data->id))',
//                                                'options'=>array(
//                                                   
//                                                ),
                                                
//                                                'click'=>"function(){
//                                                            $.fn.yiiGridView.update('cuenta-cobrar-grid', {
//                                                                type:'POST',
//                                                                url:$(this).attr('href'),
//                                                                success:function(data) {
//                                                                      $('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');
//
//                                                                      $.fn.yiiGridView.update('cuenta-cobrar-grid');
//                                                                }
//                                                            })
//                                                            return false;
//                                                      }",
                                                'click'=>'function(){updateItem($(this).attr("href")); $("#dialogClassroom").dialog("open");return false;}',
                                                'options'=>array(
                                                   'title'=>'Pagar',
                                                   //'confirm'=>'Pagar ?',
                                                ),
                                            ),
                                    ),
                                ),

              
                ),
)); 



?>
