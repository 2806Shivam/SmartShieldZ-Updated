<?php
    $Name=$_POST['Name'];
    $email=$_POST['email'];
    $mobileNo=$_POST['mobileNo'];
    $dob=$_POST['dob'];
    $Educational=$_POST['Educational'];
    $Gender=$_POST['Gender'];
    $psw=$_POST['psw'];
    $pswrepeat=$_POST['psw-repeat'];

    //Database Connection
    $conn=new mysqli('localhost','root','','sih');
    if($conn->connect_error){
        die('Connection Failed:'.$conn->connect_error);   
    }
    if($psw!=$pswrepeat){
            echo
            "<script> alert('Passwords Dont Match');</script>";
    }
    
    else{
        $stmt=$conn->prepare("insert into registrationpage(Name, email, mobileNo, dob, Educational, Gender, psw, pswrepeat)
        values(?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssiissss",$Name,$email,$mobileNo,$dob,$Educational,$Gender,$psw,$pswrepeat);
        $stmt->execute();
        echo 
        header("Location:DSAQuiz.html");
        $stmt->close();
        $conn->close();
    }
?>


this php file is for registration
