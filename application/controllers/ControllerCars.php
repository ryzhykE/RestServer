<?php
namespace application\controllers;
use application\core as core;
use application\api\cars as cars;
use application\models as model;

class ControllerCars extends core\Controller
{
	public function __construct($class)
	{
		$modelName = 'application\models\\Model' . $class;
		$viewName = 'application\api\cars\\' . $class;

		$this->model = new $modelName;
		$this->view = new $viewName;
	}

	public function actionGet($input)
    {
        $params = $this->parseGetData($input);
        if($params[0] !== '')
        {
            $data = $this->model->getCarById($params[0]);
        }
        else
        {
            $data = $this->model->getAllCars();
        }
		$this->view->getCars($input,$data);
	}

	public function actionPost($input)
	{
		$this->view->postCars();	
	}

	public function actionPut($input)
	{
		$this->view->putCars();		
	}

	public function actionDelete($input)
	{
		$this->view->deleteCars();	
    }


}
