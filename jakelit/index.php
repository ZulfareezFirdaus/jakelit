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
            
		$directoryHeadMenu = './';
        $directoryLogoHeadMenu = '../';
        include('../dbconn.php');
    
        $sql = "SELECT * FROM outlet WHERE outletSecretKey = '".$_GET['secretkey']."' ";
        $query = mysqli_query($dbconn, $sql);
        $data = mysqli_fetch_assoc($query);
    
        // Define your PHP variables
        $backgroundColor = $data['outletCodeColor'];
        $outletLogo = $data['outletCaseLogo'];
        $outletName = substr($data['outletName'], 1);
        
        include('./headMenu.php');
	?>
</head>

<body>

    <?php 
	
		$directoryMainMenu = './';
		$logout ='./../';
		include('./mainMenu.php');

	?>
	
	<!-- Breadcomb area Start-->
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<?php
								include('./headSession.php');
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
    <!-- Start Status area -->
    <div class="notika-status-area" style="margin-bottom: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter">50,000</span></h2>
                            <p>Total Equipment</p>
                        </div>
                        <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter">90,000</span>k</h2>
                            <p>Pending Approval</p>
                        </div>
                        <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2>$<span class="counter">40,000</span></h2>
                            <p>In Use Equipment</p>
                        </div>
                        <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter">1,000</span></h2>
                            <p>Returned Equipment</p>
                        </div>
                        <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Status area-->
    <!-- Start Email Statistic area-->
    <div class="notika-email-post-area" >
        <div class="container">
            <div class="row">
                <!-- Data Table area Start-->
                <div class="data-table-area" style="margin-bottom: 30px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="data-table-list">
                                    <div class="basic-tb-hd">
                                        <h2>Available Equipment</h2>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="data-table-basic-1" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="data-table-list">
                                    <div class="basic-tb-hd">
                                        <h2>Pending Approval</h2>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="data-table-basic-2" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Data Table area End-->
                <!-- Start Email Statistic area-->
                <div class="notika-email-post-area">
                    <div class="container">
                        <div class="row">
                            <!-- Data Table area Start-->
                            <div class="data-table-area">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="data-table-list">
                                                <div class="basic-tb-hd">
                                                    <h2>Available Equipment</h2>
                                                </div>
                                                <div class="table-responsive">
                                                    <table id="data-table-basic-1" class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Tiger Nixon</td>
                                                                <td>System Architect</td>
                                                                <td>Edinburgh</td>
                                                                <td>61</td>
                                                                <td>2011/04/25</td>
                                                                <td>$320,800</td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="data-table-list">
                                                <div class="basic-tb-hd">
                                                    <h2>Pending Approval</h2>
                                                </div>
                                                <div class="table-responsive">
                                                    <table id="data-table-basic-2" class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Tiger Nixon</td>
                                                                <td>System Architect</td>
                                                                <td>Edinburgh</td>
                                                                <td>61</td>
                                                                <td>2011/04/25</td>
                                                                <td>$320,800</td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Data Table area End-->
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="ongoing-task-inner notika-shadow mg-t-30">
                        <div class="realtime-ctn">
                            <div class="realtime-title ongoing-hd-wd">
                                <h2>Ongoing Tasks</h2>
                                <p>Magna cursus malesuada lacinia</p>
                            </div>
                        </div>
                        <div class="skill-content-3 ongoing-tsk">
                            <div class="skill">
                                <div class="progress">
                                    <div class="lead-content">
                                        <p>HTML5 Validation Report</p>
                                    </div>
                                    <div class="progress-bar wow fadeInLeft" data-progress="95%" style="width: 95%;" data-wow-duration="1.5s" data-wow-delay="1.2s"> <span>95%</span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="lead-content">
                                        <p>Google Chrome Extension</p>
                                    </div>
                                    <div class="progress-bar wow fadeInLeft" data-progress="85%" style="width: 85%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>85%</span> </div>
                                </div>
                                <div class="progress">
                                    <div class="lead-content">
                                        <p>Social Internet Projects</p>
                                    </div>
                                    <div class="progress-bar wow fadeInLeft" data-progress="70%" style="width: 70%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>70%</span> </div>
                                </div>
                                <div class="progress">
                                    <div class="lead-content">
                                        <p>Bootstrap Admin</p>
                                    </div>
                                    <div class="progress-bar wow fadeInLeft" data-progress="60%" style="width: 60%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>60%</span> </div>
                                </div>
                                <div class="progress progress-bt">
                                    <div class="lead-content">
                                        <p>Youtube App</p>
                                    </div>
                                    <div class="progress-bar wow fadeInLeft" data-progress="50%" style="width: 50%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>50%</span> </div>
                                </div>
                            </div>
                            <div class="view-all-onging">
                                <a href="#">View All Tasks</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Email Statistic area-->
    
    
    
    <?php 
		include('./footer.php');
		
		$directoryFootMenu = './';
		include('./footMenu.php');
	?>
    
    <script>
        $(document).ready(function() {
            $('#data-table-basic-1').DataTable();
            $('#data-table-basic-2').DataTable();
        });
    </script>
    
</body>

</html>