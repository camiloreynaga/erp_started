<?php
$this->breadcrumbs=array(
	yii::t('app','Stock movements')=>array('admin'),
	yii::t('app','Register'),
);

$this->menu=array(
    //array('label'=>'List MovimientoAlmacen','url'=>array('index')),
    array('label'=>yii::t('app','Manage').' '.yii::t('app','Stock movements'),'url'=>array('admin')),

    array('label'=>yii::t('app','check-in'),'url'=>array('ingreso')),

    array('label'=>yii::t('app','check-out'),'url'=>array('salida')),
);
?>

<h1><?php echo yii::t('app','Register').' '. yii::t('app','Stock movements') ;?> </h1>

<?php 

//echo $this->renderPartial('_form', array('model'=>$model)); 
?>
<div>
    <?php //echo CHtml::link(CHtml::encode('INGRESAR'),array('create','op'=>0));
    ?>
</div>
<div>
    <?php //echo CHtml::link(CHtml::encode('SACAR'),array('create','op'=>1));
    ?>
</div>
<?php 

//    if(isset($_GET['op'])==0)
//    {
//        echo $this->render('_ingresoForm', array('model'=>$model)); 
//    }
//    if(isset($_GET['op'])==1)
//    {
//       echo $this->render('_salidaForm', array('model'=>$model)); 
//    }
//    else
        echo 'Por favor seleccione una opción';
?>

<?php // echo $this_?>