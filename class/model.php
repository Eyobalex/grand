<?php


class Model
{
    protected static $table_name = "";
    protected static $columns= [];
    public $errors = [];
    protected static $database;

    public static function set_database($database){
        self::$database = $database;
    }

    public static function find_by_sql($sql){
        $result = self::$database->query($sql);
        if (!$result){
            exit("Database query failed." . "[". $sql ."]");
        }

        $object_array = [];
        while ($record = $result->fetch_assoc()){
            $object_array[] = static::instantiate($record);
        }

        $result->free();

        return $object_array;
    }

    public static function search($queries){

        $search = [];
        foreach ($queries as $key => $value){
            $search[] = " $key LIKE '%$value%' ";
        }
        $sql = "select * from ". static::$table_name. " where " . implode(" OR ", $search) .";";
        $result = static::find_by_sql($sql);

        if (!empty($result)){
            return $result;
        }else{
            return false;
        }

    }

    public static function find_all(){
        return static::find_by_sql("select * from ". static::$table_name);
    }
    public static function find_by_id($id){
        $clean_id = self::$database->escape_string($id);
        $sql = "select * from ".static::$table_name." where id = '${clean_id}'";
        $array =  static::find_by_sql($sql);
        if (!empty($array)){
            return array_shift($array);
        }else{
            return false;
        }

    }

    protected static function instantiate($record){
        $object = new static();
        foreach ($record as $key => $value) {
            if (property_exists($object, $key )){
                $object->$key = $value;
            }
        }
        return $object;
    }

    protected function validate() {
        $this->errors = [];

        return $this->errors;
    }


    protected function create(){
        $this->validate();
        if (!empty($this->errors)) return false;
        $attributes = $this->sanitized_attributes();
        $sql = "insert into ".static::$table_name." (". join(', ',array_keys($attributes)).") values ('".join("', '", array_values($attributes)). "')";

        echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>{$sql}<br><br><br><br><br><br><br><br><br><br><br><br><br>";
        $result = self::$database->query($sql);
        if ($result){
            $this->id = self::$database->insert_id;
        }
        return $result;
    }

    public function merge_attributes($args =[]){
        foreach ($args as $key => $value){
            if (property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }

    public static function count_all(){
        $result =  self::$database->query("select count(*) from ". static::$table_name);
        $row = $result->fetch_array();
        return array_shift($row);
    }


    public static function paginate( $offset, $per_page = 5){
        $sql = "select * from ". static::$table_name . " limit {$per_page} offset {$offset} ";
        $result = static::find_by_sql($sql);
        return $result ?? false;
    }

    protected function update(){
        $this->validate();
        if (!empty($this->errors)) return false;

        $attributes = $this->sanitized_attributes();
        $attribute_pairs = [];
        foreach ($attributes as $key => $value){
            $attribute_pairs[] = "${key}='${value}'";
        }
        $sql = "update ".static::$table_name." set ". join(',' , $attribute_pairs). "where id = '". self::$database->escape_string($this->id).  "' limit 1";
        $result = self::$database->query($sql);
        return $result;
    }

    public function patch_update($args){
        $columns = [];
        foreach ($args as $key => $value){
            $columns[] = " ${key} = '${value}'";
        }
        $sql = "update " . static::$table_name . " set " . join(',', $columns) . " where id = '". self::$database->escape_string($this->id) . "' limit 1";
        return self::$database->query($sql);
    }

    public function save(){
        if (!isset($this->id)){
            return $this->create();
        }else{
            return $this->update();
        }
    }

    public function delete(){
        $sql = "delete from ". static::$table_name . " where id = '" . self::$database->escape_string($this->id). "' limit 1";
        return self::$database->query($sql);
    }

    protected function attributes(){
        $attributes= [];
        foreach (static::$columns as $columns){
            if ($columns == 'id') continue;
            $attributes[$columns] = $this->$columns;
        }
        return $attributes;
    }

    protected function sanitized_attributes(){
        $sanitized = [];
        foreach ($this->attributes() as $key => $value){
            $sanitized[$key] = self::$database->escape_string($value);
        }
        return $sanitized;
    }



    public function rlsM( $table, $selector, $val , $returnOb){
        $sql = "select * from ${table} where ${selector} = ${val}";
        $result = $returnOb::find_by_sql($sql);
        return $result ?? false;
    }

    public function rlsS( $table, $selector, $val , $returnOb){
        $sql = "select * from ${table} where ${selector} = ${val}";
        $result = $returnOb::find_by_sql($sql);
        return array_shift($result) ?? false;
    }

    public function r_inner_join_s( $sql , $returnedOb){
        $result = self::$database->query($sql);
        $services = [];
        while ($rr = $result->fetch_assoc()){
            $services[] = $returnedOb::instantiate($rr);
        }

        return $services ?? false;
    }


}