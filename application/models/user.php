<?php
class user extends My_Model
{

    const DB_TABLE = 'users';
    const DB_TABLE_PK = 'user_id';

    public $user_id;
    public $user_name;
    public $password;
    public $full_name;

    
}