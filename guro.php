<?php
//  include('header.php');

include('db.php');
include('function.php');

include('lib/BrowserDetection.php');
require('lib/Mobile_Detect.php');

date_default_timezone_set('Asia/Kolkata');
$day =date('N');
$time =date('g');
$section2 =array();
$time2 =array();
$room =array();
$building =array();
$sub1 =array();
$sub2 =array();
$sub3 =array();
$sub4 =array();
$sub5 =array();



    if(isset($_GET['id']) && $_GET['id']>0 && isset($_GET['pid']) && $_GET['pid']>0)
{

    $id =get_safe_value($_GET['id']);
    $pid =get_safe_value($_GET['pid']);

    if($pid==1)
    $res =mysqli_query($con,"select * from staff where id ='$id' and status='1'");

    else if($pid==2)
    $res =mysqli_query($con,"select * from student where id ='$id' and status='1'");

    else if($pid==3)
    $res =mysqli_query($con,"select * from employee where id ='$id' and status='1'");

    if(mysqli_num_rows($res)>0)
    {
        $row =mysqli_fetch_assoc($res);
        $naam =$row['name'];
        $email =$row['email'];
        $image =$row['image'];
        $device ="";
        $os ="";
       
        $detect =new Mobile_Detect();

        if($detect->isMobile())
             $device ="Mobile";
        else if($detect->isTablet())
             $device ="Tablet";
        else
             $device ="PC";    
               
        $browserObj =new Wolfcast\BrowserDetection();
        $browser =$browserObj->getName();

        if($detect->isiOS())
            $os ="iOS";
        elseif($detect->isAndroidOS())
            $os ="Android";
        else
            $os ="Window";   
           

        $init =curl_init();
        curl_setopt($init,CURLOPT_URL,"http://ip-api.com/json/");
        curl_setopt($init,CURLOPT_RETURNTRANSFER,1);
        $result =curl_exec($init);
        curl_close($init);
        $result =json_decode($result,true);
        $city =$result['city'];
        $country =$result['country'];
        $ip_address =$result['query'];
        $state =$result['regionName'];
        date_default_timezone_set('Asia/Kolkata');
        $added_on =date('Y-m-d H:i:s');
        $added_on_str =date('Y-m-d ');
        $added_by =	$_SESSION['QR_USER_NAME'];
       
        // mysqli_query($con,"insert into qr_traffic(name,email,device,browser,city,state,country,added_on_str,added_on,ip_address,os) values('$naam','$email','$device','$browser','$city','$state', '$country' , '$added_on_str','$added_on','$ip_address','$os')");   
          }else
    {
        echo "User Not Found"; 
        die();
    }
    
    }
    else
    {
        echo "L i n k  E x p i r e d"; 
        die();
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <title>Attendance</title>

    <style>
@import url('https://fonts.googleapis.com/css2?family=Margarine&display=swap');
</style>
</head>
<body>
<center>

    <?php if($_SESSION['QR_USER_ROLE']==1 && $pid==2){

    if(mysqli_num_rows(mysqli_query($con,"select * from attendance where sap_id='$row[sap_id]' "))==0)
        {
            mysqli_query($con,"insert into attendance(sap_id,subject1,subject2,subject3) values('$row[sap_id]','0','0','0')");
        }

        $zinc =mysqli_query($con,"select * from staff_class where username='$_SESSION[QR_USER_EMAIL]' and day=$day");  
        $result ='false';
        $minor ='false';
        
        $row2 =mysqli_fetch_assoc($zinc);
        if(mysqli_num_rows($zinc)>0)
        {
                $section2 =explode(",", $row2['section']);
                $time2 =explode(",", $row2['time']);
                $room =explode(",",$row2['room']);
                $building =explode(",", $row2['building']);
                $subject = $row2['subject'];
                $i =0;
                $len =count($section2);
                $sub1 =explode(",",$row['subject1']);
                $sub2 =explode(",",$row['subject2']);
                $sub3 =explode(",",$row['subject3']);
                $sub4 =explode(",",$row['subject4']);
                $sub5 =explode(",",$row['subject5']);
                $hit1 =$row['hit1'];
                $hit2 =$row['hit2'];
                $hit3 =$row['hit3'];
                $hit4 =$row['hit4'];
                $hit5 =$row['hit5'];

               if($subject==$sub1[0])
               {
                    for($m=0;$m<$len;$m++)
                    {
                        if($section2[$m]==$sub1[1] && $time2[$m]==$time)    
                        {
                            if($hit1==$time)
                            {
                                    ?>
                                  <h2>Attendance taken already!</h2>  
                                    <?php
                                $minor ='true';
                            }
                           else 
                           {
                            $result ='true';
                            $venue =$building[$m].$room[$m];
                            mysqli_query($con,"update student set hit1='$time' where id=$id");
                            mysqli_query($con,"update attendance set subject1=subject1+1 where sap_id='$row[sap_id]'");
                            mysqli_query($con,"insert into qr_traffic(name,email,added_by,venue,device,browser,city,state,country,added_on_str,added_on,ip_address,os) values('$naam','$email','$added_by','$venue','$device','$browser','$city','$state', '$country' , '$added_on_str','$added_on','$ip_address','$os')");   
                            break;
                           }
                        }
                    }
               }

               else if($subject==$sub2[0])
               {
                for($m=0;$m<$len;$m++)
                    {
                        if($section2[$m]==$sub2[1] && $time2[$m]==$time)    
                        {
                            if($hit2==$time)
                            {
                                    ?>
                                  <h2>Attendance taken already!</h2>  
                                    <?php
                                 $minor ='true';
                            }
                           else 
                           {

                            $result ='true';
                            $venue =$building[$m].$room[$m];
                            mysqli_query($con,"update student set hit2='$time' where id=$id");
                            mysqli_query($con,"update attendance set subject2=subject2+1 where sap_id='$row[sap_id]' ");
                            mysqli_query($con,"insert into qr_traffic(name,email,added_by,venue,device,browser,city,state,country,added_on_str,added_on,ip_address,os) values('$naam','$email','$added_by','$venue','$device','$browser','$city','$state', '$country' , '$added_on_str','$added_on','$ip_address','$os')");   
                            break;
                           }
                        }
                    }
               }

               else if($subject==$sub3[0])
               {
               for($m=0;$m<$len;$m++)
                    {
                        if($section2[$m]==$sub3[1] && $time2[$m]==$time)    
                        {
                            if($hit3==$time)
                            {
                                    ?>
                                  <h2>Attendance taken already!</h2>  
                                    <?php
                                $minor ='true';
                            }
                           else 
                           {
                            $result ='true';
                            $venue =$building[$m].$room[$m];
                            mysqli_query($con,"update student set hit3='$time' where id=$id");
                            mysqli_query($con,"update attendance set subject3=subject3+1 where sap_id='$row[sap_id]' ");
                            mysqli_query($con,"insert into qr_traffic(name,email,added_by,venue,device,browser,city,state,country,added_on_str,added_on,ip_address,os) values('$naam','$email','$added_by','$venue','$device','$browser','$city','$state', '$country' , '$added_on_str','$added_on','$ip_address','$os')");   
                            break;
                           }
                        }
                    }
               }

               else if($subject==$sub4[0])
               {
               for($m=0;$m<$len;$m++)
                    {
                        if($section2[$m]==$sub4[1] && $time2[$m]==$time)    
                        {
                            if($hit4==$time)
                            {
                                    ?>
                                  <h2>Attendance taken already!</h2>  
                                    <?php
                                $minor ='true';
                            }
                           else 
                           {
                            $result ='true';
                            $venue =$building[$m].$room[$m];
                            mysqli_query($con,"update student set hit4='$time' where id=$id");
                            mysqli_query($con,"update attendance set subject4=subject4+1 where sap_id='$row[sap_id]' ");
                            mysqli_query($con,"insert into qr_traffic(name,email,added_by,venue,device,browser,city,state,country,added_on_str,added_on,ip_address,os) values('$naam','$email','$added_by','$venue','$device','$browser','$city','$state', '$country' , '$added_on_str','$added_on','$ip_address','$os')");   

                            break;
                           }
                        }
                    }
               }

               else if($subject==$sub5[0])
               {
               for($m=0;$m<$len;$m++)
                    {
                        if($section2[$m]==$sub5[1] && $time2[$m]==$time)    
                        {
                            if($hit5==$time)
                            {
                                    ?>
                                  <h2>Attendance taken already!</h2>  
                                    <?php
                                $minor ='true';
                            }
                           else 
                           {
                            $result ='true';
                            $venue =$building[$m].$room[$m];
                            mysqli_query($con,"update student set hit5='$time' where id=$id");
                            mysqli_query($con,"update attendance set subject5=subject5+1 where sap_id='$row[sap_id]' ");
                            mysqli_query($con,"insert into qr_traffic(name,email,added_by,venue,device,browser,city,state,country,added_on_str,added_on,ip_address,os) values('$naam','$email','$added_by','$venue','$device','$browser','$city','$state', '$country' , '$added_on_str','$added_on','$ip_address','$os')");   

                            break;
                           }
                        }
                    }
               }
            
        } 
        else
        {
         ?>
                <h1>No Class for today !Enjoy</h1>
                <br>
                <br>

                <a href="scan.php"><button class="btn btn-primary">Scan Again</button></a>
                </div>
                <br>
                <br>

                <div>
               <a href="profile.php"><button class="btn btn-danger">Home</button></a>
                </div>
                <?php
                 die();
        }

        if($result=='true'){

        
                

        ?>
    <header>
        <br>
        <h1 style="font-family: 'Margarine', cursive;">Attendance Successul!</h1>
        
        <br>
    </header>
<div class="card text-white bg-success mb-3" style="max-width: 23rem;">
       
        <div class="bg-success card-header">
            <h3><?php echo $row['name'] ?>  <i class="fa fa-check" aria-hidden="true" ></i></h3>
        <div class="card-body">
            <?php if($row['image']!="") {?>
        <img src=<?php echo $row['image'] ?> alt="" width="200" style=" border: 2px solid; border-radius: 20px ;">
        <?php }else{ ?>
            <img src="img/boy.gif" alt="" width="200" style=" border: 2px solid; border-radius: 20px ;">
        <?php } ?>

        <hr>
        <p class="card-text"><b>Username:-</b><?php echo $row['email'] ?></p>
          <?php if($pid==2) {?>
          <p class="card-text"><b>Sap Id:-</b> <?php echo $row['sap_id'] ?></p>
          <p class="card-text"><b>Roll No:-</b> <?php echo $row['roll_no'] ?></p>
          <p class="card-text"><b>Branch:-</b> <?php echo $row['branch'] ?></p>
          <p class="card-text"><b>Phone No.:-</b> <?php echo $row['phone_no'] ?></p>

          <?php } ?>   
        </div>
      </div>
      </div>


      <?php }else if($result=='false' && $minor=='false') {?>
      <header>
      <br>
      <h1 style="font-family: 'Margarine', cursive;">Attendance Denied! Not your student</h1>
      <br>
  </header>
<div class="card text-white bg-danger mb-3" style="max-width: 23rem;">
      <div class="bg-danger card-header">
          <h3><?php echo $row['name'] ?>  <i class="fa fa-times" aria-hidden="true" ></i></h3>
      <div class="card-body">
      <?php if($row['image']!="") {?>
        <img src=<?php echo $row['image'] ?> alt="" width="200" style=" border: 2px solid; border-radius: 20px ;">
        <?php }else{ ?>
            <img src="img/boy.gif" alt="" width="200" style=" border: 2px solid; border-radius: 20px ;">
        <?php } ?>

        <hr>
        <p class="card-text"><b>Username:-</b><?php echo $row['email'] ?></p>
          <?php if($pid==2) {?>
          <p class="card-text"><b>Sap Id:-</b> <?php echo $row['sap_id'] ?></p>
          <p class="card-text"><b>Roll No:-</b> <?php echo $row['roll_no'] ?></p>
        <p class="card-text"><b>Branch:-</b> <?php echo $row['branch'] ?></p>
          <p class="card-text"><b>Phone No.:-</b> <?php echo $row['phone_no'] ?></p>
        <?php } ?>   
      </div>
    </div>
    </div>


     <?php }
     }
     else{ 
        mysqli_query($con,"insert into qr_traffic(name,email,added_by,device,browser,city,state,country,added_on_str,added_on,ip_address,os) values('$naam','$email','$added_by','$device','$browser','$city','$state', '$country' , '$added_on_str','$added_on','$ip_address','$os')");   
        ?>
        <header>
        <br>
        <h1 style="font-family: 'Margarine', cursive;">User Details!</h1>
        <br>
    </header>
<div class="card text-white bg-success mb-3" style="max-width: 23rem;">
        <div class="bg-success card-header">
            <h3> <?php echo $row['name'] ?> </h3>
            
        <div class="card-body">
        <?php if($row['image']!="") {?>
        <img src=<?php echo $row['image'] ?> alt="" width="200" style=" border: 2px solid; border-radius: 20px ;">
        <?php }else{ ?>
            <img src="img/staff.gif" alt="" width="200" style=" border: 2px solid; border-radius: 20px ;">
        <?php } ?>
<hr>
        <p class="card-text"><b>Username:-</b><?php echo $row['email'] ?></p>
          <?php if($pid==2) {?>
          <p class="card-text"><b>Sap ID:-</b> <?php echo $row['sap_id'] ?></p>
          <p class="card-text"><b>Roll No:-</b> <?php echo $row['roll_no'] ?></p>
          <?php } ?>   
          <?php if($pid==2 || $pid==1) {?>
          <p class="card-text"><b>Course:-</b> <?php echo $row['course'] ?></p>
          <p class="card-text"><b>Branch:- </b><?php echo $row['branch'] ?></p>
          <?php } ?>   

          <?php if($pid==3) {?>
          <p class="card-text"><b>Department:-</b> <?php echo $row['department'] ?></p>
          <?php } ?>   
          <?php if($pid==3 || $pid==1) {?>
          <p class="card-text"><b>Position:-</b> <?php echo $row['position'] ?></p>
          <?php } ?>   
          <p class="card-text"><b>Phone No:-</b> <?php echo $row['phone_no'] ?></p>
        </div>
      </div>
      </div>
        <?php } ?>
<br>



      <div>
        <a href="scan.php"><button class="btn btn-primary" style="margin-right: 8px;">Scan Again</button></a>
        <a href="profile.php"><button class="btn btn-danger">Home</button></a>
      </div>
      <br>
      
</center>
<footer class="sticky-footer bg-white ">
    <br><br><br>
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; DIT 2022</span>
                    </div>
                </div>
                
            </footer>
</body>


</html>
