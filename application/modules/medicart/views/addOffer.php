<!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container row">
                    <!-- consultation -->

                    <div style="display:show;" id="consultDiv">
                        <div class="clearfix">
                            <div class="col-md-12">
                                <h3 class="pull-left page-title">Add New Medicart Offer</h3>

                            </div>
                   
                        </div>
                            <?php if(!empty($this->session->flashdata('message'))){?>
                            <div class="alert alert-success"><?php echo $this->session->flashdata('message');?></div>
                                <?php }?>
                           <?php if(!empty($this->session->flashdata('error'))){?>
                            <div class="alert alert-danger"><?php echo $this->session->flashdata('error');?></div>
                                <?php }?>
                        <form class="cmxform form-horizontal tasi-form avatar-form" id="submitForm" name="submitForm" method="post" action="<?php echo site_url(); ?>/medicart/saveOffer" novalidate="novalidate" enctype="multipart/form-data">
     
                            <!-- Left Section Start -->
                            <section class="col-md-6 detailbox">
                                <div class="bg-white mi-form-section">
                                    <figure class="clearfix">
                                        <h3>General Detail</h3>
                                    </figure>
                                    <!-- Table Section End -->
                                    <div class="clearfix m-t-20">
                                        <article class="form-group m-lr-0">
                                            <label for="cname" class="control-label col-md-4 col-sm-4">City:</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="" data-width="100%" name="medicartOffer_cityId" id="cityId" required="">
                                                  <option value="">Select City</option>
                                                    <?php foreach ($allCity as $key => $val) { ?>
                                                        <option value="<?php echo $val->city_id; ?>"><?php echo $val->city_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label class="error"><?php echo form_error('medicartOffer_cityId'); ?></label>
                                            </div>
                                        </article>
                                  <article class="form-group m-lr-0 ">
                                    <label class="control-label col-md-4 col-sm-4">MI/Doctor Type :</label>
                                    <div class="col-md-8 col-sm-8">
                                        <select class="" data-width="100%" name="miType" onchange ="getMIList(this.value, medicartOffer_cityId.value)" id="miType" required="">
                                            <option value=""> Select MI Type</option>
                                            <option>Hospital</option>
                                            <option>Diagnostic</option>
                                        </select>
                                    <label class="error"><?php echo form_error('miType'); ?></label>
                                    </div>
                                </article>

                                        <article class="form-group m-lr-0 ">
                                            <label for="cemail" class="control-label col-md-4 col-sm-4">MI Name:</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="" data-width="100%" name="medicartOffer_MIId" id="miName">
                                                </select>
                                                 <label class="error"><?php echo form_error('medicartOffer_MIId'); ?></label>
                                            </div>
                                        </article>

                                        <article class="form-group m-lr-0 ">
                                            <label for="cemail" class="control-label col-md-4 col-sm-4">Id :</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input class="form-control disabled" id="medicartOffer_OfferId" name="medicartOffer_OfferId" type="disabled" required="" aria-required="true" placeholder="ACM304" value="<?php echo isUnique();?>" readonly="" >
                                                 <label class="error"><?php echo form_error('medicartOffer_OfferId'); ?></label>
                                            </div>
                                        </article>

                                        <article class="form-group m-lr-0">
                                            <label for="cname" class="control-label col-md-4 col-sm-4">Offer Category:</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="selectpicker" data-width="100%" name="medicartOffer_offerCategory"id="medicartOffer_offerCategory" required="">
                                                        <?php foreach ($allOffetCategory as $keys => $values) { ?>
                                                        <option value="<?php echo $values->offerCat_id; ?>"><?php echo ucwords($values->offerCat_name); ?></option>
                                                    <?php } ?>
                                                </select>
                                                 <label class="error"><?php echo form_error('medicartOffer_offerCategory'); ?></label>
                                            </div>
                                        </article>

                                        <article class="form-group m-lr-0">
                                            <label for="" class="control-label col-md-4 col-sm-4">Title :</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input class="form-control " type="text" name="medicartOffer_title" required="" id="medicartOffer_title" value="<?=set_value('medicartOffer_title');?>">
                                                 <label class="error"><?php echo form_error('medicartOffer_title'); ?></label>
                                            </div>
                                        </article>

                                        <article class="form-group m-lr-0 ">
                                            <label class="control-label col-md-4 col-sm-4" for="cemail">Image:</label>
                                            <div class="col-md-8 col-sm-8 text-right">
                                                <input id="uploadFile" class="showUpload" disabled="disabled" />
                                                <div class="fileUpload btn btn-sm btn-upload">
                                                    <span><i class="fa fa-cloud-upload fa-3x avatar-view"></i></span>
<!--                                                    <input id="uploadBtn12" type="file" class="upload123" />-->
                                                </div>
                                                <img src="<?php echo base_url();?>assets/images/noImage.png" alt=" " class="img-responsive image-preview-show" width="180"/>
                                                <label class="error"><?php echo form_error('avatar_file'); ?></label>
                                                 <label class="error"><?php echo $this->session->flashdata('valid_upload'); ?></label>
                                                
                                            </div>
                                        </article>

                                        <article class="form-group m-lr-0">
                                            <label for="" class="control-label col-md-4 col-sm-4">Description :</label>
                                            <div class="col-md-8 col-sm-8">
                                                <textarea class="form-control" type="text" name="medicartOffer_description" required="" id="medicartOffer_description"><?php set_value('medicartOffer_description');?></textarea>
                                                 <label class="error"><?php echo form_error('medicartOffer_description'); ?></label>
                                            </div>
                                        </article>

                                    </div>
                                    <!-- .form -->
                                </div>

                            </section>
                            <!-- Left Section End -->



                            <!-- Right Section Start -->
                            <section class="col-md-6 detailbox mi-form-section">
                                <div class="bg-white clearfix">
                                    <!-- Other Info Start -->

                                    <figure class="clearfix">
                                        <h3>Other Information</h3>
                                    </figure>
                                    <aside class="clearfix m-t-20">

                                        <article class="form-group m-lr-0">
                                            <label for="cname" class="control-label col-md-4 col-sm-4">Allow Booking ?</label>
                                            <div class="col-md-8 col-sm-8">
                                                <div class="radio radio-success radio-inline">
                                                    <input type="radio" checked="" name="medicartOffer_allowBooking" value="1" id="inlineRadio1">
                                                    <label for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="radio radio-success radio-inline">
                                                    <input type="radio" name="medicartOffer_allowBooking" value="0" id="inlineRadio2">
                                                    <label for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </article>

                                        <article class="form-group m-lr-0">
                                            <label for="" class="control-label col-md-4 col-sm-4">Maximum Booking Limit </label>
                                            <div class="col-md-8 col-sm-8">
                                                <input class="form-control " id="medicartOffer_maximumBooking" type="text" name="medicartOffer_maximumBooking" required="" value="<?=set_value('medicartOffer_maximumBooking');?>" onkeypress="return isNumberKey(event)">
                                                 <label class="error"><?php echo form_error('medicartOffer_maximumBooking'); ?></label>
                                            </div>
                                        </article>

                                        <article class="form-group m-lr-0">
                                            <label for="cname" class="control-label col-md-4 col-sm-4">Publish Duration:</label>
                                            <div class="col-md-8 col-sm-8">
                                                <aside class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="input-group">
                                                            <input class="form-control pickDate" id="date-1" type="text" name="medicartOffer_startDate" placeholder="Date To" onkeydown="return false;" value="<?=set_value('medicartOffer_startDate');?>" autocomplete="off">
                                                             <label class="error"><?php echo form_error('medicartOffer_startDate'); ?></label>
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 m-t-xs-10">
                                                        <div class="input-group">
                                                            <input class="form-control pickDate" id="date-2" type="text" name="medicartOffer_endDate" placeholder="Date From" onkeydown="return false;" value="<?=set_value('medicartOffer_endDate');?>" autocomplete="off">
                                                             <label class="error"><?php echo form_error('medicartOffer_endDate'); ?></label>
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </aside>
                                                <label id="date_error" class="error"></label>
                                            </div>
                                        </article>

                                        <article class="form-group m-lr-0">
                                            <label for="cname" class="control-label col-md-4 col-sm-4">Discount Offer</label>
                                            <div class="col-md-8 col-sm-8">
                                                <div class="radio radio-success radio-inline">
                                                    <input type="radio" checked="" name="medicartOffer_discount" value="1" id="inlineRadio1" required="">
                                                    <label for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="radio radio-success radio-inline">
                                                    <input type="radio" name="medicartOffer_discount" value="0" id="inlineRadio2">
                                                    <label for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </article>

                                        <article class="form-group m-lr-0">
                                            <label for="cname" class="control-label col-md-4 col-sm-4">Discount for Age Group </label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="selectpicker" data-width="100%" name="medicartOffer_ageDiscount" id="medicartOffer_ageDiscount" required="">
                                                    <option value="10-20">10-20</option>
                                                    <option value="20-30">20-30</option>
                                                    <option value="30-40">30-40</option>
                                                    <option value="40-50">40-50</option>
                                                    <option value="50-60">50-60</option>
                                                    <option value="60-70">60-70</option>
                                                    <option value="70-80">70-80</option>
                                                    <option value="80-90">80-90</option>
                                                    <option value="90-100">90-100</option>
                                                </select>
                                                 <label class="error"><?php echo form_error('medicartOffer_ageDiscount'); ?></label>
                                            </div>
                                        </article>


                                        <article class="form-group m-lr-0">
                                            <label for="" class="control-label col-md-4 col-sm-4">Actual Pricing :</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input class="form-control " id="medicartOffer_actualPrice" type="text" name="medicartOffer_actualPrice" required="" placeholder="9000" value="<?=set_value('medicartOffer_actualPrice');?>" onkeypress="return isNumberKey(event)" >
                                                 <label class="error"><?php echo form_error('medicartOffer_actualPrice'); ?></label>
                                            </div>
                                        </article>

                                        <article class="form-group m-lr-0">
                                            <label for="" class="control-label col-md-4 col-sm-4">Discounted Pricing :</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input class="form-control " id="medicartOffer_discountPrice" type="text" name="medicartOffer_discountPrice" required="" placeholder="7000" value="<?=set_value('medicartOffer_discountPrice');?>" onkeypress="return isNumberKey(event)">
                                                 <label class="error"><?php echo form_error('medicartOffer_discountPrice'); ?></label>
                                            </div>
                                        </article>

                                        <!-- Other Info Section End -->

                                </div>
                            </section>
                            <section class="clearfix ">
                                <div class="col-md-12 m-t-20 m-b-20">
                                    <button type="reset" class="btn btn-danger waves-effect pull-right">Reset</button>
                                    <button type="submit" class="btn btn-success waves-effect waves-light pull-right m-r-20">Submit</button>
                                </div>

                            </section>
                         <div id="upload_modal_form">
                            <?php $this->load->view('upload_crop_modal');?>
                        </div>
                        </form>

                    </div>

                    <!-- consultation -->



                    <!-- Right Section End -->

                </div>

                <!-- container -->
            </div>
           