<?php include 'config/database.php'; ?>

<?php
session_start();
//Check if session exist 
if(isset($_SESSION['uid']) == ""){
 
header("Location: writeFeedback.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Leave Feedback</title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light bg-dark mb-4">
        <div class="container">
            <a class="nav-brand text-light" href="#"> Carlo's Media </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
         <li class="nav-item">
              <a class="nav-link text-light" href="/feedback-with-login/writeFeedback.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="/feedback-with-login/feedback.php"
                >Feedback</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="/feedback-with-login/about.php"
                >About</a
              >
            </li>
            <li class="nav-item mx-5">
              <a class="nav-link text-light" href="/feedback-with-login/logout.php"
                >Logout</a
              >
            </li>
        </ul>
      </div>
  </div>
    </nav>
<main>
  <div class="container d-flex flex-column align-items-center">