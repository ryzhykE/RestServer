<?php
namespace application\api\cars;
use application\core as core;

class Cars extends core\View
{
    public function getCars($data = ''){
    	echo __FUNCTION__ . ' ' . $data;
    }

    public function postCars($data = ''){
    	echo __FUNCTION__ . ' ' . $data;
    	//var_dump($_POST);
    }

    public function putCars($data = ''){
    	echo __FUNCTION__ . ' ' . var_dump($data);
    }

    public function deleteCars($data = ''){
    	echo __FUNCTION__ . ' ' . $data;
    }
}

