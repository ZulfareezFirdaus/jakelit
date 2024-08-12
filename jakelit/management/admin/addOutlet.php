<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php 
        session_start();
    
        if(!isset($_SESSION['unlock_key'])){
            header("Location: ./");
        }
            
		$directoryHeadMenu = '../';
        $directoryLogoHeadMenu = '../../';
        include('../../dbconn.php');
        include('../headMenu.php');
    ?>
    <!-- Include Dropzone CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css" />
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php 
        $directoryMainMenu = './../';
        $logout ='../../';
        include('./../mainMenu.php');
    ?>
    <!-- Breadcomb area Start-->
    <div class="breadcomb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <?php
                                include('./../headSession.php');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcomb area End-->
    <!-- Form Examples area start-->
    <div class="form-example-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap">
                        <div class="cmp-tb-hd">
                            <h2>Outlet Registration Form</h2>
                            <p>Please fill up the form</p>
                        </div>
                            <div id="alert" class="alerts"><i class="fa fa-exclamation-triangle"></i> Please complete the form !</div>
                        <div id="alertSuccess" class="alerts"><i class="fa fa-check"></i> Form successfully Submitted !</div>
                        <div id="alertFailed" class="alerts"><i class="fa fa-exclamation-triangle"></i>  Please check the internet connection !</div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-example-int">
                                        <div class="form-group">
                                            <label>Outlet Name</label>
                                            <div class="nk-int-st">
                                                <input type="text" id="outletName" class="form-control input-sm" placeholder="Enter Outlet Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="nk-container fm-cmp-mg">
                                        <label style="font-weight:500;margin-bottom:0;">Outlet Colour Theme</label>
                                        <div class="input-group form-group form-elet-mg">
                                            <div class="nk-line dropdown nk-int-st">
                                                <input type="text" id="outletColorTheme" class="form-control nk-value" value="<?php echo $backgroundColor ?>" data-toggle="dropdown">
                                                <div class="dropdown-menu">
                                                    <div class="color-picker" data-cp-default="#00c292"></div>
                                                </div>
                                                <i class="nk-value"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <!-- Dropzone area Start-->
                                    <div class="mg-t-29">
                                        <label style="font-weight:500;margin-top:10px;">Outlet Logo</label>
                                        <div id="dropzone1" class="multi-uploader-cs">
                                            <form class="dropzone dropzone-nk needsclick" id="demo1-upload" action="/upload" enctype="multipart/form data">
                                                <div class="dz-message needsclick download-custom">
                                                    <i class="notika-icon notika-cloud"></i>
                                                    <h2>Drop images here or click to upload.</h2>
                                                    <p><span class="note needsclick">File accept : png, jpeg and jpg</span></p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Dropzone area End-->
                                </div>
                            </div>
                            <center>
                            <div class="form-example-int mg-t-15">
                                <button id="btnOutlet" class="btn btn-success notika-btn-success">
                                    <span class="btn-text">Submit</span>
                                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                </button>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Form Examples area End-->
    <br><br>
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Outlet Records</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Outlet Name</th>
                                        <th>Oulet Colour</th>
                                        <th width="20%">Oulet Logo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead><tbody>
                                    <?php while($dataOutlet = mysqli_fetch_array($queryOutlet)) { ?>
                                    
                                        <tr>
                                            <td align="center"><?php echo $no++ ?>.</td>
                                            <td><?php echo ucwords($dataOutlet['outletName']) ?></td>
                                            <td><center><p style="background-color:<?php echo $dataOutlet['outletCodeColor'] ?>;padding:10px;width:100px;color:white;text-align:center;"><?php echo $dataOutlet['outletCodeColor'] ?></p> </center></td>
                                            <td><img width="30%" src="../../<?php echo $dataOutlet['outletLogo'] ?>"></td>
                                            <td><button class="btn btn-danger"><i class="fa fa-trash"></i></button>&nbsp;<button class="btn btn-warning" ><i class="fa fa-pencil"></i></button></td>
                                        </tr>
                                    
                                    <?php } ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->

    <?php 
        include('../footer.php');
        $directoryFootMenu = '../';
        include('../footMenu.php');
    ?>

    <script>
        Dropzone.autoDiscover = false;

        // Initialize Dropzone
        var myDropzone = new Dropzone("#demo1-upload", {
        maxFiles: 1,
        acceptedFiles: 'image/png,image/jpeg,image/jpg',
        addRemoveLinks: true,
        dictRemoveFile: "Remove",
        autoProcessQueue: false,
        init: function() {
            this.on("maxfilesexceeded", function(file) {
                this.removeAllFiles();
                this.addFile(file);
            });

            var myDropzone = this;

                // Handle form submission
        $('#btnOutlet').on('click', function(e) {
            e.preventDefault();

            // Get form data
            var formData = {
                outletName: $('#outletName').val(),
                outletColorTheme: $('#outletColorTheme').val(),
                status: 'saveOutlet'
            };
            
            if($('#outletName').val() === ""){
                $('#outletName').css({
                    'border': '1px solid red'
                });
                 $('#alert').addClass('show');
                setTimeout(function() {
                    $('#alert').removeClass('show');
                }, 5000);
            } 
            
            if($('#outletColorTheme').val() === ""){
                $('#outletColorTheme').css({
                    'border': '1px solid red'
                });
                 $('#alert').addClass('show');
                setTimeout(function() {
                    $('#alert').removeClass('show');
                }, 5000);
            } 
            
            $('#outletName').on('input', function() {
               $('#outletName').css({
                    'border': '1px solid #ccc'
                });
            });
            
            $('#outletColorTheme').on('input', function() {
               $('#outletColorTheme').css({
                    'border': '1px solid #ccc'
                });
            });
            
           $('#demo1-upload').on('click', function() {
                $('.dropzone.dropzone-nk').css({
                    'border': '1px dashed #ccc'
                });
            });

            // Append form data to FormData object
            var formDataObj = new FormData();
            for (var key in formData) {
                formDataObj.append(key, formData[key]);
            }

            // Add Dropzone file to FormData
            myDropzone.files.forEach(function(file) {
                formDataObj.append('file', file);
            });

            var $btn = $(this);

            // Disable button and show loader
                $btn.prop('disabled', true);
                $btn.find('.btn-text').text('Submitting...');
                $btn.find('.spinner-border').removeClass('d-none');

            // Send the form data and file to PHP script via AJAX
            $.ajax({
                url: 'process.php',
                type: 'POST',
                data: formDataObj,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response === "Success") {
                        $('#outletName').val('');
                        $('#outletColorTheme').val('#00c292');
                        myDropzone.removeAllFiles(true);
                        
                        $('#alertSuccess').addClass('show');
                        setTimeout(function() {
                            $('#alertSuccess').removeClass('show');
                        }, 5000);

                    }
                    if(response === "noFileUpload"){
                        $('#alertFile').addClass('show');
                        setTimeout(function() {
                            $('#alertFile').removeClass('show');
                        }, 5000);
                        
                        $('.dropzone.dropzone-nk').css({
                            'border': '2px dashed red'
                        });
                        
                    }

                },
                
                    error: function() {
                        $('#alertFailed').addClass('show');
                        setTimeout(function() {
                            $('#alertFailed').removeClass('show');
                        }, 5000);
                    },
                    complete: function() {
                        // Enable button and hide loader
                        $btn.prop('disabled', false);
                        $btn.find('.btn-text').text('Submit');
                        $btn.find('.spinner-border').addClass('d-none');
                    }
            });
        });
        }
    });
    </script>
    
 
</body>

</html>
