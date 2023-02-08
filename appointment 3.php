<?php
$p_uname=$_POST['username'];
$d_uname=$_POST['doctor_name'];
require "conn.php";

$sql="DELETE FROM registration WHERE p_uname='$p_uname' AND d_uname='$d_uname'";

if(pg_query($conn,$sql)){
    echo"<script type='text/javascript'>window.alert('successfully completed');window.location='patient dashboard.php';</script>";
}
else{
    echo"<script type='text/javascript'>window.alert('Something Went Wrong,Please Try Again After Sometime!');window.location='patient dashboard.php';</script>";
}
?>



