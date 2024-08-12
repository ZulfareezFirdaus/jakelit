	<!-- Start Header Top Area -->
	<div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#">
                            <img class="logoImg" src="<?php echo $directoryLogoHeadMenu ?><?php echo $outletLogo ?>" alt="" />
                            <span><?php echo strtoupper($outletName) ?></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">        
                            <li class="nav-item nc-al"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-alarm"></i></span><div class="spinner4 spinner-4"></div></a>
                                <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Notification</h2>
                                    </div>
                                    <div class="hd-message-info">
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/1.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/2.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Jonathan Morris</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/4.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Fredric Mitchell</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/1.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/2.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Glenn Jecobs</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="hd-mg-va">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item"><a href="<?php echo $logout ?>/dashboard.php" ><span><i class="notika-icon notika-house"></i></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
	<!-- Main Menu area start-->
	<div class="main-menu-area mg-tb-40">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
						<li <?php if($_GET['page'] == 'home'){ ?>class="active" <?php } ?> ><a  href="<?php echo $directoryMainMenu ?>?page=home&subpage=dashboard&secretkey=<?php echo $_GET['secretkey']; ?>"><i class="notika-icon notika-house"></i> Home</a></li>
						<li <?php if($_GET['page'] == 'form'){ ?>class="active" <?php } ?> ><a data-toggle="tab" href="#form"><i class="notika-icon notika-form"></i> Form</a></li>
						<li><a data-toggle="tab" href="#record"><i class="notika-icon notika-windows"></i> Record</a></li>
						<li><a data-toggle="tab" href="#search"><i class="notika-icon notika-search"></i> Search</a></li>
						<li <?php if($_GET['page'] == 'admin'){ ?>class="active" <?php } ?> ><a data-toggle="tab" href="#admin"><i class="notika-icon notika-support"></i> Admin</a></li>
						<li><a data-toggle="tab" href="#setting"><i class="notika-icon notika-settings"></i> Setting</a></li>
					</ul>
					<div class="tab-content custom-menu-content">
						<div id="home" class="tab-pane notika-tab-menu-bg animated flipInX"></div>
						<div id="form" class="tab-pane <?php if($_GET['page'] == 'form'){ ?>active<?php } ?> notika-tab-menu-bg animated flipInX">
							<ul class="notika-main-menu-dropdown">
								<li <?php if($_GET['subpage'] == 'add equipment'){ ?>class="active" <?php } ?> ><a href="<?php echo $directoryMainMenu ?>form/addEquipment.php?page=form&subpage=add equipment&secretkey=<?php echo $_GET['secretkey']; ?>">Add Equipment</a>
								</li>
							</ul>
						</div>
						<div id="record" class="tab-pane notika-tab-menu-bg animated flipInX">
							<ul class="notika-main-menu-dropdown">
								<li><a href="animations.html">Animations</a>
								</li>
								<li><a href="google-map.html">Google Map</a>
								</li>
								<li><a href="data-map.html">Data Maps</a>
								</li>
								<li><a href="code-editor.html">Code Editor</a>
								</li>
								<li><a href="image-cropper.html">Images Cropper</a>
								</li>
								<li><a href="wizard.html">Wizard</a>
								</li>
							</ul>
						</div>
						<div id="search" class="tab-pane notika-tab-menu-bg animated flipInX"></div>
						<div id="admin" class="tab-pane <?php if($_GET['page'] == 'admin'){ ?>active<?php } ?> notika-tab-menu-bg animated flipInX">
							<ul class="notika-main-menu-dropdown">
								<li <?php if($_GET['subpage'] == 'outlet'){ ?>class="active" <?php } ?> ><a href="<?php echo $directoryMainMenu ?>admin/addOutlet.php?page=admin&subpage=outlet&secretkey=<?php echo $_GET['secretkey']; ?>">Outlet</a>
								</li>
								<li <?php if($_GET['subpage'] == 'branch'){ ?>class="active" <?php } ?> ><a href="<?php echo $directoryMainMenu ?>admin/addBranch.php?page=admin&subpage=branch&secretkey=<?php echo $_GET['secretkey']; ?>">Branch</a>
								</li>
                                <li <?php if($_GET['subpage'] == 'RAM'){ ?>class="active" <?php } ?> ><a href="<?php echo $directoryMainMenu ?>admin/addRAM.php?page=admin&subpage=RAM&secretkey=<?php echo $_GET['secretkey']; ?>">RAM</a>
								</li>
                                <li <?php if($_GET['subpage'] == 'OS'){ ?>class="active" <?php } ?> ><a href="<?php echo $directoryMainMenu ?>admin/addOS.php?page=admin&subpage=OS&secretkey=<?php echo $_GET['secretkey']; ?>">OS</a>
								</li>
                                <li <?php if($_GET['subpage'] == 'processor'){ ?>class="active" <?php } ?> ><a href="<?php echo $directoryMainMenu ?>admin/addProcessor.php?page=admin&subpage=processor&secretkey=<?php echo $_GET['secretkey']; ?>">Processor</a>
								</li>
                                <li <?php if($_GET['subpage'] == 'microsoft office'){ ?>class="active" <?php } ?> ><a href="<?php echo $directoryMainMenu ?>admin/addMicrosoftOffice.php?page=admin&subpage=microsoft office&secretkey=<?php echo $_GET['secretkey']; ?>">Microsoft Office</a>
								</li>
                                <li <?php if($_GET['subpage'] == 'department'){ ?>class="active" <?php } ?> ><a href="<?php echo $directoryMainMenu ?>admin/addDepartment.php?page=admin&subpage=department&secretkey=<?php echo $_GET['secretkey']; ?>">Department</a>
                                </li>
                                <li <?php if($_GET['subpage'] == 'brand'){ ?>class="active" <?php } ?> ><a href="<?php echo $directoryMainMenu ?>admin/addBrand.php?page=admin&subpage=brand&secretkey=<?php echo $_GET['secretkey']; ?>">Brand</a>
                                </li>
							</ul>
						</div>
						<div id="setting" class="tab-pane notika-tab-menu-bg animated flipInX">
							<ul class="notika-main-menu-dropdown">
								<li><a href="normal-table.html">Edit Profile</a>
								</li>
								<li><a href="<?php echo $logout ?>">Log Out</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<!-- Main Menu area End-->