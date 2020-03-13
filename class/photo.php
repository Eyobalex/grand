<?php

class Photo extends Model
{
    protected static $table_name='photo';
    protected static $columns = ['id', 'filename', 'type', 'size', 'posted_for', 'posted_by', 'company_id', 'product_id'];
    public $id;
    public $filename;
    public $type;
    public $size;
    private $temp_path;
    public $posted_for;
    public $posted_by;
    public $company_id;
    public $product_id;
    protected $upload_dir = "images";
    public $errors = [];
    protected $upload_errors = array(
        UPLOAD_ERR_OK 			=> "No errors.",
        UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
        UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
        UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
        UPLOAD_ERR_NO_FILE 		=> "No file.",
        UPLOAD_ERR_NO_TMP_DIR   => "No temporary directory.",
        UPLOAD_ERR_CANT_WRITE   => "Can't write to disk.",
        UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."
    );
    public static $POSTED_FOR = [ 'PP' => 'profile_pic', 'CL' => 'company_logo', 'PI' => 'product_image'];

    public function attach_files($file){

        if (!$file || empty($file) || !is_array($file)){
            $this->errors[]= "No file was uploaded";
            return false;
        }elseif ($file['error'] != 0 ) {
            $this->errors[] = $this->upload_errors[$file['error']];
            return false;
        }
//        elseif ($file['type'] != "image/jepg" && $file['type'] != "image/png" && $file['type'] != "image/jpg" ){
//            $this->errors[] = "The type {$file['type']} is invalid";
//            return false;
//        }
        else {
            $this->temp_path = $file['tmp_name'];
            $this->filename = basename($file['name']);
            $this->type = $file['type'];
            $this->size = $file['size'];
            return true;
        }
    }
    public function image_path() {
        return $this->upload_dir.'/'.$this->filename;
    }
    public function destroy(){
        if ($this->delete()){
            $target_path = "C:/xampp/htdocs/Grand/".$this->image_path();
            return unlink($target_path)? true : false ;
        }else{
            return false;
        }
    }
    public function size_as_text() {
        if($this->size < 1024) {
            return "{$this->size} bytes";
        } elseif($this->size < 1048576) {
            $size_kb = round($this->size/1024);
            return "{$size_kb} KB";
        } else {
            $size_mb = round($this->size/1048576, 1);
            return "{$size_mb} MB";
        }
    }
    public function save()
    {
        if (isset($this->id)){
            parent::update();
        }else {

            if (!empty($this->errors)) {
                return false;
            }

            if (empty($this->filename) || empty($this->temp_path)) {
                $this->errors[] = "The file location is not available.";
                return false;
            }

            $target_path = "C:/xampp/htdocs/Grand/" . $this->upload_dir . "/" . $this->filename;

            if (file_exists($target_path)) {
                $this->errors[] = "The file {$this->filename} already exists.";
                return false;
            }

            if (move_uploaded_file($this->temp_path, $target_path)) {
                if (parent::create()) {
                    unset($this->temp_path);
                    return true;
                } else {
                    $this->errors[] = "The file upload failed.";
                    return false;
                }


            }
        }
    }

    public function product(){
        if ($this->product_id){
            $pf = Photo::$POSTED_FOR;
            $sql = "select * from products where id = '{$this->product_id}'" ;
            $result = Photo::find_by_sql($sql);
            return array_shift($result) ?? false;
        }else{
            return false;
        }
    }

    public function user(){
        if ($this->posted_by){
            $pf = Photo::$POSTED_FOR;
            $sql = "select * from user where id = '{$this->posted_by}'" ;
            $result = Photo::find_by_sql($sql);
            return array_shift($result) ?? false;
        }else{
            return false;
        }
    }

    public function company(){
        if ($this->company_id){
            $pf = Photo::$POSTED_FOR;
            $sql = "select * from listings where id = '{$this->company_id}'" ;
            $result = Photo::find_by_sql($sql);
            return array_shift($result) ?? false;
        }else{
            return false;
        }
    }






}
