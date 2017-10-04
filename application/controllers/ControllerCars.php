<?php
namespace application\controllers;
use application\core as core;
use application\api\cars as cars;
use application\models as model;

class ControllerCars extends core\Controller
{
	public function __construct($class)
	{
		//$modelName = 'application\models\\Model' . $class;
		$viewName = 'application\api\cars\\' . $class;

		//$this->model = new $modelName;
		$this->view = new $viewName;
	}

	public function actionGet()
	{
		$this->view->getCars();
	}

	public function actionPost()
	{
		$this->view->postCars();	
	}

	public function actionPut()
	{
		$this->view->putCars();		
	}

	public function actionDelete()
	{
		$this->view->deleteCars();	
	}
}