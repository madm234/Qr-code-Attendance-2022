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
  $roll_no ="";
  $sap_id ="";
  $email ="";
  $password ="";
  $id =0;
  $course ="";
  $branch ="";
  $joined ="";
  $phone_no ="";
  $sub1 ="";
  $sub2 ="";
  $sub3 =""; 
  $sub4 =""; 
  $sub5 =""; 
  $sec1 ="";
  $sec2 ="";
  $sec3 ="";
  $sec4 ="";
  $sec5 ="";

  $password_req="required";
  if(isset($_GET['id']) && $_GET['id']>0)
{
  $id =get_safe_value($_GET['id']);
  $res =mysqli_query($con,"select * from student where id ='$id' ");
  if(mysqli_num_rows($res)>0)
  {
    $row =mysqli_fetch_assoc($res);
    $name =$row['name'];
    $roll_no =$row['roll_no'];
    $sap_id =$row['sap_id'];
    $email =$row['email'];
    $password =$row['password'];
    $branch = $row['branch'];
    $phone_no =$row['phone_no'];
    $password1 ="";
    $password_req ="";
    $joined =$row['joined'];
    $sin1 =explode(",",$row['subject1']);
    $sin2 =explode(",",$row['subject2']);
    $sin3 =explode(",",$row['subject3']);
    $sin4 =explode(",",$row['subject4']);
    $sin5 =explode(",",$row['subject5']);
    $sub1 =$sin1[0];
    $sub2 =$sin2[0];
    $sub3 =$sin3[0];
    $sub4 =$sin4[0];
    $sub5 =$sin5[0];
    $sec1 =$sin1[1];
    $sec2 =$sin2[1];
    $sec3 =$sin3[1];
    $sec4 =$sin4[1];
    $sec5 =$sin5[1];

  
  }
  else
  {
    redirect('student.php');
  }

}


  if(isset($_POST['submit']))
  {
    $name =get_safe_value($_POST['name']);
	$roll_no =get_safe_value($_POST['roll_no']);
  $sap_id =get_safe_value($_POST['sap_id']);
	$email =get_safe_value($_POST['email']);
  $password1 =get_safe_value($_POST['password']);
	$password =password_hash(get_safe_value($_POST['password']),PASSWORD_DEFAULT);
  $course =get_safe_value($_POST['course']);
  $branch =get_safe_value($_POST['branch']);
  $joined =get_safe_value($_POST['joined']);
  $phone_no =get_safe_value($_POST['phone_no']);
  $sub1 =get_safe_value($_POST['sub1']);
  $sec1 =get_safe_value($_POST['sec1']);
  $sub2 =get_safe_value($_POST['sub2']);
  $sec2 =get_safe_value($_POST['sec2']);
  $sub3 =get_safe_value($_POST['sub3']);
  $sec3 =get_safe_value($_POST['sec3']);
  $sub4 =get_safe_value($_POST['sub4']);
  $sec4 =get_safe_value($_POST['sec4']);
  $sub5 =get_safe_value($_POST['sub5']);
  $sec5 =get_safe_value($_POST['sec5']);


  $man1 =$sub1.",".$sec1;
  $man2 =$sub2.",".$sec2;
  $man3 =$sub3.",".$sec3;
  $man4 =$sub4.",".$sec4;
  $man5 =$sub5.",".$sec5;

   $status =1;
  date_default_timezone_set('Asia/Kolkata');
  $added_on =date('Y-m-d H:i:s');


  $email_sql ="";
  if($id>0)
  {
      $email_sql =" and id!='$id' ";
  }

if(mysqli_num_rows(mysqli_query($con,"select * from student where sap_id='$sap_id' $email_sql"))>0)
{
  $msg1 ="Sap ID has been already registered";
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
    mysqli_query($con,"update student set name='$name',roll_no='$roll_no',sap_id='$sap_id',course='$course',email='$email'
    ,branch='$branch',joined='$joined',phone_no='$phone_no',subject1 ='$man1',subject2 ='$man2',subject3 ='$man3',subject4 ='$man4'
    ,subject5 ='$man5' $ing where id='$id' ");

    redirect('student.php' );

    $mail = new PHPMailer();
    $mail->SMTPDebug = 2;    
    $mail->isSMTP();
  
   $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
      
    $mail->Username = "yogeshgiri6806@gmail.com";		
    $msg =$sap_id."@dit.edu.in";
  $mail->Password = "eekqzrlltpmwlkkf";
  
    $mail->Subject = "Hi ".$name."! these are your DIT credentials.";
  
    $mail->setFrom('yogeshgiri6806@gmail.com','DIT');
    $mail->isHTML(true);
    $mail->Body = "<p>Updated/Non Updated Username :- ".$msg."</p> \n
           <p>Updated/Non Updated Password :- ".$password1."</p> \n
           <p> <b>Updated/Non Updated Sap ID :- ".$sap_id." </b> </p> \n
           <p> <b>Updated/Non Updated Roll No :- ".$roll_no." </b> </p> \n
           <p> <b>Updated/Non Updated Subject 1 :- ".$sub1.",".$sec1." </b> </p> \n
           <p> <b>Updated/Non Updated Subject 2 :- ".$sub2.",".$sec2." </b> </p> \n
           <p> <b>Updated/Non Updated Subject 3 :- ".$sub3.",".$sec3." </b> </p> \n
           <p> <b>Updated/Non Updated Subject 4 :- ".$sub4.",".$sec4." </b> </p> \n
           <p> <b>Updated/Non Updated Subject 5 :- ".$sub5.",".$sec5." </b> </p> \n";
  
    $mail->addAddress($email);
    if ( $mail->send() ) {
      echo "Email Sent..!";
      redirect('student.php' );
    }else{
      echo "Email not Sent..!";
    }
    $mail->smtpClose();




  }
  else
  {

	$mail = new PHPMailer();
  $mail->SMTPDebug = 2;    
	$mail->isSMTP();

 $mail->Host = 'smtp.gmail.com';  
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Port = 587;
    
	$mail->Username = "yogeshgiri6806@gmail.com";		
  $msg =$sap_id."@dit.edu.in";
$mail->Password = "eekqzrlltpmwlkkf";

	$mail->Subject = "Hi ".$name."! these are your DIT credentials.";

	$mail->setFrom('yogeshgiri6806@gmail.com','DIT');
	$mail->isHTML(true);
	$mail->Body = "<p>Username :- ".$msg."</p> \n
         <p>Password :- ".$password1."</p> \n
         <p> <b> Sap ID :- ".$sap_id." </b> </p> \n
         <p> <b> Roll No :- ".$roll_no." </b> </p> \n
         <p> <b> Subject 1 :- ".$sub1.",".$sec1." </b> </p> \n
         <p> <b> Subject 2 :- ".$sub2.",".$sec2." </b> </p> \n
         <p> <b> Subject 3 :- ".$sub3.",".$sec3." </b> </p> \n
         <p> <b> Subject 4 :- ".$sub4.",".$sec4." </b> </p> \n
         <p> <b> Subject 5 :- ".$sub5.",".$sec5." </b> </p> \n";

	$mail->addAddress($email);
	if ( $mail->send() ) {
		echo "Email Sent..!";
    redirect('student.php' );
	}else{
		echo "Email not Sent..!";
	}
	$mail->smtpClose();


    mysqli_query($con,"insert into student(name,roll_no,sap_id,course,password,branch,email,joined,phone_no,status,subject1,subject2,subject3,subject4,subject5)
     values('$name','$roll_no','$sap_id','$course','$password','$branch','$msg','$joined','$phone_no','$status','$man1','$man2','$man3','$man4','$man5')");

     mysqli_query($con,"insert into qr_code(name,email,added_on,status)
     values('$name','$email','$added_on','$status')");
    
     redirect('student.php' );
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
             <h3 class="page-title mb-0 p-0">Add Student</h3>
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
                <label for="example-text-input" class="col-2 col-form-label">Sap ID</label>
                <div class="col-10">
                  <input class="form-control" type="text"  name ="sap_id" required value="<?php echo $sap_id ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Roll No</label>
                <div class="col-10">
                  <input class="form-control" type="text"  name ="roll_no" required value="<?php echo $roll_no ?>">
                </div>
              </div>
             
              <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Course</label>
                <div class="col-10">
                <select class="form-select form-control " aria-label="Default select example" name="course" required value="<?php echo $course ?>">
                <?php if($course=="BTech") {?><option value="BTech" selected>BTech</option> <?php }else {?> <option value="BTech" >BTech </option> <?php } ?>
                <?php if($course=="BArch") {?><option value="BArch" selected>BArch</option> <?php }else {?> <option value="BArch" >BArch </option> <?php } ?>
                <?php if($course=="BCA") {?><option value="BCA" selected>BCA</option> <?php }else {?> <option value="BCA" >BCA </option> <?php } ?>
                </select>
                </div> 
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Password</label>
                <div class="col-10">
                  <input class="form-control" type="password"  name ="password" <?php $password_req ?>>
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
                <label for="example-text-input" class="col-2 col-form-label">Join Year</label>
                <div class="col-10">
                  <input class="form-control" type="text"  name ="joined" required value="<?php echo $joined ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Phone no</label>
                <div class="col-10">
                  <input class="form-control" type="text"  name ="phone_no" required value="<?php echo $phone_no ?>">
                </div>
              </div>
              <div class="form-group row">

                <label for="example-text-input" class="col-2 col-form-label">Subject1</label>
                <div class="col-4">
                <select class="form-select form-control " aria-label="Default select example" name="sub1" required value="<?php echo $sub1 ?>" >
                <?php if($sub1=="Data Structures") {?><option value="Data Structures" selected>Data Structures</option> <?php }else {?> <option value="Data Structures" >Data Structures</option><?php } ?>
                <?php if($sub1=="OS") {?> <option value="OS" selected>OS</option> <?php }else {?> <option value="OS" >OS</option><?php } ?>
                <?php if($sub1=="DBMS") {?> <option value="DBMS" selected>DBMS</option> <?php }else {?> <option value="DBMS" >DBMS</option><?php } ?>
                <?php if($sub1=="Introduction to Buisness") {?> <option value="Introduction to Buisness" selected>Introduction to Buisness</option> <?php }else {?> <option value="Introduction to Buisness" >Introduction to Buisness</option><?php } ?>
                <?php if($sub1=="Introduction to C") {?> <option value="Introduction to C" selected>Introduction to C</option> <?php }else {?> <option value="Introduction to C" >Introduction to C</option><?php } ?>
                <?php if($sub1=="Java") {?> <option value="Java" selected>Java</option> <?php }else {?> <option value="Java" >Java</option><?php } ?>
                <?php if($sub1=="C++") {?> <option value="C++" selected>C++</option> <?php }else {?> <option value="C++" >C++</option><?php } ?>
                <?php if($sub1=="COA") {?> <option value="COA" selected>COA</option> <?php }else {?> <option value="COA" >COA</option><?php } ?>
                <?php if($sub1=="Humanities") {?> <option value="Humanities" selected>Humanities</option> <?php }else {?> <option value="Humanities" >Humanities</option><?php } ?>
                <?php if($sub1=="Physiology") {?> <option value="Physiology" selected>Physiology</option> <?php }else {?> <option value="Physiology" >Physiology</option><?php } ?>
                <?php if($sub1=="Human Values") {?> <option value="Human Values" selected>Human Values</option> <?php }else {?> <option value="Human Values" >Human Values</option><?php } ?>                
                <?php if($sub1=="Architectural Design II") {?> <option value="Architectural Design II" selected>Architectural Design II</option> <?php }else {?> <option value="Architectural Design II" >Architectural Design II</option><?php } ?>                
                </select>
                </div> 

                <label for="example-text-input" class="col-2 col-form-label">Section1</label>
                <div class="col-2 ">
                <select class="form-select form-control " aria-label="Default select example" name="sec1" value="<?php echo $sec1 ?>">
                 
                <?php if($sec1=="a") {?><option value="a" selected>a</option> <?php }else {?><option value="a" >a</option><?php } ?>
                <?php if($sec1=="b"){ ?><option value="b" selected>b</option> <?php }else{ ?><option value="b" >b</option><?php } ?>
                <?php if($sec1=="c"){ ?><option value="c" selected>c</option> <?php }else{ ?><option value="c" >c</option><?php } ?>
                <?php if($sec1=="d"){ ?><option value="d" selected>d</option> <?php }else{ ?><option value="d" >d</option><?php } ?>
                <?php if($sec1=="e") {?><option value="e" selected>e</option> <?php }else{ ?><option value="e" >e</option><?php } ?>
                 
                </select>
                </div> 
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Subject2</label>
                <div class="col-4">
                <select class="form-select form-control " aria-label="Default select example" name="sub2" required value="<?php echo $sub2 ?>">
                <?php if($sub2=="Data Structures") {?><option value="Data Structures" selected>Data Structures</option> <?php }else {?> <option value="Data Structures" >Data Structures</option><?php } ?>
                <?php if($sub2=="OS") {?> <option value="OS" selected>OS</option> <?php }else {?> <option value="OS" >OS</option><?php } ?>
                <?php if($sub2=="DBMS") {?> <option value="DBMS" selected>DBMS</option> <?php }else {?> <option value="DBMS" >DBMS</option><?php } ?>
                <?php if($sub2=="Introduction to Buisness") {?> <option value="Introduction to Buisness" selected>Introduction to Buisness</option> <?php }else {?> <option value="Introduction to Buisness" >Introduction to Buisness</option><?php } ?>
                <?php if($sub2=="Introduction to C") {?> <option value="Introduction to C" selected>Introduction to C</option> <?php }else {?> <option value="Introduction to C" >Introduction to C</option><?php } ?>
                <?php if($sub2=="Java") {?> <option value="Java" selected>Java</option> <?php }else {?> <option value="Java" >Java</option><?php } ?>
                <?php if($sub2=="C++") {?> <option value="C++" selected>C++</option> <?php }else {?> <option value="C++" >C++</option><?php } ?>
                <?php if($sub2=="COA") {?> <option value="COA" selected>COA</option> <?php }else {?> <option value="COA" >COA</option><?php } ?>
                <?php if($sub2=="Humanities") {?> <option value="Humanities" selected>Humanities</option> <?php }else {?> <option value="Humanities" >Humanities</option><?php } ?>
                <?php if($sub2=="Physiology") {?> <option value="Physiology" selected>Physiology</option> <?php }else {?> <option value="Physiology" >Physiology</option><?php } ?>
                <?php if($sub2=="Human Values") {?> <option value="Human Values" selected>Human Values</option> <?php }else {?> <option value="Human Values" >Human Values</option><?php } ?>                
                </select>
                </div> 

                <label for="example-text-input" class="col-2 col-form-label">Section2</label>
                <div class="col-2 ">
                <select class="form-select form-control " aria-label="Default select example" name="sec2" required value="<?php echo $sec2 ?>">
                <?php if($sec2=="a") {?><option value="a" selected>a</option> <?php }else {?><option value="a" >a</option><?php } ?>
                <?php if($sec2=="b"){ ?><option value="b" selected>b</option> <?php }else{ ?><option value="b" >b</option><?php } ?>
                <?php if($sec2=="c"){ ?><option value="c" selected>c</option> <?php }else{ ?><option value="c" >c</option><?php } ?>
                <?php if($sec2=="d"){ ?><option value="d" selected>d</option> <?php }else{ ?><option value="d" >d</option><?php } ?>
                <?php if($sec2=="e") {?><option value="e" selected>e</option> <?php }else{ ?><option value="e" >e</option><?php } ?>
                </select>
                </div> 
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Subject3</label>
                <div class="col-4">
                <select class="form-select form-control " aria-label="Default select example" name="sub3" required value="<?php echo $sub3 ?>">
                <?php if($sub3=="Data Structures") {?><option value="Data Structures" selected>Data Structures</option> <?php }else {?> <option value="Data Structures" >Data Structures</option><?php } ?>
                <?php if($sub3=="OS") {?> <option value="OS" selected>OS</option> <?php }else {?> <option value="OS" >OS</option><?php } ?>
                <?php if($sub3=="DBMS") {?> <option value="DBMS" selected>DBMS</option> <?php }else {?> <option value="DBMS" >DBMS</option><?php } ?>
                <?php if($sub3=="Introduction to Buisness") {?> <option value="Introduction to Buisness" selected>Introduction to Buisness</option> <?php }else {?> <option value="Introduction to Buisness" >Introduction to Buisness</option><?php } ?>
                <?php if($sub3=="Introduction to C") {?> <option value="Introduction to C" selected>Introduction to C</option> <?php }else {?> <option value="Introduction to C" >Introduction to C</option><?php } ?>
                <?php if($sub3=="Java") {?> <option value="Java" selected>Java</option> <?php }else {?> <option value="Java" >Java</option><?php } ?>
                <?php if($sub3=="C++") {?> <option value="C++" selected>C++</option> <?php }else {?> <option value="C++" >C++</option><?php } ?>
                <?php if($sub3=="COA") {?> <option value="COA" selected>COA</option> <?php }else {?> <option value="COA" >COA</option><?php } ?>
                <?php if($sub3=="Humanities") {?> <option value="Humanities" selected>Humanities</option> <?php }else {?> <option value="Humanities" >Humanities</option><?php } ?>
                <?php if($sub3=="Physiology") {?> <option value="Physiology" selected>Physiology</option> <?php }else {?> <option value="Physiology" >Physiology</option><?php } ?>
                <?php if($sub3=="Human Values") {?> <option value="Human Values" selected>Human Values</option> <?php }else {?> <option value="Human Values" >Human Values</option><?php } ?>                
                </select>
                </div> 

                <label for="example-text-input" class="col-2 col-form-label">Section3</label>
                <div class="col-2 ">
                <select class="form-select form-control " aria-label="Default select example" name="sec3" required value="<?php echo $sec3 ?>">
                <?php if($sec3=="a") {?><option value="a" selected>a</option> <?php }else {?><option value="a" >a</option><?php } ?>
                <?php if($sec3=="b"){ ?><option value="b" selected>b</option> <?php }else{ ?><option value="b" >b</option><?php } ?>
                <?php if($sec3=="c"){ ?><option value="c" selected>c</option> <?php }else{ ?><option value="c" >c</option><?php } ?>
                <?php if($sec3=="d"){ ?><option value="d" selected>d</option> <?php }else{ ?><option value="d" >d</option><?php } ?>
                <?php if($sec3=="e") {?><option value="e" selected>e</option> <?php }else{ ?><option value="e" >e</option><?php } ?>
                </select>
                </div> 
              </div>


              <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Subject4</label>
                <div class="col-4">
                <select class="form-select form-control " aria-label="Default select example" name="sub4" required value="<?php echo $sub4 ?>">
                <?php if($sub4=="Data Structures") {?><option value="Data Structures" selected>Data Structures</option> <?php }else {?> <option value="Data Structures" >Data Structures</option><?php } ?>
                <?php if($sub4=="OS") {?> <option value="OS" selected>OS</option> <?php }else {?> <option value="OS" >OS</option><?php } ?>
                <?php if($sub4=="DBMS") {?> <option value="DBMS" selected>DBMS</option> <?php }else {?> <option value="DBMS" >DBMS</option><?php } ?>
                <?php if($sub4=="Introduction to Buisness") {?> <option value="Introduction to Buisness" selected>Introduction to Buisness</option> <?php }else {?> <option value="Introduction to Buisness" >Introduction to Buisness</option><?php } ?>
                <?php if($sub4=="Introduction to C") {?> <option value="Introduction to C" selected>Introduction to C</option> <?php }else {?> <option value="Introduction to C" >Introduction to C</option><?php } ?>
                <?php if($sub4=="Java") {?> <option value="Java" selected>Java</option> <?php }else {?> <option value="Java" >Java</option><?php } ?>
                <?php if($sub4=="C++") {?> <option value="C++" selected>C++</option> <?php }else {?> <option value="C++" >C++</option><?php } ?>
                <?php if($sub4=="COA") {?> <option value="COA" selected>COA</option> <?php }else {?> <option value="COA" >COA</option><?php } ?>
                <?php if($sub4=="Humanities") {?> <option value="Humanities" selected>Humanities</option> <?php }else {?> <option value="Humanities" >Humanities</option><?php } ?>
                <?php if($sub4=="Physiology") {?> <option value="Physiology" selected>Physiology</option> <?php }else {?> <option value="Physiology" >Physiology</option><?php } ?>
                <?php if($sub4=="Human Values") {?> <option value="Human Values" selected>Human Values</option> <?php }else {?> <option value="Human Values" >Human Values</option><?php } ?>                
                </select>
                </div> 

                <label for="example-text-input" class="col-2 col-form-label">Section2</label>
                <div class="col-2 ">
                <select class="form-select form-control " aria-label="Default select example" name="sec4" required value="<?php echo $sec4 ?>">
                <?php if($sec4=="a") {?><option value="a" selected>a</option> <?php }else {?><option value="a" >a</option><?php } ?>
                <?php if($sec4=="b"){ ?><option value="b" selected>b</option> <?php }else{ ?><option value="b" >b</option><?php } ?>
                <?php if($sec4=="c"){ ?><option value="c" selected>c</option> <?php }else{ ?><option value="c" >c</option><?php } ?>
                <?php if($sec4=="d"){ ?><option value="d" selected>d</option> <?php }else{ ?><option value="d" >d</option><?php } ?>
                <?php if($sec4=="e") {?><option value="e" selected>e</option> <?php }else{ ?><option value="e" >e</option><?php } ?>
                </select>
                </div> 
              </div>


              <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Subject5</label>
                <div class="col-4">
                <select class="form-select form-control " aria-label="Default select example" name="sub5" required value="<?php echo $sub5 ?>">
                <?php if($sub5=="Data Structures") {?><option value="Data Structures" selected>Data Structures</option> <?php }else {?> <option value="Data Structures" >Data Structures</option><?php } ?>
                <?php if($sub5=="OS") {?> <option value="OS" selected>OS</option> <?php }else {?> <option value="OS" >OS</option><?php } ?>
                <?php if($sub5=="DBMS") {?> <option value="DBMS" selected>DBMS</option> <?php }else {?> <option value="DBMS" >DBMS</option><?php } ?>
                <?php if($sub5=="Introduction to Buisness") {?> <option value="Introduction to Buisness" selected>Introduction to Buisness</option> <?php }else {?> <option value="Introduction to Buisness" >Introduction to Buisness</option><?php } ?>
                <?php if($sub5=="Introduction to C") {?> <option value="Introduction to C" selected>Introduction to C</option> <?php }else {?> <option value="Introduction to C" >Introduction to C</option><?php } ?>
                <?php if($sub5=="Java") {?> <option value="Java" selected>Java</option> <?php }else {?> <option value="Java" >Java</option><?php } ?>
                <?php if($sub5=="C++") {?> <option value="C++" selected>C++</option> <?php }else {?> <option value="C++" >C++</option><?php } ?>
                <?php if($sub5=="COA") {?> <option value="COA" selected>COA</option> <?php }else {?> <option value="COA" >COA</option><?php } ?>
                <?php if($sub5=="Humanities") {?> <option value="Humanities" selected>Humanities</option> <?php }else {?> <option value="Humanities" >Humanities</option><?php } ?>
                <?php if($sub5=="Physiology") {?> <option value="Physiology" selected>Physiology</option> <?php }else {?> <option value="Physiology" >Physiology</option><?php } ?>
                <?php if($sub5=="Human Values") {?> <option value="Human Values" selected>Human Values</option> <?php }else {?> <option value="Human Values" >Human Values</option><?php } ?>                
                </select>
                </div> 

                <label for="example-text-input" class="col-2 col-form-label">Section5</label>
                <div class="col-2 ">
                <select class="form-select form-control " aria-label="Default select example" name="sec5" required value="<?php echo $sec5 ?>">
                <?php if($sec5=="a") {?><option value="a" selected>a</option> <?php }else {?><option value="a" >a</option><?php } ?>
                <?php if($sec5=="b"){ ?><option value="b" selected>b</option> <?php }else{ ?><option value="b" >b</option><?php } ?>
                <?php if($sec5=="c"){ ?><option value="c" selected>c</option> <?php }else{ ?><option value="c" >c</option><?php } ?>
                <?php if($sec5=="d"){ ?><option value="d" selected>d</option> <?php }else{ ?><option value="d" >d</option><?php } ?>
                <?php if($sec5=="e") {?><option value="e" selected>e</option> <?php }else{ ?><option value="e" >e</option><?php } ?>
                </select>
                </div> 
              </div>


              </div>
              </div>
              
               
              <input type="submit" name="submit" class="btn btn-primary" >
            
        </div>
          </form>
        
        <center>
        <div id="sigma">
         <b>
         <?php
          echo $msg1;
          ?>
         </b>
        </div>
        </center>
</div>
</div>

<?php
  include('footer.php')
?>
