<?php

include('../../dbconn.php');


if($_POST['status'] == 'saveOutlet'){
    
    $outletName = mysqli_real_escape_string($dbconn,$_POST['outletName']);
    $outletColorTheme = mysqli_real_escape_string($dbconn,$_POST['outletColorTheme']);

    // Handle file upload
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];
        $uploadDir = '../../management/img/logo/';
        $uploadFile = $uploadDir . basename($file['name']);
        
        $firstLetter = substr($outletName, 0, 1);
        $uploadLetterFile = $uploadDir . $firstLetter;
        
        $length = 12;
	
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
        $charactersLength = strlen($characters);
        $randomPassword = '';

        for ($i = 0; $i < $length; $i++) {
            $randomPassword .= $characters[rand(0, $charactersLength - 1)];
        }

        $secretKey = password_hash($randomPassword, PASSWORD_BCRYPT);

        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            
            $uploadNewDir = 'management/img/logo/';
            $uploadFile = $uploadNewDir . basename($file['name']);
            
            $uploadLetterFile = $uploadNewDir . $firstLetter;
            
            $sql_notification = "INSERT INTO outlet (outletName,outletSecretKey,outletLogo,outletCaseLogo,outletCodeColor,timeStamp) 
            values ('".$outletName."', '".$secretKey."','".$uploadFile."','".$uploadLetterFile."','".$outletColorTheme."',NOW())";
            $query_notification = mysqli_query($dbconn, $sql_notification);
            {
                $output = "Success";
            }
            
            
        } else {
            $output = "failUploadFile";
        }
    } else {
        $output = "noFileUpload";
    }
}

if($_POST['status'] == 'saveBranch'){
    
    $branchName = mysqli_real_escape_string($dbconn,$_POST['branchName']);
    $outletName = mysqli_real_escape_string($dbconn,$_POST['outletName']);
    
    $length = 12;
	
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
    $charactersLength = strlen($characters);
    $randomPassword = '';

    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }

    $secretKey = password_hash($randomPassword, PASSWORD_BCRYPT);
    
    $sql_branch = "INSERT INTO branch (branchName,branchSecretKey,outletID,timeStamp) 
    values ('".$branchName."','".$secretKey."','".$outletName."',NOW())";
    $query_branch = mysqli_query($dbconn, $sql_branch);
    {
        $output = "Success";
    }
    
}

if($_POST['status'] == 'saveRAM'){
    
    $ramName = mysqli_real_escape_string($dbconn,$_POST['ramName']);
    
    $length = 12;
	
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
    $charactersLength = strlen($characters);
    $randomPassword = '';

    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }

    $secretKey = password_hash($randomPassword, PASSWORD_BCRYPT);
    
    $sql_RAM = "INSERT INTO ram (ramName,ramSecretKey,timeStamp) 
    values ('".$ramName."','".$secretKey."',NOW())";
    $query_RAM = mysqli_query($dbconn, $sql_RAM);
    {
        $output = "Success";
    }
    
}

if($_POST['status'] == 'saveOS'){
    
    $osName = mysqli_real_escape_string($dbconn,$_POST['osName']);
    
    $length = 12;
    
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
    $charactersLength = strlen($characters);
    $randomPassword = '';

    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }

    $secretKey = password_hash($randomPassword, PASSWORD_BCRYPT);
    
    $sql_OS = "INSERT INTO os (osName,osSecretKey,timeStamp) 
    values ('".$osName."','".$secretKey."',NOW())";
    $query_OS = mysqli_query($dbconn, $sql_OS);
    {
        $output = "Success";
    }
    
}

if($_POST['status'] == 'saveProcessor'){
    
    $processorName = mysqli_real_escape_string($dbconn,$_POST['processorName']);
    
    $length = 12;
    
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
    $charactersLength = strlen($characters);
    $randomPassword = '';

    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }

    $secretKey = password_hash($randomPassword, PASSWORD_BCRYPT);
    
    $sql_processor = "INSERT INTO processor (processorName,processorSecretKey,timeStamp) 
    values ('".$processorName."','".$secretKey."',NOW())";
    $query_processor = mysqli_query($dbconn, $sql_processor);
    {
        $output = "Success";
    }
    
}

if($_POST['status'] == 'saveMicrosoft'){
    
    $microsoftName = mysqli_real_escape_string($dbconn,$_POST['microsoftName']);
    
    $length = 12;
    
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
    $charactersLength = strlen($characters);
    $randomPassword = '';

    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }

    $secretKey = password_hash($randomPassword, PASSWORD_BCRYPT);
    
    $sql_microsoft = "INSERT INTO microsoft (microsoftName,microsoftSecretKey,timeStamp) 
    values ('".$microsoftName."','".$secretKey."',NOW())";
    $query_microsoft = mysqli_query($dbconn, $sql_microsoft);
    {
        $output = "Success";
    }
    
}

if($_POST['status'] == 'saveDepartment'){
    
    $departmentName = mysqli_real_escape_string($dbconn,$_POST['departmentName']);
    
    $length = 12;
    
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
    $charactersLength = strlen($characters);
    $randomPassword = '';

    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }

    $secretKey = password_hash($randomPassword, PASSWORD_BCRYPT);
    
    $sql_department = "INSERT INTO department (deptName,deptSecretKey,timeStamp) 
    values ('".$departmentName."','".$secretKey."',NOW())";
    $query_department = mysqli_query($dbconn, $sql_department);
    {
        $output = "Success";
    }
    
}

if($_POST['status'] == 'saveBrand'){
    
    $brandName = mysqli_real_escape_string($dbconn,$_POST['brandName']);
    
    $length = 12;
    
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
    $charactersLength = strlen($characters);
    $randomPassword = '';

    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }

    $secretKey = password_hash($randomPassword, PASSWORD_BCRYPT);
    
    $sql_brand = "INSERT INTO brand (brandName,laptopSecretKey,timeStamp) 
    values ('".$brandName."','".$secretKey."',NOW())";
    $query_brand = mysqli_query($dbconn, $sql_brand);
    {
        $output = "Success";
    }
    
}



echo json_encode($output); 
?>
