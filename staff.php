<?php
include('header.php');

auth();
admin_auth();


if(isset($_GET['status']) && $_GET['status']!='' && isset($_GET['id']) && $_GET['id']>0)
{
    $status =get_safe_value($_GET['status']);
    $id =get_safe_value($_GET['id']);

    if($status=="active")
    {
      $status =1;
    }
    else
    {
      $status =0;
    }
    mysqli_query($con,"update staff set status='$status' where id='$id'");
    redirect("staff.php");
}


if(isset($_GET['del']) && $_GET['del']!='')
{
   
    $del =get_safe_value($_GET['del']);

    mysqli_query($con,"delete from staff where id='$del' ");
    redirect("staff.php");
}


$res =mysqli_query($con,"select * from staff");
?>

<h1 class="h3 mb-2 text-gray-800">Staff</h1>
                <br>

                <div class="card shadow  py-3 px-3  border-left-success bg-gray-200">
                    <center>
                <h3 class="m-0 font-weight-bold text-primary" ><a href="addstaff.php">Add Staff</a></h3>
                </center>    
            </div>      
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    
                    
                   <?php 
                    if(mysqli_num_rows($res)>0){
                    ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <!-- <th>Password</th> -->
                                            <!-- <th>Course</th>
                                            <th>Branch</th> -->
                                            <th>Position</th>
                                            <th>Specialisation</th>
                                            <!-- <th>Phone no</th> -->
                                            <th>Status</th>
                                            <th>Action1</th>
                                            <th>Action2</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sno =1;
                                        while($row=mysqli_fetch_assoc($res)){
                                        ?>
                                        <tr>
                                        <td><?php echo $sno++ ?></td>
                                        <td><b><a href="profile.php?admreq=<?php echo $row['id'] ?>&pid=1"><?php echo $row['name'] ?></a></b></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <!-- <td><?php echo $row['password'] ?></td> -->
                                            <!-- <td><?php echo $row['course'] ?></td>
                                            <td><?php echo $row['branch'] ?></td> -->
                                            <td><?php echo $row['position'] ?></td>
                                            <td><?php echo $row['subject'] ?></td>
                                            <!-- <td><?php echo $row['phone_no'] ?></td> -->
                                            
                                            <td>
                                                <center>
                                            <?php
                                            $status ="active";
                                            $strStatus ="Deactive";
                                            if($row['status']==1)
                                            {
                                                $status ="deactive";
                                                $strStatus ="Active";
                                            }
                                            ?>
                                            
                                            <a href="?id=<?php echo $row['id']?>&status=<?php echo $status ?>">
                                            <?php if($strStatus=="Active"){ ?>
                                            <button class="btn btn-success" ><?php echo $strStatus ?></button></a> 
                                            <?php }else{ ?>
                                            <button class="btn btn-dark" ><?php echo $strStatus ?></button></a> 
                                            <?php }?>
                                            </center>
                                            </td>
                                            

                                               <td> 
                                           <center> <a href="addstaff.php?id=<?php echo $row['id']?>">
                                            <button class="btn btn-primary" >Edit</button></a></center>
                                                </td>   

                                                <td> 
                                           <center> <a href="?del=<?php echo $row['id']?>">
                                            <button class="btn btn-danger" >Delete</button></a></center>
                                                </td>   
                                        </tr>
                                        <?php
                                       }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                 
                </div>
                </div > 
                <?php 
                   }
                   else
                   {
                    ?>
                  <div class="px-5 my-2"> 
                    <h1 ><?php echo "No Staff   ! "; ?></h1>
                    </div>
                    <?php
                   }
                    ?>
                 </div>

<?php
include('footer.php');
?>