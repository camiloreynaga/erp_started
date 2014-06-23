<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php $this->widget('booster.widgets.TbGridView',array(
        'id'=>'proveedor-grid',
        'dataProvider'=>$model->search(),
        'filter'=>$model,
        'ajaxUrl'=>array('Proveedor/search'), //&id='.$_GET['id']
        'columns'=>array(
                        'id',
                        'nombre_rz',
                        'ruc',
                        'contacto',
                        'direccion',
                        'ciudad',
                        /*
                        'telefono',
                        'linea_credito',
                        'create_time',
                        'create_user_id',
                        'update_time',
                        'update_user_id',
                        */
        array(
        'class'=>'booster.widgets.TbButtonColumn',
//        'template'=>'{add}',
//            'buttons'=>array(
//                'add'=>array(
//                    'label'=>'Select',
//                    'url'=>''
//                )
//            )
            
        ),
    ),
)); ?>
