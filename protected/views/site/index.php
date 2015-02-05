<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1><?php echo Yii::t('app', 'Welcome to')?> <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<?php  //echo Empleado::model()->findByPk(Yii::app()->user->id)->nombre ?>
<?php if(!Yii::app()->user->isGuest): ?>

<h2>
   <?php
   $_empleado_id=User::model()->findByPk(yii::app()->user->id)->empleado_id;
   echo Yii::t('app', 'Store').': '.Empleado::model()->findByPk($_empleado_id)->r_punto_venta->punto_venta; ?>
</h2>
<p>
   
   <b><?php echo User::model()->findByPk(yii::app()->user->id)->r_empleado->nombre;?> </b>
   <?php echo Yii::t('app', 'You last logged in on').' '.Yii::app()->user->lastLogin; ?>
</p>


<?php endif; ?>

<?php
//yii::app()->user->

//$model->punto_venta_id=  Empleado::model()->findByPk($_empleado_id)->punto_venta_id;

//if(yii::app()->user->checkAccess("root"))
//        echo "hola Admin desde user </br>";
//
//if(yii::app()->authManager->checkAccess("root",yii::app()->user->id ))
//        echo "hola admin desde authManager";
    ?>

