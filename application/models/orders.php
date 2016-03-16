<?php
class order extends My_Model
{

    const DB_TABLE = 'orders';
    const DB_TABLE_PK = 'order_id';

    public $order_id;
    public $date_recorded;
    public $amount_due;
    public $start_date;
    public $car_id;
    public $customer_id;
    public $recorded_by_user_id;

    
}