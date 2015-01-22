<?php
/* @var $this ReportesController */

$this->breadcrumbs=array(
	'Reportes',
);
?>



<?php

$reportico = Yii::app()->getModule('reportico');
	$engine = $reportico->getReporticoEngine();
	$reportico->engine->initial_execute_mode = "MENU";
	$reportico->engine->access_mode = "ONEPROJECT";
	$reportico->engine->initial_project = "reportes";
	$reportico->engine->clear_reportico_session = true;
	$reportico->generate();
?>