<?php


    class Category extends Model{
        protected static $table_name = "category";
        protected static $columns = [
            'id', 'category', 'fa_class'
        ];

        public $id;
        public $category;
        public $fa_class;

        public function __construct ($args = [])
        {
            foreach ($args as $key => $value){
                if (property_exists($this, $key)){
                    $this->$key = $value;
                }
            }

        }

        public function companies(){
            return parent::rlsM('listings', 'category_id', $this->id , 'Listing') ?? false;
        }


    }