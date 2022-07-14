
<?php
include('function.php');
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';	

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if(isset($_POST['reset']))
{
    $username =$_POST['user'];
    $email =$_POST['email'];


    $mail = new PHPMailer();
    $mail->SMTPDebug = 2;    
      $mail->isSMTP();
  
   $mail->Host = 'smtp.gmail.com';  
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = "tls";
      $mail->Port = 587;
      

      $mail->Username = "yogeshgiri6806@gmail.com";		
    // $msg =$sap_id."@dit.edu.in";
  $mail->Password = "eekqzrlltpmwlkkf";
  
      $mail->Subject = "Respected admin! I forgot password of my account .Kindly reset it ASAP.";
  
      $mail->setFrom($email,'user');
      $mail->isHTML(true);
      $mail->Body = "<p>My Username :- ".$username."</p> \n
           <p> <b> My email:- ".$email." </b> </p> \n";
  
      $mail->addAddress('yogeshgiri6806@gmail.com');
      if ( $mail->send() ) {
          echo "Email Sent..!";
      redirect('login.php' );
      }else{
          echo "Email not Sent..!";
      }
      $mail->smtpClose();
      
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Forgot Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">Don't panic. DIT will take care of it.</p>
                                    </div>


                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" name="user" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter your username e.g xxxxx@dit.edu.in">

                                                <br>

                                                <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter your email">
                                        </div>
                                        <a href="login.php"  >
                                            <button class="btn btn-primary btn-user btn-block" name="reset">Reset Password</button>
                                        </a>
                                    </form>
                                    <hr>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>