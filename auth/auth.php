<?php

include_once('../config.php');

//Request from login confirm
if (isset($_POST['login'])) {
  //if it contains email in POST
  if (isset($_POST['Email'])) {
    //if email is empty string
    if (empty($_POST['Email'])) {
      redirectWindow("index?Email=Email cannot be empty");
    }
    //if email is invalid
    else if (!validateEmail($_POST['Email'])) {
      redirectWindow("index?Email=Invalid Email");
    }
  }

  //if it contains password in POST
  if (isset($_POST['Password'])) {
    //if password is empty string
    if (empty($_POST['Password'])) {
      redirectWindow("index?Password=Password cannot be empty");
    }
  }

  //verifies the email entered
  $user = verifyValues(
    "tbl_users",
    array(
      "Email",
      $_POST['Email']
    ),
    connect()
  );

  //saving the result in a variable
  $ValidUser = mysqli_fetch_array($user);

  //checking if the account exists
  if (isset($ValidUser)) {
    //checking the password
    if (password_verify($_POST['Password'], $ValidUser['Password'])) {
      $UserType = $ValidUser['FK_UserType'];
      session_start();
      $_SESSION["USER"] = $ValidUser;
      redirectWindow(getHTMLRoot());
    }
    //returning password is incorect
    else {
      redirectWindow("index?Password=Invalid Password");
    }
  }
  //returning Email doesnt exists
  else {
    redirectWindow("index?Email=Email doesnt exists");
  }
}
