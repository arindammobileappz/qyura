<?php ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="<?php echo base_url();?>assets/images/fevicon-m.ico" rel="shortcut icon">
    <title>Ambulance Detail</title>
    <link href="<?php echo base_url();?>assets/css/framework.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/datepicker.css" rel="stylesheet">
     <link href="<?php echo base_url();?>assets/vendor/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/custom-g.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/custom-r.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/responsive-r.css" rel="stylesheet" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
    <script src="<?php echo base_url();?>assets/js/modernizr.min.js"></script>
</head>

<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- Logo -->
            <div class="topbar-left">


            </div>
            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container row">
                    <div class="clearfix">
                        <div class="pull-left">
                            <div class="mlogo visible-xs visible-sm"><a href="#"><i class="md"></i></a></div>

                            <div class="hidden-xs hidden-sm">
                                <a class="logo" href="#"><img src="<?php echo base_url();?>assets/images/qyura-f-l.png"></a>

                                <button class="button-menu-mobile open-left"><i class="fa fa-bars"></i></button> <span class="clearfix"></span>
                            </div>

                            <button class="button-menu-mobile open-left hidden-lg hidden-md"><i class="fa fa-bars"></i></button> <span class="clearfix"></span>
                        </div>

                        <form class="navbar-form pull-left visible-md" role="search">
                            <div class="form-group">
                                <input class="form-control search-bar" placeholder="Type here for search..." type="text">
                            </div>
                            <button class="btn btn-search" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li class="dropdown">
                                <a aria-expanded="true" class="dropdown-toggle profile" data-toggle="dropdown" href=""><img alt="user-img" class="img-circle" src="<?php echo base_url();?>assets/images/users/avatar-1.jpg"> Ramesh K
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:void(0)"><i class=
                                    "md md-face-unlock"></i> Profile</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><i class=
                                    "md md-settings"></i> Settings</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><i class=
                                    "md md-lock"></i> Lock screen</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><i class=
                                    "md md-settings-power"></i> Logout</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown hidden-xs">
                                <a aria-expanded="true" class="dropdown-toggle waves-effect waves-light" data-target="#" data-toggle="dropdown" href="#"><i class="md md-notifications"></i>
                           <span class="badge badge-xs badge-danger">3</span></a>
                                <ul class="dropdown-menu dropdown-menu-lg">
                                    <li class="text-center notifi-title">
                                        Notification
                                    </li>
                                    <li class="list-group">
                                        <a class="list-group-item" href="javascript:void(0);">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <em class="fa fa-user-plus fa-2x text-info">
                                          </em>
                                                </div>
                                                <div class="media-body clearfix">
                                                    <div class="media-heading">
                                                        New user registered
                                                    </div>
                                                    <p class="m-0"><small>You have
                                             10 unread messages</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item" href="javascript:void(0);">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <em class="fa fa-diamond fa-2x text-primary">
                                          </em>
                                                </div>
                                                <div class="media-body clearfix">
                                                    <div class="media-heading">
                                                        New settings
                                                    </div>
                                                    <p class="m-0"><small>There are
                                             new settings
                                             available</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item" href="javascript:void(0);">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <em class="fa fa-bell-o fa-2x text-danger">
                                          </em>
                                                </div>
                                                <div class="media-body clearfix">
                                                    <div class="media-heading">
                                                        Updates
                                                    </div>
                                                    <p class="m-0"><small>There are
                                             <span class=
                                                "text-primary">2</span> new
                                             updates available</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item" href="javascript:void(0);"><small>See
                                 all notifications</small></a>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li class="hidden-xs">
                           <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-settings"></i></a>
                           </li> -->
                            <li class="hidden-xs hidden-sm">
                                <a class="waves-effect waves-light" href="#" id="btn-fullscreen"><i class=
                              "md md-crop-free"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- nav-collapse -->
                </div>
            </div>
        </div>
        <!-- Top Bar End -->
         <!-- Left Sidebar Start -->
        <div class="left side-menu">
             <div class="sidebar-inner slimscrollleft">
                <!--- Divider -->
               <div id="sidebar-menu">
                    <ul>
                        <li>
                            <a href="dashboard.html" class="waves-effect"><i class="ion-ios7-keypad-outline"></i><span>Dashboard</span></a>
                        </li>

                        <li class="has_sub">
                            <a class="waves-effect" href="#"><i class="fa fa-hospital-o"></i> 
                            <span>Hospitals</span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="<?php echo base_url();?>index.php/hospital">All Hospitals</a></li>
                                <li><a href="<?php echo base_url();?>index.php/hospital/addHospital">Add New Hospital</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a class="waves-effect" href="#"><i class="fa fa-plus-square"></i> 
                            <span>Diagnostic Centres</span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="<?php echo base_url();?>index.php/diagnostic">All Diag Centres</a></li>
                                <li><a href="<?php echo base_url();?>index.php/diagnostic/addDiagnostic">Add New Diag Centre</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a class="waves-effect" href="#"><i class="fa fa-heartbeat"></i> 
                            <span>Blood Banks</span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="<?php echo base_url();?>index.php/bloodbank">All Blood Banks</a></li>
                                <li><a href="<?php echo base_url();?>index.php/bloodbank/Addbloodbank">Add New Blood Bank</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a class="waves-effect active" href="#"><i class="fa fa-medkit"></i> 
                            <span>Pharmacies</span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li class="active"><a href="<?php echo base_url();?>index.php/pharmacy">All Pharmacies</a></li>
                                <li><a href="<?php echo base_url();?>index.php/pharmacy/addPharmacy">Add New Pharmacies</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a class="waves-effect" href="#"><i class="fa fa-ambulance"></i> 
                            <span>Ambulance Providr</span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="<?php echo base_url();?>index.php/ambulance">All Ambulance Providers</a></li>
                                <li><a href="<?php echo base_url();?>index.php/ambulance/addAmbulance">Add Ambulance Provider</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a class="waves-effect" href="#"><i class="fa fa-stethoscope"></i> 
                            <span>Doctors</span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="all-doctor.html">All Doctors</a></li>
                                <li><a href="add-doctor.html">Add New Doctor</a></li>
                                <li><a href="#">Schedule & Availability</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a class="waves-effect" href="#"><i class="fa fa-stethoscope"></i> 
                            <span>MI Appointments</span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="#">Pending Appointments</a></li>
                                <li><a href="all-appointment.html">All Appointments</a></li>
                                <li><a href="addappointment.html">Add New Appointment</a></li>
                                <li><a href="upload-reports.html">Upload Test Reports</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a class="waves-effect" href="#"><i class="fa fa-stethoscope"></i> 
                            <span>Dr. Appointments</span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="#">Pending Appointments</a></li>
                                <li><a href="doctor-appointments.html">All Appointments</a></li>
                                <li><a href="add-doctor-appointment.html">Add New Appointment</a></li>

                            </ul>
                        </li>


                        <li class="has_sub">
                            <a class="waves-effect" href="#"><i class="ion-clipboard"></i> 
                            <span>Quotations</span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="#">Pending Quotation Req.</a></li>
                                <li><a href="quotelist.html">All Quotation Requests</a></li>
                                <li><a href="send-quote.html">Send a Quote</a></li>
                                <li><a href="quote-history.html">Quotation History</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a class="waves-effect" href="#"><i class="fa fa-newspaper-o"></i><span>Healthcare Packag.</span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="health-packages.html">Healthcare Package</a></li>
                                <li><a href="add-health-package.html">Add New Package</a></li>
                                <li><a href="health-package-booking.html">Package Booking</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a class="waves-effect" href="#"><i class="fa fa-newspaper-o"></i><span>Medicart</span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="medicart-offer-list.html">Medicart Offers</a></li>
                                <li><a href="medicart-booking.html">Booking Requests</a></li>
                                <li><a href="medicart-enquiry.html">Enquiries</a></li>
                                <li><a href="add-medicat-offer.html">Add New Offer</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="call-tracking.html" class="waves-effect"><i class="ion-ios7-telephone-outline"></i><span>Call Tracking</span></a>
                        </li>

                        <li class="has_sub">
                            <a class="waves-effect" href="#"><i class="md md-account-circle"></i><span>User Management</span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="all-user.html">User List</a></li>
                                <li><a href="add-user.html">Add New User</a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a class="waves-effect" href="#"><i class="fa fa-star-o"></i><span>Rate & Reviews</span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="review-management.html">All Reviews</a></li>
                                <li><a href="#">Ratings</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="waves-effect"><i class="fa fa-star-o"></i><span>Favorited By</span></a>
                        </li>
                        <li>
                            <a href="#" class="waves-effect"><i class="fa fa-bar-chart-o"></i><span>App Analytics</span></a>

                        </li>
                        <li class="has_sub">
                            <a class="waves-effect" href="#"><i class="md md-trending-up"></i><span>Finance</span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="#">Finacial Accounts</a></li>
                                <li><a href="#">Invoice List</a></li>
                                <li><a href="#">Payment Transactions</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a class="waves-effect" href="#"><i class="fa fa-gift"></i> <span>Promo Coupons</span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="#">Coupons List</a></li>
                                <li><a href="#">Create a Coupon</a></li>
                            </ul>
                        </li>


                        <li class="has_sub">
                            <a class="waves-effect" href="#"><i class="fa fa-gift"></i> <span>Sponsor Health Tips</span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="#">All Healthtip Offers</a></li>
                                <li><a href="#">Healthtip Bookings</a></li>
                                <li><a href="#">Healthtip Messages</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="waves-effect" href="#"><i class="fa fa-list-alt"></i><span>Reporting</span></a>
                        </li>
                        <li class="has_sub">
                            <a class="waves-effect" href="#"><i class="fa fa-gift"></i> <span>Master</span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="specialities.html">Specialities</a></li>
                                <li><a href="diagnostics.html">Diagnostics</a></li>
                                <li><a href="degrees.html">Doctor Degrees</a></li>
                                <li><a href="#">Memberships</a></li>
                                <li><a href="#">Transaction Configuration</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="waves-effect" href="#"><i class="fa fa-cog"></i><span>Settings</span></a>
                        </li>

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container row">
                    <div class="col-md-12 text-success">
                           <?php echo $this->session->flashdata('message'); ?>                     
                    </div>
                    <div class="clearfix">
                        <div class="col-md-12">
                            <h3 class="pull-left page-title">Ambulance Provider Detail</h3>
                            <a href="all-ambulance-provider.html" class="btn btn-appointment btn-back waves-effect waves-light pull-right"><i class="fa fa-angle-left"></i> Back</a>

                        </div>
                    </div>

                    <!-- Left Section Start -->
                    <section class="col-md-12 detailbox m-t-10">


                        <div class="clearfix bg-white">
                            <!-- Table Section Start -->

                            <section class="col-md-12">

                                <aside class="clearfix m-bg-pic">


                                    <div class="bg-picture text-center">
                                        <div class="bg-picture-overlay"></div>
                                        <div class="profile-info-name">
                                            <div class='pro-img'>
                                                <!-- image -->
                                                <?php if(!empty($ambulanceData[0]->ambulance_img)){?>
                                                <img src="<?php echo base_url()?>assets/ambulanceImages/<?php echo $ambulanceData[0]->ambulance_img; ?>" alt="" class="img-responsive" height="80px;" width="80px;" />
                                               <?php } else { ?>
                                                 <img src="<?php echo base_url()?>assets/images/noImage.png" alt="" class="img-responsive" height="80px;" width="80px;"/>
                                               <?php } ?>
                                              <!--<img src="assets/images/am-medanta.png"  alt="profile-image">-->
                                                <!-- description div -->
                                                <div class='pic-edit'>
                                                    <h3><a href="#" class="pull-center cl-white" title="Edit Logo"><i class="fa fa-pencil"></i></a></h3>
                                                </div>
                                                <!-- end description div -->
                                            </div>

                                            <h3 class="text-white"><?php echo $ambulanceData[0]->ambulance_name;?> </h3>
                                            <h4><?php echo $ambulanceData[0]->ambulance_address;?></h4>

                                        </div>

                                    </div>
                                    <!--/ meta -->

                                </aside>
                                <section class="clearfix hospitalBtn">
                                    <div class="col-md-12">
                                        <a href="#" class="pull-right cl-white" title="Edit Background"><i class="fa fa-pencil"></i></a>

                                    </div>

                                </section>
                                <article class="col-md-8 m-t-50">
                                    <aside class="clearfix amb-detail">
                                     <h4>Ambulance Provider Detail
                                     <a id="edit" class="pull-right cl-pencil"><i class="fa fa-pencil"></i></a>
                                    </h4>
                                    <hr/>
                                        </aside>


                                    <!--Ambulance Provider Detail Starts -->
                                    <div class="map_canvas"></div>
                                    <section class="tab-pane fade in active" id="detail" style="display:<?php echo $detail;?>">
                                        <div class="clearfix m-t-20 p-b-20 doctor-description">
                                            <article class="clearfix m-b-10">
                                                <label for="cemail" class="control-label col-md-4 col-sm-4">Ambulance Provider Name:</label>
                                                <p class="col-md-8 col-sm-8"><?php echo $ambulanceData[0]->ambulance_name;?></p>
                                            </article>
                                            <article class="clearfix m-b-10">
                                                <label for="cemail" class="control-label col-md-4 col-sm-4">Provider Type :</label>
                                                <p class="col-md-8 col-sm-8"><?php if($ambulanceData[0]->ambulanceType == 1){ echo 'Trauma Medicines'; } else { echo 'General Medicines';}?></p>
                                            </article>
                                            <article class="clearfix m-b-10">
                                                <label for="cemail" class="control-label col-md-4 col-sm-4">Address:</label>
                                                <p class="col-md-5 col-sm-8"><?php echo $ambulanceData[0]->ambulance_address;?></p>
                                            </article>
                                            <article class="clearfix m-b-10">
                                                <label for="cemail" class="control-label col-md-4 col-sm-4">Phone Number:</label>
                                                 <?php 
                                                    $explode= explode('|',$ambulanceData[0]->ambulance_phn); 
                                                    for($i= 0; $i< count($explode)-1;$i++){?>
                                                    <p>+ <?php echo $explode[$i];?></p>
                                                    <?php }?>
                                                <!--<p class="col-md-8 col-sm-8">+91 731 7224401</p>-->
                                            </article>
                                            <article class="clearfix m-b-10">
                                                <label for="cemail" class="control-label col-md-4 col-sm-4">Mobile Number:</label>
                                                <p class="col-md-8 col-sm-8">+91 <?php if($ambulanceData[0]->users_mobile){ echo $ambulanceData[0]->users_mobile;}?></p>
                                            </article>
                                            <article class="clearfix m-b-10">
                                                <label for="cemail" class="control-label col-md-4 col-sm-4">Contact Person Name:</label>
                                                <p class="col-md-8 col-sm-8"><?php echo $ambulanceData[0]->ambulance_cntPrsn;?></p>
                                            </article>
                                            <article class="clearfix m-b-10">
                                                <label for="cemail" class="control-label col-md-4 col-sm-4">Membership Type:</label>
                                                <p class="col-md-8 col-sm-8"><?php if($ambulanceData[0]->ambulance_mmbrTyp == 1){ echo 'Life Time'; } else { echo 'Health Club';}?></p>
                                            </article>
                                            <article class="clearfix m-b-10">
                                                <label for="cemail" class="control-label col-md-4 col-sm-4">24/7 Service - Yes/No :</label>
                                                <p class="col-md-8 col-sm-8"><?php if($ambulanceData[0]->ambulance_27Src == 1){ echo 'Yes'; } else { echo 'No';}?></p>
                                            </article>

                                        </div>
                                    </section>
                                    <!-- Ambulance Provider Detail Ends -->
                                    
                                    <!-- Ambulance Provider Detail in Edit Mode -->
                                     <form name="ambulanceDetail" action="<?php echo site_url(); ?>/ambulance/saveDetailAmbulance/<?php echo $ambulanceId; ?>" id="ambulanceDetail" method="post">
                                    <section id="editdetail" style="display:<?php echo $editdetail;?>">
                                        <div class="clearfix m-t-20 p-b-20 doctor-description">
                                            <article class="clearfix m-b-10">
                                                <label for="cemail" class="control-label col-md-4 col-sm-4">Ambulance Provider Name:</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <input class="form-control" id="ambulance_name" name="ambulance_name" type="text"  value="<?php echo $ambulanceData[0]->ambulance_name;?>">
                                                    <label class="error" > <?php echo form_error("ambulance_name"); ?></label>
                                                </div>
                                            </article>
                                            <article class="clearfix m-b-10">
                                                <label for="cemail" class="control-label col-md-4 col-sm-4">Provider Type :</label>
                                                 <div class="col-md-8 col-sm-8">
                                                    <select class="selectpicker" data-width="100%" name="ambulanceType">
                                                        <option value='1' <?php if($ambulanceData[0]->ambulanceType == 1){ echo 'selected';}?>>Trauma Medicines</option>
                                                        <option value='2' <?php if($ambulanceData[0]->ambulanceType == 2){ echo 'selected';}?>>General Medicines</option>
                                                    </select>
                                                     <label class="error" > <?php echo form_error("ambulanceType"); ?></label>
                                                </div>
                                            </article>
                                            <article class="clearfix m-b-10">
                                                <label for="cemail" class="control-label col-md-4 col-sm-4">Address:</label>
                                              <div class="col-md-8 col-sm-8">
                                            <!--<aside class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <select class="selectpicker" data-width="100%" name="country">
                                                        <option>Select Country</option>
                                                        <option selected>India</option>
                                                        <option>Shrilanka</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-sm-6 m-t-xs-10">
                                                    <select class="selectpicker" data-width="100%" name="state">
                                                        <option>Select State</option>
                                                        <option selected>West Bengal</option>
                                                        <option>Oddisa</option>
                                                    </select>
                                                </div>
                                            </aside> -->
                                           <!-- <aside class="row m-t-10">
                                                <div class="col-md-6 col-sm-6">
                                                    <select class="selectpicker" data-width="100%" name="city">
                                                        <option>Select City</option>
                                                        <option selected>Kolkata</option>
                                                        <option>Delhi</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-sm-6 m-t-xs-10">
                                                    <input type="text" class="form-control" id="zip" name="zip" value="700001" />
                                                </div>
                                            </aside> -->
                                            <div class="clearfix m-t-10">
                                           
                                            <textarea class="form-control" id="geocomplete" name="ambulance_address" type="text" ><?php if(isset($ambulanceData[0]->ambulance_address)){ echo $ambulanceData[0]->ambulance_address; }?></textarea>
                                            <label class="error" > <?php echo form_error("ambulance_address"); ?></label>
                                            </div>
                                        </div>
                                            </article>
                                            <article class="clearfix m-b-10">
                                                <label for="cemail" class="control-label col-md-4 col-sm-4">Phone Number:</label>
                                               <div class="col-md-8 col-sm-8">
                                                   <?php 
                                                        $explodes= explode('|',$ambulanceData[0]->ambulance_phn); 
                                                        for($i= 0; $i< count($explodes)-1;$i++){
                                                        $moreExpolde = explode(' ',$explodes[$i]);
                                                   ?>
                                                    <aside class="row">
                                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                                            <select class="selectpicker" data-width="100%" name="pre_number[]">
                                                                <option value="91" <?php if($moreExpolde[0] == '91'){ echo 'selected';}?>>+91</option>
                                                                <option value="1" <?php if($moreExpolde[0] == '1'){ echo 'selected';}?>>+1</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="col-md-6 col-sm-6 col-xs-10 m-t-xs-10">
                                                            <input type="text" class="form-control" name="ambulance_phn[]" id="ambulance_phn<?php echo $i;?>" placeholder="9837000123" value="<?php echo $moreExpolde[1];?>" maxlength="10" onblur="checkNumber(<?php echo $i;?>)"/>
                                                                    
                                                        </div>

                                                    </aside>
                                                    <?php $moreExpolde ='';}?>
                                                    <br />
                                                </div>
                                            </article>
                                            <article class="clearfix m-b-10">
                                                <label for="cemail" class="control-label col-md-4 col-sm-4">Mobile Number:</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <aside class="row">
                                                       <!-- <div class="col-md-3 col-sm-3 col-xs-12">
                                                            <select class="selectpicker" data-width="100%">
                                                                <option selected>+91</option>
                                                                <option>+1</option>
                                                            </select>
                                                        </div> -->
                                                        <div class="col-md-9 col-sm-9 col-xs-12 m-t-xs-10">
                                                            <input type="text" class="form-control" name="users_mobile" id="users_mobile" value="<?php if(isset($ambulanceData[0]->users_mobile)){ echo $ambulanceData[0]->users_mobile;}?>" />
                                                            <label class="error" > <?php echo form_error("users_mobile"); ?></label>   
                                                        </div>


                                                    </aside>
                                                </div>
                                            </article>
                                            <article class="clearfix m-b-10">
                                                <label for="cemail" class="control-label col-md-4 col-sm-4">Contact Person Name:</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <input class="form-control" id="ambulance_cntPrsn" name="ambulance_cntPrsn" type="text" required="" value="<?php echo $ambulanceData[0]->ambulance_cntPrsn;?>">
                                                    <label class="error" > <?php echo form_error("ambulance_cntPrsn"); ?></label>  
                                                </div>
                                            </article>
                                            <article class="clearfix m-b-10">
                                                <label for="cemail" class="control-label col-md-4 col-sm-4">Membership Type:</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <select class="selectpicker" data-width="100%" name="ambulance_mbrTyp" id="ambulance_mbrTyp">
                                                        <option value="1" <?php if($ambulanceData[0]->ambulance_mmbrTyp == 1){ echo 'selected';}?>>Life Time</option>
                                                        <option value="2" <?php if($ambulanceData[0]->ambulance_mmbrTyp == 2){ echo 'selected';}?>>Health Club</option>
                                                    </select>
                                                </div>
                                            </article>
                                            <article class="clearfix m-b-10">
                                                <label for="cemail" class="control-label col-md-4 col-sm-4">24/7 Service - Yes/No :</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <aside class="radio radio-info radio-inline">
                                                        <input type="radio" id="inlineRadio1" value="1" name="ambulance_27Src" <?php if($ambulanceData[0]->ambulance_27Src == 1){ echo 'checked'; }?> />
                                                        <label for="inlineRadio1"> Yes</label>
                                                    </aside>
                                                    <aside class="radio radio-info radio-inline">
                                                        <input type="radio" id="inlineRadio2" value="0" name="ambulance_27Src" <?php if($ambulanceData[0]->ambulance_27Src == 0){ echo 'checked'; }?> >
                                                        <label for="inlineRadio2"> No</label>
                                                    </aside>
                                                </div>
                                            </article>
                                            <article class="clearfix ">
                                                <div class="col-md-12 m-t-20 m-b-20">
                                                <button type="submit" class="btn btn-appointment waves-effect waves-light m-l-10 pull-right" onclick="return validationAmbulance();">Submit</button>
                                                </div>
                                            </article>
                                        </div>
                                    </section>
                                        <fieldset>
                                            <input name="lat" type="hidden" value="<?php echo $ambulanceData[0]->ambulance_lat;?>">
                                            <input name="lng" type="hidden" value="<?php echo $ambulanceData[0]->ambulance_long;?>">
                                            <input name="user_tables_id" id="user_tables_id" type="hidden" value="<?php echo $ambulanceData[0]->ambulance_usersId;?>">
                                       </fieldset>      
                                     </form>     
                                     <!-- Ambulance Provider Detail in Edit Mode -->

                                </article>

                            </section>
                            <!-- General Detail Ends -->


                    </div>

                    </section>
                    <!-- Left Section End -->


                </div>

                <!-- container -->
            </div>
            <!-- content -->
            <footer class="footer text-right">
                2015 © Qyura.
            </footer>
        </div>
        <!-- End Right content here -->
    </div>
    <!-- END wrapper -->






    <script>
        var resizefunc = [];
    </script>
    <script src="<?php echo base_url();?>assets/js/jquery-1.8.2.min.js"> </script>
    <script src="<?php echo base_url();?>assets/js/framework.js"> </script>
    
     <script src="<?php echo base_url();?>assets/vendor/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript">
    </script>
    <script>
    $("#edit").click(function () {
    $("#detail").toggle();
    $("#editdetail").toggle();
});
    </script>
    
    <script type="text/javascript" src="https://www.google.com/jsapi">
    </script>
    
   <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>

    <script src="<?php echo base_url(); ?>assets/js/jquery.geocomplete.min.js"></script>
    <script>
         var urls = "<?php echo base_url()?>";
         $(function(){
        $("#geocomplete").geocomplete({
          map: ".map_canvas",
          details: "form",
          types: ["geocode", "establishment"],
        });

        $("#find").click(function(){
          $("#geocomplete").trigger("geocode");
        });
      });
      
        function validationAmbulance(){
        
       //$("form[name='ambulanceDetail']").submit();
        var check= /^[a-zA-Z\s]+$/;
        var numcheck=/^[0-9]+$/;
        var users_mobile = $.trim($('#users_mobile').val());
        var cpname = $.trim($('#ambulance_cntPrsn').val());
        var status = 1;
       
            if($.trim($('#ambulance_name').val()) === ''){
                $('#ambulance_name').addClass('bdr-error');
                status = 0;
            }
          
            if($.trim($('#geocomplete').val()) === ''){
               $("#geocomplete").addClass('bdr-error');
               status = 0;
            }
             if(!($.isNumeric(users_mobile))){
                //alert(id);
             $('#users_mobile').addClass('bdr-error');
             status = 0;
            }
             if(!check.test(cpname)){
                $('#ambulance_cntPrsn').addClass('bdr-error');
                status = 0;
            }
            
            if(status == 1)
            {
                $("form[name='ambulanceDetail']").submit();
            }    
            else
            {
                return false;
            }
                
         
            
            
        }
        
       
       function checkNumber(id){
           
            var phone = $.trim($('#'+'ambulance_phn'+id).val());
            if(!($.isNumeric(phone))){
                //alert(id);
             $('#'+'ambulance_phn'+id).addClass('bdr-error');
         }
        }
   </script>   

</body>

</html>


