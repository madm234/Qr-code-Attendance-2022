<?php 
include('header.php');
auth();


$section=array();
$day ='';
$time =array();
$room =array();
$building =array();


if(isset($_GET['tt']) && $_GET['tt']>0 && isset($_GET['pid']) && $_GET['pid']>=0)
{

    $tt =get_safe_value($_GET['tt']);
    $pid =get_safe_value($_GET['pid']);

    if($pid==1)
    $mes =mysqli_query($con,"select * from staff where id ='$tt' ");

    else if($pid==2)
    $mes =mysqli_query($con,"select * from student where id ='$tt' ");

    else if($pid==3)
    $mes =mysqli_query($con,"select * from employee where id ='$tt' ");

    $rip =mysqli_fetch_assoc($mes);
}


?>

<div class="container">
                <div class="timetable-img text-center">
                    <img src="img/content/timetable.png" alt="">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr class="bg-light-gray">
                                <th class="text-uppercase">Time
                                </th>
                                <th class="text-uppercase">9</th>
                                <th class="text-uppercase">10</th>
                                <th class="text-uppercase">11</th>
                                <th class="text-uppercase">12</th>
                                <th class="text-uppercase">1</th>
                                <th class="text-uppercase">2</th>
                                <th class="text-uppercase">3</th>
                                <th class="text-uppercase">4</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            
                            <?php
                            if($pid==1 ){  
$res =mysqli_query($con,"select * from staff_class where username='$rip[email]' ");
                                while( $row =mysqli_fetch_assoc($res))
                                {
                                    $day =$row['day'];
                                    $sec =$row['section'];
                                    $tim =$row['time'];
                                    $roo =$row['room'];
                                    $build =$row['building'];

                                    $section =explode(",",$sec);
                                    $time =explode(",",$tim);
                                    $room =explode(",",$roo);
                                    $building =explode(",",$build);
                                    $i =0;
                                    $len =count($section);
                            ?>


                                <?php if($day==1) {?>
                                <td class="align-middle">Monday</td>
                                <?php }else if($day==2) {?>
                                    <td class="align-middle">Tuesday</td>
                                <?php }else if($day==3) {?>
                                    <td class="align-middle">Wednesday</td>
                                <?php }else if($day==4) {?>
                                    <td class="align-middle">Thursday</td>
                                <?php }else if($day==5) {?>
                                    <td class="align-middle">Friday</td>
                                <?php }?>
            
                                <td>
                                    <?php if($i<$len && $time[$i]==9) {?>
                                    <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?php echo $building[$i].$room[$i] ?></span>
                                    <div class="margin-10px-top font-size14"><?php echo "Section: ".$section[$i] ?></div>
                                    <?php $i++; } else{ ?>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Free</span>
                                     <?php } ?>    
                                    
                                </td>
                                
                                <td>
                                    <?php if($i<$len && $time[$i]==10) {?>
                                    <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?php echo $building[$i].$room[$i] ?></span>
                                    <div class="margin-10px-top font-size14"><?php echo "Section: ".$section[$i] ?></div>
                                    <?php $i++; } else{ ?>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Free</span>
                                     <?php } ?>    
                                    
                                </td>

                                <td>
                                    <?php if($i<$len && $time[$i]==11) {?>
                                    <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?php echo $building[$i].$room[$i] ?></span>
                                    <div class="margin-10px-top font-size14"><?php echo "Section: ".$section[$i] ?></div>
                                    <?php $i++; } else{ ?>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Free</span>
                                     <?php } ?>    
                                    
                                </td>

                                <td>
                                    <?php if($i<$len && $time[$i]==12) {?>
                                    <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?php echo $building[$i].$room[$i] ?></span>
                                    <div class="margin-10px-top font-size14"><?php echo "Section: ".$section[$i] ?></div>
                                    <?php $i++; } else{ ?>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Free</span>
                                     <?php } ?>    
                                    
                                </td>

                                <td>
                                    <?php if($i<$len && $time[$i]==1) {?>
                                    <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?php echo $building[$i].$room[$i] ?></span>
                                    <div class="margin-10px-top font-size14"><?php echo "Section: ".$section[$i] ?></div>
                                    <?php $i++; } else{ ?>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Free</span>
                                     <?php } ?>    
                                    
                                </td>

                                <td>
                                    <?php if($i<$len && $time[$i]==2) {?>
                                    <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?php echo $building[$i].$room[$i] ?></span>
                                    <div class="margin-10px-top font-size14"><?php echo "Section: ".$section[$i] ?></div>
                                    <?php $i++; } else{ ?>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Free</span>
                                     <?php } ?>    
                                    
                                </td>

                                <td>
                                    <?php if($i<$len && $time[$i]==3) {?>
                                    <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?php echo $building[$i].$room[$i] ?></span>
                                    <div class="margin-10px-top font-size14"><?php echo "Section: ".$section[$i] ?></div>
                                    <?php $i++; } else{ ?>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Free</span>
                                     <?php } ?>    
                                    
                                </td>

                                <td>
                                    <?php if($i<$len && $time[$i]==4) {?>
                                    <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?php echo $building[$i].$room[$i] ?></span>
                                    <div class="margin-10px-top font-size14"><?php echo "Section: ".$section[$i] ?></div>
                                    <?php $i++; } else{ ?>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Free</span>
                                     <?php } ?>    
                                    
                                </td>
                            </tr>

                               <?php } ?>         
                          
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            </div>








<?php
}else if($pid==2){ 
    ?>

    <h1>Work on prgress for this section </h1>
<br>
                    </tr>                      
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            </div>


<?php 
}else
{
    redirect('404.php');
}
include('footer.php');
?>