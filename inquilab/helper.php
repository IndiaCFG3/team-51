<?php
include_once('config.php');
if(isset($_GET['submitType'])){
    $submitType = $_GET['submitType'];
   //echo $submitType;
}
if($submitType == "loginstudent"){
    
    $email = $_POST['email'];
    $password = md5($_POST['password']);
   // echo $email;
     
    $query = $dbConnect->prepare("SELECT * FROM student_teacher  WHERE email = ? AND password = ?");
    $query->bindValue(1, $email);
    $query->bindValue(2, $password);
  
    // Executing Prepared Statement
    try
    {
        
        $query->execute();
        $result=$query->fetchAll();
        $count = $query->rowCount();
    }
    catch(PDOException $e)
    {
        die($e->getMessage());
    }
   
    if($count == 1){
        
        //session_start();
      //  $_SESSION['email'] = $email;
      
        echo '<script>alert("Login Successful")</script>';
       // echo'<script> setTimeout(function () {
           // window.location.href = "";
        // }, 2000);</script>';
        }
        
     else {
        echo '<script>alert("Invalid mobile or password")</script>';
    }}

    if($submitType == "loginassociate"){
    
        $username = $_POST['username'];
       
        $password = md5($_POST['password']);
       // echo $email;
         
        $query = $dbConnect->prepare("SELECT * FROM associate  WHERE username = ? AND password = ?");
        $query->bindValue(1, $username);
        $query->bindValue(2, $password);
      
        // Executing Prepared Statement
        try
        {
            
            $query->execute();
            $result=$query->fetchAll();
           
            $count = $query->rowCount();
        }
        catch(PDOException $e)
        {
            die($e->getMessage());
        }
       
        if($count == 1){
            
            //session_start();
          //  $_SESSION['email'] = $email;
          
            echo '<script>alert("Login Successful")</script>';
           // echo'<script> setTimeout(function () {
               // window.location.href = "";
            // }, 2000);</script>';
            }
            
         else {
            echo '<script>alert("Invalid mobile or password")</script>';
        }}

?>