<?php
class payment extends My_Model
{

    const DB_TABLE = 'payments';
    const DB_TABLE_PK = 'payment_id';

    public $payment_id;
    public $payment_date;
    public $amount_paid;
    public $recorded_by_user_id;

    
}