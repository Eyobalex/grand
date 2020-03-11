<?php
class Staff extends Model{
    protected static $table_name = "staff";
    protected static $columns = [
        'id', 'user_id', 'company_id'
    ];

    public $id;
    public $user_id;
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
       return parent::rlsS('listings', 'id' , $this->company_id, 'Listing') ?? false;
    }
}