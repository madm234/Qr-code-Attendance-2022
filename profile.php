<?php
include('header.php');

auth();

$var ="";
$msg ="";
$pid ="";
$admreq ="";


if(isset($_GET['admreq']) && $_GET['admreq']>0 && isset($_GET['pid']) && $_GET['pid']>=0)
{

    $admreq =get_safe_value($_GET['admreq']);
    $pid =get_safe_value($_GET['pid']);

    if($pid==1)
    $res =mysqli_query($con,"select * from staff where id ='$admreq' ");

    else if($pid==2)
    $res =mysqli_query($con,"select * from student where id ='$admreq' ");

    else if($pid==3)
    $res =mysqli_query($con,"select * from employee where id ='$admreq' ");

}


if($pid==0)
{

  if(isset($_POST['notify']))
  {
	$email =get_safe_value($_POST['email']);
  if(isset($_POST['check']))
	$check =get_safe_value($_POST['check']);
  $des =get_safe_value($_POST['des']);
 
  date_default_timezone_set('Asia/Kolkata');
  $date =date('Y-m-d H:i:s');

  if($email==""  && isset($_POST['check']))
  {
      mysqli_query($con,"insert into messages(email,des,date) values('$check','$des','$date') ");
  }
  else
  {
    mysqli_query($con,"insert into messages(email,des,date) values('$email','$des','$date') ");
  }

  }
  
  ?>
    <center>
      <!-- <img src="img/own.png" alt="" width="50" style="margin: 0px; padding: 0px;"> -->
      <h1>Hello Admin!</h1>
      </center>
<br>

      <div class="container-fluid ">
<div class="row">


<div class="col-sm-6 " id="link1">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 font-weight-bold text-primary">SET NOTIFICATION</h5>
            <img src="img/bell.png" alt="" width="20">
        </div>
        <!-- Card Body -->
        <div class="card-body">
        <form method="post">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address:</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Leave empty, if notification is for whole college!">
 <br>
                <center>
                <label for="">Student</label>
                <input type="radio" name="check" id="" value="2">&nbsp;&nbsp;

                <label for="">Staff</label>
                <input type="radio" name="check" id="" value="1">&nbsp;&nbsp;

                <label for="">Employee</label>
                <input type="radio" name="check" id="" value="3">&nbsp;&nbsp;

                <label for="">All</label>
                <input type="radio" name="check" id="" value="4">
                </center>
          
              <div class="mb-3">
                <?php $zinc =mysqli_query($con,"select * from qr_traffic") ?>
                <label for="exampleInputPassword1" class="form-label">Description:</label>
                <input type="text" class="form-control" name="des" id="exampleInputPassword1">
              </div>
              

              <button type="submit" class="btn btn-outline-warning btn-sm" name="notify">Notify</button>
        </form>
        </div>
</div>

  </div>
  </div>
  <div class="col-sm-6 " id="link2">
    <div class="card shadow mb-4" >
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 font-weight-bold text-primary">Last 2 scan in Campus</h5>
        </div>
        <!-- Card Body -->
        <div class="card-body">
        <?php
    $wind =0;
    $sinc =mysqli_query($con,"select * from qr_traffic order by added_on desc");
    while($row3 =mysqli_fetch_assoc($sinc)) {
      if($wind<2){ 
    ?>
      <h5><b>Scanned of: </b> <?php echo $row3['name'] ?></h5>
      <h5><b>Taken on: </b> <?php echo $row3['added_on'] ?></h5>
      <h5><b>Scanned by: </b> <?php echo $row3['added_by'] ?></h5>
      <!-- <h5><b>Device used to scan: </b> <?php echo $row3['device'] ?></h5> -->
      <br>
      <?php $wind++;}}
     ?>
        </div>

   
    
  </div>
  </div>




  </div>
  </div>
  </div>
  </div>



  <?php  include('footer.php');
  die();
}

else
{

  $row =mysqli_fetch_assoc($res);
  $zinc =mysqli_query($con,"select * from qr_traffic where email='$row[email]' order by added_on desc"); 
  if(mysqli_num_rows($zinc)==0)
  {
      $msg ="No Attendance found of user!";
  }


if($pid==1)
{
  // $res =mysqli_query($con,"select * from staff where email='$_SESSION[QR_USER_EMAIL]' ");
  $var ="addstaff.php";
}
else if($pid==2) 
{
  // $res =mysqli_query($con,"select * from student where email='$_SESSION[QR_USER_EMAIL]'");
  $var ="addst.php";
  $sub1 =explode(",",$row['subject1']);
  $sub2 =explode(",",$row['subject2']);
  $sub3 =explode(",",$row['subject3']);
}
else if($pid==3)
{
  // $res =mysqli_query($con,"select * from employee where email='$_SESSION[QR_USER_EMAIL]'");
  $var ="addemp.php";
}
}
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
 <h1 class="h3 mb-0 text-gray-800">Profile</h1>
