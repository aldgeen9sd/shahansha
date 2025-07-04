<?php 
include("config/constants.php"); 

if(isset($_POST['submit'])) 
{ 
    $name=$_POST['namename']; 
    $job=$_POST['job']; 
    $message=$_POST['message']; 
    $insert="INSERT INTO commenttable SET
    name='$name', 
    job= '$job', 
    message = '$message'
    ";
    $rest1 = mysqli_query($conn, $insert);
    if($rest1 = true){
        echo "تم اضافة التعليق بنجاح";
        header("Location:index.php");
        exit();
    }
     
    } ?>