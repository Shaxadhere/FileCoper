<?php

include_once('../config.php');

//Request from login confirm
if (isset($_POST['login'])) {
  //if it contains Username in POST
  if (isset($_POST['Username'])) {
    //if Username is empty string
    if (empty($_POST['Username'])) {
      redirectWindow("index?Username=Username cannot be empty");
    }
  }
  

  //if it contains password in POST
  if (isset($_POST['Password'])) {
    //if password is empty string
    if (empty($_POST['Password'])) {
      redirectWindow("index?Password=Password cannot be empty");
    }
  }

  //verifies the Username entered
  $user = verifyValues(
    "tbl_user",
    array(
      "Username",
      $_POST['Username']
    ),
    connect()
  );

  //saving the result in a variable
  $ValidUser = mysqli_fetch_array($user);

  //checking if the account exists
  if (isset($ValidUser)) {
    //checking the password
    if (password_verify($_POST['Password'], $ValidUser['Password'])) {
      session_start();
      showAlert(json_encode($ValidUser));
      $_SESSION['MANAGER'] = "jkashdkjashdkjashdjk";
      redirectWindow(getHTMLRoot());
    }
    //returning password is incorect
    else {
      redirectWindow("index?Password=Invalid Password");
    }
  }
  //returning Email doesnt exists
  else {
    redirectWindow("index?Username=Username doesnt exists");
  }
}
