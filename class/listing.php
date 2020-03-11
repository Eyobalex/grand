<?php

//include_once "model.php";
    class Listing extends Model{
        protected static $table_name = "listings";
        protected static $columns = [
            'id',
            'company_name',
            'owner_id',
            'category_id',
            'company_description',
            'fax',
            'po_box',
            'website',
            'country',
            'city',
            'subcity',
            'address_line_1',
            'address_line_2',
            'facebook',
            'youtube',
            'twitter',
            'linkedin',
            'map',
        ];


    public $id;
    public $company_name;
    public $owner_id;
    public $category_id;
    public $company_description;
    public $fax;
    public $po_box;
    public $website;
    public $country;
    public $city;
    public $subcity;
    public $address_line_1;
    public $address_line_2;
    public $facebook;
    public $youtube;
    public $twitter;
    public $linkedin;
    public $map;


        public function __construct ($args = [])
        {
            foreach ($args as $key => $value){
                if (property_exists($this, $key)){
                    $this->$key = $value;
                }
            }

        }

        public static function sort($queries){

            $search = [];
            foreach ($queries as $key => $value){
                $search[] = " $key LIKE '$value%' ";
            }
            $sql = "select * from ". static::$table_name. " where " . implode(" OR ", $search) .";";
            $result = static::find_by_sql($sql);

            if (!empty($result)){
                return $result;
            }else{
                return false;
            }

        }


        public function category(){
           return parent::rlsS("category", 'id', $this->category_id, 'Category') ?? false;
        }

        public function owner(){

            return parent::rlsS('user', 'id', $this->owner_id, "User") ?? false;
        }

        public function products(){
            return parent::rlsM("products", "company_id",$this->id,  'Product')    ?? false;
        }

        public function phoneNumbers(){
            return parent::rlsM('phone_number', 'company_id', $this->id,  'PhoneNumber') ?? false;
        }

        public function services(){
            return parent::rlsM("services", "company_id",$this->id, 'Service') ?? false;
        }

        public function staffs(){
            return parent::rlsM('staff', 'company_id', $this->id, 'Staff') ?? false;
        }

        public function logo(){
            $pf = Photo::$POSTED_FOR;
            $sql = "select * from photo where posted_for = '" . $pf['CL'] . "' and company_id = '{$this->id}'" ;
            $result = Photo::find_by_sql($sql);
            return array_shift($result) ?? false;
        }

        public function reviews(){
            return $this->rlsM('review', 'listing_id', $this->id, 'Review') ?? false;
        }

        public function review_count(){
            $result = self::$database->query("select count(*) from review where listing_id = '{$this->id}'");
            $row = $result->fetch_array();
            return array_shift($row) ?? false;
        }

        public function rating(){
            $reviews =(array) $this->reviews();
            $rating = 0;
            $total = count($reviews);
            foreach ($reviews as $review){
                $rating += $review->rating;
            }

            return ($total > 0)  ? round($rating /$total, 1) : 0;
        }



    }