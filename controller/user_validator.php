<?php 



class user_validator {

  private $data;
  private $errors = [];
  private static $fields = ['username', 'email','password','password_2'];

  public function __construct($post_data){
    $this->data = $post_data;
  }

  public function validateForm(){
    foreach(self::$fields as $field){
      if(!array_key_exists($field, $this->data)){
        trigger_error("'$field' is not present in the data");
        return;
      }
    }
    
    $this->validateUsername();
    $this->validateEmail();
    $this->validatePassword();
    $this->validateSamePassword();
    
    return $this->errors;
  }

  private function validateUsername(){
    $val = trim($this->data['username']);
    
    if(empty($val)){
      $this->addError('username', 'username cannot be empty');
    } 
   else {
      if(!preg_match('/^\S[a-zA-Z0-9]{5,12}$/', $val)){
        $this->addError('username','username must be 5-12 chars & alphanumeric');
        
      }
      
    }

  }
  
  private function validateEmail(){

    $val = trim($this->data['email']);

    if(empty($val)){
      $this->addError('email', 'email cannot be empty');
    } else {
      if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
        $this->addError('email', 'email must be a valid email address');
    
      }
    }

  }
  
  private function validatePassword(){
    $val = trim($this->data['password']);
    
    if(empty($val)){
      $this->addError('password', 'password cannot be empty');
    }else{
        //one letter,one number, one special character
        if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/",$val)){
            $this->addError('password','Password should be at least 8 characters in length and should include at least 1 letter,1 number and 1 special character.');
        }
    }

  }
   
  private function validateSamePassword(){
      
      $val = trim($this->data['password']);
      $val2 = trim($this->data['password_2']);
      if($val != $val2){
        $this->addError('password', 'The two passwords do not match');
        
    }
  }
  
  private function addError($key, $val){
    $this->errors[$key] = $val;
  }

  }

?>