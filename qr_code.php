<?php
  include('header.php');
  auth();

  $condition ="";
  $really ="";
  $pid ="";
  if($_SESSION['QR_USER_ROLE']!=0)
  {
    $condition =" and qr_code.email='".$_SESSION['QR_USER_EMAIL']."'";
  }

// if(isset($_GET['status']) && $_GET['status']!='' && isset($_GET['id']) && $_GET['id']>0)
// {
//     $status =get_safe_value($_GET['status']);
//     $id =get_safe_value($_GET['id']);

//     if($status=="active")
//     {
//       $status =1;
//     }
//     else
//     {
//       $status =0;
//     }
//     mysqli_query($con,"update qr_code set status='$status' where id='$id' $condition");
//     redirect("qr_code.php");
// }

//where 1 ka matlab hamesa true.TEAM CHROMO

if($_SESSION['QR_USER_ROLE']==0)
{
  // $res =mysqli_query($con,"select * from qr_code");
    if(isset($_GET['a']) && $_GET['a']!='' && $_GET['a']>0 && $_GET['a']<4)
    {
$orig =get_safe_value($_GET['a']);
   
    if($orig==2){
   $res =mysqli_query($con,"select student.* from student where 1");
   $really ="Students";
   $pid =2;
    }

   else if($orig==1){
   $res =mysqli_query($con,"select staff.* from staff where 1");
   $really ="Staff Members";
   $pid =1;
    }

   else if($orig==3){
   $res =mysqli_query($con,"select employee.* from employee where 1");
   $really ="Employees";
   $pid =3;
    }

    }
    else
    {
      redirect('404.php');
    }
    
}
else if($_SESSION['QR_USER_ROLE']==1)
{
  $res =mysqli_query($con,"select staff.* from staff where 1 and staff.email='$_SESSION[QR_USER_EMAIL]' ");
  $really ="Your";
  $pid =1;
}
else if($_SESSION['QR_USER_ROLE']==2)
{
  $res =mysqli_query($con,"select student.* from student where 1 and student.email='$_SESSION[QR_USER_EMAIL]'");
  $really ="Your";
  $pid =2;
}
else if($_SESSION['QR_USER_ROLE']==3)
{
  $res =mysqli_query($con,"select employee.* from employee where 1 and employee.email='$_SESSION[QR_USER_EMAIL]'");
  $really ="Your";
  $pid =3;
}
else
{
  redirect('404.php');
}

?>


<div class="page-wrapper">
       
       <div class="page-breadcrumb">
         <div class="row align-items-center">
           <div class="col-md-6 col-8 align-self-center">
            
             <h2 class="page-title mb-0 p-0"><?php echo $really ?> QR Code</h2>

             
             <br>
           </div>
          
         </div>
       </div>
       
       

       <div class="container-fluid">
        <!-- <?php if($_SESSION['QR_USER_ROLE']==0){ ?>
          <div class="card shadow  py-3 px-3  border-left-success bg-gray-200">
                    <center>
                <h3 class="m-0 font-weight-bold text-primary" ><a href="addst.php">Add QR Code</a></h3>
                </center>  
          </div>
         <?php } ?> -->
         
         
         <div class="row">
           <div class="col-sm-12">
             <div class="card">
               <div class="card-body">
               <?php
                if(mysqli_num_rows($res)>0) {
                ?>
                  <?php if($_SESSION['QR_USER_ROLE']==0) {?>
                
                 <div class="table-responsive">
                   <table class="table user-table">
                   <thead>
                       <tr>
                     
                         <th class="border-top-0">#</th>

                         <?php if($orig==2) {?>
                         <th class="border-top-0">Sap ID</th>
                         <?php } ?>
                         <th class="border-top-0">QR Code</th>
                         <th class="border-top-0">Name</th>
                         <th class="border-top-0">Username</th>
                         <th class="border-top-0">Report</th>

                       </tr>
                     </thead>


                     <tbody> 
                     <?php
                      $i =1;
                      while($row =mysqli_fetch_assoc($res))
                      {
                      ?>
                        <tr>
                       <td><?php echo $i++ ?>
                       <?php if($orig==2) {?>
                         <td> <?php echo $row['sap_id'] ?> </td>
                         <?php } ?>
                        
                        <td>
          <a target="_blank" href="https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=<?php echo $qr_file_path ?>?id=<?php echo $row['id'] ?>%26pid=<?php echo $pid ?>" >
                         <img src="https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=<?php echo $qr_file_path ?>?id=<?php echo $row['id'] ?>%26pid=<?php echo $pid ?>" width="50px" />
                         </a>
                         </td>

                         <td><a href="profile.php?admreq=<?php echo $row['id'] ?>&pid=<?php echo $pid ?>"> <b><?php echo $row['name'] ?> </b></a></td>
                         <td><?php echo $row['email'] ?></td>         
                         <td>
                          <a href="report.php?id=<?php echo $row['id'] ?>&pid=<?php echo $pid ?> ">
                            <button class="btn btn-warning">Report</button>
                          </a>
                         </td>          
                       </tr>
                      <?php
                      }
                      ?>


                     </tbody>
                   </table>
                 </div>


                        <?php } else{
                          while($row =mysqli_fetch_assoc($res)){
                            ?>
                        
                        <center>
                        <div class="card border-danger mb-0" style="max-width: 18rem;">
                        <a target="_blank" href="https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=<?php echo $qr_file_path ?>?id=<?php echo $row['id'] ?>%26pid=<?php echo $pid ?>" >
                         <img src="https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=<?php echo $qr_file_path ?>?id=<?php echo $row['id'] ?>%26pid=<?php echo $pid ?>" width="100%" />
                         </a>
                      </div>
                        </center>
                        
                       
                         <?php } } ?>

                   
                 <?php } 
                 else
                 {
                  echo "No data found";
                 }
                 ?>
               </div>
             </div>
             </div>

             </div>

             <br> 
             
             </div>
             </div>
             </div>
             </div>

        
     
       
       <?php
  include('footer.php')
?>
