<?php
/**
 * User model
 *
 * @author tturnquist
 */
class User extends Model {
    public function __construct() {
        parent::__construct();
        $this->viewTableName = 'user';
        $this->viewFields = 'id, first_name, last_name, user_name, password';
        $this->changeTableName = 'user';
        $this->changeFields = 'id, first_name, last_name, user_name, password';
    }

    protected function validFieldTypes(): array {
        return [
            'id' => 'integer',
            'first_name' => 'string',
            'last_name' => 'string',
            'user_name' => 'string',
            'password' => 'string'
        ];
    }

    // Login / Authenticate User
    public function login($email, $password){
      $row = $this->fetchOneByAttr('email', $email);

      $hashed_password = $row->password;
      if(password_verify($password, $hashed_password)){
        return $row;
      } else {
        return false;
      }
    }

    // Add User / Register
    public function register($data){
      // Prepare Query
      $this->add($data, 'name, email, password');
    }
}
