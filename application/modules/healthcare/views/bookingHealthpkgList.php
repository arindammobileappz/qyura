<!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container row">
                    <div class="clearfix">
                        <div class="col-md-12">
                            <h3 class="pull-left page-title">Health Package Booking</h3>

                        </div>
                    </div>

                    <!-- Left Section Start -->
                    <section class="col-md-12 detailbox">


                        <!-- Form Section Start -->
                        <article class="row p-b-10">
                            <form>
                                <aside class="col-md-2 col-sm-2">
                                    <a href="<?php echo base_url();?>index.php/healthcare/addHealthpkg" title="Add New Package" class="btn btn-appointment waves-effect waves-light" type="submit"><i class="fa fa-plus"></i> Add </a>
                                </aside>
                                <aside class="col-md-3 col-sm-3 m-tb-xs-3">
                                    <select class="selectpicker" data-width="100%" >
                                        <option>Select Category</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </aside>

                                <aside class="col-md-3 col-sm-3 m-tb-xs-3">
                                    <input type="text" name="search" class="form-control" placeholder="Search" />
                                </aside>
                                <aside class="col-md-2 col-sm-2 pull-right">
                                    <button class="btn btn-appointment waves-effect waves-light m-l-10 pull-right" type="submit">Export</button>
                                </aside>

                            </form>
                        </article>
                        <!-- Form Section End -->

                        <div class="bg-white">
                            <!-- Table Section Start -->

                            <article class="clearfix m-top-40 p-b-20">
                                <aside class="table-responsive">
                                    <table class="table" id="bookingHealthPkgTable">
                                        <thead>
                                            <tr class="border-a-dull">
                                                <th>MI Name</th>
                                                <th>booking Id</th>
                                                <th>Package Name</th>
                                                <th>Booked By</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                        </thead>
                                    </table>

                                </aside>
                            </article>
                            <!-- Table Section End -->
                        </div>

                    </section>
                    <!-- Left Section End -->

                </div>

                <!-- container -->
            </div>
            <!-- content -->
        </div>
        <!-- End Right content here -->
    <!-- END wrapper -->