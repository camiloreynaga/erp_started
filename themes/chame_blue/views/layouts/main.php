<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title><?php echo $this->pageTitle;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/css/responsive.min.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo Yii::app()->theme->baseUrl;?>/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo Yii::app()->theme->baseUrl;?>/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo Yii::app()->theme->baseUrl;?>/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo Yii::app()->theme->baseUrl;?>/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl;?>/ico/favicon.png">
  </head>
  <body>

<div class="navbar navbar-static-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="#">My app</a>

      <div class="nav-collapse collapse pull-right">
        <?php 
        $this->widget('zii.widgets.CMenu',array(
          'htmlOptions'=>array("class"=>"nav"),
          'items'=>array(
            array('label'=>'Home', 'url'=>array('/site/index')),
            array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
            array('label'=>'Contact', 'url'=>array('/site/contact')),
            array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
            array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
          ),
        ));
        /*
        $this->widget('zii.widgets.CMenu',array(
                //$this->widget('application.extensions.mbmenu.MbMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
                                //array('label'=>'Mantenimiento Producto',
                                   // 'items'=>array(
                                        array('label'=>'Presentaciones','url'=>array('/presentacion/admin')),
                                        array('label'=>'Tipos de producto','url'=>array('/tipoProducto/admin')),
                                        array('label'=>'Fabricantes','url'=>array('/fabricante/admin')),
                                        //array('label'=>'Caracteristica','url'=>array('/caracteristica/admin')),
                                        array('label'=>'Unidades de Medida','url'=>array('/unidadMedida/admin')),
                                        array('label'=>'Productos','url'=>array('/producto/admin')),
                                    
                                
                                       // ),
                                    /* ),
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
                        
		)); */
        
        ?>

      </div><!--/.nav-collapse -->
      
      <?php 
//            echo CHtml::openTag('div', array('class' => 'bs-navbar-top-example'));
//            $this->widget(
//                'booster.widgets.TbNavbar',
//                array(
//                    'brand' => 'Title',
//                    'brandOptions' => array('style' => 'width:auto;margin-left: 0px;'),
//                    'fixed' => 'top',
//                    'fluid' => true,
//                    'htmlOptions' => array('style' => 'position:absolute'),
//                    'items' => array(
//                        array(
//                            'class' => 'booster.widgets.TbMenu',
//                            'type' => 'navbar',
//                            'items' => array(
//                                array('label' => 'Home', 'url' => '#', 'active' => true),
//                                array('label' => 'Link', 'url' => '#'),
//                                array('label' => 'Link', 'url' => '#'),
//                            )
//                        )
//                    )
//                )
//            );
//            echo CHtml::closeTag('div');
      ?>

    </div>
  </div>
</div>

<?php if(!empty($this->breadcrumbs)):?>
  <div class="container" style="padding: 0">
  <div class="row-fluid">
  <div class="span12">
      <?php $this->widget('zii.widgets.CBreadcrumbs', array(
        'htmlOptions'=>array("style"=>"margin: 10px 0;"),
        'links'=>$this->breadcrumbs,
      )); ?><!-- breadcrumbs -->
  </div>
  </div> 
  </div>
<?php endif?>
<?php if(($msgs=Yii::app()->user->getFlashes())!==null and $msgs!==array()):?>
  <div class="container" style="padding-top:0">
    <div class="row-fluid">
      <div class="span12">
        <?php foreach($msgs as $type => $message):?>
          <div class="alert alert-<?php echo $type?>">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4><?php echo ucfirst($type)?>!</h4>
            <?php echo $message?>
          </div>
        <?php endforeach;?>
      </div>
    </div>
  </div>
<?php endif;?>
<?php echo $content;?>
  
<footer class="footer bg-ft clearfix pd4">
    <div class="container">
        <!--footer container-->
        <div class="row-fluid">
            <div class="span3">
                <section>
                    <h4><span>Contact Us</span></h4>
                    <p>Gustalh Creative<br>
                        123456 <br>
                        Bogotá Colombia<br>
                        <strong>phone:</strong> <a href="tel:123456789" class="tele">123456789</a><br>
                        <strong>fax:</strong> 123456789<br>
                        <span class="overflow"><strong>email:</strong> <a href="mailto:email@domain.com">email@companydomain.com</a></span> </p>
                </section>
                <!--close section-->

                <section>
                    <h4><span>Follow Us</span></h4>
                    <div class="social">
                      <a href="#"><i class="icon-facebook facebook"></i></a>
                      <a href="#"><i class="icon-twitter twitter"></i></a>
                      <a href="#"><i class="icon-linkedin linkedin"></i></a>
                      <a href="#"><i class="icon-google-plus google-plus"></i></a>
                    </div>
                </section>
                <!--close section-->
            </div>
            <!-- close .span3 -->

            <!--section containing newsletter signup and recent images-->
            <div class="span5">
                <section>
                    <h4><span>Stay Updated</span></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius.</p>
                        <form action="#" method="post">
                    <div class="input-append append-fix custom-append row-fluid">
                      <input type="email" class="span8" placeholder="Email Address" name="email">
                            <button class="btn btn-primary">Sign Up</button>

                    </div></form>
                    <!--close input-append-->
                </section>
                <!--close section-->
            </div>
            <!-- close .span5 -->

            <!--section containing blog posts-->
            <div class="span4">
                <section>
                    <h4><span>About Us</span></h4>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </section>
            </div>
            <!-- close .span4 -->
        </div>
        <!-- close .row-fluid-->
    </div>
    <!-- close footer .container-->
</footer>


 <section class="footer-credits">
    <div class="container">
        <ul class="clearfix">
            <li>© 2013 Your Company Name. All rights reserved.</li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
        </ul>
    </div>
    <!--close footer-credits container-->
</section>

  </body>
</html>
