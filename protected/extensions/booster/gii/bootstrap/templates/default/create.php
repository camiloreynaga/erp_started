<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
        yii::t('app','$label')=>array('index'),
	yii::t('app','Create'),
);\n";
?>

$this->menu=array(
array('label'=>yii::t('app','List').' '.yii::t('app','<?php echo $this->modelClass; ?>'),'url'=>array('index')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','<?php echo $this->modelClass; ?>'),'url'=>array('admin')),
);
?>

<h1> <?php echo "<?php echo yii::t('app','Create');?>";?> <?php echo "<?php echo yii::t('app','".$this->modelClass."'); ?>";?></h1>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
