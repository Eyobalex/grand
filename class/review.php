<?php

class Review extends Model{
    protected static $table_name = "review";
    protected static $columns = [
        'id',
        'name',
        'email',
        'comment',
        'rating',
        'posted_at',
        'listing_id'
    ];

    public $id;
    public $name;
    public $email;
    public $comment;
    public $rating;
    public $posted_at;
    public $listing_id;


    public function __construct ($args = [])
    {
        foreach ($args as $key => $value){
            if (property_exists($this, $key)){
                $this->$key = $value;
            }
        }
    }

    public static function getReviewNByEmail($email){
        $result = self::$database->query("select count(*) from review where email = '${email}'");
        $row = $result->fetch_array();
        return array_shift($row) ?? false;
    }

    public static function checkDuplicateUser($listing_id, $email){
        $sql = "select count(*) from review where listing_id='{$listing_id}' and email='{$email}'";
        $result = self::$database->query($sql);
        $row = $result->fetch_array();

        return array_shift($row) ?? false;

    }
}