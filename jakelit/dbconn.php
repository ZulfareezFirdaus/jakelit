<?php

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jakelmanagement";

// Create connection
$dbconn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($dbconn->connect_error) {
    die("Connection failed: " . $dbconn->connect_error);
}

$no = 1;

$sql = "SELECT * FROM outlet WHERE outletSecretKey = '".$_GET['secretkey']."' ";
$query = mysqli_query($dbconn, $sql);
$data = mysqli_fetch_assoc($query);

// Define your PHP variables
$backgroundColor = $data['outletCodeColor'];
$outletLogo = $data['outletCaseLogo'];
$outletName = substr($data['outletName'], 1);

$sqlOutlet = "SELECT * FROM outlet";
$queryOutlet = mysqli_query($dbconn, $sqlOutlet);

$sqlBranch = "SELECT A.*,B.* FROM branch A INNER JOIN outlet B ON A.outletID = B.outletID  ";
$queryBranch = mysqli_query($dbconn, $sqlBranch);

$sqlDept = "SELECT * FROM department";
$queryDept = mysqli_query($dbconn, $sqlDept);

$sqlOS = "SELECT * FROM os";
$queryOS = mysqli_query($dbconn, $sqlOS);

$sqlProcessor = "SELECT * FROM processor";
$queryProcessor = mysqli_query($dbconn, $sqlProcessor);

$sqlRAM = "SELECT * FROM ram";
$queryRAM = mysqli_query($dbconn, $sqlRAM);

$sqlMicrosoft = "SELECT * FROM microsoft";
$queryMicrosoft = mysqli_query($dbconn, $sqlMicrosoft);

$sqlDept = "SELECT * FROM department";
$queryDept = mysqli_query($dbconn, $sqlDept);

$sqlBrand = "SELECT * FROM brand";
$queryBrand = mysqli_query($dbconn, $sqlBrand);

?>