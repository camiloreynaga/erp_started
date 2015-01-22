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
        yii::t('app','$label'),
);\n";
?>

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','<?php echo $this->modelClass; ?>'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','<?php echo $this->modelClass; ?>'),'url'=>array('admin')),
);
?>

<h1><?php echo "<?php echo yii::t('app','$label'); ?>";?></h1>

<?php echo "<?php"; ?> $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
