<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//if(empty($data))
//    echo "Vacio";
//else
//{
//    $this->widget('')
//    echo "arreglo";
//    foreach ($_SESSION['arrayCaracteristica'] as $x => $x_value )
//    {
//        echo 'id ' .$x. ", caracteristica_id=". $x_value['caracteristica_id']. " caracteristica " .$x_value['caracteristica_text']. ", valor=". $x_value['valor'];
//        echo '<br>';
//    }
    
    //echo  CHtml::encode(print_r($_SESSION['arrayCaracteristica'], true));
    
    $this->widget('zii.widgets.grid.CGridView' , array(
        'dataProvider'=> new CArrayDataProvider($_SESSION['arrayCaracteristica']),
        'columns'=>array(
            array(
                'name'=>'caracteristica',
                'type'=>'raw',
                'value'=>'CHtml::encode($data["caracteristica_text"])'
                //'value'=>'$data->caracteristica->caracteristica'
                
            ),
            array(
                'name'=>'valor',
                'type'=>'raw',
                'value'=>'CHtml::encode($data["valor"])'
            ),
            array(
                'header'=>'accion',
                'class'=>'CButtonColumn',
                'template'=>'{delete}',
//             /   'deleteButtonUrl'=>CController::createUrl('caracteristicaProducto/delArray')
                'deleteButtonUrl'=>'Yii::app()->createUrl("caracteristicaProducto/delArray&id=$row")',
                'deleteConfirmation'=>false
//                'buttons'=>array(
//                    'delete'=>array(
//                        'url'=>'Yii::app()->createUrl("caracteristicaProducto/delArray")'
//                    ))
            )
        ),
    ));
//    
//}
    
?>
