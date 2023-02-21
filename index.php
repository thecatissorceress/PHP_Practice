<?php 

session_start();
include 'config/database.php';
$email = $password=  '';
$emailErr = $passwordErr = $error_message = '';

//Check if session exist 
if(isset($_SESSION['uid']) != ""){
  header("Location: writeFeedback.php");
}

/*
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  
  $emailErr = "Please Enter Valid Email Id";

}

if(empty($email) && empty($password)){
  $emailErr = "Please fill in Email";
  $passwordErr = "Please fill in Password";

}
if(empty($email)){
  $emailErr = "Please fill in Email";
}else {
  $email = filter_input(INPUT_POST, 'email' , FILTER_SANITIZE_EMAIL);
}
if(empty($password)){
  $passwordErr = "Please fill in Password";
}else{
  $password = filter_input(INPUT_POST, 'password' , FILTER_SANITIZE_SPECIAL_CHARS);
}
if (strlen($password) < 8){
  $passowrdErr = "Password must be minimum of 8 characters";
}

$result = mysqli_query($conn , "SELECT * FROM users WHERE email = '". $email. "' AND password = '" . md5($password) . "' ");
echo 'Reached!';
if($row = mysqli_fetch_array($result)){
  $_SESSION['user_id'] = $row['user_id'];
  $_SESSION['email'] = $row['email'];
  $_SESSION['name'] = $row['name'];
  header("Location: writeFeedback.php");
}

*/
//Login Button Clicked
if(isset($_POST['submit'])){
  $email = mysqli_real_escape_string($conn, $_POST['email']);

  $password = mysqli_real_escape_string($conn, $_POST['password']);

 
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  
    $emailErr = "Please Enter Valid Email Id";
  
  }
  if(empty($email) && empty($password)){
    $emailErr = "Please fill in Email";
    $passwordErr = "Please fill in Password";
  
  }

  if (strlen($password) < 8){
    $passwordErr = "Password must be minimum of 8 characters";
  }

  //$result = mysqli_query($conn , "SELECT * FROM users WHERE email = '". $email. "' AND password = '" . md5($password) . "' ");
  $result = mysqli_query($conn,  "SELECT * FROM users WHERE email = '". $email ."' and password = '" . md5($password) . "'");
  if($row = mysqli_fetch_array($result)){
    $_SESSION['uid'] = $row['user_id'];
    $_SESSION['user_email'] = $row['email'];
    $_SESSION['user_name'] = $row['name'];
    echo $_SESSION['user_id'];
    header("Location: writeFeedback.php");
  }
  else {
    $error_message = "Incorrect Email or Password ";
  }
  
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>

</html>
<body>
<main>
  <div class="container d-flex flex-column align-items-center">
  <img src="/feedback-with-login/img/logo.png" class="w-25 mb-3" alt="">
  <h2>Login Form</h2>
  <span class="text-danger"><?php if (isset($error_message)) echo $error_message; ?></span>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="mt-4 w-50" method="post">
  <div class="mb-3">
        <label for="name" class="form-label">Email </label>
        <input type="text" class="form-control <?php echo $emailErr ? 'is-invalid' : null ?>" id="email" name="email" placeholder="Enter your email">
        <div class="invalid-feedback">
          <?php echo $emailErr; ?>
        </div>
    </div>
  <div class="mb-3">
        <label for="name" class="form-label">Password </label>
        <input type="text" class="form-control <?php echo $passwordErr ? 'is-invalid' : null ?>" id="password" name="password" placeholder="Enter your password">
        <div class="invalid-feedback">
          <?php echo $passwordErr; ?>
        </div>
    </div>
    <div class="mb-3 text-end ">
      <a href="register.php">
        <input  type="buttom" name="submit" value="Register" class=" btn btn-dark w-25 position-relative">  </a>
        <input  type="submit" name="submit" value="Login" class="btn btn-dark w-25 position-relative">
        
      </div>
  </form>
  </div>
</main>
</body>
</html>
