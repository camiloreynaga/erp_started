<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<?php if(!Yii::app()->user->isGuest): ?>
<p>
    You last logged in on <?php echo Yii::app()->user->lastLogin; ?>
</p>


<?php endif; ?>

<?php
if(yii::app()->user->checkAccess("admin"))
        echo "hola Admin desde user </br>";

if(yii::app()->authManager->checkAccess("admin",yii::app()->user->id ))
        echo "hola admin desde authManager";
    ?>

