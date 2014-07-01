<?php
$this->breadcrumbs=array(
	'Detalle Pedidos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List DetallePedido','url'=>array('index')),
	array('label'=>'Create DetallePedido','url'=>array('create')),
	array('label'=>'View DetallePedido','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage DetallePedido','url'=>array('admin')),
	);
	?>

	<h1>Update DetallePedido <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>