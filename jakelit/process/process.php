<?php

session_start();
include("../dbconn.php");

$outputs = "";

$length = 12;
	
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
$charactersLength = strlen($characters);
$randomPassword = '';

for ($i = 0; $i < $length; $i++) {
    $randomPassword .= $characters[rand(0, $charactersLength - 1)];
}

$secretKey = password_hash($randomPassword, PASSWORD_BCRYPT);

//for login page (login.php)
//validate the email & password 

if($_POST["status"] == "Login")
{
    $email = mysqli_real_escape_string($dbconn,$_POST['email']);
    $password = mysqli_real_escape_string($dbconn,$_POST['password']);
    
    $sql_login = "SELECT * FROM users WHERE email_users = '".$email."' ";
    $query_login = mysqli_query($dbconn,$sql_login);
	$data_login = mysqli_fetch_assoc($query_login);
    
    if($query_login){
        
        $sql_update = "UPDATE users SET secretkey = '".$secretKey."' WHERE email_users = '".$email."' ";
        $query_update = mysqli_query($dbconn,$sql_update);
        
        if($query_update){
            if($password == 'p@ssword1234'){
                $sql_notification = "INSERT INTO notifications (name_noti,details_noti,timeStamp_noti) values ('".$data_login['name_users']."', 'has login to the system',NOW())";
                $query_notification = mysqli_query($dbconn, $sql_notification);
                {
                    $output = "SuccessNew";
                }
                $_SESSION['unlock_key'] = $secretKey;
            }
            else if(password_verify($password,$data_login['password_users'])){
                $sql_notification = "INSERT INTO notifications (name_noti,details_noti,timeStamp_noti) values ('".$data_login['name_users']."', 'has login to the system',NOW())";
                $query_notification = mysqli_query($dbconn, $sql_notification);
                {
                    $output = "Success";
                }
                $_SESSION['unlock_key'] = $secretKey;
            }
            else{
                $output = 'Failed';
            }
        }
    }
    else{
        $output = 'Failed';
    }
}


//for change password page (changepassword.php)
//change the default password
if($_POST["status"] == "ConfirmPassword")
{
    $password = mysqli_real_escape_string($dbconn,$_POST['password']);
    $usersPassword = password_hash($password,PASSWORD_DEFAULT);

    $sql_password = "UPDATE users SET password_users = '".$usersPassword."' WHERE email_users = '".$_SESSION['unlock_key']."' ";
    $query_password = mysqli_query($dbconn,$sql_password);
    
    if($query_password){
        
        $sql_notification = "INSERT INTO notifications (name_noti,details_noti,timeStamp_noti) values ('".$dataUsers['name_users']."', 'has changed the password',NOW())";
        $query_notification = mysqli_query($dbconn, $sql_notification);
        {
            $output = "Success";
        }
    }
    else{
		$output = "Failed";
	}
}

if($_POST["status"] == "CheckPassword")
{
    $password = mysqli_real_escape_string($dbconn,$_POST['password']);
    $CurrentPassword = mysqli_real_escape_string($dbconn,$_POST['CurrentPassword']);
    $email = mysqli_real_escape_string($dbconn,$_POST['usersEmail']);
    $usersPassword = password_hash($password,PASSWORD_DEFAULT);
    
    $sql_check = "SELECT * FROM users WHERE email_users = '".$email."' ";
    $query_check = mysqli_query($dbconn,$sql_check);
	$data_check = mysqli_fetch_assoc($query_check);
    
    if(password_verify($CurrentPassword,$data_check['password_users'])){
        $sql_password = "UPDATE users SET password_users = '".$usersPassword."' WHERE email_users = '".$_SESSION['unlock_key']."' ";
        $query_password = mysqli_query($dbconn,$sql_password);

        if($query_password){
            
            $sql_notification = "INSERT INTO notifications (name_noti,details_noti,timeStamp_noti) values ('".$dataUsers['name_users']."', 'has changed the password',NOW())";
            $query_notification = mysqli_query($dbconn, $sql_notification);
            {
                $output = "Success";
            }
        }
        else{
            $output = "Failed";
        }
    }
    else{
        $output = "Wrong";
    }
}


    echo json_encode($output); 

?>



