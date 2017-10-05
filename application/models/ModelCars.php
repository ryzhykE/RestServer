<?php
namespace application\models;
use application\core as core;
use application\libs\dbWork as db;
class ModelCars extends core\Model
{
    protected $data;
    protected $db;

    public function __construct()
    {
        $this->db = new db\PdoWork('Mysql');
    }

    public function getAllCars()
    {
        $query = "SELECT cars.id_car as id, brands.name as brand, cars.model 
            FROM cars LEFT JOIN brands ON cars.id_brand = brands.id_brand";
        $result = $this->db->sendCustomQuery($query,1);
        return $result; 
    }

    public function getCarById($id)
    {

        $id = 1 * $id;
        $query = "SELECT cars.id_car as id,
            cars.model,
            brands.name as brand,
            colors.name as color,
            years.year,
            engines.capacity,
            cars.max_speed,
            cars.price
            FROM cars
            LEFT JOIN brands ON brands.id_brand = cars.id_brand
            LEFT JOIN colors ON colors.id_color = cars.id_color
            LEFT JOIN years ON years.id_year = cars.id_year
            LEFT JOIN engines ON engines.id_engine = cars.id_engine 
            WHERE cars.id_car = $id";
        $result = $this->db->sendCustomQuery($query,1);
        return $result;
    }
}
