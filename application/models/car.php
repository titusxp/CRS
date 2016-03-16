<?php
class car extends My_Model
{

    const DB_TABLE = 'cars';
    const DB_TABLE_PK = 'car_id';

    public $car_id;
    public $car_name;
    public $model;
    public $rental_cost;
    public $status;
    public $description;

    
}