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
                    <div class="form-example-wrap ">
                        <div class="cmp-tb-hd">
                            <h2><?php echo $_SESSION['try']  ?> Registration Form</h2>
                            <p>Please fill up the form</p>
                        </div>
                        <div id="alert" class="alerts"><i class="fa fa-exclamation-triangle"></i> Please complete the form !</div>
                        <div id="alertSuccess" class="alerts"><i class="fa fa-check"></i> Form successfully Submitted !</div>
                        <div id="alertFailed" class="alerts"><i class="fa fa-exclamation-triangle"></i>  Please check the internet connection !</div>
                        <div id="alertFile" class="alerts"><i class="fa fa-exclamation-triangle"></i>  Please upload the image !</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="alert-list">
										<div class="alert alert-secondary" role="alert"><i class="notika-icon notika-edit"></i> Equipment Details</div>
									</div>
							</div>
						</div>
                        <center>
                            <div class="row center-column">
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-4">
                                    <div class="form-group">
                                        <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                            <span>Equipment Type</span>
                                        </div>
                                        <div class="bootstrap-select fm-cmp-mg">
                                            <select class="selectpicker" data-live-search="true" id="equipmentType" name="equipmentType">
                                                <option value="" >Please choose</option>
                                                <option value="CPU" >CPU</option>
                                                <option value="Printer" >Printer</option>
                                                <option value="Laptop" >Laptop</option>
                                                <option value="Server" >Server</option>
                                                <option value="AIO" >AIO</option>
                                                <option value="Mobile Phone" >Mobile Phone</option>
                                                <option value="Tablet" >Tablet</option>
                                                <option value="Projector Screen" >Projector Screen</option>
                                                <option value="Projector" >Projector</option>
                                                <option value="Web Cam" >Web Cam</option>
                                                <option value="Speaker" >Speaker</option>
                                                <option value="Monitor" >Monitor</option>
                                                <option value="TV" >TV</option>
                                                <option value="POS system" >POS system</option>
                                                <option value="Customer Display" >Customer Display</option>
                                                <option value="Resit Printer" >Resit Printer</option>
                                                <option value="Bar Code scanner" >Bar Code scanner</option>
                                                <option value="Table Top Scanner" >Table Top Scanner</option>
                                                <option value="Cash Drawer" >Cash Drawer</option>
                                                <option value="UPS" >UPS</option>
                                                <option value="NVR" >NVR</option>
                                                <option value="POE Switch" >POE Switch</option>
                                                <option value="Broadband" >Broadband</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </center>
                        <br>
                        <div id="All-02" class="row" style="display:none" >
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Serial No.</label>
                                        <div class="nk-int-st">
                                            <input type="text" id="serialNo" name="serialNo" class="form-control input-sm" placeholder="Enter Serial No.">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="change col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                    <span>Brand Name</span>
                                </div>
                                <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker" data-live-search="true" id="brandName" name="brandName">
                                        <option value="">Please Select</option>
                                        <?php while($dataBrand = mysqli_fetch_array($queryBrand)){ ?>
                                            <option value="<?php echo $dataBrand['brandID'] ?>"><?php echo ucwords($dataBrand['brandName']) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div id="opt-03" class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="display:none">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Screen Size (inch)</label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" id="screenSize" name="screenSize" placeholder="Enter Screen size">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="opt-01" style="display:none">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                    <span>OS</span>
                                </div>
                                <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker" data-live-search="true" id="os" name="os">
                                        <option value="">Please Select</option>
                                        <?php while($dataOS = mysqli_fetch_array($queryOS)){ ?>
                                            <option value="<?php echo $dataOS['osID'] ?>"><?php echo ucwords($dataOS['osName']) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                    <span>Processor</span>
                                </div>
                                <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker" data-live-search="true" id="processor" name="processor">
                                        <option value="">Please Select</option>
                                        <?php while($dataProcessor = mysqli_fetch_array($queryProcessor)){ ?>
                                            <option value="<?php echo $dataProcessor['processorID'] ?>"><?php echo ucwords($dataProcessor['processorName']) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                    <span>RAM</span>
                                </div>
                                <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker" data-live-search="true" id="ram" name="ram">
                                        <option value="">Please Select</option>
                                        <?php while($dataRAM = mysqli_fetch_array($queryRAM)){ ?>
                                            <option value="<?php echo $dataRAM['ramID'] ?>"><?php echo ucwords($dataRAM['ramName']) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class="form-group">
                                    <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                        <span>Microsoft Office</span>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" data-live-search="true" id="microsoft" name="microsoft">
                                            <option value="">Please Select</option>
                                            <?php while($dataMicrosoft = mysqli_fetch_array($queryMicrosoft)){ ?>
                                                <option value="<?php echo $dataMicrosoft['microsoftID'] ?>"><?php echo ucwords($dataMicrosoft['microsoftName']) ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span id="All" style="display:none">
                            <div class="row" style="margin-top:24px;">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="alert-list">
                                            <div class="alert alert-secondary" role="alert"><i class="notika-icon notika-map"></i> Equipment Location</div>
                                        </div>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                        <span>Outlet</span>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" data-live-search="true" id="outlet" name="outlet">
                                            <option value="">Please Select</option>
                                            <?php while($dataOutlet = mysqli_fetch_array($queryOutlet)){ ?>
                                                <option value="<?php echo $dataOutlet['outletID'] ?>"><?php echo ucwords($dataOutlet['outletName']) ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                        <span>Branch</span>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" data-live-search="true" id="branch" name=branch>
                                            <option value="">Please Select</option>
                                            <?php while($dataBranch = mysqli_fetch_array($queryBranch)){ ?>
                                                <option value="<?php echo $dataBranch['branchID'] ?>"><?php echo ucwords($dataBranch['branchName']) ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                        <span>Department</span>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" data-live-search="true" id="department" name="department">
                                            <option value="">Please Select</option>
                                            <?php while($dataDept = mysqli_fetch_array($queryDept)){ ?>
                                                <option value="<?php echo $dataDept['deptID'] ?>"><?php echo ucwords($dataDept['deptName']) ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                        <span>Building</span>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" data-live-search="true" id="building" name="building">
                                                <option value="" >Please Select</option>
                                                <option value="0" >Ground Floor</option>
                                                <option value="1" >1</option>
                                                <option value="2" >2</option>
                                                <option value="3" >3</option>
                                                <option value="4" >4</option>
                                                <option value="5" >5</option>
                                                <option value="6" >6</option>
                                                <option value="7" >7</option>
                                                <option value="8" >8</option>
                                                <option value="9" >9</option>
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:24px;">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="alert-list">
                                            <div class="alert alert-secondary" role="alert"><i class="notika-icon notika-chat"></i> Equipment Status</div>
                                        </div>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-4">
                                    <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                        <span>Condition</span>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" data-live-search="true" id="condition" name="condition">
                                                <option value="" >Please Select</option>
                                                <option value="1" >Good</option>
                                                <option value="2" >Slow</option>
                                                <option value="3" >Faulty</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-4">
                                    <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                        <span>Suggestion For Replacement ?</span>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" data-live-search="true" id="suggestion" name="suggestion">
                                            <option value="" >Please Select</option>
                                            <option value="1" >Yes</option>
                                            <option value="2" >No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-4">
                                    <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                        <span>Remarks</span>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" id="remarks" name="remarks" data-live-search="true">
                                                <option value="" >Please Select</option>
                                            <option value="1" >Yes</option>
                                            <option value="2" >No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:15px;display:none" id="remarksCol" >
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-4">
                                    
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-4">
                                    
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-4">
                                    <div class="form-example-int">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <textarea class="form-control input-sm" id="remarksText" name="remarksText"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:15px;">
                                    <!-- Dropzone area Start-->
                                    <div class="mg-t-29">
                                        <label style="font-weight:500;margin-top:10px;">Outlet Logo</label>
                                        <div id="dropzone1" class="multi-uploader-cs">
                                            <form id="uploadForm"  class="dropzone dropzone-nk needsclick" action="javascript:void(0);" enctype="multipart/form data">
                                                <div class="dz-message needsclick download-custom">
                                                    <i class="notika-icon notika-cloud"></i>
                                                    <h2>Drop images here or click to upload (Max 5 images).</h2>
                                                    <p><span class="note needsclick">File accept : png, jpeg, and jpg</span></p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Dropzone area End-->
                                </div>
                            </div>
                            
                            


                            <center>
                                <div class="form-example-int mg-t-15">
                                    <button id="submit-all" type="button" class="btn btn-success notika-btn-success">
                                        <span class="btn-text">Submit</span>
                                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </center>

                            <div class="modal fade" id="myModaltwo" role="dialog">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-body">

                                            <center>
                                                <span style="font-size:14px;font-weight:600">Please Scan or Download the QR Code!</span><br><br>
                                                <div id="loading" class="loader-container" style="display: none;">
                                                    <div class="loader"></div>
                                                    <p>Generating QR Code...</p>
                                                </div>
                                                <div id="qrcode"></div>
                                            </center>
                                        </div>
                                        <div class="modal-footer" style="text-align: center;position: relative;top: 15px;">
                                            <center>
                                                <button id="downloadBtn" type="button" class="btn btn-default" >Download</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
				
            </div>
        </div>
    </div>
    <!-- Form Examples area End-->
    
    <?php 
		include('../footer.php');
		
		$directoryFootMenu = '../';
		include('../footMenu.php');
	?>

      <!-- Dropzone JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <script>
        Dropzone.autoDiscover = false;
        
        Dropzone.options.uploadForm = {
            autoProcessQueue: false, // Disable auto-upload
            acceptedFiles: 'image/*',
            maxFilesize: 5, // MB
            parallelUploads: 10,
            addRemoveLinks: true,
            dictDefaultMessage: "Drop images here or click to upload",
            init: function() {
                var myDropzone = this;

                // Event listener for the submit button
                document.getElementById('submit-all').addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    alert('hello');
                    
                    // Prepare FormData
                    var formData = new FormData();
                    myDropzone.getAcceptedFiles().forEach(function(file) {
                        formData.append('files[]', file);
                    });
                    
                    $.ajax({
                        url: 'process.php',
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log("Server Response:", response);
                            if (response.success) {
                                alert("Files uploaded successfully!");
                            } else {
                                alert("Error uploading files: " + response.message);
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error("AJAX Error:", textStatus, errorThrown);
                            alert("Error uploading files");
                        }
                    });
                });
            }
        };
    </script>


    <script>
        $(document).ready(function(data){
            $('#equipmentType').on('change', function(){
                var demovalue = $(this).val(); 
                
                if(demovalue == "CPU" || demovalue == "Laptop" || demovalue == "AIO"){
                    $("#opt-01").show();
                    $("#All-02").show();
                    $("#All").show();
                }
                else if(demovalue == "Projector Screen" || demovalue == "Monitor" || demovalue == "TV"){
                    $("#All-02 .change").removeClass('col-lg-8 col-md-8 col-sm-8 col-xs-8').addClass('col-lg-4 col-md-4 col-sm-4 col-xs-4');
                    $("#opt-01").hide();
                    $("#opt-03").show();
                    $("#All-02").show();
                    $("#All").show();
                }
                else if(demovalue != "CPU" || demovalue != "Laptop" || demovalue != "AIO" || demovalue != "Projector Screen" || demovalue != "Monitor" || demovalue != "TV"){
                    $("#All-02 .change").removeClass('col-lg-4 col-md-4 col-sm-4 col-xs-4').addClass('col-lg-8 col-md-8 col-sm-8 col-xs-8');
                    $("#opt-01").hide();
                    $("#opt-03").hide();
                    $("#All-02").show();
                    $("#All").show();
                }
                else{
                    $("#opt-01").hide();
                    $("#All-02").hide();
                    $("#All").hide();
                }
            });
            
            $('#remarks').on('change', function(){
                var demovalue = $(this).val(); 
                
                if(demovalue == "1"){
                    $("#remarksCol").show();
                }
                else{
                    $("#remarksCol").hide();
                }
            });
        });
    </script>
    
</body>

</html>