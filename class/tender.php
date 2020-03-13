<?php
class Tender extends Model{

    protected static $table_name = "tender";
    protected static $columns = [
        'id',
        'description',
        'ref_no',
        'notice_type',
        'published_on',
        'price',
        'company_id'
    ];


    public $id;
    public $description;
    public $ref_no;
    public $notice_type;
    public $published_on;
    public $price;
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
        return parent::rlsS("listings", "id", $this->company_id, 'Listing') ?? false;
    }


}