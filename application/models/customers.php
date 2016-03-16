<?php
class customer extends My_Model
{

    const DB_TABLE = 'customers';
    const DB_TABLE_PK = 'customer_id';

    public $customer_id;
    public $name;
    public $email;
    public $picture;
    public $password;
    public $phone_number;
    public $address;

    
}