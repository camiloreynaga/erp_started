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
	yii::t('app','Manage'),
);\n";
?>

$this->menu=array(
array('label'=>yii::t('app','List').' '.yii::t('app','<?php echo $this->modelClass; ?>'),'url'=>array('index')),
array('label'=>yii::t('app','Create').' '.yii::t('app','<?php echo $this->modelClass; ?>'),'url'=>array('create')),
);

Yii::app()->clientScript->registerScript( yii::t('app','search'), "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1><?php echo "<?php echo yii::t('app','Manage');?>";?>  <?php echo "<?php echo yii::t('app','".$this->pluralize($this->class2name($this->modelClass))."'); ?>";?></h1>

<p>
	<?php echo "<?php echo yii::t('app','You may optionally enter a comparison operator');?>";?> (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	<?php echo "<?php yii::t('app','or');?>";?> <b>=</b>) <?php echo "<?php echo yii::t('app','at the beginning of each of your search values to specify how the comparison should be done.');?>";?>
</p>

<?php echo "<?php echo CHtml::link(yii::t('app','Advanced Search'),'#',array('class'=>'search-button btn')); ?>"; ?>

<div class="search-form" style="display:none">
	<?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->

<?php echo "<?php"; ?> $this->widget('booster.widgets.TbGridView',array(
'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
<?php
$count = 0;
foreach ($this->tableSchema->columns as $column) {
	if (++$count == 7) {
		echo "\t\t/*\n";
	}
	echo "\t\t'" . $column->name . "',\n";
}
if ($count >= 7) {
	echo "\t\t*/\n";
}
?>
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
