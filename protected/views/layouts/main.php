<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainMbmenu">
		<?php $this->widget('application.extensions.mbmenu.MbMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
                                array('label'=>'Mantenimiento Producto',
                                    'items'=>array(
                                        array('label'=>'Presentaciones','url'=>array('/presentacion/admin')),
                                        array('label'=>'Tipos de producto','url'=>array('/tipoProducto/admin')),
                                        array('label'=>'Fabricantes','url'=>array('/fabricante/admin')),
                                        //array('label'=>'Caracteristica','url'=>array('/caracteristica/admin')),
                                        array('label'=>'Unidades de Medida','url'=>array('/unidadMedida/admin')),
                                        array('label'=>'Productos','url'=>array('/producto/admin')),
                                    
                                
                                        ),
                                    ),
                                array('label'=>'Almacen',
                                    'items'=>array(
                                       // array('label'=>'Ubicaciones','url'=>array('/ubicacion/admin')),
                                        //array('label'=>'Almacenes','url'=>array('/almacen/admin')),
                                        array('label'=>'Motivos de movimiento','url'=>array('/motivoMovimiento/admin')),
                                        array('label'=>'Ingreso/Salida','url'=>array('/movimientoAlmacen/admin')),
                                        array('label'=>'Productos x almacen','url'=>array('/productoAlmacen/admin')),
                                         
                                    )
                                    ),
                                array('label'=>'Documentos',
                                    'items'=>array(
                                        array('label'=>'Tipos de Comprobante','url'=>array('/tipoComprobante/admin')),
                                        array('label'=>'Guias de Remision','url'=>array('/guiaRemision/admin')),
                                        array('label'=>'Notas de Credito','url'=>array('/notaCredito/admin')),
                                    )
                                    ),    
                                array('label'=>'Empleados',
                                    'items'=>array(
                                        array('label'=>'Cargos','url'=>array('/cargo/admin')),
                                        array('label'=>'Empleados','url'=>array('/empleado/admin')),
                                     //   array('label'=>'Usuarios','url'=>array('/usuario/admin')),
                                    )
                                    ),    
                                array('label'=>'Sistema',
                                        'items'=>array(
                                            array('label'=>'Proveedores','url'=>array('/proveedor/admin')),
                                            array('label'=>'Clientes','url'=>array('/cliente/admin')),
                                            
                                        ),
                                    ),
                                array('label'=>'Operaciones',
                                    'items'=>array(
                                            array('label'=>'Ordenes de compra','url'=>array('/ordenCompra/admin')),
                                            array('label'=>'Compras','url'=>array('/compra/admin')),
                                            array('label'=>'Pedidos','url'=>array('/pedido/admin')),
                                            array('label'=>'Ventas','url'=>array('/venta/admin')),
                                        ),
                                    ),
                                array('label'=>'Cuentas',
                                    'items'=>array(
                                        array('label'=>'Cuentas por Cobrar','url'=>array('/cuentaCobrar/Create')),
                                        array('label'=>'Cuentas por Pagar','url'=>array('/cuentaPagar/admin')),
                                    )
                                    ), 
                                array('label'=>'Reportes',
                                    'items'=>array(
                                        array('label'=>'reportes','url'=>array('/reportes/index')),
                                        //array('label'=>'Cuentas por Pagar','url'=>array('/cuentaPagar/admin')),
                                    )
                                    ), 
                                   
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
                        
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
