<?php
//include ("signup.classes.php");
class SignupController extends Signup {

  private $uid;
  private $pwd;
  private $pwdRepeat;
  private $email;

  public function __construct($uid,$pwd,$pwdRepeat,$email)
  {
    $this->uid = $uid;
    $this->pwd = $pwd;
    $this->pwdRepeat = $pwdRepeat;
    $this->email = $email;

  }

  public function signupUser(){
    if($this->emptyInput()==false){
      //echo "Empty input!";
      header("location: ../index.php?error=emptyinput");
    }
    if($this->invalidUid()==false){
      //echo "Empty username!";
      header("location: ../index.php?error=username");
    }
    if($this->invalidEmail()==false){
      //echo "Empty email!";
      header("location: ../index.php?error=email");
    }
    if($this->pwdMatch()==false){
      //echo "passwords don't match!";
      header("location: ../index.php?error=passwordmatch");
    }
    if($this->uidTakenCheck()==false){
      //echo "username or email taken!";
      header("location: ../index.php?error=useroremailtaken");
    }
    $this->setUser($this->uid, $this->pwd, $this->email);
  }
  
  private function emptyInput(){
    $result;
    if(empty($this->uid) ||empty($this->pwd) ||empty($this->pwdRepeat) ||empty($this->email)){
      $result =false;
    }else{
      $result = true;
    }
    return $result;
  }
  private function invalidUid(){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)){
      $result = false;
    }else{
      $result = true;
    }
    return $result;
  }
  private function invalidEmail(){
    $result;
    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
      $result =false;
    }else{
      $result =true;
    }
    return $result;
  }
  private function pwdMatch(){
    $result;
    if ($this->pwd !== $this->pwdRepeat){
      $result =false;
    }else{
      $result=true;
    }
    return $result;
  }
  private function uidTakenCheck(){
    $result;
    if (!$this->checkUser($this->uid, $this->email)){
      $result =false;
    }else{
      $result=true;
    }
    return $result;
  }

}