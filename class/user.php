<?php


class User extends Model
{

    protected static $table_name = "user";
    protected static $columns = ['id', 'user_type',  'password', 'status', 'user_pic', 'user_mail', 'first_name', 'last_name', 'phone_number', 'user_status', 'email_verification_code', 'password_reset_code'];
    public const USER_TYPES = [ "admin", "customer", "moderator"];

    public $id;
    public $user_type = "customer";
    public $password;
    public $user_password;
    public $confirm_password;
    public $status = "pending";
    public $user_pic;
    public $user_mail;
    public $first_name;
    public $last_name;
    public $phone_number;
    public $user_status = 0;
    public $email_verification_code;
    public $password_reset_code;

    protected $password_required = true;

    public function __construct ($args = [])
    {
        foreach ($args as $key => $value){
            if (property_exists($this, $key)){
                $this->$key = $value;
            }
        }

    }

    public function full_name(){
        return $this->first_name . " " . $this->last_name;
    }


    protected function validate ()
    {
        $this->errors = [];

        if(is_blank($this->first_name)) {
            $this->errors['first_name'] = "First name cannot be blank.";
        } elseif (!has_length($this->first_name, array('min' => 2, 'max' => 255))) {
            $this->errors['first_name'] = "First name must be between 2 and 255 characters.";
        }

        if(is_blank($this->last_name)) {
            $this->errors['last_name'] = "Last name cannot be blank.";
        } elseif (!has_length($this->last_name, array('min' => 2, 'max' => 255))) {
            $this->errors['last_name'] = "Last name must be between 2 and 255 characters.";
        }

            if(is_blank($this->user_mail)) {
                $this->errors['email'] = "Email cannot be blank.";
            } elseif (!has_length($this->user_mail, array('max' => 255))) {
                $this->errors['email'] = "Last name must be less than 255 characters.";
            } elseif (!has_valid_email_format($this->user_mail)) {
                $this->errors['email'] = "Email must be a valid format.";
            }
            elseif (has_unique_email($this->user_mail,  $this->user_id ?? 0)){
                $this->errors['email'] = "Email must be unique.";
            }



        $this->validate_password();

        return $this->errors;
    }

    public function reset_password(){
        $this->validate_password();
        $this->set_password();
        return static::patch_update(['password' => $this->password, 'password_reset_code' => '']);
    }

    protected function validate_password(){
        if ($this->password_required){
            if(is_blank($this->user_password)) {
                $this->errors['user_password'] = "Password cannot be blank.";
            } elseif (!has_length($this->user_password, array('min' => 12))) {
                $this->errors['user_password'] = "Password must contain 12 or more characters";
            }
//            elseif (!preg_match('/[A-Z]/', $this->user_password)) {
//                $this->errors['user_password'] = "Password must contain at least 1 uppercase letter";
//            } elseif (!preg_match('/[a-z]/', $this->user_password)) {
//                $this->errors['user_password'] = "Password must contain at least 1 lowercase letter";
//            } elseif (!preg_match('/[0-9]/', $this->user_password)) {
//                $this->errors['user_password'] = "Password must contain at least 1 number";
//            } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->user_password)) {
//                $this->errors['user_password'] = "Password must contain at least 1 symbol";
//            }

            if(is_blank($this->confirm_password)) {
                $this->errors['confirm_password'] = "Confirm password cannot be blank.";
            } elseif ($this->user_password != $this->confirm_password) {
                $this->errors['confirm_password'] = "Password and confirm password must match.";
            }
        }
    }

    public function change_password($op, $np, $cp){

        $this->user_password = $np;
        $this->confirm_password = $cp;

        $this->validate_password();
        if (!empty($this->errors)) return false;
        $result = $this->verify_password($op);
        if ($result !== false) {
            $this->set_password();
            if ( $user = $this->patch_update(['password' => $this->password]) ) {
                return $user;
            } else {
                return false;
            }
        }else{
            $this->errors['old_password'] = "the password you entered doesn't exist in our database.";
            return false;
        }

    }

    public function set_password(){
        $this->password = password_hash($this->user_password, PASSWORD_BCRYPT);
    }
    public function verify_password($password){
        return password_verify($password, $this->password);
    }
    protected function create ()
    {
        $this->set_password();
        return parent::create();
    }
    protected function update ()
    {
        if ($this->user_password != ''){
            $this->set_password();
        }else{
            $this->password_required = false;
        }
        return parent::update();
    }
    public static function find_by_username($username){
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE user_name='" . self::$database->escape_string($username) . "'";
        $obj_array = static::find_by_sql($sql);
        if(!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

    public static function find_by_email($email){
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE user_mail='" . self::$database->escape_string($email) . "'";
        $obj_array = static::find_by_sql($sql);
        if(!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

    public function companies(){
        return $this->rlsM('listings', 'owner_id', $this->id, 'Listing') ?? false;
    }

    public function profilePicture(){
        $pf = Photo::$POSTED_FOR;
        $sql = "select * from photo where posted_for = '" . $pf['PP'] . "' and posted_by = '{$this->id}'" ;
        $result = Photo::find_by_sql($sql);
        return array_shift($result) ?? false;
    }

}