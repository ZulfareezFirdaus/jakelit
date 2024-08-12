<?php 
    
    if(!isset($_SESSION['unlock_key'])){
        header("Location: ./");
    }

    $sql = "SELECT * FROM users WHERE secretkey = '".$_SESSION['unlock_key']."' ";
    $query = mysqli_query($dbconn, $sql);
    $data = mysqli_fetch_assoc($query);

?>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="breadcomb-wp">
        <div class="breadcomb-icon">
            <i class="notika-icon notika-form"></i>
        </div>
        <div class="breadcomb-ctn">
            <h2 style="margin: 0 0 2px;" ><?php echo $data['name_users'] ?></h2>
            <p>IT Department</p>
            <p><?php echo $data['email_users'] ?></p>
        </div>
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
    <div class="breadcomb-report">
        <ol class="breadcrumb">
            <?php if ($_GET['page'] != 'home'){ ?><li class="breadcrumb-item"><a href="#">Home</a></li><?php } ?>
            <li class="breadcrumb-item"><a href="#"><?php echo ucfirst($_GET['page']) ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo ucfirst($_GET['subpage']) ?></li>
          </ol>
    </div>
</div>