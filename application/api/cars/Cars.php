<?php
namespace application\api\cars;
use application\core as core;

class Cars extends core\View
{
    public function getCars($input = '', $data = '')
    {
        $this->restResponse('200');
        $this->formatOutput($input, $data);
    }

    public function postCars($input = '', $data = '')
    {
        $this->restResponse('501');
    }

    public function putCars($input = '', $data = '')
    {
        $this->restResponse('501');
    }

    public function deleteCars($input = '', $data = '')
    {
        $this->restResponse('501');
    }
}

