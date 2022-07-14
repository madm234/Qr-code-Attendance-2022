<?php
  include('header.php');
  auth();


if(isset($_GET['id']) && $_GET['id']!='')
 {
    $id =get_safe_value($_GET['id']);
    // $res =mysqli_query($con,"select email from qr_code where 1 and id=$id ");

    if(mysqli_num_rows(mysqli_query($con,"select name from student where id ='$id' and status='1'"))>0)
    $res =mysqli_query($con,"select email from student where id ='$id' and status='1'");

    if(mysqli_num_rows(mysqli_query($con,"select name from staff where id ='$id' and status='1'"))>0)
    $res =mysqli_query($con,"select email from staff where id ='$id' and status='1'");

    if(mysqli_num_rows(mysqli_query($con,"select name from employee where id ='$id' and status='1'"))>0)
    $res =mysqli_query($con,"select email from employee where id ='$id' and status='1'");


    $row =mysqli_fetch_assoc($res);
    $email =$row['email'];
    $value =-1;
    if(mysqli_num_rows($sql =mysqli_query($con,"select * from student where email='$email'"))>0)
    {
        $zinc =mysqli_fetch_assoc($sql);
        $value =2;
    }
    else if(mysqli_num_rows($sql =mysqli_query($con,"select * from staff where email='$email'"))>0)
     {
            if($_SESSION['QR_USER_ROLE']!=1)
            {
                $zinc =mysqli_fetch_assoc($sql);
                $value =1;
            }
            else
            {
                echo "Warning : You are scanning other teacher's QR Code";
                die();
            }
     }
     else if(mysqli_num_rows($sql =mysqli_query($con,"select * from employee where email='$email'"))>0)
     {
            if($_SESSION['QR_USER_ROLE']!=3)
            {
                $zinc =mysqli_fetch_assoc($sql);
                $value =3;
            }
            else
            {
                echo "You cannot scan your own QR Code";
                die();
            }
     }
 }
 ?>

<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
  <div class="bg-success card-header">Attended</div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $zinc['name'] ?></h5>
    <?php if($value==2) {?>
    <p class="card-text"><?php echo $zinc['sap_id'] ?></p>
    <p class="card-text"><?php echo $zinc['roll_no'] ?></p>
    <?php } ?>
    <p class="card-text"><?php echo $email ?></p>
  </div>
</div>

</div>

</div>
  <?php
  include('footer.php')
?>
