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
                            <h2>Processor Registration Form</h2>
                            <p>Please fill up the form</p>
                        </div>
                        <div id="alert" class="alerts"><i class="fa fa-exclamation-triangle"></i> Please complete the form !</div>
                        <div id="alertSuccess" class="alerts"><i class="fa fa-check"></i> Form successfully Submitted !</div>
                        <div id="alertFailed" class="alerts"><i class="fa fa-exclamation-triangle"></i>  Please check the internet connection !</div>
						<div class="row center-column">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<div class="form-example-int">
									<div class="form-group">
										<label>Processor Name</label>
										<div class="nk-int-st">
											<input type="text" name="processorName" id="processorName" class="form-control input-sm" placeholder="Enter Processor name" >
										</div>
									</div>
								</div>
							</div>
						</div>
						<center>
                            <div class="form-example-int mg-t-15">
                                <button id="btnProcessor" class="btn btn-success notika-btn-success">
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
                            <h2>Processor Records</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Processor Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($dataProcessor = mysqli_fetch_array($queryProcessor)) { ?>
                                        <tr>
                                            <td align="center"><?php echo $no++ ?>.</td>
                                            <td><?php echo ucwords($dataProcessor['processorName']) ?></td>
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
        $('#btnProcessor').click(function() {
            var status = "saveProcessor";
            var processorName = $("#processorName").val();
            var $btn = $(this);

            if(processorName === ""){
                $('#processorName').css({
                    'border': '1px solid red'
                });
                $('#alert').addClass('show');
                setTimeout(function() {
                    $('#alert').removeClass('show');
                }, 5000);
            }
            $('#processorName').on('input', function() {
               $('#processorName').css({
                    'border': '1px solid #ccc'
                });
            });
            
            
            if(processorName != "" ){ 

                // Disable button and show loader
                $btn.prop('disabled', true);
                $btn.find('.btn-text').text('Submitting...');
                $btn.find('.spinner-border').removeClass('d-none');
                
                $.ajax({
                  url: "process.php",
                  method: "POST",
                  dataType: "json",
                  data: {
                    status: status,
                    processorName : processorName
                  },
                  success: function(data) {
                      if (data === "Success") {
                          $('#processorName').val('');
                          
                           $('#alertSuccess').addClass('show');
                            setTimeout(function() {
                                $('#alertSuccess').removeClass('show');
                            }, 5000);
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
            }
        });
    </script>
</body>

</html>