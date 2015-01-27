<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
    echo "<?php\n";
    $nameColumn = $this->guessNameColumn($this->tableSchema->columns);
    $label = $this->pluralize($this->class2name($this->modelClass));
    echo "\$this->breadcrumbs=array(
            yii::t('app','$label')=>array('index'),
            \$model->{$nameColumn},
    );\n";
    ?>

    $this->menu=array(
        array('label'=>yii::t('app','List').' '.yii::t('app','<?php echo $this->modelClass; ?>'),'url'=>array('index')),
        array('label'=>yii::t('app','Create').' '.yii::t('app','<?php echo $this->modelClass; ?>'),'url'=>array('create')),
        array('label'=>yii::t('app','Update').' '.yii::t('app','<?php echo $this->modelClass; ?>'),'url'=>array('update','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
        array('label'=>yii::t('app','Delete').' '.yii::t('app','<?php echo $this->modelClass; ?>'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>yii::t('app','Are you sure you want to delete this item?'))),
        array('label'=>yii::t('app','Manage').' '.yii::t('app','<?php echo $this->modelClass; ?>'),'url'=>array('admin')),
        );
    ?>

    <h1><?php echo "<?php echo yii::t('app','View');?>";?> <?php echo "<?php echo yii::t('app','$this->modelClass');?>" . " #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

    <?php echo "<?php"; ?> $this->widget('booster.widgets.TbDetailView',array(
        'data'=>$model,
        'attributes'=>array(
        <?php
        foreach ($this->tableSchema->columns as $column) {
                echo "\t\t'" . $column->name . "',\n";
        }
        ?>
        ),
)); ?>
