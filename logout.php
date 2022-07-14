<?php
include('db.php');
include('function.php');


             unset($_SESSION['QR_USER_LOGIN']);
				unset($_SESSION['QR_USER_ID']);
				unset($_SESSION['QR_USER_NAME']);
				unset($_SESSION['QR_USER_ROLE']);
				unset($_SESSION['QR_USER_EMAIL']);
                redirect('login.php');
?>
