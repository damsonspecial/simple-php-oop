<?php
if(isset($_POST['submit'])){

 
  // Grabbing the data 
  $uid = $_POST['uid'];
  $pwd = $_POST['pwd'];
  $pwdRepeat = $_POST['pwdRepeat'];
  $email = $_POST['email'];

  // Instantiate SignupController class
  include "../class/dbh.class.php";
  include "../class/signup.classes.php";
  include "../class/signup-controller.classes.php";
  $signup = new Signupcontroller($uid,$pwd,$pwdRepeat,$email);
  
  // running error handlers and user signup
  $signup->signupUser();

  //Going back to front page
  header("location: ../index.php?error=none");
} else{

  echo "there is a problem";
}