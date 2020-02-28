<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <?php require_once('includes/site-master-dashboard.php'); ?>
</head>

<body class="header-light sidebar-dark sidebar-expand">
    <div id="wrapper" class="wrapper">
        <?php require_once('includes/header.php'); ?>
        <div class="content-wrapper">
            <?php require_once('includes/sidebar.php'); ?>

            <main class="main-wrapper clearfix">
                <!-- Page Title Area -->
                <div class="row page-title clearfix">
                    <div class="page-title-left">
                        <h5 class="mr-0 mr-r-5">Dashboard</h5>
                        <p class="mr-0 text-muted hidden-sm-down">statistics, charts, events and reports</p>
                    </div>
                    <!-- /.page-title-left -->
                    <div class="page-title-right d-inline-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="d-inline-flex justify-center align-items-center hidden-sm-down"><a href="javascript: void(0);" class="btn btn-outline-primary mr-l-20 btn-sm btn-rounded hidden-xs hidden-sm ripple" target="_blank">Buy Now</a>
                        </div>
                    </div>
                    <!-- /.page-title-right -->
                </div>
                <!-- /.page-title -->
                <!-- =================================== -->
                <!-- Different data widgets ============ -->
                <!-- =================================== -->
            <div class="widget-list">
                <!-- Counters -->
                <div class="row">


                    <div class="col-md-12 col-12 widget-holder">
                        <div class="widget-bg text-inverse">
                            <div class="widget-body">
                                <div class="widget-counter">
                                    <div class="form-group mr-2">
                                        <div class="input-group" style="top: 14px !important;">
                                            <div class="input-group-addon">Refer. ID</div>
                                            <input class="form-control" style="border-left: 1px solid #fff; border-right: 1px solid #fff;" id="foo" value="<?php echo base_url() ?>user/registerForm/<?php echo $_SESSION['userData']['referId']; ?>" type="text">
                                            <button class="btn btn-default input-group-addon" id="copyBtn" data-clipboard-action="copy" data-clipboard-target="#foo">Copy!</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Counter: Sales -->
                    <div class="col-md-3 col-6 widget-holder">
                        <div class="widget-bg bg-primary text-inverse">
                            <div class="widget-body">
                                <div class="widget-counter">
                                    <h6>Total Investment <small class="text-inverse">Last week</small></h6>
                                    <h3 class="h1">&dollar;<span class="counter">
									<?php $i=1; 
										$sum=0;
										
										 //print_r($orderhistory);
										
										foreach($orderhistory as $value){ ?>
										<?php 
										  
											 $sum+=$value['amount_usd'];
											?>
											<?php $i++; }
										 echo $sum;
										 ?>
									</span></h3><i class="material-icons list-icon">add_shopping_cart</i>
                                </div>
                                <!-- /.widget-counter -->
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                    <!-- Counter: Subscriptions -->
                    <div class="col-md-3 col-6 widget-holder">
                        <div class="widget-bg bg-color-scheme text-inverse">
                            <div class="widget-body clearfix">
                                <div class="widget-counter">
                                    <h6>Total Earnings <small class="text-inverse">This Month</small></h6>
                                    <h3 class="h1">$<span class="counter">346</span></h3><i class="material-icons list-icon">event_available</i>
                                </div>
                                <!-- /.widget-counter -->
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                    <!-- Counter: Users -->
                    <div class="col-md-3 col-6 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <div class="widget-counter">
                                    <h6>New Active Members <small>Last 7 days</small></h6>
                                    <h3 class="h1"><span class="counter">625</span></h3><i class="material-icons list-icon">public</i>
                                </div>
                                <!-- /.widget-counter -->
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                    <!-- Counter: Pageviews -->
                    <div class="col-md-3 col-6 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <div class="widget-counter">
                                    <h6>Total Team investment <small>Last 24 Hours</small></h6>
                                    <h3 class="h1">$<span class="counter">2748</span></h3><i class="material-icons list-icon">show_chart</i>
                                </div>
                                <!-- /.widget-counter -->
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                </div>
                <!-- /.row -->
                <!-- Chart Group 1 -->
                <div class="row">
                    <!-- Chart: Registration History -->
                    <div class="col-md-7 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-heading clearfix">
                                <h5>LIVE MINING PROFIT</h5>
                                <ul class="widget-actions">
                                    <li class="dropdown">
                                        <div class="predefinedRanges float-right fs-13 fw-500" style="cursor: pointer"><i class="list-icon material-icons color-danger">fiber_manual_record</i>  <span></span>  <i class="list-icon material-icons">expand_more</i>
                                        </div>
                                    </li>
                                </ul>
                                <!-- /.widget-actions -->
                            </div>
                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix">
                                <div class="row">
                                    <p class="col-sm-6 small">The registrations are measured from the time that the redesign was fully implemented and after the first-e-mailing.</p>
                                    <div class="col-sm-6 text-right">
                                        <h5 class="h1 fw-300 sub-heading-font-family color-danger mr-tb-0">66.05&#37;</h5><small><i class="material-icons list-icon color-danger">arrow_drop_up</i> more registrations</small>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div id="extraAreaMorris" style="height: 280px"></div>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                    <!-- Charts: Sales Statistics -->
                    <div class="col-md-5 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-heading clearfix">
                                <h5>New Sales</h5>
                                <ul class="widget-actions">
                                    <li class="dropdown">
                                        <div class="predefinedRanges float-right fs-13 fw-500" style="cursor: pointer"><i class="list-icon material-icons color-danger">fiber_manual_record</i>  <span></span>  <i class="list-icon material-icons">expand_more</i>
                                        </div>
                                    </li>
                                </ul>
                                <!-- /.widget-actions -->
                            </div>
                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix">
                                <div class="row">
                                    <div class="col-4 mr-b-20 text-center">
                                        <h6 class="h5 mr-b-0 mr-t-10"><i class="list-icon material-icons mr-r-5 small">shop</i> 1481</h6><small>orders weekly</small>
                                    </div>
                                    <div class="col-4 mr-b-20 text-center">
                                        <h6 class="h5 mr-b-0 mr-t-10"><i class="list-icon material-icons mr-r-5 small">date_range</i> 5,678</h6><small>orders monthly</small>
                                    </div>
                                    <div class="col-4 mr-b-20 text-center">
                                        <h6 class="h5 mr-b-0 mr-t-10"><i class="list-icon material-icons small">attach_money</i> 27,321</h6><small>orders weekly</small>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div id="productLineHomeMorris" style="height: 280px"></div>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                </div>
                <!-- /.row -->
                <!-- Chart Group 2 -->
                <div class="row">
                    <!-- Charts: Tasks -->
                    <div class="col-md-4 col-sm-6 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <h6 class="mr-t-0 mr-b-5 fw-700">Your Tasks</h6>
                                <p class="text-muted">Calculated in the last 7 days</p>
                                <div class="row text-center">
                                    <div class="col-6">
                                        <div class="progress-stats-round text-center">
                                            <input data-plugin="knob" data-width="90" data-height="90" data-bgcolor="#ebeff2" data-fgcolor="#fb9678" data-displayinput="false" value="62" data-readonly="true" data-thickness=".05"> <i class="list-icon material-icons color-primary">loyalty</i>
                                            <h4 class="color-primary mr-tb-10">62%</h4>
                                            <h6 class="mr-b-5 mr-t-0">Satisfaction Rate</h6><small>54% Average</small>
                                        </div>
                                        <div class="mr-tb-20" id="homeSparkline1"></div>
                                    </div>
                                    <div class="col-6">
                                        <div class="progress-stats-round text-center">
                                            <input data-plugin="knob" data-width="90" data-height="90" data-bgcolor="#ebeff2" data-fgcolor="#03a9f3" data-displayinput="false" value="86" data-readonly="true" data-thickness=".05"> <i class="list-icon material-icons color-info">developer_board</i>
                                            <h4 class="color-info mr-tb-10">86%</h4>
                                            <h6 class="mr-b-5 mr-t-0">Productivity Goal</h6><small>82% average</small>
                                        </div>
                                        <div class="mr-t-20" id="homeSparkline2"></div>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                    <!-- Charts: Projects -->
                    <div class="col-md-4 col-sm-6 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <h6 class="mr-t-0 mr-b-5 fw-700">Your Projects</h6>
                                <p class="text-muted">Calculated in the last 30 days</p>
                                <div id="siteVisitMorris" style="margin-left:-15px; margin-right:-15px; height: 270px"></div>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                    <!-- Charts: Sales -->
                    <div class="col-md-4 col-sm-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <h6 class="mr-t-0 mr-b-5 fw-700">Your Sales</h6>
                                <p class="text-muted">A general overview of your sales</p>
                                <div id="barMorris" style="margin-left:-15px; margin-right:-15px; height: 270px"></div>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                </div>
                <!-- /.user -->
                <!-- Activity & Social Feeds -->
                <div class="row">
                    <!-- Activity Feed -->
                    <div class="col-lg-9 col-md-8 col-sm-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <h5 class="box-title">Activity Feed</h5>
                                <ul class="list-unstyled widget-activity">
                                    <li class="media">
                                        <div class="d-flex mr-3">
                                            <figure class="user--online thumb-xs">
                                                <img src="assets/demo/users/user1.jpg" class="rounded-circle" alt="">
                                            </figure>
                                        </div>
                                        <div class="media-body"><span class="badge badge-pink py-1 px-2 fs-11 fw-500 mr-1 text-uppercase text-inverse">File</span>
                                            <h6 class="media-heading inline-block"><strong><a href="index.html#">Eddie</a></strong> uploaded new files: <small>2 hours ago</small></h6>
                                            <p class="media-body-content">Hi <strong>&#64;everyone</strong>, the new designs are attached. Go check them out and let me know if I missed anything. Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum
                                                suscipit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Thanks!</p>
                                            <div class="row">
                                                <div class="col-2 widget-body-image-list">
                                                    <figure>
                                                        <a href="index.html#">
                                                            <img src="assets/demo/widget-activity/1.jpeg">
                                                        </a>
                                                        <figcaption>Red Motor Scooter<small>PNG - 100KB</small>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                                <div class="col-2 widget-body-image-list">
                                                    <figure>
                                                        <a href="index.html#">
                                                            <img src="assets/demo/widget-activity/2.jpeg">
                                                        </a>
                                                        <figcaption>Road Sign Close-up<small>PNG - 120KB</small>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                                <div class="col-2 widget-body-image-list">
                                                    <figure>
                                                        <a href="index.html#">
                                                            <img src="assets/demo/widget-activity/3.jpeg">
                                                        </a>
                                                        <figcaption>Graffiti Art<small>PNG - 200KB</small>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                                <div class="col-2 widget-body-image-list">
                                                    <figure>
                                                        <a href="index.html#">
                                                            <img src="assets/demo/widget-activity/4.jpeg">
                                                        </a>
                                                        <figcaption>Red Motor Scooter<small>PNG - 100KB</small>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="d-flex mr-3">
                                            <figure class="user--offline thumb-xs">
                                                <img src="assets/demo/users/user6.jpg" class="rounded-circle" alt="">
                                            </figure>
                                        </div>
                                        <div class="media-body"><span class="badge badge-success py-1 px-2 fs-11 fw-500 mr-1 text-uppercase text-inverse">Task</span>
                                            <h6 class="media-heading inline-block"><strong><a href="index.html#">Sarah</a></strong> marked the <strong>Pending Review</strong>: <a href="index.html#">Trash Can Icon Design</a> <small>2 days ago</small></h6>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="d-flex mr-3">
                                            <figure class="user--online thumb-xs">
                                                <img src="assets/demo/users/user2.jpg" class="rounded-circle" alt="">
                                            </figure>
                                        </div>
                                        <div class="media-body"><span class="badge badge-purple py-1 px-2 fs-11 fw-500 mr-1 text-uppercase text-inverse">Comment</span>
                                            <h6 class="media-heading inline-block"><strong><a href="index.html#">Okyun</a></strong> posted a task: <a href="index.html#">Design a new Homepage</a> <small>8 hours ago</small></h6>
                                            <p class="media-body-content">Hey <strong><a href="index.html#">&#64;James</a></strong>, I don't believe that will be neccessary. We will just instruct the devs to build this using percent widths so it will look good on all screens. So, this way we
                                                don't have to spend even more time on this!</p>
                                        </div>
                                    </li>
                                </ul>
                                <!-- /.widget-activity -->
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                    <!-- Social Feed: Twitter -->
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="widget-holder">
                            <div class="widget-bg bg-twitter color-white pd-0">
                                <div class="widget-body clearfix">
                                    <div class="twitter-widget" style="height: 280px" data-plugin-options='{"screen_name": "elonmusk", "count": 3}'></div>
                                </div>
                                <!-- /.widget-body -->
                            </div>
                            <!-- /.widget-bg -->
                        </div>
                        <!-- /.widget-holder -->
                        <!-- Social Feed: Facebook -->
                        <div class="widget-holder">
                            <div class="widget-bg bg-facebook color-white pd-0">
                                <div class="widget-body clearfix">
                                    <div class="facebook-widget" style="height: 280px" data-plugin-options='{"user": "envato", "limit": 3}'></div>
                                </div>
                                <!-- /.widget-body -->
                            </div>
                            <!-- /.widget-bg -->
                        </div>
                        <!-- /.widget-holder -->
                    </div>
                </div>
                <!-- /.row -->
                <!-- Other Widgets -->
                <div class="row">
                    <!-- Calender -->
                    <div class="col-lg-4 col-md-6 col-sm-12 widget-holder">
                        <div class="widget-bg bg-color-scheme color-white pd-0">
                            <div class="widget-body clearfix">
                                <div id="custom-clndr" data-toggle="clndr">
                                    <script type="text/template" class="template">
                                        <div class="clndr-controls mr-b-20 clearfix">
                                          	                <h5 class="clndr-title float-left mr-tb-0">Time Machine</h5>
                                          	                <div class="float-right">
                                          	                  <div class="clndr-previous-button float-left"><i class="material-icons">chevron_left</i></div>
                                          	                  <div class="clndr-next-button float-right"><i class="material-icons">chevron_right</i></div>
                                          	                </div>
                                          	                <div class="text-right current-month text-uppercase"><%= month.substr(0,3) %> <%= year %></div>
                                          	              </div>
                                          	              <div class="clndr-grid">
                                          	                <div class="days"> <% _.each(days, function(day) { %> <div class="text-center <%= day.classes %>" id="<%= day.id %>"><span class="day-number"><%= day.day %></span></div> <% }); %> </div>
                                          	              </div><!-- /.clndr-grid --> <% if( !_.isEmpty(extras.selectedDay.events) ) { %> <div class="event-listing row">
                                          	                  <div class="col-3 col-sm-3">
                                          	                    <div class="selected-date">
                                          	                      <span class="date"><%= moment(extras.selectedDay.date._d).format("D") %></span>
                                          	                      <span class="color-color-scheme"><%= moment(extras.selectedDay.date._d).format("Do").substr(-2) %></span>
                                          	                    </div><!-- /.selected-date -->
                                          	                  </div><!-- /.col-3 -->
                                          	                  <div class="col-9 col-sm-9"> <% _.each(extras.selectedDay.events, function(event) { %> <div class="event-item">
                                          	                        <span class="event-item-time"><%= moment(event.date).format("kk:mm") %></span>
                                          	                        <span class="event-item-title"><%= event.title %></span>
                                          	                        <span class="event-item-icon color-color-scheme"><i class="material-icons md-18"><%= event.icon%></i></span>
                                          	                      </div> <% }); %> </div><!-- /.col-9 -->
                                          	                </div><!-- /.event-listing --> <% } %>
                                    </script>
                                    <script type="text/json" class="events">
                                        {
                                          								"events" : [
                                          									{
                                          										"date": "2017-08-14T13:00:00+05:30",
                                          										"title": "Friends Golf Meet",
                                          										"icon": "golf_course"
                                          									},
                                          									{
                                          										"date": "2017-08-25T10:00:00+05:30",
                                          										"title": "Alumini Awards",
                                          										"icon": "school"
                                          									},
                                          									{
                                          										"date": "2017-08-25T13:00:00+05:30",
                                          										"title": "Meeting",
                                          										"icon": "business_center"
                                          									},
                                          									{
                                          										"date": "2017-08-04T08:00:00+05:30",
                                          										"title": "Friends Reunion",
                                          										"icon": "face"
                                          									},
                                          									{
                                          										"date": "2017-08-04T21:00:00+05:30",
                                          										"title": "Beach Party",
                                          										"icon": "beach_access"
                                          									},
                                          									{
                                          										"date": "2017-08-13T13:00:00+05:30",
                                          										"title": "Friends Golf Meet",
                                          										"icon": "golf_course"
                                          									},
                                          									{
                                          										"date": "2017-08-26T10:00:00+05:30",
                                          										"title": "Alumini Awards",
                                          										"icon": "school"
                                          									},
                                          									{
                                          										"date": "2017-08-24T10:00:00+05:30",
                                          										"title": "Alumini Awards",
                                          										"icon": "school"
                                          									},
                                          									{
                                          										"date": "2017-08-24T13:00:00+05:30",
                                          										"title": "Meeting",
                                          										"icon": "business_center"
                                          									}
                                          								]
                                          							}
                                    </script>
                                </div>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                    <!-- Weather -->
                    <div class="col-lg-4 col-md-6 col-sm-12 widget-holder">
                        <div class="widget-bg-transparent">
                            <div class="widget-body clearfix">
                                <div class="weather-card-image-dark text-inverse" style="background-image: url(assets/demo/weather-image/weather-cloud.jpg)"><i class="wi wi-showers"></i>
                                    <div class="weather-caption"><span class="h1 fw-300 sub-heading-font-family"><span class="color-color-scheme">75&deg;</span></span>
                                        <h5 class="mr-t-10">Cloudy Skies<br><small class="opacity-06">Sicklervilte, New Jersey</small></h5>
                                    </div>
                                    <div class="weather-date bg-color-scheme text-inverse text-center"><span>May<br><strong>21</strong></span>
                                    </div>
                                </div>
                                <!-- /.weather-card-image-dark -->
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                    <!-- To Do -->
                    <div class="col-lg-4 col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body">
                                <h5 class="box-title">To do Widget</h5>
                                <div class="todo-widget">
                                    <ol>
                                        <li data-checked="true">Lorem ipsum dolor sit amet</li>
                                        <li>Nunc est metus, hendrerit ac.</li>
                                        <li>Ut feugiat sed velit quis molestie.</li>
                                        <li>Suspendisse ac risus ac arcu.</li>
                                        <li>hendrerit ac sollicitudin vel.</li>
                                    </ol>
                                </div>
                                <!-- /.todo-widget -->
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <!-- User List: User Registrations -->
                    <div class="col-md-5 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <h5 class="box-title">User Registrations</h5>
                                <ul class="list-unstyled widget-user-list">
                                    <li class="media">
                                        <div class="d-flex mr-3">
                                            <a href="index.html#" class="user--online thumb-xs">
                                                <img src="assets/demo/users/user1.jpg" class="rounded-circle" alt="">
                                            </a>
                                        </div>
                                        <div class="media-body"><a href="index.html#" class="btn btn-outline-default">Follow</a>
                                            <h5 class="media-heading"><a href="index.html#">Nick Lampard</a> <small>@kingnick24</small></h5>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="d-flex mr-3">
                                            <a href="index.html#" class="user--busy thumb-xs">
                                                <img src="assets/demo/users/user2.jpg" class="rounded-circle" alt="">
                                            </a>
                                        </div>
                                        <div class="media-body"><a href="index.html#" class="btn btn-success">Following</a>
                                            <h5 class="media-heading"><a href="index.html#">Ashley Wilson</a> <small>@AshWilson123</small></h5>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="d-flex mr-3">
                                            <a href="index.html#" class="user--online thumb-xs">
                                                <img src="assets/demo/users/user3.jpg" class="rounded-circle" alt="">
                                            </a>
                                        </div>
                                        <div class="media-body"><a href="index.html#" class="btn btn-outline-default">Follow</a>
                                            <h5 class="media-heading"><a href="index.html#">Shannon Wang Lee</a> <small>@Shalee_42</small></h5>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="d-flex mr-3">
                                            <a href="index.html#" class="user--away thumb-xs">
                                                <img src="assets/demo/users/user6.jpg" class="rounded-circle" alt="">
                                            </a>
                                        </div>
                                        <div class="media-body"><a href="index.html#" class="btn btn-outline-default">Follow</a>
                                            <h5 class="media-heading"><a href="index.html#">Emily Lee</a> <small>@emilyLee</small></h5>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="d-flex mr-3">
                                            <a href="index.html#" class="user--online thumb-xs">
                                                <img src="assets/demo/users/user-image.png" class="rounded-circle" alt="">
                                            </a>
                                        </div>
                                        <div class="media-body"><a href="index.html#" class="btn btn-outline-default">Follow</a>
                                            <h5 class="media-heading"><a href="index.html#">Scott Adams</a> <small>@scott_adams</small></h5>
                                        </div>
                                    </li>
                                </ul>
                                <!-- /.widget-user-list -->
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                    <!-- Table: Order Status -->
                    <div class="col-md-7 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <h5 class="box-title">Recent Order Status</h5>
                                <div class="padded-reverse">
                                    <table class="table table-striped widget-status-table mr-b-0">
                                        <thead>
                                            <tr>
                                                <th class="pd-l-20">Orders</th>
                                                <th>Status</th>
                                                <th class="hidden-xs">Date</th>
                                                <th class="text-right pd-r-20">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th class="pd-l-20"><a href="index.html#">Tarcho Tee</a>
                                                </th>
                                                <td><span class="badge badge-info text-inverse">Complete</span>
                                                </td>
                                                <td class="text-muted hidden-xs">July 31,2017</td>
                                                <td class="text-right"><a href="index.html#"><i class="material-icons list-icon md-18 text-muted">edit</i></a>  <a href="index.html#"><i class="material-icons list-icon md-18 text-muted">delete</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="pd-l-20"><a href="index.html#">Athlete Tee</a>
                                                </th>
                                                <td><span class="badge badge-danger text-inverse">Pending</span>
                                                </td>
                                                <td class="text-muted hidden-xs">April 12, 2017</td>
                                                <td class="text-right"><a href="index.html#"><i class="material-icons list-icon md-18 text-muted">edit</i></a>  <a href="index.html#"><i class="material-icons list-icon md-18 text-muted">delete</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="pd-l-20"><a href="index.html#">Namche Zip Tee</a>
                                                </th>
                                                <td><span class="badge badge-warning text-inverse">Delivered</span>
                                                </td>
                                                <td class="text-muted hidden-xs">August 3, 2017</td>
                                                <td class="text-right"><a href="index.html#"><i class="material-icons list-icon md-18 text-muted">edit</i></a>  <a href="index.html#"><i class="material-icons list-icon md-18 text-muted">delete</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="pd-l-20"><a href="index.html#">Asaar Jacket</a>
                                                </th>
                                                <td><span class="badge badge-info text-inverse">Complete</span>
                                                </td>
                                                <td class="text-muted hidden-xs">August 12, 2017</td>
                                                <td class="text-right"><a href="index.html#"><i class="material-icons list-icon md-18 text-muted">edit</i></a>  <a href="index.html#"><i class="material-icons list-icon md-18 text-muted">delete</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="pd-l-20"><a href="index.html#">Everest Zip Jacket</a>
                                                </th>
                                                <td><span class="badge badge-danger text-inverse">Pending</span>
                                                </td>
                                                <td class="text-muted hidden-xs">March 1, 2017</td>
                                                <td class="text-right"><a href="index.html#"><i class="material-icons list-icon md-18 text-muted">edit</i></a>  <a href="index.html#"><i class="material-icons list-icon md-18 text-muted">delete</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="pd-l-20"><a href="index.html#">Namche Zip Tee</a>
                                                </th>
                                                <td><span class="badge badge-warning text-inverse">Delivered</span>
                                                </td>
                                                <td class="text-muted hidden-xs">August 3, 2017</td>
                                                <td class="text-right"><a href="index.html#"><i class="material-icons list-icon md-18 text-muted">edit</i></a>  <a href="index.html#"><i class="material-icons list-icon md-18 text-muted">delete</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="pd-l-20"><a href="index.html#">Tarcho Tee</a>
                                                </th>
                                                <td><span class="badge badge-info text-inverse">Complete</span>
                                                </td>
                                                <td class="text-muted hidden-xs">July 31,2017</td>
                                                <td class="text-right"><a href="index.html#"><i class="material-icons list-icon md-18 text-muted">edit</i></a>  <a href="index.html#"><i class="material-icons list-icon md-18 text-muted">delete</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="pd-l-20"><a href="index.html#">Namche Zip Tee</a>
                                                </th>
                                                <td><span class="badge badge-warning text-inverse">Delivered</span>
                                                </td>
                                                <td class="text-muted hidden-xs">August 3, 2017</td>
                                                <td class="text-right"><a href="index.html#"><i class="material-icons list-icon md-18 text-muted">edit</i></a>  <a href="index.html#"><i class="material-icons list-icon md-18 text-muted">delete</i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- /.widget-status-table -->
                                </div>
                                <!-- /.padded-reverse -->
                            </div>
                            <!-- /.widget-body badge -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.widget-list -->
        </main>
        <!-- /.main-wrappper -->
        <!-- RIGHT SIDEBAR -->
        <aside class="right-sidebar scrollbar-enabled">
            <div class="sidebar-chat" data-plugin="chat-sidebar">
                <div class="sidebar-chat-info">
                    <h3>Chat</h3>
                    <p class="text-muted">You can chat with your family and friends in this space.</p>
                </div>
                <div class="chat-list">
                    <h6 class="sidebar-chat-subtitle">Online</h6>
                    <div class="list-group row">
                        <a href="javascript:void(0)" class="list-group-item user--online thumb-xs" data-chat-user="Julein Renvoye">
                            <img src="assets/demo/users/user1.jpg" class="rounded-circle" alt=""> <span class="name">Julien Renvoye</span>  <span class="username">@jrenvoye</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--online thumb-xs" data-chat-user="Eddie Lebanovkiy">
                            <img src="assets/demo/users/user2.jpg" class="rounded-circle" alt=""> <span class="name">Eddie Lebanovskiy</span>  <span class="username">@elebano</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--away thumb-xs" data-chat-user="Cameron Moll">
                            <img src="assets/demo/users/user3.jpg" class="rounded-circle" alt=""> <span class="name">Cameron Moll</span>  <span class="username">@cammoll</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--busy thumb-xs" data-chat-user="Bill S Kenny">
                            <img src="assets/demo/users/user7.jpg" class="rounded-circle" alt=""> <span class="name">Bill S Kenny</span>  <span class="username">@billsk</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--busy thumb-xs" data-chat-user="Trent Walton">
                            <img src="assets/demo/users/user6.jpg" class="rounded-circle" alt=""> <span class="name">Trent Walton</span>  <span class="username">@trentwalton</span>
                        </a>
                    </div>
                    <!-- /.list-group -->
                </div>
                <!-- /.chat-list -->
                <div class="chat-list">
                    <h6 class="sidebar-chat-subtitle">Offline</h6>
                    <div class="list-group row">
                        <a href="javascript:void(0)" class="list-group-item user--offline thumb-xs" data-chat-user="Julien Renvoye">
                            <img src="assets/demo/users/user1.jpg" class="rounded-circle" alt=""> <span class="name">Julien Renvoye</span>  <span class="username">@jrenvoye</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--offline thumb-xs" data-chat-user="Eddie Lebaovskiy">
                            <img src="assets/demo/users/user2.jpg" class="rounded-circle" alt=""> <span class="name">Eddie Lebanovskiy</span>  <span class="username">@elebano</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--offline thumb-xs" data-chat-user="Cameron Moll">
                            <img src="assets/demo/users/user3.jpg" class="rounded-circle" alt=""> <span class="name">Cameron Moll</span>  <span class="username">@cammoll</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--offline thumb-xs" data-chat-user="Bill S Kenny">
                            <img src="assets/demo/users/user7.jpg" class="rounded-circle" alt=""> <span class="name">Bill S Kenny</span>  <span class="username">@billsk</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--offline thumb-xs" data-chat-user="Trent Walton">
                            <img src="assets/demo/users/user6.jpg" class="rounded-circle" alt=""> <span class="name">Trent Walton</span>  <span class="username">@trentwalton</span>
                        </a>
                    </div>
                    <!-- /.list-group -->
                </div>
                <!-- /.chat-list -->
            </div>
            <!-- /.sidebar-chat -->
        </aside>
        <!-- CHAT PANEL -->
        <div class="chat-panel" hidden>
            <div class="card">
                <div class="card-header">
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <button type="button" class="minimize" aria-label="Minimize"><span aria-hidden="true"><i class="material-icons">expand_more</i></span>
                    </button> <span class="user-name">John Doe</span>
                </div>
                <!-- /.card-header -->
                <div class="card-block custom-scroll">
                    <div class="messages custom-scroll-content scrollbar-enabled">
                        <div class="current-user-message">
                            <img class="user-image" width="30" height="30" src="assets/demo/users/user1.jpg" alt="">
                            <div class="message">
                                <p>Lorem ipsum dolor sit amet?</p><small>10:00 am</small>
                            </div>
                            <!-- /.message -->
                        </div>
                        <!-- /.current-user-message -->
                        <div class="other-user-message">
                            <img class="user-image" width="30" height="30" src="assets/demo/users/user2.jpg" alt="">
                            <div class="message">
                                <p>Etiam rhoncus. Maecenas tempus, tellus eget condi mentum rhoncus</p><small>10:00 am</small>
                            </div>
                            <!-- /.message -->
                        </div>
                        <!-- /.other-user-message -->
                        <div class="current-user-message">
                            <img class="user-image" width="30" height="30" src="assets/demo/users/user1.jpg" alt="">
                            <div class="message">
                                <img src="assets/demo/chat-message.jpg" alt=""> <small>10:00 am</small>
                            </div>
                            <!-- .,message -->
                        </div>
                        <!-- /.current-user-message -->
                        <div class="current-user-message">
                            <img class="user-image" width="30" height="30" src="assets/demo/users/user1.jpg" alt="">
                            <div class="message">
                                <p>Maecenas nec odio et ante tincidunt tempus.</p><small>10:00 am</small>
                            </div>
                            <!-- .,message -->
                        </div>
                        <!-- /.current-user-message -->
                        <div class="other-user-message">
                            <img class="user-image" width="30" height="30" src="assets/demo/users/user2.jpg" alt="">
                            <div class="message">
                                <p>Donec sodales :)</p><small>10:00 am</small>
                            </div>
                            <!-- /.message -->
                        </div>
                        <!-- /.other-user-message -->
                    </div>
                    <!-- /.messages -->
                    <form action="javascript:void(0)" method="post">
                        <textarea name="message" style="resize: none" placeholder="Type message and hit enter"></textarea>
                        <ul class="list-unstyled list-inline chat-extra-buttons">
                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="material-icons">insert_emoticon</i></a>
                            </li>
                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="material-icons">attach_file</i></a>
                            </li>
                        </ul>
                        <button class="btn btn-color-scheme btn-circle submit-btn" type="submit"><i class="material-icons">send</i>
                        </button>
                    </form>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.chat-panel -->
    </div>
    <!-- /.content-wrapper -->
    <?php require_once('includes/footer.php'); ?>
    <script>
        var clipboard = new Clipboard('#copyBtn');

        clipboard.on('success', function(e) {
            alert("Copied To Clipboard");
        });

        clipboard.on('error', function(e) {
            console.log(e);
        });
    </script>
</body>

</html>
