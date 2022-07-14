<?php
include('db.php');
include('function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Attendance</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="css/time_table.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

  
</style>

<style>
@import url('https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap');
</style>
</head>





<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3">Team Chromo<sup>4</sup></div>
            </a>

            <!-- Divider -->
           
            <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
            <?php  if($_SESSION['QR_USER_ROLE']==0){ ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <img src="img/group.png" alt="" width="20">
                    <span>Users</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="student.php" >Students</a>
                        <a class="collapse-item" href="staff.php" >Staff</a>
                        <a class="collapse-item" href="employee.php" >Employees</a>
                    </div>
                </div>
            </li>
               <?php } ?>


               <?php  if($_SESSION['QR_USER_ROLE']==1 || $_SESSION['QR_USER_ROLE']==3){ ?>
                <li class="nav-item">
                <a class="nav-link collapsed" href="scan.php" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <img src="img/loupe.png" alt="" width="20">
                    <span>Scan</span>
                </a>
            </li>
               <?php } ?>

            <!-- Nav Item - Utilities Collapse Menu -->
            <?php  if($_SESSION['QR_USER_ROLE']==0){ ?>
                <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <img src="img/er.png" alt="" width="22">
                    <span>QR Code</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                       
                        <a class="collapse-item" href="qr_code.php?a=2" >Students</a>
                        <a class="collapse-item" href="qr_code.php?a=1" >Staff</a>
                        <a class="collapse-item" href="qr_code.php?a=3" >Employees</a>
                       
                </div>
            </li>
            <?php } else{ ?>
                <li class="nav-item">
                <a class="nav-link collapsed" href="qr_code.php" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <img src="img/er.png" alt="" width="22">
                    <span>QR Code</span>
                </a>
               
            </li>
            <?php } ?>     
          
            <li class="nav-item">
                <a class="nav-link collapsed" href="profile.php?admreq=<?php echo $_SESSION['QR_USER_ID'] ?>&pid=<?php echo $_SESSION['QR_USER_ROLE']?>"  data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <img src="img/id-card.png" alt="" width="20">
                    <span >Profile</span>
                </a>
            </li>

            <!-- Library -->
            <?php  if($_SESSION['QR_USER_ROLE']==2){ ?>
                <li class="nav-item">
                <a class="nav-link collapsed" href="library.php"  data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <img src="img/book.png" alt="" width="20">
                    <span >Library</span>
                </a>
            </li>
            <?php } ?>
            
            <?php  if($_SESSION['QR_USER_ROLE']==3){
                $mine =mysqli_query($con,"select * from employee where email='$_SESSION[QR_USER_EMAIL]' ");
                $rant =mysqli_fetch_assoc($mine);
                if($rant['department']=='Library' && $rant['position']=='Employee'){
                ?>
                <li class="nav-item">
                <a class="nav-link collapsed" href="library.php"  data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <img src="img/book.png" alt="" width="20">
                    <span >Library</span>
                </a>
            </li>
            <?php } }?>

            <li class="nav-item">
                <a class="nav-link collapsed" href="logout.php"  data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <img src="img/logout.png" alt="" width="18">
                    <span>Logout</span>
                </a>
            </li>

           


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->




        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->


                        <li class="nav-item dropdown no-arrow">
                            <a target="_blank" class="nav-link dropdown-toggle" href="https://erp.dituniversity.edu.in/">
                               <img src="img/unnamed (1).png" alt="" class="img-profile rounded-circle" > 
                               <!-- <img src="img/monkey-frustrated.gif" alt="" class="img-profile rounded-circle" >  -->
                            </a>
                            <!-- Dropdown - User Information -->

                        </li>

                        <!-- Nav Item - Alerts -->
                        <?php if($_SESSION['QR_USER_ROLE']!=0){ 
                             $fiona =mysqli_query($con,"select * from messages"); 
                             $siona =mysqli_query($con,"select * from messages"); 
                             
                             $n =0;
                             while($row2=mysqli_fetch_assoc($fiona))
                             {
                                if($row2['email']=="" || $row2['email']==4 || $row2['email']==$_SESSION['QR_USER_ROLE'] || $row2['email']==$_SESSION['QR_USER_EMAIL'])
                                {
                                    $n++;
                                }
                             }
                             ?>
                        <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle"  href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                
                                <?php if($n>1){ 
                                     $n =$n-1; 
                                     ?>
                                <span class="badge badge-danger badge-counter"><?php echo $n ?>+</span>
                                <?php } ?>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>

                                
                                <?php 
                                while($row3=mysqli_fetch_assoc($siona)){ 
                                if($row3['email']=="" || $row3['email']==4 || $row3['email']==$_SESSION['QR_USER_EMAIL'] || $row3['email']==$_SESSION['QR_USER_ROLE']){
                                 ?>
                                 <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"><?php echo $row3['date'] ?></div>
                                        <span class="font-weight-bold"><?php echo $row3['des'] ?></span>
                                    </div>
                                </a>
                                
                                <?php 
                                }
                            }
                         ?>
                                <a class="dropdown-item text-center small text-gray-500" href="profile.php?admreq=<?php echo $_SESSION['QR_USER_ID'] ?>&pid=<?php echo $_SESSION['QR_USER_ROLE']?>">End of messages</a>
                            </div>
                        </li>
                          <?php } ?>  






                        <!-- Nav Item - Messages -->
                       

                       



                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                              <?php if($_SESSION['QR_USER_ROLE']==0) {?>

                                <a class="nav-link dropdown-toggle" href="https://media.istockphoto.com/photos/neon-3d-font-blue-and-pink-neon-light-3d-rendering-letter-a-picture-id1250021058?b=1&k=20&m=1250021058&s=170667a&w=0&h=cOxwm6upQXXC2-3mbxrH810DmbVKAcv4Iq_eNkdGOpc=">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b>Welcome <?php echo$_SESSION['QR_USER_NAME'] ?></b></span>

                                    <img class="img-profile rounded-circle" src="https://media.istockphoto.com/photos/neon-3d-font-blue-and-pink-neon-light-3d-rendering-letter-a-picture-id1250021058?b=1&k=20&m=1250021058&s=170667a&w=0&h=cOxwm6upQXXC2-3mbxrH810DmbVKAcv4Iq_eNkdGOpc=" alt="">
                                    </a>
                               <?php } 
                                
                                else if($_SESSION['QR_USER_ROLE']==1){ if($_SESSION['IMAGE']!=""){?>
 <a class="nav-link dropdown-toggle" href=<?php echo $_SESSION['IMAGE'] ?> >
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b>Welcome <?php echo$_SESSION['QR_USER_NAME'] ?></b></span>
                                 <img class="img-profile rounded-circle"
                                    src="<?php echo $_SESSION['IMAGE'] ?>">
                                 </a>

                                    <?php }else{ ?>
                                        <a class="nav-link dropdown-toggle" href=<?php echo $_SESSION['IMAGE'] ?> >
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b>Welcome <?php echo$_SESSION['QR_USER_NAME'] ?></b></span>
                                 <img class="img-profile rounded-circle"
                                    src="img/user.png">
                                 </a>
                                 <?php } }

else if($_SESSION['QR_USER_ROLE']==3){?>
    <a class="nav-link dropdown-toggle" href="https://media.istockphoto.com/photos/neon-3d-font-blue-and-pink-neon-light-3d-rendering-letter-e-picture-id1250022279?k=20&m=1250022279&s=612x612&w=0&h=_MMXBor7aZxqNuKktcxELxwYT_mNeJ_qYzccUR2VVHs=">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b>Welcome <?php echo$_SESSION['QR_USER_NAME'] ?></b></span>
    
                                        <img class="img-profile rounded-circle" src="https://media.istockphoto.com/photos/neon-3d-font-blue-and-pink-neon-light-3d-rendering-letter-e-picture-id1250022279?k=20&m=1250022279&s=612x612&w=0&h=_MMXBor7aZxqNuKktcxELxwYT_mNeJ_qYzccUR2VVHs=" alt="">
                                        </a>
                                   <?php } 

                                else if($_SESSION['QR_USER_ROLE']==2){ if($_SESSION['IMAGE']!=""){?>
                                 <a class="nav-link dropdown-toggle" href=<?php echo $_SESSION['IMAGE'] ?> >
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b>Welcome <?php echo$_SESSION['QR_USER_NAME'] ?></b></span>
                                 <img class="img-profile rounded-circle"
                                    src="<?php echo $_SESSION['IMAGE'] ?>">
                                 </a>

                                    <?php }else{ ?>
                                        <a class="nav-link dropdown-toggle" href=<?php echo $_SESSION['IMAGE'] ?> >
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b>Welcome <?php echo$_SESSION['QR_USER_NAME'] ?></b></span>
                                 <img class="img-profile rounded-circle"
                                    src="img/user.png">
                                 </a>
                                 <?php } }?>
                           
                            <!-- Dropdown - User Information -->

                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    