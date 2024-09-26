<?php
session_start();
if (isset($_POST['logout'])) {
    session_unset(); 
    session_destroy(); 
    header("Location: s.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html ng-app="myApp">
<head>
  <link rel="stylesheet" href="style_login.css">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>
<body ng-controller="myController">
  <div class="container">
    <div class="overlay" id="overlay">
      <div class="sign-in" id="sign-in">
        <h1>Welcome Back!</h1>
        <p>To keep connected with us, please sign in with your personal info</p>
        <button class="switch-button" id="slide-right-button">Sign In</button>
      </div>
      <div class="sign-up" id="sign-up">
        <h1>Hello, Friend!</h1>
        <p>Enter your personal details and start a journey with us</p>
        <button class="switch-button" id="slide-left-button">Sign Up</button>
      </div>
    </div>
    <div class="form">
      <div class="sign-in" id="sign-in-info">
        <h1>Sign In</h1>
    
        <form action="signin.php" method="post" id="sign-in-form">
          <input type="text" ng-model="username" name="username" placeholder="Username" />
          <input type="password" name="password" placeholder="Password" />
          <button name="signin" type="submit" class="control-button in">
            Sign In
          </button>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
<script>
    var app = angular.module('myApp', []);
    app.controller('myController', function($scope) {
        $scope.username = ''; 
    });
</script>
        </form>
      </div>
      <div class="sign-up" id="sign-up-info">
        <h1>Create Account</h1>
       
        <form action="signup.php" method="post" id="sign-up-form">
          <input type="text" name="username" placeholder="Username"/>
          <input type="email" name="email" placeholder="Email"/>
          <input type="password" name="password" placeholder="Password"/>
          <button type="submit" name="register" class="control-button up">Sign Up</button>
        </form>
      </div>
    </div>
  </div>
  <script src="script.js"></script>
</body>
</html>