</div>
  <div class="container-fluid ">


  <div class="row">
  
 
  <div class="col-sm-6 ">
      <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div
              class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h5 class="m-0 font-weight-bold text-primary">Information</h5>
          </div>
          <!-- Card Body -->
          <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <?php if($row['image']!="") {?>
      <img src=<?php echo $row['image'] ?> class="img-fluid rounded-start" alt="Image not found" style="border-radius: 144px; padding:10px">
      <?php }else{ ?>
      <img src="img/no.jpg" class="img-fluid rounded-start" alt="Image not found" >
      <?php }?>
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <h5 ><b>Name:</b> <?php echo  $row['name'] ?></h5>
            <?php if($pid==2){ ?>
            <h5><b>Sap ID:</b> <?php echo  $row['sap_id'] ?></h5>
            <h5><b>Roll No:</b> <?php echo  $row['roll_no'] ?></h5>
            <?php } ?>
            <h5><b>Username:</b> <?php echo  $row['email'] ?></h5>
            <?php if($pid==1 ){ ?>
            <h5><b>Subject:</b> <?php echo  $row['subject'] ?></h5>
            <?php }if($pid==2 || $pid==1){ ?>
            <h5><b>Course:</b> <?php echo  $row['course'] ?></h5>
            <h5><b>Branch:</b> <?php echo  $row['branch'] ?></h5>
            <?php } if($pid==3){ ?>
            <h5><b>Department:</b> <?php echo  $row['department'] ?></h5>
            <?php } if($pid==3 || $pid==1){?>
            <h5><b>Position:</b> <?php echo  $row['position'] ?></h5>
              <?php } ?>
            <h5><b>Phone No:</b> <?php echo  $row['phone_no'] ?></h5>
            <?php if($pid==2){ ?>
            <h5><b>Joined Year:</b> <?php echo  $row['joined'] ?></h5>
            
            <?php } ?>
            <br>
<?php if($pid==1 || $pid==2) {?>
<a href="time_table.php?tt=<?php echo $admreq ?>&pid=<?php echo $pid ?>">
<button class="btn btn-success" >Time Table</button>
</a>
<?php } ?>
          </div>
       </div>
</div>
      </div>
    </div>
  </div>


<?php if($pid==2) {?>
<div class="col-sm-6 ">
      <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div
              class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Attendance</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">

<?php if(mysqli_num_rows($zinc)>0)
  {
    
      ?>
    <h3 style="color:seagreen;"><b>Last Attendance/s </b></h3>
    <br>
    <?php
    $ind =0;
    while($row2 =mysqli_fetch_assoc($zinc) ) { 
      if($ind<2 && $row2['venue']!=""){
    ?>
     
      <h5><b>Taken on: </b> <?php echo $row2['added_on'] ?></h5>
      <h5><b>Taken by: </b> <?php echo $row2['added_by'] ?></h5>
      <h5><b>Venue: </b> <?php echo $row2['venue'] ?></h5>
      <h5><b>Device used to scan: </b> <?php echo $row2['device'] ?></h5>
      <br>
      <?php $ind++;}
      
    }
    
  }
  else
  {
    ?>
     <h2> <?php echo $msg ?></h2>

     <?php 
  }
  ?>

<?php if($pid==2) { ?>
<a href="attendance.php?sid=<?php echo $admreq ?>&pid=2"><button class="btn btn-primary">More</button></a>
<?php } ?>
              </div>
          </div>
      </div>
      </div>

      <?php }else if($pid==1 || $pid==3){
  $drink =mysqli_query($con,"select * from qr_traffic where added_by='$row[name]' order by added_on desc"); 
        ?>

        <div class="col-sm-6 ">
      <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div
              class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Attendance</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">

<?php if(mysqli_num_rows($drink)>0)
  {
      if($pid==1){?>
    <h4 style="color:seagreen;"><b>Last Attendance/s you have taken </b></h4>
    <?php }else if($pid==3){?>
    <h4 style="color:seagreen;"><b>Last QR Code Scanned by you </b></h4>
    <?php } ?>
    <br>
    <?php
    $wind =0;
    $sissy =mysqli_query($con,"select * from qr_traffic  where added_by='$row[name]' and venue!='' order by added_on desc  ");

    if($pid==1 && mysqli_num_rows($sissy)>0){
    while($row4 =mysqli_fetch_assoc($sissy) ) { 
      if($wind<2){
    ?>
     
      <h5><b>Taken on: </b> <?php echo $row4['added_on'] ?></h5>
      <h5><b>Taken of: </b> <?php echo $row4['name'] ?></h5>
      <h5><b>Venue: </b> <?php echo $row4['venue'] ?></h5>
      <h5><b>Device used to scan: </b> <?php echo $row4['device'] ?></h5>
      <br>
      
      <?php 
        }
        $wind++;
      }
    }
    else if($pid==1 && mysqli_num_rows($sissy)==0)
    {?>
      <h2> No Attendance has been taken by user yet!</h2>
   <?php }



     else if($pid==3 && mysqli_num_rows($drink)>0){
      while($row4 =mysqli_fetch_assoc($drink) ) { 
       if($wind<2){
  ?>
   
    <h5><b>Taken of: </b> <?php echo $row4['name'] ?></h5>
    <h5><b>Taken on: </b> <?php echo $row4['added_on'] ?></h5>
    <!-- <h5><b>Venue: </b> <?php echo $row4['venue'] ?></h5> -->
    <h5><b>Device used to scan: </b> <?php echo $row4['device'] ?></h5>
    <br>
    <?php }

    $wind++;

       }
    }
    else if($pid==3 && mysqli_num_rows($drink)==0)
    {?>
      <h2> No QR Code has been scanned by user yet!</h2>
   <?php }

    
  }
  else
  {
  ?>
   <h1>Not once scanned!</h1>
  <?php 
  }
 ?>
 
 </div>

</div> 
</div> 
</div> 
</div> 
 <?php
       } ?>




</div>
</div> 
 <?php
 include('footer.php');
 ?>