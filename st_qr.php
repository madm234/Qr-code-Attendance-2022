<?php
  include('header.php');
  auth();

  $condition ="";
  if($_SESSION['QR_USER_ROLE']!=0)
  {
    $condition =" and st_qr.email='".$_SESSION['QR_USER_EMAIL']."'";
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
$res =mysqli_query($con,"select st_qr.*,student.email,student.name,student.sap_id from st_qr inner join student where 1 
and st_qr.email=student.email $condition ");

?>


<div class="page-wrapper">
       
       <div class="page-breadcrumb">
         <div class="row align-items-center">
           <div class="col-md-6 col-8 align-self-center">
             <h2 class="page-title mb-0 p-0">QR Codes</h3>
            
           </div>
          
         </div>
       </div>
       <br>

      
       <div class="container-fluid">
        
       <div class="card shadow py-3 px-3 ">
                <h6 class="m-0 font-weight-bold text-primary"><a href="addst.php">Add QR Codes</a></h6>
                </div> 

         <div class="row">
           <div class="col-sm-12">
             <div class="card">
               <div class="card-body">
               <?php
                if(mysqli_num_rows($res)>0) {
                ?>
                 <h4 class="card-title">Basic Table</h4>
                 <div class="table-responsive">
                   <table class="table user-table">
                     <thead>
                       <tr>
                         <th class="border-top-0">#</th>
                         <th class="border-top-0">Name</th>
                         <th class="border-top-0">QR Code</th>
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
                         <td><a href="profile.php"> <?php echo $row['name'] ?> </a></td>
                         <td>
     <a target="_blank" href="https://chart.googleapis.com/chart?cht=qr&chs=300x300&chco=1363DF&chl=<?php echo $qr_file_path ?> ">
                         <img src="https://chart.googleapis.com/chart?cht=qr&chs=300x300&chco=1363DF&chl=<?php echo $qr_file_path ?>" width="100px" />
                         </a>
                        </td> 

                           
                       </tr>
                      <?php
                      }
                      ?>


                     </tbody>
                   </table>
                 </div>
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
        
       </div>
       </div>
       </div>
       </div>
       
       
       
       <?php
  include('footer.php')
?>
