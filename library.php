<?php
 include('header.php');

auth();
$row ='';
date_default_timezone_set('Asia/Kolkata');
$date =date('G:i:s');


if(isset($_POST['submit']))
  {
    $no =get_safe_value($_POST['no']);
    $sap =get_safe_value($_POST['sap']);
    $books =get_safe_value($_POST['books']);
    $mino =$no.",".$books;

    $bored =mysqli_query($con,"select * from library where sap_id=$sap");
    if(mysqli_num_rows($bored)>0){
    // $chorus =mysqli_fetch_assoc($bored);
    mysqli_query($con,"update library set issued='$mino',issued_on='$date' where sap_id=$sap ");
    }
    else
    {
      mysqli_query($con,"insert into library(sap_id,issued,issued_on) values('$sap','$mino','$date')");
    }
  }
 


if(isset($_GET['id']) && $_GET['id']!='' )
{
  $st =mysqli_query($con,"select * from library where sap_id='$_SESSION[SAP]' ");
  if(mysqli_num_rows($st)>0)
  {
    $row =mysqli_fetch_assoc($st);
    
    if($row['ex']==""){
     mysqli_query($con,"update library set ex='$date' where sap_id='$_SESSION[SAP]' ");
    }
    else
    {
      mysqli_query($con,"update library set entry='$date', ex='' where sap_id='$_SESSION[SAP]'");
    }
  }
  else
  {
    mysqli_query($con,"insert into library(sap_id,entry) values('$_SESSION[SAP]','$date')");
  }
}


$res =mysqli_query($con,"select library.*,student.sap_id from library,student where library.sap_id='$_SESSION[SAP]' ");
if($_SESSION['QR_USER_ROLE']==2){
?>

<div class="row">

  
  <div class="col-sm-4 ">
    <div class="card">
      <img src="img/lib3.jpg" class="card-img-top" alt="...">
      <div class="card-body">
      <h3 class="card-title " style="color:#F37878"><b>Your Last Visit</b></h3>
      <?php if(mysqli_num_rows($res)>0){
      $row2 =mysqli_fetch_assoc($res);  

        ?>
      <h5><b>Entry time:</b> <?php echo $row2['entry'] ?></h5>
      <h5><b>Exit time:</b> <?php echo $row2['ex'] ?></h5>
      <?php }
      else{ ?>
        <h5>Go explore library. Read some books. No data found!</h5>
       <?php } ?>
      </div>
    </div>
    <br>
  </div>

  <div class="col-sm-4 ">
  <a href="scan.php" style=" text-decoration: none;">
  <br>
    <div class="card" style="border-bottom-right-radius: 100px; border-bottom-left-radius: 100px;">
      <img src="img/scant.gif" class="card-img-top" alt="...">
      <div class="card-body">
        
      <center><h3 class="card-title"><b>Scan now</b></h3></center>
      </div>
    </div>
    <br>
  </a>
  <br>
  </div>

  

  <div class="col-sm-4" >
    <div class="card" >
      <img src="img/lib2.jpg" class="card-img-top" alt="...">
      <div class="card-body">
    
      <h3 class="card-title" style="color:#F37878"><b>Books Issued</b></h3>
      <?php if(mysqli_num_rows($res)>0){
      $row2 =mysqli_fetch_assoc($res);  
        
        if($row2['issued']!='') {

          $arey =explode(',',$row2['issued']);
          $tot =$arey[0];
          $leny =count($arey);
          ?>
       
        <h5> <b>Total books:</b><?php echo $tot ?></h5>
        <?php for($f=1;$f<$leny;$f++){ ?>
        <h5> <b>Book<?php echo $f?> serial:</b><?php echo $arey[$f] ?></h5>
        <?php } ?>
        <h5> <b>Issued on:</b><?php echo $row2['issued_on'] ?></h5>
   <?php }else {?>
      <h5>No Book Issued</h5>
    <?php } }else{?>
      <h5>No Book Issued</h5>
      <?php } ?>
      </div>
    </div>
    <br>
  </div>
  </div>


<?php }else{ ?>
  
 <center>
    <div class="card">
      <div class="card-body">
      <h3 class="card-title " style="color:#F37878"><b>Issue books!</b></h3>
     
      <form method="post">
 <div class="row">
  
 <div class="mb-3 col-6">
    <label for="exampleInputEmail1" class="form-label"><b>No. of books:</b></label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="no" required>
    <br>
  </div>

  <div class="mb-3 col-6">
    <label for="exampleInputEmail1" class="form-label"><b>Sap Id:</b></label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="sap" required>
    <br>
  </div>
 </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"><b>Book/s serial no:</b></label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="put , after each book" name="books" required>
  </div>

  <button type="submit" class="btn btn-outline-danger btn-sm" name="submit">Submit</button>
</form>
      </div>
    </div>
    <br>


 </center>


  <?php } ?>

</div>
</div>

<?php 
 include('footer.php');
 ?>