<?php


$name=$_POST['name'];
$dob=$_POST['dob'];
$mail=$_POST['mail'];
$surname=$_POST['surname'];
$phno=$_POST['phno'];
$qualification=$_POST['qualification'];
$department=$_POST['department'];
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$rpass=$_POST['repass'];

require "../conn.php";
if ($pass==$rpass) {
    $sql="INSERT INTO doctors (name,dob,mail,surname,phno,qualification,department,uname,pass) VALUES ('$name','$dob','$mail','$surname','$phno','$qualification','$department','$uname','$pass')";

    if (pg_query($conn, $sql)) {
        echo"<script type='text/javascript'>window.alert('successfully completed');window.location='../index.html';</script>";
    } else {
        echo"<script type='text/javascript'>window.alert('Something went wrong,Please Try again after some time');window.location='signup/signup as doctor.html';</script>";
    }
} else {
    echo"<script type='text/javascript'>window.alert('Password Does Not Match,Please Try Again');window.location='signup/signup as doctor.html';</script>";
}

?>



