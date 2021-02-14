<?php

    class Db_object {
        // protected static $db_table = "users";
        public $errors = array ();
        public $upload_errors_array = array (
       
            UPLOAD_ERR_OK           => "There is no error",
            UPLOAD_ERR_INI_SIZE		=> "The uploaded file exceeds the upload_max_filesize directive in php.ini",
            UPLOAD_ERR_FORM_SIZE    => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
            UPLOAD_ERR_PARTIAL      => "The uploaded file was only partially uploaded.",
            UPLOAD_ERR_NO_FILE      => "No file was uploaded.",               
            UPLOAD_ERR_NO_TMP_DIR   => "Missing a temporary folder.",
            UPLOAD_ERR_CANT_WRITE   => "Failed to write file to disk.",
            UPLOAD_ERR_EXTENSION    => "A PHP extension stopped the file upload."					
                            
        
            );
    public static function find_all(){
        return static::find_this_query("SELECT * FROM " . static::$db_table . " ");
     }
     public static function find_by_id($id){
         $result = static::find_this_query("SELECT * FROM " . static::$db_table . "  WHERE id = $id");
         // $found_user = mysqli_fetch_array($result);
         return !empty($result)? array_shift($result) : false;
     }
 
     public static function find_this_query($sql){
         global $database;
         $result = $database->query($sql);
         $the_object_array = array();
         while($row = mysqli_fetch_array($result)){
             $the_object_array[] = static::instantiation($row);
         }
         return $the_object_array;
     }
     public static function instantiation($the_record){
         $calling_class = get_called_class();
         $the_object = new $calling_class;
         // $the_object->username   =  $found_user['username'];
         // $the_object->password   =  $found_user['password'];
         // $the_object->id         = $found_user['id'];
         // $the_object->first_name = $found_user['first_name'];
         // $the_object->last_name  = $found_user['last_name'];
         foreach ($the_record as $the_attribute => $value) {
         if($the_object->has_the_attribute($the_attribute)){
             $the_object->$the_attribute = $value;
         }
         }
         return $the_object;
     }
     private function has_the_attribute($the_attribute){
         $object_properties = get_object_vars($this);
         return array_key_exists($the_attribute, $object_properties);
     }
     protected function properties(){
        // return get_object_vars($this);
        $properties = array();

        foreach(static::$db_table_fields as $db_field){
            if(property_exists($this, $db_field)){
                $properties[$db_field] = $this->$db_field;
            }
        }
        return $properties;
 
    }
    public  function cleanProperties()
    {
            global $database;
            $cleanProperties = array ();

            foreach ($this->properties() as $key => $value){
                $cleanProperties[$key] = $database->escape_string($value);
            }
            return $cleanProperties;

    }
    public function save(){
        return isset($this->id) ? $this->update() : $this->create();
    }
    public function create (){
        global $database;
        $properties = $this->cleanProperties();
        $sql = "INSERT INTO " .static::$db_table. "(".implode(',', array_keys($properties)) .  ") ";
        $sql .= " VALUES ('".implode("','", array_values($properties)) ."')";
        if($database->query($sql)){
            $this->id = $database->the_insert_id();
            return true;
        }else{
            return false;
        }
        
    }
    public function update(){
        global $database;
        $properties = $this->cleanProperties();
        $properties_pairs = array();
        foreach ($properties as $key => $value){
            $properties_pairs[] = "{$key} = '{$value}'";
        }
        $sql = "UPDATE " .static::$db_table. "  SET ";
        $sql .= implode(",", $properties_pairs);
        $sql .= " WHERE id =" . $database->escape_string($this->id);
        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }
        public static function count_all (){
            global $database;
            $sql = "SELECT COUNT(*) FROM " . static::$db_table;
            $result = $database->query($sql);
            $row = mysqli_fetch_array($result);
            return array_shift($row);
        }
    public function delete(){
        global $database;
        $sql = "DELETE  FROM  " .static::$db_table. "  ";  
        $sql .= "WHERE id =" . $database->escape_string($this->id);
        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }


    }


?>