<?php


class PhoneNumber extends Model{
    protected static $table_name = "phone_number";
    protected static $columns = [
        'id', 'number', 'company_id'
    ];

    public $id;
    public $number;
    public $company_id;


    public function __construct ($args = [])
    {
        foreach ($args as $key => $value){
            if (property_exists($this, $key)){
                $this->$key = $value;
            }
        }

    }


    public function company(){
       return parent::rlsS('listings', 'company_id', $this->company_id, 'Listing') ?? false;
    }
}