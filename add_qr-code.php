<?php
  include('header.php');
  auth();
  admin_auth();
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

  $password_req="required";


  if(isset($_POST['submit']))
  {
    $name =get_safe_value($_POST['name']);
	$roll_no =get_safe_value($_POST['roll_no']);
  $sap_id =get_safe_value($_POST['sap_id']);
	$email =get_safe_value($_POST['email']);
	$password =password_hash(get_safe_value($_POST['password']),PASSWORD_DEFAULT);
  $course =get_safe_value($_POST['course']);
  $branch =get_safe_value($_POST['branch']);
  $joined =get_safe_value($_POST['joined']);
  $phone_no =get_safe_value($_POST['phone_no']);
  $status =1;

  $email_sql ="";
  if($id>0)
  {
      $email_sql =" and id!='$id' ";
  }

if(mysqli_num_rows(mysqli_query($con,"select * from student where email='$email' $email_sql"))>0)
{
  $msg1 ="A Student is already registered with same email-id";
}
else if(mysqli_num_rows(mysqli_query($con,"select * from staff where email='$email' $email_sql"))>0)
{
  $msg1 ="A Staff member is already registered with same email-id";
}
else if(mysqli_num_rows(mysqli_query($con,"select * from employee where email='$email' $email_sql"))>0)
{
  $msg1 ="A Employee is already registered with same email-id";
}
else
{

  if($id>0)
  {
    $ing ="";
    if($password!='')
    {
       $ing =",password='$password'";
    }
    mysqli_query($con,"update student set name='$name',roll_no='$roll_no',sap_id='$sap_id',email='$email',
    total_qr='$total_qr',total_hit='$total_hit',added_on='$added_on',role='$role',status='$status' $ing where id='$id' ");
  }
  else
  {
    mysqli_query($con,"insert into student(name,roll_no,sap_id,course,password,branch,email,joined,phone_no,status)
     values('$name','$roll_no','$sap_id','$course','$password','$branch','$email','$joined','$phone_no','$status')");
  }
  redirect('student.php' );
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
                <select class="form-select form-control " aria-label="Default select example" name="course" required>
                  
                  <option value="BTech" >BTech</option>
                  <option value="BArch">BArch</option>
                  <option value="BCA">BCA</option>
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
                <select class="form-select form-control " aria-label="Default select example" name="branch" required>
                  <option value="Computer Science" >Computer Science</option>
                  <option value="Mechanical">Mechanical</option>
                  <option value="Chemical">Chemical</option>
                  <option value="Civil">Civil</option>
                  <option value="Petroleum">Petroleum</option>
                  <option value="Animation">Animation</option>
                  <option value="Architecture">Architecture</option>
                  <option value="Marketing">Marketing</option>
                  <option value="Economics">Economics</option>
                  <option value="Banking">Banking</option>
                  <option value="Accountancy">Accountancy</option>
                  <option value="Electrical">Electrical</option>
                  
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
