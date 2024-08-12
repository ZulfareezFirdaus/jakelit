<?php
session_start();
include('../../dbconn.php');

if (isset($_FILES['files'])) {
    $files = $_FILES['files'];
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];

    if ($_POST['status'] == 'saveEquipment') {
        $equipmentType = mysqli_real_escape_string($dbconn, $_POST['equipmentType']);
        $serialNo = mysqli_real_escape_string($dbconn, $_POST['serialNo']);
        $brandName = mysqli_real_escape_string($dbconn, $_POST['brandName']);
        $screenSize = mysqli_real_escape_string($dbconn, $_POST['screenSize']);
        $os = mysqli_real_escape_string($dbconn, $_POST['os']);
        $processor = mysqli_real_escape_string($dbconn, $_POST['processor']);
        $ram = mysqli_real_escape_string($dbconn, $_POST['ram']);
        $microsoft = mysqli_real_escape_string($dbconn, $_POST['microsoft']);
        $outlet = mysqli_real_escape_string($dbconn, $_POST['outlet']);
        $branch = mysqli_real_escape_string($dbconn, $_POST['branch']);
        $department = mysqli_real_escape_string($dbconn, $_POST['department']);
        $building = mysqli_real_escape_string($dbconn, $_POST['building']);
        $condition = mysqli_real_escape_string($dbconn, $_POST['condition']);
        $suggestion = mysqli_real_escape_string($dbconn, $_POST['suggestion']);
        $remarks = mysqli_real_escape_string($dbconn, $_POST['remarks']);
        $remarksText = mysqli_real_escape_string($dbconn, $_POST['remarksText']);

        if ($screenSize == "") $screenSize = 0;
        if ($os == "") $os = 0;
        if ($processor == "") $processor = 0;
        if ($ram == "") $ram = 0;
        if ($microsoft == "") $microsoft = 0;


        // Insert equipment data
        $sql_equipment = "INSERT INTO equipment(equipmentName, equipmentSerialNumber, brandID, screenSize, osID, processorID, ramID, microsoftID, outletID, branchID, deptID, buildingID, conditions, suggestion, remarks, remarksText, equipmentSecretKey, timestamp)
        VALUES ('".$equipmentType."', '".$serialNo."', '".$brandName."', '".$screenSize."', '".$os."', '".$processor."', '".$ram."', '".$microsoft."', '".$outlet."', '".$branch."', '".$department."', '".$building."', '".$condition."', '".$suggestion."', '".$remarks."', '".$remarksText."', '".password_hash(bin2hex(random_bytes(12)), PASSWORD_BCRYPT)."', NOW())";
        $query_equipment = mysqli_query($dbconn, $sql_equipment);

        if ($query_equipment) {
            $last_id = mysqli_insert_id($dbconn);

            foreach ($files['name'] as $key => $file_name) {
                $file_tmp = $files['tmp_name'][$key];
                $file_size = $files['size'][$key];
                $file_error = $files['error'][$key];
                $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

                $length = 12;
    
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
                $charactersLength = strlen($characters);
                $randomPassword = '';

                for ($i = 0; $i < $length; $i++) {
                    $randomPassword .= $characters[rand(0, $charactersLength - 1)];
                }

                $secretKey = password_hash($randomPassword, PASSWORD_BCRYPT);

                if ($file_error === UPLOAD_ERR_OK && in_array($file_ext, $allowed_ext)) {
                    $new_file_name = uniqid('', true) . '.' . $file_ext;
                    $file_destination = '../../management/img/attachment/' . $new_file_name;

                    if (move_uploaded_file($file_tmp, $file_destination)) {
                        // Insert into database
                        $sql_attachment = "INSERT INTO attachment (attachmentUrl, attachmentSecretKey, timeStamp, equipmentID) VALUES ('".$file_destination."', '".$secretKey."', NOW(), '".$last_id."')";
                        $query_attachment = mysqli_query($dbconn, $sql_attachment);

                        if ($query_attachment) {
                            $output = array(
                                "status" => "Success",
                                "secretKeys" => $secretKeys, // Return the array of secret keys
                                "serialNo" => $serialNo,
                                "equipmentType" => $equipmentType
                            );
                        } else {
                            $output = 'Error inserting file into database';
                        }
                    } else {
                        $output = 'Failed to move uploaded file';
                    }
                } else {
                    $output = 'File type not allowed or error uploading file';
                }
            }

        }
    }

}

?>