<?php
  include('header.php');
  auth();
  admin_auth();

  require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';	

  use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

  $msg1 ="";
  $name ="";
  $position ="";
  $email ="";
  $password ="";
  $id =0;
  $department ="";
  $phone_no ="";

  $password_req="required";
//   if(isset($_GET['id']) && $_GET['id']>0)
// {
//   $id =get_safe_value($_GET['id']);
//   $res =mysqli_query($con,"select * from user where id ='$id' ");
//   if(mysqli_num_rows($res)>0)
//   {
//     $row =mysqli_fetch_assoc($res);
//     $name =$row['name'];
//     $roll_no =$row['roll_no'];
//     $sap_id =$row['sap_id'];
//     $email =$row['email'];
//     $password =$row['password'];
//     $password_req ="";
//   }
//   else
//   {
//     redirect('user.php');
//   }

// }


  if(isset($_POST['submit']))
  {
    $name =get_safe_value($_POST['name']);
	$email =get_safe_value($_POST['email']);
	$position =get_safe_value($_POST['position']);
  $serial =get_safe_value($_POST['serial']);
  $password1 =get_safe_value($_POST['password']);
	$password =password_hash(get_safe_value($_POST['password']),PASSWORD_DEFAULT);
  $department =get_safe_value($_POST['department']);
  $phone_no =get_safe_value($_POST['phone_no']);
  $status =1;
  date_default_timezone_set('Asia/Kolkata');
  $added_on =date('Y-m-d H:i:s');

  $email_sql ="";
  if($id>0)
  {
      $email_sql =" and id!='$id' ";
  }

// if(mysqli_num_rows(mysqli_query($con,"select * from student where email='$email' $email_sql"))>0)
// {
//   $msg1 ="A Student is already registered with same email-id";
// }
// else if(mysqli_num_rows(mysqli_query($con,"select * from staff where email='$email' $email_sql"))>0)
// {
//   $msg1 ="A Staff member is already registered with same email-id";
// }
// else if(mysqli_num_rows(mysqli_query($con,"select * from employee where email='$email' $email_sql"))>0)
// {
//   $msg1 ="A Employee is already registered with same email-id";
// }
// else
// {

  if($id>0)
  {
    $ing ="";
    if($password1!='')
    {
       $ing =",password='$password'";
    }
    mysqli_query($con,"update employee set name='$name',roll_no='$roll_no',sap_id='$sap_id',email='$email',
    total_qr='$total_qr',total_hit='$total_hit',added_on='$added_on',role='$role',status='$status' $ing where id='$id' ");
  }
  else
  {
    if($email!='')
    {
      $mail = new PHPMailer();
      $mail->SMTPDebug = 2;    
      $mail->isSMTP();
    
     $mail->Host = 'smtp.gmail.com';  
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = "tls";
      $mail->Port = 587;
        
      $mail->Username = "yogeshgiri6806@gmail.com";		
      $msg ="10000".$serial."@dit.edu.in";
    $mail->Password = "eekqzrlltpmwlkkf";
    
      $mail->Subject = "Hi ".$name."! these are your DIT credentials.";
    
      $mail->setFrom('yogeshgiri6806@gmail.com',$name);
      $mail->isHTML(true);
      $mail->Body = "<p>Username :- ".$msg."</p> \n
             <p> <b> Password :- ".$password1."</b> </p> \n";
    
      $mail->addAddress($email);
      if ( $mail->send() ) {
        echo "Email Sent..!";
        redirect('employee.php' );
      }else{
        echo "Email not Sent..!";
      }
      $mail->smtpClose();
    }
    

    mysqli_query($con,"insert into employee(name,position,password,department,email,phone_no,status)
     values('$name','$position','$password','$department','$msg','$phone_no','$status')");

    mysqli_query($con,"insert into qr_code(name,email,added_on,status)
     values('$name','$email','$added_on','$status')");

     redirect('employee.php' );
  }
  }
// }
?>


<!-- yahan pe mene internal styling ki hai sigma id ke liye,agar user same email daalega to .TEAM CHROMO -->
<style>
  #sigma
  {
    color: red;
  }
  </style>


<div class="card-body">
<div class="page-wrapper">
       
       <div class="page-breadcrumb">
         <div class="row align-items-center">
           <div class="col-md-6 col-8 align-self-center">
             <h3 class="page-title mb-0 p-0">Add Employee</h3>
             <div class="d-flex align-items-center">
               <nav aria-label="breadcrumb">
                
               </nav>
             </div>
           </div>
          
         </div>
       </div>
       <br>
 <div class="container-fluid">
         
          <form class="form-horizontal form-material"action="" method="post">
          
              <div class="form-group row">
                <label for="example-search-input" class="col-2 col-form-label">Name</label>
                <div class="col-10">
                  <input class="form-control" type="text"  name ="name" required value="<?php echo $name ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="example-search-input" class="col-2 col-form-label">Position</label>
                <div class="col-10">
                <select class="form-select form-control " aria-label="Default select example" name="position" required value="<?php echo $position?>">
                  
                  <option value="Head of Department" >Head of Department</option>
                  <option value="Employee">Employee</option>
                  <option value="Assistant Manager">Assistant Manager</option>
                  <option value="Extra">Extra</option>
                  <option value="Helping Intern">Helping Intern</option>
                  <option value="Regular Worker">Regular Worker</option>
                </select>
                </div> 
              </div>
             
              <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Email</label>
                <div class="col-10">
                  <input class="form-control" type="text"  name ="email" >
                </div>
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Password</label>
                <div class="col-10">
                  <input class="form-control" type="password"  name ="password" <?php $password_req ?>>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Serial No</label>
                <div class="col-10">
                  <input placeholder="Type 5 integer numbers to generate username" class="form-control" type="text"  name ="serial" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Department</label>
                <div class="col-10">
                <select class="form-select form-control " aria-label="Default select example" name="department" required value="<?php echo $department?>">
                  
                  <option value="Library" >Library</option>
                  <option value="Office">Office</option>
                  <option value="Reception">Reception</option>
                  <option value="Hostel">Hostel</option>
                  <option value="Cafeteria">Cafeteria</option>
                  <option value="College">College</option>
                </select>
                </div> 
              </div>
             
              <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Phone no</label>
                <div class="col-10">
                  <input class="form-control" type="text"  name ="phone_no" required value="<?php echo $phone_no ?>">
                </div>
              </div>
              
              <input type="submit" name="submit" class="btn btn-primary">
                     
        </div>
          </form>
        
        <div id="sigma">
          <?php
          echo $msg1;
          ?>
        </div>
</div>
</div>

<?php
  include('footer.php')
?>
