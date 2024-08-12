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
                            <h2>Branch Registration Form</h2>
                            <p>Please fill up the form</p>
                        </div>
                        <div id="alert" class="alerts"><i class="fa fa-exclamation-triangle"></i> Please complete the form !</div>
                        <div id="alertSuccess" class="alerts"><i class="fa fa-check"></i> Form successfully Submitted !</div>
                        <div id="alertFailed" class="alerts"><i class="fa fa-exclamation-triangle"></i>  Please check the internet connection !</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<div class="form-example-int">
									<div class="form-group">
										<label>Branch Name</label>
										<div class="nk-int-st">
											<input type="text" name="branchName" id="branchName" class="form-control input-sm" placeholder="Enter branch name">
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                    <span>Outlet Name</span>
                                </div>
                                <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker" data-live-search="true" name="outletName" id="outletName">
                                            <option value="">Please select outlet</option>
                                        <?php while($dataOutlet = mysqli_fetch_array($queryOutlet)){ ?>
                                            <option value="<?php echo $dataOutlet['outletID'] ?>"><?php echo $dataOutlet['outletName'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
						</div>
						<center>
							<div class="form-example-int mg-t-15">
								<button id="btnBranch" class="btn btn-success notika-btn-success">Submit</button>
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
                            <h2>Branch Records</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Branch Name</th>
                                        <th>Oulet Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead><tbody>
                                    <?php while($dataBranch = mysqli_fetch_array($queryBranch)) { ?>
                                    
                                        <tr>
                                            <td align="center"><?php echo $no++ ?>.</td>
                                            <td><?php echo ucwords($dataBranch['branchName']) ?></td>
                                            <td><?php echo ucwords($dataBranch['outletName']) ?></td>
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
        $('#btnBranch').click(function() {
            var status = "saveBranch";
            var branchName = $("#branchName").val();
            var outletName = $("#outletName").val();

            if(branchName === ""){
                $('#branchName').css({
                    'border': '1px solid red'
                });
                $('#alert').addClass('show');
                setTimeout(function() {
                    $('#alert').removeClass('show');
                }, 5000);
            }
            $('#branchName').on('input', function() {
               $('#branchName').css({
                    'border': '1px solid #ccc'
                });
            });
            if(outletName === ""){
                $('.bootstrap-select>.btn-default').css({
                    'border': '1px solid red'
                });
                $('#alert').addClass('show');
                setTimeout(function() {
                    $('#alert').removeClass('show');
                }, 5000);
            }
            $('#outletName').on('change', function() {
               $('.bootstrap-select>.btn-default').css({
                    'border': '1px solid #ccc'
                });
            });
            
            
            
            if(branchName != "" && outletName != "" ){ 
                $.ajax({
                  url: "process.php",
                  method: "POST",
                  dataType: "json",
                  data: {
                    status: status,
                    branchName : branchName,
                    outletName : outletName
                  },
                  success: function(data) {
                      if (data === "Success") {
                          $('#branchName').val('');
                          $('#outletName').val('').trigger('change');
                          
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
                    }
                });
            }
        });
    </script>
</body>

</html>