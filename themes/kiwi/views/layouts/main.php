<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />

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

        
        <?php 
        
        //echo CHtml::openTag('div', array('class' => 'bs-navbar-top-example'));
        $this->widget(
            'booster.widgets.TbNavbar',
            array(
                'type'=>'inverse',
               // 'brand' => $this->pageTitle,
                'brandOptions' => array('style' => 'width:auto;margin-left: 0px;'),
                'collapse'=>true,
                'fixed' => 'top',
                'fluid' => true,
                'items' => array(
                    array(
                        'class' => 'booster.widgets.TbMenu',
                        'type' => 'navbar',
                        'items' => array(
                            array('label' => yii::t('app','Home'), 'url' => array('/site/index')),
                            array('label' => yii::t('app','System maintance'),
                                'url' => '#',
                                'items'=>array(
                                    array('label'=> yii::t('app','Presentations'),'url'=>array('/presentacion/admin')),
                                    array('label'=>yii::t('app','Product types'),'url'=>array('/tipoProducto/admin')),
                                    array('label'=>yii::t('app','Brand'),'url'=>array('/fabricante/admin')),
                                    //array('label'=>'Caracteristica','url'=>array('/caracteristica/admin')),
                                    array('label'=>yii::t('app','Measurement units'),'url'=>array('/unidadMedida/admin')),
                                   // array('label'=>yii::t('app','Colors'),'url'=>array('/color/admin')),
                                    array('label'=>yii::t('app', 'Products'),
                                        'url'=>array('/producto/admin'),
                                        ),
                                    
                                    '---',
                                    array('label'=>yii::t('app','Stores'),'url'=>array('/puntoVenta/admin')),
                                    array('label'=>yii::t('app','Providers'),'url'=>array('/proveedor/admin')),
                                    array('label'=>yii::t('app','Clients'),'url'=>array('/cliente/admin')),
                                    '---',
                                    array('label'=>yii::t('app','Taxes'),'url'=>array('/tax/admin')),
                                    array('label'=>yii::t('app','Currencies'),'url'=>array('/currency/admin')),
                                    array('label'=>yii::t('app','Offers'),'url'=>array('/offer/admin')),
                                    ),
                                ),
                                
                            array('label' => yii::t('app','Storage'), 'url' => '#',
                                'items'=>array(
                                       // array('label'=>'Ubicaciones','url'=>array('/ubicacion/admin')),
                                        array('label'=>yii::t('app','Storages'),'url'=>array('/almacen/admin')),
                                        array('label'=>yii::t('app','Motion Reasons'),'url'=>array('/motivoMovimiento/admin')),
                                        array('label'=>yii::t('app','In/Out'),'url'=>array('/movimientoAlmacen/admin')),
                                        array('label'=>yii::t('app','Products for storage'),'url'=>array('/productoAlmacen/admin')),
                                         
                                    )
                                ),
                            array('label'=>yii::t('app','Documents'),
                                    'items'=>array(
                                        array('label'=>yii::t('app','Types of receipts'),'url'=>array('/tipoComprobante/admin')),
                                        array('label'=>yii::t('app','Asign serie and number'),'url'=>array('/SerieNumero/admin')),
                                        array('label'=>yii::t('app','Referral guide'),'url'=>array('/guiaRemision/admin')),
                                        array('label'=>yii::t('app','Credit notes'),'url'=>array('/notaCredito/admin')),
                                    )
                                    ),    
                                array('label'=>yii::t('app','Staff'),
                                    'items'=>array(
                                        array('label'=>yii::t('app','Positions'),'url'=>array('/cargo/admin')),
                                        array('label'=>yii::t('app','Employees'),'url'=>array('/empleado/admin')),
                                     //   array('label'=>'Usuarios','url'=>array('/usuario/admin')),
                                    )
                                    ),    
                                
                                array('label'=>yii::t('app','Operations'),
                                    'items'=>array(
                                            array('label'=>yii::t('app','Purchase orders'),'url'=>array('/ordenCompra/admin')),
                                            array('label'=>yii::t('app','Purchase'),'url'=>array('/compra/admin')),
                                            array('label'=>yii::t('app','Orders'),'url'=>array('/pedido/admin')),
                                            //array('label'=>yii::t('app','Sales'),'url'=>array('/venta/admin')),
                                            array('label'=>yii::t('app','Create').' '.yii::t('app','Sales'),'url'=>array('/Venta/createVenta')),
                                            array('label'=>yii::t('app','Manage').' '.yii::t('app','Sales'),'url'=>array('/Venta/admin')),
                                        ),
                                    ),
                                array('label'=>yii::t('app','Accounts'),
                                    'items'=>array(
                                        array('label'=>yii::t('app','Accounts receivable'),'url'=>array('/cuentaCobrar/Create')),
                                        array('label'=>yii::t('app','Accounts payable'),'url'=>array('/cuentaPagar/admin')),
                                    )
                                    ), 
                                array('label'=>yii::t('app','Reports'),
                                    'url' => array('/reportes/index'),
                                    //'items'=>array(
                                      //  array('label'=>'reportes','url'=>array('/reportes/index')),
                                        //array('label'=>'Cuentas por Pagar','url'=>array('/cuentaPagar/admin')),
                                    //)
                                    ),
                                   
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                        )
                    )
                )
            )
        );
       // echo CHtml::closeTag('div');
        
        ?>
        
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Kiwi Soluciones.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
