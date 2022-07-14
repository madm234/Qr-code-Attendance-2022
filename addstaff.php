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
  $course ="";
  $branch ="";
  $phone_no ="";
  $msg ="";
  $subject ="";
  $phone_no ="";
  $serial="";
  $password_req="required";
  if(isset($_GET['id']) && $_GET['id']>0)
{
  $id =get_safe_value($_GET['id']);
  $res =mysqli_query($con,"select * from staff where id ='$id' ");
  if(mysqli_num_rows($res)>0)
  {
    $row =mysqli_fetch_assoc($res);
    $name =$row['name'];
    $email =$row['email'];
    $password =$row['password'];
    $password_req ="";
    $subject =$row['subject'];
    $position =$row['position'];
    $course =$row['course'];
    $branch =$row['branch'];
    $phone_no =$row['phone_no'];
    $sub =substr($email,5,5);
    $serial =$sub;
  }
  else
  {
    redirect('staff.php');
  }

}


  if(isset($_POST['submit']))
  {
    $name =get_safe_value($_POST['name']);
	$email =get_safe_value($_POST['email']);
	$position =get_safe_value($_POST['position']);
	$serial =get_safe_value($_POST['serial']);
  $password1 =get_safe_value($_POST['password']);
  $subject =get_safe_value($_POST['subject']);
	$password =password_hash(get_safe_value($_POST['password']),PASSWORD_DEFAULT);
  $course =get_safe_value($_POST['course']);
  $branch =get_safe_value($_POST['branch']);
  $phone_no =get_safe_value($_POST['phone_no']);
  $status =1;
  $msg ="10000".$serial."@dit.edu.in";
  date_default_timezone_set('Asia/Kolkata');
  $added_on =date('Y-m-d H:i:s');


  $email_sql ="";
  if($id>0)
  {
      $email_sql =" and id!='$id' ";
  }

if(mysqli_num_rows(mysqli_query($con,"select * from student where email='$msg' $email_sql"))>0)
{
  $msg1 ="A Student is already registered with same username";
}
if(mysqli_num_rows(mysqli_query($con,"select * from staff where email='$msg' $email_sql"))>0)
{
  $msg1 ="A Staff member is already registered with same username";
}
else if(mysqli_num_rows(mysqli_query($con,"select * from employee where email='$msg' $email_sql"))>0)
{
  $msg1 ="A Employee is already registered with same username";
}
else
{

  if($id>0)
  {
    $ing ="";
    if($password1!="")
    {
       $ing =",password='$password'";
    }
    mysqli_query($con,"update staff set name='$name',email='$msg',subject='$subject',course='$course',branch ='$branch',
    phone_no='$phone_no',position='$position' $ing where id='$id' ");


  //   $mail = new PHPMailer();
  //   $mail->SMTPDebug = 2;    
  //   $mail->isSMTP();
  
  //  $mail->Host = 'smtp.gmail.com';  
  //   $mail->SMTPAuth = true;
  //   $mail->SMTPSecure = "tls";
  //   $mail->Port = 587;
      
  //   $mail->Username = "yogeshgiri6806@gmail.com";		
  // $mail->Password = "eekqzrlltpmwlkkf";
  
  //   $mail->Subject = "Hi ".$name."! these are your DIT credentials.";
  
  //   $mail->setFrom('yogeshgiri6806@gmail.com','DIT');
  //   $mail->isHTML(true);
  //   $mail->Body = "<p>Updated/Non Updated Username :- ".$msg."</p> \n
  //          <p>Updated/Non Updated Password :- ".$password1."</p> \n
  //          <p> <b>Updated/Non Updated Subject  :- ".$subject." </b> </p> \n";
  
  //   $mail->addAddress($email);
  //   if ( $mail->send() ) {
  //     echo "Email Sent..!";
  //     redirect('staff.php' );
  //   }else{
  //     echo "Email not Sent..!";
  //   }
  //   $mail->smtpClose();


  redirect('staff.php' );
  }
  else
  {
  //   $mail = new PHPMailer();
  //   $mail->SMTPDebug = 2;    
  //   $mail->isSMTP();
  
  //  $mail->Host = 'smtp.gmail.com';  
  //   $mail->SMTPAuth = true;
  //   $mail->SMTPSecure = "tls";
  //   $mail->Port = 587;
      
  //   $mail->Username = "yogeshgiri6806@gmail.com";		
  // $mail->Password = "eekqzrlltpmwlkkf";
  
  //   $mail->Subject = "Hi ".$name."! these are your DIT credentials.";
  
  //   $mail->setFrom('yogeshgiri6806@gmail.com','DIT');
  //   $mail->isHTML(true);
  //   $mail->Body = "<p>Username :- ".$msg."</p> \n
  //          <p> <b> Password :- ".$password1."</b> </p> \n";
  
  //   $mail->addAddress($email);
  //   if ( $mail->send() ) {
  //     echo "Email Sent..!";
  //     redirect('staff.php' );
  //   }else{
  //     echo "Email not Sent..!";
  //   }
  //   $mail->smtpClose();


    mysqli_query($con,"insert into staff(name,course,position,subject,password,email_prev,branch,email,phone_no,status)
     values('$name','$course','$position','$subject','$password','$email','$branch','$msg','$phone_no','$status')");

     mysqli_query($con,"insert into qr_code(name,email,added_on,status)
     values('$name','$email','$added_on','$status')");

     redirect('staff.php' );

  }
  }
}
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
             <h3 class="page-title mb-0 p-0">Add Staff</h3>
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
                  
                <?php if($position=="Head of Department") {?> <option value="Head of Department" selected>Head of Department</option><?php }else {?> <option value="Head of Department" >Head of Department</option><?php } ?> 
                <?php if($position=="Teacher") {?> <option value="Teacher" selected>Teacher</option><?php }else {?> <option value="Teacher" >Teacher</option><?php } ?> 
                <?php if($position=="Assistant Manager") {?> <option value="Assistant Manager" selected>Assistant Manager</option><?php }else {?> <option value="Assistant Manager" >Assistant Manager</option><?php } ?> 
                <?php if($position=="Senior of Department") {?> <option value="Senior of Department" selected >Senior of Department</option><?php }else {?> <option value="Senior of Department" >Senior of Department</option><?php } ?> 
                <?php if($position=="Executive Head") {?> <option value="Executive Head" selected>Executive Head</option><?php }else {?> <option value="Executive Head" >Executive Head</option><?php } ?> 
                <?php if($position=="Vice Chancellor") {?> <option value="Vice Chancellor" selected>Vice Chancellor</option><?php }else {?> <option value="Vice Chancellor" >Vice Chancellor</option><?php } ?> 
                <?php if($position=="Vice Chairman") {?> <option value="Vice Chairman" selected>Vice Chairman</option><?php }else {?> <option value="Vice Chairman" >Vice Chairman</option><?php } ?> 
                </select>
                </div> 
              </div>
             
              <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Email</label>
                <div class="col-10">
                  <input class="form-control" type="text"  name ="email" required value="<?php echo $email ?>">
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
                  <input placeholder="Type 5 integer numbers to generate username" class="form-control" type="text"  name ="serial" required value="<?php echo $serial ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Subject</label>
                <div class="col-10">
                <select class="form-select form-control " aria-label="Default select example" name="subject" required value="<?php echo $subject ?>" >
                <?php if($subject=="None") {?><option value="None" selected>None</option> <?php }else {?> <option value="None" >None</option><?php } ?> 
                <?php if($subject=="Data Structures") {?><option value="Data Structures" selected>Data Structures</option> <?php }else {?> <option value="Data Structures" >Data Structures</option><?php } ?>
                <?php if($subject=="OS") {?> <option value="OS" selected>OS</option> <?php }else {?> <option value="OS" >OS</option><?php } ?>
                <?php if($subject=="DBMS") {?> <option value="DBMS" selected>DBMS</option> <?php }else {?> <option value="DBMS" >DBMS</option><?php } ?>
                <?php if($subject=="Introduction to Buisness") {?> <option value="Introduction to Buisness" selected>Introduction to Buisness</option> <?php }else {?> <option value="Introduction to Buisness" >Introduction to Buisness</option><?php } ?>
                <?php if($subject=="Introduction to C") {?> <option value="Introduction to C" selected>Introduction to C</option> <?php }else {?> <option value="Introduction to C" >Introduction to C</option><?php } ?>
                <?php if($subject=="Java") {?> <option value="Java" selected>Java</option> <?php }else {?> <option value="Java" >Java</option><?php } ?>
                <?php if($subject=="C++") {?> <option value="C++" selected>C++</option> <?php }else {?> <option value="C++" >C++</option><?php } ?>
                <?php if($subject=="COA") {?> <option value="COA" selected>COA</option> <?php }else {?> <option value="COA" >COA</option><?php } ?>
                <?php if($subject=="Humanities") {?> <option value="Humanities" selected>Humanities</option> <?php }else {?> <option value="Humanities" >Humanities</option><?php } ?>
                <?php if($subject=="Physiology") {?> <option value="Physiology" selected>Physiology</option> <?php }else {?> <option value="Physiology" >Physiology</option><?php } ?>
                <?php if($subject=="Human Values") {?> <option value="Human Values" selected>Human Values</option> <?php }else {?> <option value="Human Values" >Human Values</option><?php } ?>                
                </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Course</label>
                <div class="col-10">
                <select class="form-select form-control " aria-label="Default select example" name="course" required value="<?php echo $course ?>">
                <?php if($course=="BTech") {?><option value="BTech" selected>BTech</option> <?php }else {?> <option value="BTech" >BTech </option> <?php } ?>
                <?php if($course=="BArch") {?><option value="BArch" selected>BArch</option> <?php }else {?> <option value="BArch" >BArch </option> <?php } ?>
                <?php if($course=="BCA") {?><option value="BCA" selected>BCA</option> <?php }else {?> <option value="BCA" >BCA </option> <?php } ?>
                <?php if($course=="General") {?><option value="General" selected>General</option> <?php }else {?> <option value="General" >General </option> <?php } ?>
                </select>
                </div> 
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Branch</label>
                <div class="col-10">
                <select class="form-select form-control " aria-label="Default select example" name="branch" required value="<?php echo $branch ?>">
                <?php if($branch=="Computer Science") {?><option value="Computer Science" selected>Computer Science</option> <?php }else {?> <option value="Computer Science" >Computer Science </option> <?php } ?>
                <?php if($branch=="Mechanical") {?><option value="Mechanical" selected>Mechanical</option> <?php }else {?> <option value="Mechanical" >Mechanical </option> <?php } ?>
                <?php if($branch=="Chemical") {?><option value="Chemical" selected>Chemical</option> <?php }else {?> <option value="Chemical" >Chemical </option> <?php } ?>
                <?php if($branch=="Civil") {?><option value="Civil" selected>Civil</option> <?php }else {?> <option value="Civil" >Civil </option> <?php } ?>
                <?php if($branch=="Petroleum") {?><option value="Petroleum" selected>Petroleum</option> <?php }else {?> <option value="Petroleum" >Petroleum </option> <?php } ?>
                <?php if($branch=="Animation") {?><option value="Animation" selected>Animation</option> <?php }else {?> <option value="Animation" >Animation </option> <?php } ?>
                <?php if($branch=="Architecture") {?><option value="Architecture" selected>Architecture</option> <?php }else {?> <option value="Architecture" >Architecture </option> <?php } ?>
                <?php if($branch=="Marketing") {?><option value="Marketing" selected>Marketing</option> <?php }else {?> <option value="Marketing" >Marketing </option> <?php } ?>
                <?php if($branch=="Economics") {?><option value="Economics" selected>Economics</option> <?php }else {?> <option value="Economics" >Economics </option> <?php } ?>
                <?php if($branch=="Banking") {?><option value="Banking" selected>Banking</option> <?php }else {?> <option value="Banking" >Banking </option> <?php } ?>
                <?php if($branch=="Accountancy") {?><option value="Accountancy" selected>Accountancy</option> <?php }else {?> <option value="Accountancy" >Accountancy </option> <?php } ?>
                <?php if($branch=="Electrical") {?><option value="Electrical" selected>Electrical</option> <?php }else {?> <option value="Electrical" >Electrical </option> <?php } ?>
                <?php if($branch=="General") {?><option value="General" selected>General</option> <?php }else {?> <option value="General" >General </option> <?php } ?>
                  
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
