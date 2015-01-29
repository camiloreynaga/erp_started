<script> //
        
//        "success"=>\'js:function(html){
//          jQuery("#pub\'.$row.\'")
//          .html((html>0)?"Unpublish":"Publish");
        
        function updateRow(data)
        {
            var row = $(this).parent().parent().parent();
            $.ajax({
            type: 'POST',
            data: data,
            url: jQuery(this).attr('href'),
            success: function(data, textStatus, jqXHR) {
 
                if (data == 'error') {
                    alert("Data has error(s)");
                } else {
                    //this code updates only the specific row
                    var dataT = $('tbody tr ',$(data));
                    row.html(dataT.html());
                    /////////////////////////////////////////
                    console.log(data);
                    console.log(textStatus);
                    console.log(jqXHR);
                }
            },
            error: function(textStatus, errorThrown) {
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
        return false;
        }
        
        
        //actualiza la grila 
        function updateGrilla(data) {
//                $.ajax({
//                    
//                type: 'POST',
//                data: data,
//                url: jQuery(this).attr('href'), 
//                success: function(data){
//                    if(data =='error'){
//                        alert("Data has error(s)");
//                    }
//                    else{
//                         $(".view").html(text);
//                        // $("#Items").html(data);
//                    }
//                        
//                }
//                })
                
                // display data returned from action
                //$("#Items").html(data);
               // $("#view").html(data);
                // refresh your grid
                $.fn.yiiGridView.update('detalle-orden-compra-grid');
                
        }
</script>


<?php
// llamando al script que hace la validación del form via ajax
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/validacionAjaxForm.js',CClientScript::POS_HEAD);
//$cs->registerCssFile($baseUrl.'/css/style.css');
?>

<?php

    Yii::app()->clientScript->registerScript('search', "
    $('.add-button').click(function(){
    $('.search-form').toggle();
    return false;
    });
    $('.search-form form').submit(function(){
    $.fn.yiiGridView.update('detalle-compra-grid', {
    data: $(this).serialize()
    });
    return false;
    });
    ");
?>


<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialogClassroom',
    'options'=>array(
        'title'=>'Editar detalle de Compra',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>550,
        'height'=>670,
    ),
));?>
    <div class="divForForm"></div>
<?php $this->endWidget(); ?>
    
<script type="text/javascript">
    function updateItem(url)
    {
        <?php echo CHtml::ajax(array(
            'url'=>'js:url',
            'data'=> "js:$('#detalle-form').serialize()",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogClassroom div.divForForm').html(data.div);
                          // Here is the trick: on submit-> once again this function!
                    //$('#dialogClassroom div.divForForm form').submit(updateItem);
                }
                else
                {
                    $('#dialogClassroom div.divForForm').html(data.div);
                    setTimeout(\"$('#dialogClassroom').dialog('close') \",3000);
                    $.fn.yiiGridView.update('detalle-orden-compra-grid');//update GRID!!! :D
                }

            } ",
            ))?>;
        return false;  
    }
    function loadForm()
    {

    }
        
    function clearForm()
    {
        $('#s2id_DetalleOrdenCompra_producto_id').select2('data', null);//reset select2
        $("#DetalleOrdenCompra_cantidad").val(null);//
        $("#DetalleOrdenCompra_precio_unitario").val(null);//
        $("#DetalleOrdenCompra_observacion").val(null);
    }
</script>
    
<?php echo CHtml::link('Agregar Producto','#',array('class'=>'add-button btn')); //Advanced Search ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_partialForm',array('model'=>$model)); ?>
</div>

<div id="Items"></div>

    <?php 
        
    $this->widget('booster.widgets.TbExtendedGridView',array(
                'id'=>'detalle-orden-compra-grid',
                'type'=>'striped bordered',
                'fixedHeader' => true,
                'headerOffset' => 40,
                //'responsiveTable' => true,
                'dataProvider'=>$model->search(),
                'selectableRows' => 2,
                'columns'=>array(

                                 array(
                                'class'=>'CCheckBoxColumn', // Checkboxes
                                'selectableRows'=>2,        // Allow multiple selections 
                                ),
                                array(
                                    'name'=>'producto_id',
                                    'header'=>'Producto',
                                    'value'=>'$data->r_producto->nombre', 
                                ),
                                array(
                                    'name'=>'presentacion_id',
                                    'header'=>'Present.',
                                    'value'=>'isset($data->r_producto->r_presentacion->presentacion)?$data->r_producto->r_presentacion->presentacion:null'
                                ),
                                array(
                                    'name' => 'cantidad',
                                    'header' => 'Cant.',
                                ),
                                array(
                                    'name' => 'lote',
                                    'header' => 'Lote',
                                ),
                                array(
                                    'name' => 'fecha_vencimiento',
                                    'header' => 'F.V.',
                                ),
                                array(
                                    'name' => 'cantidad_bueno',
                                    'header' => 'B',
                                ),
                                array(
                                    'name' => 'cantidad_malo',
                                    'header' => 'M',
                                ),
                                array(
                                    'name'=>'observacion',
                                    'header'=>'Obs.',
                                ),
                                array(
                                    'name'=>'estado',
                                    'value'=>'$data->_estado[$data->estado]'
                                ),
                                'porcentaje_descuento',
                                array(
                                    'name'=>'precio_unitario',
                                    'header'=>'P.U.',
                                ),
                                array(
                                    'name'=>'subtotal',
                                    'header'=>'Subtotal',
                                    'htmlOptions'=>array('style'=> 'text-align: right'),
                                    //'class'=>'booster.widgets.TbTotalSumColumnCurrency',
                                    'footerHtmlOptions'=>array('style'=> 'text-align: right'),
                                ),
                                array(
                                    'name'=>'impuesto',
                                    'header'=>'IGV',
                                    'htmlOptions'=>array('style'=> 'text-align: right'),
                                    //'class'=>'booster.widgets.TbTotalSumColumnCurrency',
                                    'footerHtmlOptions'=>array('style'=> 'text-align: right'),
                                ),
                                array(
                                    'name'=>'total',
                                    'footer'=> $model->r_compra->importe_total,
                                    'header'=>'Total',
                                    'htmlOptions'=>array('style'=> 'text-align: right'),
                                    //'class'=>'booster.widgets.TbTotalSumColumnCurrency',
                                    'footerHtmlOptions'=>array('style'=> 'text-align: right'),
                                ),

                array(
                    'header'=>'Acción',
                    'class'=>'booster.widgets.TbButtonColumn',
                    'template'=>'{delete} {obs}{update}',
                    'buttons'=>array(
                        'delete'=>array(
                            'url'=>'Yii::app()->createUrl("detalleCompra/delete", array("id"=>$data->id))',
                        ),
                        'update'=>array(
                            'click'=>'function(){updateItem($(this).attr("href")); $("#dialogClassroom").dialog("open");return false;}'
                        ),
                        'obs'=>array(
                            'label'=>'<i class="glyphicon glyphicon-exclamation-sign"></i>',
                            //'url'=>'Yii::app()->createUrl("detalleCompra/upObs")',
                            //'visible'=>'$data->cantidad_malo>0 || $data->cantidad_bueno < $data->cantidad ',
                            'visible'=>'$data->estado==2',
                            'options'=>array(
                                'title'=>'Observado',
                                
                            )
                        )
                    ),
                    'deleteConfirmation'=>'Esta seguro de eliminar este item?',
                    'afterDelete'=>'function(link,success,data){ if(success) window.location.reload(); }',

                    ),
                ),
    )); 

   
?>


<?php
echo CHtml::Button('Confirmar Registro',
             array(
                 'submit'=>array('detalleCompra/finalizar',
                     'id'=>$model->compra_id,
                     ),
                     'confirm'=>'Esta seguro de proceder?',
                 )
             );
?>