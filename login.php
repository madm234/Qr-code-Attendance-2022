<?php
include('db.php');
include('function.php');

$fin ="";

if(isset($_POST['submit']))
{
    $username =get_safe_value($_POST['email']);
	$password =get_safe_value($_POST['pass']);
    
    if(mysqli_num_rows($sql =mysqli_query($con,"select * from student where sap_id='$username'"))>0)
    {
        $row =mysqli_fetch_assoc($sql);
		$db_status =$row['status'];
		if($db_status==0)
		{
			$fin ="Account Deactivated";
		}
		else{
			$db_pass =$row['password'];
		if(password_verify($password,$db_pass))
		{
				$_SESSION['QR_USER_LOGIN']=true;
				$_SESSION['QR_USER_ID']=$row['id'];
				$_SESSION['QR_USER_NAME']=$row['name'];
				$_SESSION['QR_USER_ROLE']=2;
				$_SESSION['IMAGE']=$row['image'];
				$_SESSION['SAP']=$row['sap_id'];
				$_SESSION['QR_USER_EMAIL']=$row['email'];
				redirect('profile.php?admreq='.$_SESSION['QR_USER_ID'].'&pid=2');
		}
		else
		{
			$fin ="Enter valid password";
		}	
		}
    }


    else if(mysqli_num_rows($sql =mysqli_query($con,"select * from staff where email='$username'"))>0)
    {
        $row =mysqli_fetch_assoc($sql);
		$db_status =$row['status'];
		if($db_status==0)
		{
			$fin ="Account Deactivated";
		}
		else{
			$db_pass =$row['password'];
		if(password_verify($password,$db_pass))
		{
				$_SESSION['QR_USER_LOGIN']=true;
				$_SESSION['QR_USER_ID']=$row['id'];
				$_SESSION['QR_USER_NAME']=$row['name'];
				$_SESSION['QR_USER_ROLE']=1;
				$_SESSION['IMAGE']=$row['image'];
				$_SESSION['QR_USER_EMAIL']=$row['email'];
				redirect('profile.php?admreq='.$_SESSION['QR_USER_ID'].'&pid=1');
		}
		else
		{
			$fin ="Enter valid password";
		}	
		}
    }


    else if(mysqli_num_rows($sql =mysqli_query($con,"select * from employee where email='$username'"))>0)
    {
        $row =mysqli_fetch_assoc($sql);
		$db_status =$row['status'];
		if($db_status==0)
		{
			$fin ="Account Deactivated";
		}
		else{
			$db_pass =$row['password'];
		if(password_verify($password,$db_pass))
		{
				$_SESSION['QR_USER_LOGIN']=true;
				$_SESSION['QR_USER_ID']=$row['id'];
				$_SESSION['QR_USER_NAME']=$row['name'];
				$_SESSION['QR_USER_ROLE']=3;
				$_SESSION['IMAGE']=$row['image'];
				$_SESSION['QR_USER_EMAIL']=$row['email'];
				redirect('profile.php?admreq='.$_SESSION['QR_USER_ID'].'&pid=3');
		}
		else
		{
			$fin ="Enter valid password";
		}	
		}
    }

    
    else if(mysqli_num_rows($sql =mysqli_query($con,"select * from admin where name='$username'"))>0)
    {
        $row =mysqli_fetch_assoc($sql);
        $db_pass =$row['password'];
		if(password_verify($password,$db_pass))
		{
				$_SESSION['QR_USER_LOGIN']=true;
				$_SESSION['QR_USER_ID']=$row['id'];
				$_SESSION['QR_USER_NAME']=$row['name'];
				$_SESSION['QR_USER_ROLE']=0;
                $_SESSION['QR_USER_EMAIL']="";
				redirect('profile.php?admreq=1&pid=0');
		}
		else
		{
			$fin ="Enter valid password";
		}	
    }


    else
    {
       $fin ="Username doesn't exists!";
    }
}
?>


<!-- red color for warning -->
<style >
   .sigma
   {
    color: red;
   }   
</style>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

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
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">DIT Welcomes You!</h1>
                                    </div>
                                    <form class="user"  method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                 aria-describedby="emailHelp"  name="email"
                                                placeholder="Username ">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="pass">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck" >Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <div class="form-group" >
                                        <button class="btn btn-facebook btn-user btn-block"  type="submit"  name="submit" >Login</button>
                                        </div>
                                        <hr>
                                        
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Forgot Password?</a>
                                    </div>
                                   
                                    <br>
                                    <center>
                                    <div class="sigma">
                                       <b> <?php echo $fin ?></b>
                                    </div>
                                    </center>
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