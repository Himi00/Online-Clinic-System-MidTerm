<?php

include ('db_connect.php');
 

$Name="";
$err_Name="";
$Email="";
$err_Email="";
$Password="";
$err_Password="";
$ConfirmPassword="";
$err_ConfirmPassword="";
$has_err=false;
 #validation
if(isset($_POST['submit']))
    {
        if(empty($_POST['Name']))
        {
            $err_Name="*Name required";
            $has_err=true;
        
        }
        elseif(!preg_match('/^[a-z A-Z 0-9]*$/', $_POST['Name']))
        {
            $err_Name="Invalid input";
            $has_err=true;
        
        }
        else
        {
            $Name=htmlspecialchars($_POST['Name']);
        }
        if(empty ($_POST['Email']))
        {
            $err_Email="*email required";
            $has_err=true;

 

        }
        elseif(!strpos(($_POST['Email']),"@"))
        {
            $err_Email="*Invalid Email";
            $has_err=true;
        }
        elseif(!strpos(($_POST['Email']),"."))
        {
            $err_Email="*Invalid Email";
            $has_err=true;
        }
        elseif(!preg_match('/^[a-z A-Z 0-9 . @]*$/', $_POST['Email']))
        {
            $err_email="*Invalid Email";
            $has_err=true;
        }
        else
        {
            $Email=htmlspecialchars($_POST['Email']);
        }
        
        if(empty($_POST['Password']))
        {
            $err_Password="*password required";
            $has_err=true;
        }
        elseif(strlen($_POST['Password'])<4)
        {
            $err_Password="password minimum 4 digit";
            $has_err=true;
        }
        else
        {
            $Password=htmlspecialchars($_POST['Password']);
        }
        if($Password != $ConfirmPassword)
        {
            $err_Password="The Two Password Do Not Match";
             $has_err=true;
        }
        elseif ($Password = $ConfirmPassword) 
        {
            $ConfirmPassword=htmlspecialchars($_POST['Password']);
        }
        if (!$has_err) 
        {
            insertAdmin();
            echo "<script> alert('Successfully registered wait 24 hours ');</script>";       
         }

 }

        //insert into database
        

 

        function insertAdmin()
            {
                global $Name;
                global $Email;
                global $Password;
    
                $sql= "INSERT INTO admin (`Name`,`Email`,`Password`) VALUES ( '$Name', '$Email', '$Password') ";
                execute($sql);

             }

 

      
        
?>