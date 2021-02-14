<?php

class User extends Db_object{
    protected static $db_table = "users";
    protected static $db_table_fields = array("username", "password", "first_name", "last_name", "user_image");
    public $username;
    public $id;
    public $password;
    public $first_name;
    public $last_name;
    public $user_image;
    public $upload_directory = "images";
    public $image_placeholder = "https://placeholder.it?400*400&text=image";
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

    public function image_path_and_placeholder(){
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_image;
    }

        public function update_image($image, $id)
        {
            global $database;
            $this->user_image = $database->escape_string($image);
        $sql = "UPDATE users SET user_image = '{$this->user_image}' WHERE id = $id ";
        $database->query($sql);
        }
    public static function verify_user($username, $password){
    global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " . self::$db_table . "  WHERE username = '{$username}' AND password = '{$password}'";
        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }
    // public function check ($image){
    //  return   $this->user_image = $image;
    // }
    public function  set_file ($file){

        if(empty($file) || !$file || !is_array($file)){
            $this->errors = "There was no file uploaded";
        } 
        // elseif ($file['error'] !=0){
        //     $this->errors = $this->upload_errors_array($file['error']);
        // }
        else{
            $this->user_image = basename($file['name']);
            $this->type = $file['type'];
            $this->size = $file['size'];
            $this->tmp_path = $file['tmp_name'];
        }
        
}

     public function picture_path()
    {
        return $this->upload_directory.DS.$this->user_image;
    }
        // public function update_user($image){
        //     global $database;
        // $sql = "UPDATE users SET user_image = '{$image}' ";
        // $database->query($sql);
        // }
        public function upload_image(){

                if(!empty($this->errors)){
                    return false;
                }
                if(empty($this->user_image) || empty($this->tmp_path)){
                    $this->errors[] = "the file is not available"; 
                    return false;
                }
                $target_path = SITE_ROOT . DS . 'admin' .DS . $this->upload_directory . DS . $this->user_image;

                if(file_exists($target_path)){
                    $this->errors[] = "This {$this->user_image} already exists";
                    return false;
                }
                if(move_uploaded_file($this->tmp_path, $target_path)){
               
                        unset($this->tmp_path);
                        return true;
                }
                    else{
                        $this->errors[] = "the file directory probably have permission issues";
                        return false;
                    }
                }
        public function ajax_save_user_image($user_image, $user_id){
            global $database;
            $this->user_image =   $database->escape_string($user_image);
            $this->id =  $database->escape_string($user_id);
            $sql = "UPDATE  " . self::$db_table . " SET  user_image = '{$this->user_image}'  WHERE id = {$this->id}";
            $database->query($sql);
            echo $this->image_path_and_placeholder();
        }
        public function delete_photo(){
            if($this->delete()){
                $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;
               return  unlink($target_path) ? true : false ;
            }else{
                return false;
            }
        }
  public function delete_user()
  {
      if($this->delete()){
        return true;
      }else{
        return false;
      }
  }
    
}
  
?>