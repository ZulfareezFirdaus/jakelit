<?php

    session_start();
    include('./dbconn.php');
        
    if(!isset($_SESSION['unlock_key'])){
        header("Location: ./");
    }

    $sql = "SELECT * FROM outlet";
    $query = mysqli_query($dbconn, $sql);
    

?>

<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Jakel - IT Department </title>
    <link rel="icon" type="image/png" sizes="5x5" href="../loginDetails/images/jakelLogo.png">
    <link href="./loginDetails/css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>  
</head>
<style>
    .container-fluid {
        width: 100%;
        padding-right: 125px;
        padding-left: 125px;
        margin-right: auto;
        margin-left: auto;
    }
</style>
<body class="d-flex align-items-center justify-content-center h-100" style="overflow:hidden;">
    <div id="overlay"></div>
    <div class="container-fluid">
        <div class="authincation">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12" style="z-index:99;position:relative;">
                        <div class="row justify-content-center">
                            <?php while($data = mysqli_fetch_array($query)){ ?>
                                <div class="col-xl-4 col-lg-4 col-sm-4 col-xxl-4 col-md-4">
                                    <a href="management?page=home&subpage=dashboard&secretkey=<?php echo $data['outletSecretKey']; ?>" class="card boxShadow">
                                        <div class="social-graph-wrapper bg-jakel" style="background-size: auto 100% ;background-image: url(<?php echo $data['outletLogo']; ?>);border-bottom: 2px solid <?php echo $data['outletCodeColor']; ?>">
                                            <span class="s-icon">&nbsp;</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="pt-3 pb-3 pl-0 pr-0 text-center pad-adjust">
                                                    <h4 class="m-1"><?php echo $data['outletName'] ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./system/vendor/global/global.min.js"></script>
    <script src="./system/js/quixnav-init.js"></script>
    <script src="./system/js/custom.min.js"></script>
    <script src="./system/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="./system/jquery.js"></script>
    <script src="./system/js/plugins-init/jquery.validate-init.js"></script>
</body>
</html>
