<?php
include 'DB.php';

class Auth{
    private $table = 'users';
    private $userName;
    private $email;
    private $password;
    public function setUsername($userName){
        $this->userName=$userName;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function setPassword($password){
        $this->password=$password;
    }

    public function insert(){
        $sql = "INSERT INTO $this->table(username , email , password ) VALUES(:username , :email , :password )";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':username' , $this->userName);
        $stmt->bindParam(':email' , $this->email);
        $stmt->bindParam(':password' , $this->password);
        return $stmt->execute();
    }
    public function login($email , $password, $userType){
        $sql = "select * from $this->table WHERE  email = :email AND password = :password AND userType = :userType";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':email' , $email);
        $stmt->bindParam(':password' , $password);
        $stmt->bindParam(':userType' , $userType);
        $stmt->execute();
       return $stmt->fetch();

    }
    public function emailcheck($email){
        $sql = "SELECT email FROM $this->table WHERE email = :email";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':email',$email);
        $stmt->execute();
        if($stmt->rowCount()>0){
            return true;
        }
        else{
            return false;
        }
    }

}

?>