<?php 
include 'config/database.php';



$name = $email = $password = $confimPass = '';
$nameErr = $emailErr = $passwordErr = $confirmPassErr = '';




if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn , $_POST['name']);
    $email = mysqli_real_escape_string($conn , $_POST['email']);
    $password = mysqli_real_escape_string($conn , $_POST['password']);
   
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailErr = "Please enter valid email id";
    }
    if(strlen($password) < 8){
        $emailErr = "Password must be minimum of 8 characters";
    }
    if(empty($_POST['name']) && empty($_POST['email']) && empty($_POST['password'])){
        $nameErr = "Please fill in the name";
        $emailErr = "Please fill in the email";
        $passwordErr = "Please fill in the password";
    }
    if(empty($_POST['name'])){
        $nameErr = "Please fill in the name";
    }
    if(empty($_POST['email'])){
        $emailErr = "Please fill in the email";
    }
    if(empty($_POST['password'])){
        $passwordErr = "Please fill in the password";
    }
    
    if($_POST['password'] != $_POST['confirmpassword']){
        $passwordErr = "Confirm Password did not match ";
        $confirmPassErr = "Confirm Password did not match ";
    }

  
    if(mysqli_query($conn, "INSERT INTO users(name,email,password) values ('". $name ."' , '". $email ."' , '". md5($password) ."' ) " )){
        header('Location: index.php');
        
    }else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }

}else{
    $error_message = "Something went wrong.";
}


mysqli_close($conn);



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
        <label for="name" class="form-label">Name </label>
        <input type="text" class="form-control <?php echo $nameErr ? 'is-invalid' : null ?>" id="name" name="name" placeholder="Enter your name">
        <div class="invalid-feedback">
          <?php echo $nameErr; ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Email </label>
        <input type="text" class="form-control <?php echo $emailErr ? 'is-invalid' : null ?>" id="email" name="email" placeholder="Enter your email">
        <div class="invalid-feedback">
          <?php echo $emailErr; ?>
        </div>
    </div>
  <div class="mb-3">
        <label for="name" class="form-label">Password </label>
        <input type="password" class="form-control <?php echo $passwordErr ? 'is-invalid' : null ?>" id="password" name="password" placeholder="Enter your password">
        <div class="invalid-feedback">
          <?php echo $passwordErr; ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Confirm Password </label>
        <input type="password" class="form-control <?php echo $confirmPassErr ? 'is-invalid' : null ?>" id="confirmpassword" name="confirmpassword" placeholder="Enter you password again.">
        <div class="invalid-feedback">
          <?php echo $confirmPassErr; ?>
        </div>
    </div>
    <div class="mb-3 text-end ">
        <a href="index.php">
        <input  type="buttom" value="Back to Login" class=" btn btn-dark w-25 position-relative">  </a>
        <input  type="submit" name="submit" value="Register" class="btn btn-dark w-25 position-relative">
        
      </div>
  </form>
  </div>
</main>
</body>
</html>


