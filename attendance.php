<?php
include('header.php');
auth();

if(isset($_GET['sid']) && $_GET['sid']>0 && isset($_GET['pid']) && $_GET['pid']>=0)
{

    $sid =get_safe_value($_GET['sid']);
    $pid =get_safe_value($_GET['pid']);

    if($pid==1)
    $mes =mysqli_query($con,"select * from staff where id ='$sid' ");

    else if($pid==2)
    $mes =mysqli_query($con,"select * from student where id ='$sid' ");

    else if($pid==3)
    $mes =mysqli_query($con,"select * from employee where id ='$sid' ");

    $rip =mysqli_fetch_assoc($mes);
}

// if($_SESSION['QR_USER_ROLE']=1)
// $res =mysqli_query($con,"select * from staff where id ='$id' ");

// if($pid==2)
// $res =mysqli_query($con,"select * from student where email ='$_SESSION[QR_USER_EMAIL]' ");

// if($_SESSION['QR_USER_ROLE']=3)
// $res =mysqli_query($con,"select * from employee where id ='$id' ");
if(mysqli_num_rows($mes)==0)
{
  echo "No user found!";
  die();
}
else 
{
    // $row =mysqli_fetch_assoc($rip);
    $zinc =mysqli_query($con,"select * from attendance where sap_id ='$rip[sap_id]' ");
    $row2 =mysqli_fetch_assoc($zinc);
    
}
?>

<h1>Total days present </h1>
<p>*Following attendance is made accordance to 5 subjects only!</p>
<br>
<table class="table table-striped " >
<thead>
    <tr class="" >
      <th scope="col"><b>Subjects,sections</b></th>
      <th scope="col"><b>Present</b> </th>
      <th scope="col"><b>Absent</b></th>
    </tr>
  </thead>

  <tbody>
    <tr class="table-primary">
      <th scope="row"><?php echo $rip['subject1'] ?></th>
      <?php if(mysqli_num_rows($zinc)>0) {?>
      <td><?php echo $row2['subject1'] ?></td>
      <?php }else { ?>
        <td>  2</td>
        <?php } ?>
      <td>2</td>
    </tr>
    
    <tr class="table-success">
      <th scope="row"><?php echo $rip['subject2'] ?></th>
      <?php if(mysqli_num_rows($zinc)>0) {?>
      <td><?php echo $row2['subject2'] ?></td>
      <?php }else { ?>
        <td>4</td>
        <?php } ?>
      <td>4</td>
    </tr>
   
    <tr class="table-danger">
      <th scope="row"><?php echo $rip['subject3'] ?></th>
      <?php if(mysqli_num_rows($zinc)>0) {?>
      <td><?php echo $row2['subject3'] ?></td>
      <?php }else { ?>
        <td>2</td>
        <?php } ?>
      <td colspan="2">2</td>
    </tr>
    
    <tr class="table-warning">
      <th scope="row"><?php echo $rip['subject4'] ?></th>
      <?php if(mysqli_num_rows($zinc)>0) {?>
      <td><?php echo $row2['subject4'] ?></td>
      <?php }else { ?>
        <td>5</td>
        <?php } ?>
      <td colspan="2">5</td>
    </tr>
    
    <tr class="table-info">
      <th scope="row"><?php echo $rip['subject5'] ?></th>
      <?php if(mysqli_num_rows($zinc)>0) {?>
      <td><?php echo $row2['subject5'] ?></td>
      <?php }else { ?>
        <td>0</td>
        <?php } ?>
      <td colspan="2">0</td>
    </tr>
  </tbody>
</table>
<br>

</div>
 </div>
 <?php
 include('footer.php');
 ?>