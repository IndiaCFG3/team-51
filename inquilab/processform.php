<?php
include_once('config.php');
$msg="";
$css_class="";
$conn =mysqli_connect('localhost' ,'herrightadmin','123456','hrdb');

foreach($_FILES['profileImage']['name'] as $key=>$val)
    {
      $file=$_FILES['profileImage']['name'][$key];
      $file_tmp=$_FILES['profileImage']['tmp_name'][$key];
      move_uploaded_file($file_tmp,$target.$file);
      $data .=$file." ";

    }
   
        $query="INSERT into shopping_cart (image,name,price,quantity,description,categories,color,stock,brand,available_sizes) VALUES ('$data','$name','$price','$quantity','$description','$categories','$color','$stock','$brand','$size')";
       
       
        if(mysqli_query($conn,$query) )
        {
            $msg="Successfully uploaded and inserted into database";
            $css_class="alert-success";
        }
        else{
            $msg="Failed to upload into databse user";
            $css_class="alert-danger";
        }