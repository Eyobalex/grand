<?php

    class Product extends Model{

        protected static $table_name = "products";
        protected static $columns= [
            "id", "title", "description", "metadata", "meta_description", "company_id"
        ];

        public $id;
        public $title;
        public $description;
        public $meta_description;
        public $metadata;
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
            return parent::rlsS('listings', 'id', $this->company_id, 'Listing')   ?? false;
        }

        public function photo(){
            $pf = Photo::$POSTED_FOR;
            $sql = "select * from photo where posted_for = '" . $pf['PI'] . "' and product_id = '{$this->id}'" ;
            $result = Photo::find_by_sql($sql);
            return array_shift($result) ?? false;
        }
    }