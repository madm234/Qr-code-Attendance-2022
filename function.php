<?php
function pr($arr)
{
    echo "<pre";
    print_r($arr);
    
}

function prx($arr)
{
    echo "<pre";
    print_r($arr);
    die();
}

function get_safe_value($str)
{
    global $con;
    if($str!='')
    return mysqli_real_escape_string($con,$str);
}

function redirect($link)
{
    ?>
    <script>
        window.location.href='<?php echo $link?>'
        </script>
    <?php

}

function auth()
{
    if(!isset($_SESSION['QR_USER_LOGIN']))
    {
        redirect("login.php");
    }
}

function admin_auth()
{
    if($_SESSION['QR_USER_ROLE']!=0)
    {
        redirect("profile.php");
    }
}


function getUserInfo($uid)
{
    global $con;
    $row =mysqli_fetch_assoc(mysqli_query($con,"select * from user where id='$uid'"));
    return $row;
}

function getUserTotalQR($uid)
{
    global $con;
    $row =mysqli_fetch_assoc(mysqli_query($con,"select count(*) as total_qr from qr_code where added_by='$uid'"));
    return $row;
}

function go()
{
   if($_SESSION['QR_USER_ROLE']==1)
   return 'qr_codes/staff_qr.php';
   else if($_SESSION['QR_USER_ROLE']==2)
   return 'st_qr.php';
   else if($_SESSION['QR_USER_ROLE']==3)
   return 'qr_codes/emp_qr.php';
}
 ?>