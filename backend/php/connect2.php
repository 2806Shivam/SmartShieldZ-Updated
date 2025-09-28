<?php
    $Username=$_POST['Username'];
    $email=$_POST['email'];
    $psw=$_POST['Password'];
    

    //Database Connection
    $conn=new mysqli('sql307.infinityfree.com','if0_37342689','(Your vPanel Password)','if0_37342689_ecebp');
    if($conn->connect_error){
        die('Connection Failed:'.$conn->connect_error);   
    }
    
    else{
        $stmt=$conn->prepare("insert into registrationpage(Username, email, psw)
        values(?,?,?)");
        $stmt->bind_param("sss",$Username,$email,$psw);
        $stmt->execute();
        echo 
        header("Location:intropage.html");
        $stmt->close();
        $conn->close();
    }
?>