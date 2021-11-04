<template>
    <div class="social-dash-wrap">
        <div class="row">
            <div class="col-lg-12">

                <div class="breadcrumb-main">
                    <div class="d-flex align-items-center">
                        <h4 class="text-capitalize breadcrumb-title mr-3">Analytics of Demo Campaign 1</h4>
                        <div class="project-tap global-shadow order-lg-1 order-2 my-10 bg-transparent">
                            <ul class="nav px-1" id="ap-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="ap-overview-tab" data-toggle="pill"
                                       href="javascript:void(0)"
                                       @click="showTrafficChart = false"
                                       role="tab" aria-controls="ap-overview" aria-selected="false">Overall</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="timeline-tab" data-toggle="pill" href="#timeline"
                                       role="tab" aria-controls="timeline" aria-selected="true">Respondents</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="activity-tab" data-toggle="pill" href="#activity" role="tab"
                                       aria-controls="activity" aria-selected="false">Finance</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="late-tab" data-toggle="pill" href="javascript:void(0)"
                                       role="tab"
                                       @click="showTrafficChart = true"
                                       aria-controls="late" aria-selected="false">Traffic</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="early-tab" data-toggle="pill" href="#early" role="tab"
                                       aria-controls="early" aria-selected="false">Feedback</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <div class="action-btn">

                            <div class="form-group mb-0">
                                <div class="input-container icon-left position-relative">
                                                <span class="input-icon icon-left">
                                                    <span data-feather="calendar"></span>
                                                </span>
                                    <input type="text" class="form-control form-control-default date-ranger"
                                           name="date-ranger" placeholder="Oct 30, 2019 - Nov 30, 2019">
                                    <span class="input-icon icon-right">
                                                    <span data-feather="chevron-down"></span>
                                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown action-btn">
                            <button class="btn btn-sm btn-default btn-white dropdown-toggle" type="button"
                                    id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                <i class="la la-download"></i> Export
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <a href="#" class="dropdown-item">
                                    <i class="la la-print"></i> Respondents</a>
                                <a href="#" class="dropdown-item">
                                    <i class="la la-file-pdf"></i> Sales Report</a>
                                <a href="#" class="dropdown-item">
                                    <i class="la la-file-text"></i> Campaign Report</a>
                                <a href="#" class="dropdown-item">
                                    <i class="la la-file-excel"></i> Traffic Report</a>
                            </div>
                        </div>
                        <div class="dropdown action-btn">
                            <button class="btn btn-sm btn-default btn-white dropdown-toggle" type="button"
                                    id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                <i class="la la-share"></i> Share
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                                <span class="dropdown-item">View all orders</span>
                                <div class="dropdown-divider"></div>
                                <a href="" class="dropdown-item">
                                    <i class="la la-facebook"></i> Facebook</a>
                                <a href="" class="dropdown-item">
                                    <i class="la la-twitter"></i> Twitter</a>
                                <a href="" class="dropdown-item">
                                    <i class="la la-google"></i> Google</a>
                                <a href="" class="dropdown-item">
                                    <i class="la la-feed"></i> Feed</a>
                                <a href="" class="dropdown-item">
                                    <i class="la la-instagram"></i> Instagram</a>
                            </div>
                        </div>
                        <div class="action-btn">
                            <a href="#" class="btn btn-sm btn-primary btn-add">
                                <i class="la la-eye"></i> Preview
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-3 col-xxl-3 col-ssm-12 mb-30">
                <!-- Card 2 End  -->
                <div class="ap-po-details ap-po-details--2 p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>


                        <div class="overview-content">
                            <h1>7,461</h1>
                            <p>Feedback</p>
                            <div class="ap-po-details-time">
                                            <span class="color-success"><i class="las la-arrow-up"></i>
                                                <strong>25%</strong></span>
                                <small>Since last week</small>
                            </div>
                        </div>

                    </div>
                    <div class="ap-po-timeChart">
                        <div class="overview-single__chart d-md-flex align-items-end">
                            <div class="parentContainer">


                                <div>
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="mychart12" height="93" width="130" class="chartjs-render-monitor"
                                            style="display: block; width: 130px; height: 93px;"></canvas>
                                </div>


                                <div class="chartjs-tooltip bottom top"
                                     style="opacity: 0; left: 18.5714px; top: -43.6875px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 12px; font-style: normal; padding: 6px;">
                                    <table>
                                        <thead></thead>
                                        <div class="tooltip-title">Jan</div>
                                        <tbody>
                                        <tr>
                                            <td><span class="chartjs-tooltip-key"
                                                      style="background:#FF69A5; border-color:transparent; border-width: 2px; border-radius: 30px"></span><span
                                                class="chart-data">45</span> <span class="data-label">New Contact</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 2 End  -->
            </div>
            <div class="col-xl-3 col-xxl-3 col-ssm-12 mb-30">
                <!-- Card 1 -->
                <div class="ap-po-details ap-po-details--2 p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>


                        <div class="overview-content">
                            <h1>3,254</h1>
                            <p>Revenue</p>
                            <div class="ap-po-details-time">
                                            <span class="color-success"><i class="las la-arrow-up"></i>
                                                <strong>25%</strong></span>
                                <small>Since last week</small>
                            </div>
                        </div>

                    </div>
                    <div class="ap-po-timeChart">
                        <div class="overview-single__chart d-md-flex align-items-end">
                            <div class="parentContainer">


                                <div>
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="mychart13" height="93" width="130" class="chartjs-render-monitor"
                                            style="display: block; width: 130px; height: 93px;"></canvas>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 1 End -->
            </div>
            <div class="col-xl-3 col-xxl-3 col-ssm-12 mb-30">
                <!-- Card 3 -->
                <div class="ap-po-details ap-po-details--2 p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>


                        <div class="overview-content">
                            <h1>$3,241</h1>
                            <p>Avg. Order Value</p>
                            <div class="ap-po-details-time">
                                            <span class="color-danger"><i class="las la-arrow-down"></i>
                                                <strong>8.2%</strong></span>
                                <small>Since last week</small>
                            </div>
                        </div>

                    </div>
                    <div class="ap-po-timeChart">
                        <div class="overview-single__chart d-md-flex align-items-end">
                            <div class="parentContainer">


                                <div>
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="mychart14" height="93" width="130" class="chartjs-render-monitor"
                                            style="display: block; width: 130px; height: 93px;"></canvas>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 3 End -->
            </div>
            <div class="col-xl-3 col-xxl-3 col-ssm-12 mb-30">
                <!-- Card 1 -->
                <div class="ap-po-details ap-po-details--2 p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>


                        <div class="overview-content">
                            <h1>45.32K</h1>
                            <p>Unique Visitors</p>
                            <div class="ap-po-details-time">
                                            <span class="color-success"><i class="las la-arrow-up"></i>
                                                <strong>12.3%</strong></span>
                                <small>Since last week</small>
                            </div>
                        </div>

                    </div>
                    <div class="ap-po-timeChart">
                        <div class="overview-single__chart d-md-flex align-items-end">
                            <div class="parentContainer">


                                <div>
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="mychart15" height="93" width="130" class="chartjs-render-monitor"
                                            style="display: block; width: 130px; height: 93px;"></canvas>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 1 End -->
            </div>
        </div>
        <transition name="fade">
            <div class="row  mb-30" v-show="!showTrafficChart">
                <div class="col-xl-6 col-lg-12 ">

                    <div class="card broder-0">
                        <div class="card-header">
                            <h6>Feedback</h6>
                            <div class="card-extra">
                                <ul class="card-tab-links mr-3 nav-tabs nav" role="tablist">
                                    <li>
                                        <a href="#tl_revenue-week" data-toggle="tab" id="tl_revenue-week-tab" role="tab"
                                           aria-selected="false">Week</a>
                                    </li>
                                    <li>
                                        <a href="#tl_revenue-month" data-toggle="tab" id="tl_revenue-month-tab"
                                           role="tab"
                                           aria-selected="false">Month</a>
                                    </li>
                                    <li>
                                        <a class="active" href="#tl_revenue-year" data-toggle="tab"
                                           id="tl_revenue-year-tab"
                                           role="tab" aria-selected="true">Year</a>
                                    </li>
                                </ul>
                                <div class="dropdown dropleft">
                                    <a href="#" role="button" id="revenue1" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-more-horizontal">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="revenue1">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ends: .card-header -->
                        <div class="card-body pt-0">
                            <div class="tab-content">
                                <div class="tab-pane fade" id="tl_revenue-week" role="tabpanel"
                                     aria-labelledby="tl_revenue-week-tab">
                                    <div class="revenue-labels">
                                        <div>
                                            <strong class="text-primary">$72,848</strong>
                                            <span>Current Period</span>
                                        </div>
                                        <div>
                                            <strong>$52,458</strong>
                                            <span>Previous Period</span>
                                        </div>
                                    </div>
                                    <!-- ends: .performance-stats -->

                                    <div class="wp-chart">
                                        <div class="parentContainer">


                                            <div>
                                                <canvas id="myChart6W"></canvas>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tl_revenue-month" role="tabpanel"
                                     aria-labelledby="tl_revenue-month-tab">
                                    <div class="revenue-labels">
                                        <div>
                                            <strong class="text-primary">$72,848</strong>
                                            <span>Current Period</span>
                                        </div>
                                        <div>
                                            <strong>$52,458</strong>
                                            <span>Previous Period</span>
                                        </div>
                                    </div>
                                    <!-- ends: .performance-stats -->

                                    <div class="wp-chart">
                                        <div class="parentContainer">


                                            <div>
                                                <canvas id="myChart6M"></canvas>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade active show" id="tl_revenue-year" role="tabpanel"
                                     aria-labelledby="tl_revenue-year-tab">
                                    <div class="revenue-labels">
                                        <div>
                                            <strong class="text-primary">$72,848</strong>
                                            <span>Current Period</span>
                                        </div>
                                        <div>
                                            <strong>$52,458</strong>
                                            <span>Previous Period</span>
                                        </div>
                                    </div>
                                    <!-- ends: .performance-stats -->

                                    <div class="wp-chart">
                                        <div class="parentContainer">


                                            <div>
                                                <div class="chartjs-size-monitor">
                                                    <div class="chartjs-size-monitor-expand">
                                                        <div class=""></div>
                                                    </div>
                                                    <div class="chartjs-size-monitor-shrink">
                                                        <div class=""></div>
                                                    </div>
                                                </div>
                                                <canvas id="myChart6" height="138"
                                                        style="display: block; width: 438px; height: 138px;" width="438"
                                                        class="chartjs-render-monitor"></canvas>
                                            </div>


                                            <div class="chartjs-tooltip top"
                                                 style="opacity: 0; left: 450.219px; top: 126.107px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 12px; font-style: normal; padding: 6px;">
                                                <table>
                                                    <thead></thead>
                                                    <div class="tooltip-title">Dec</div>
                                                    <tbody>
                                                    <tr>
                                                        <td><span class="chartjs-tooltip-key"
                                                                  style="background:#5F63F2; border-color:#fff; border-width: 2px; border-radius: 30px"></span><span
                                                            class="chart-data">65k</span> <span class="data-label">Current period</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="chartjs-tooltip-key"
                                                                  style="background:#00173750; border-color:#C6D0DC; border-width: 2px; border-radius: 30px"></span><span
                                                            class="chart-data">55k</span> <span class="data-label">Previous period</span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ends: .card-body -->
                    </div>

                </div>
                <div class="col-xl-6 col-lg-12 ">

                    <div class="card border-0">
                        <div class="card-header">
                            <h6>Traffic Source</h6>
                            <div class="card-extra">
                                <ul class="card-tab-links mr-3 nav-tabs nav">
                                    <li>
                                        <a href="#s_revenue-today" class="active" data-toggle="tab"
                                           id="s_revenue-today-tab"
                                           role="tab" area-controls="s_revenue-table" aria-selected="true">Today</a>
                                    </li>
                                    <li>
                                        <a href="#s_revenue-week" data-toggle="tab" id="s_revenue-week-tab" role="tab"
                                           area-controls="s_revenue-table" aria-selected="false">Week</a>
                                    </li>
                                    <li>
                                        <a href="#s_revenue-month" data-toggle="tab" id="s_revenue-month-tab" role="tab"
                                           area-controls="s_revenue-table" aria-selected="false">Month</a>
                                    </li>
                                    <li>
                                        <a href="#s_revenue-year" data-toggle="tab" id="s_revenue-year-tab" role="tab"
                                           area-controls="s_revenue-table" aria-selected="false">Year</a>
                                    </li>
                                </ul>
                                <div class="dropdown dropleft">
                                    <a href="#" role="button" id="action" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-more-horizontal">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="action">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="s_revenue-today" role="tabpanel"
                                     aria-labelledby="s_revenue-today-tab">
                                    <div class="table-responsive table-revenue">
                                        <table class="table table--default">
                                            <thead>
                                            <tr>
                                                <th>Source</th>
                                                <th>Visitors</th>
                                                <th>Page View</th>
                                                <th>Revenue</th>
                                                <th>Trend</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Direct</td>
                                                <td>3,256</td>
                                                <td>12,156</td>
                                                <td>$2,225</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <canvas id="lineChartSm1" height="30" width="120"
                                                                style="display: block;"></canvas>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>4,658</td>
                                                <td>21,584</td>
                                                <td>$9,753</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <canvas id="lineChartSm2" height="30" width="120"
                                                                style="display: block;"></canvas>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Organic Search</td>
                                                <td>1,698</td>
                                                <td>7,956%</td>
                                                <td>1,159</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <canvas id="lineChartSm3" height="30" width="120"
                                                                style="display: block;"></canvas>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Referral</td>
                                                <td>2,856</td>
                                                <td>8,256</td>
                                                <td>1,456</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <canvas id="lineChartSm4" height="30" width="120"
                                                                style="display: block;"></canvas>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Social Media</td>
                                                <td>9,456</td>
                                                <td>36,478</td>
                                                <td>13,852</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <canvas id="lineChartSm5" height="30" width="120"
                                                                style="display: block;"></canvas>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="s_revenue-week" role="tabpanel"
                                     aria-labelledby="s_revenue-week-tab">
                                    <div class="table-responsive table-revenue">
                                        <table class="table table--default">
                                            <thead>
                                            <tr>
                                                <th>Name of Source</th>
                                                <th>Visitors</th>
                                                <th>Page View</th>
                                                <th>Revenue</th>
                                                <th>Trend</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Direct</td>
                                                <td>3,256</td>
                                                <td>12,156</td>
                                                <td>$2,225</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <canvas id="lineChartSm1" height="30" width="120"
                                                                style="display: block;"></canvas>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>4,658</td>
                                                <td>21,584</td>
                                                <td>$9,753</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <canvas id="lineChartSm2" height="30" width="120"
                                                                style="display: block;"></canvas>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Organic Search</td>
                                                <td>1,698</td>
                                                <td>7,956%</td>
                                                <td>1,159</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <canvas id="lineChartSm3" height="30" width="120"
                                                                style="display: block;"></canvas>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Referral</td>
                                                <td>2,856</td>
                                                <td>8,256</td>
                                                <td>1,456</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <canvas id="lineChartSm4" height="30" width="120"
                                                                style="display: block;"></canvas>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Social Media</td>
                                                <td>9,456</td>
                                                <td>36,478</td>
                                                <td>13,852</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <canvas id="lineChartSm5" height="30" width="120"
                                                                style="display: block;"></canvas>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="s_revenue-month" role="tabpanel"
                                     aria-labelledby="s_revenue-month-tab">
                                    <div class="table-responsive table-revenue">
                                        <table class="table table--default">
                                            <thead>
                                            <tr>
                                                <th>Name of Source</th>
                                                <th>Visitors</th>
                                                <th>Page View</th>
                                                <th>Revenue</th>
                                                <th>Trend</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Direct</td>
                                                <td>3,256</td>
                                                <td>12,156</td>
                                                <td>$2,225</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <canvas id="lineChartSm1" height="30" width="120"
                                                                style="display: block;"></canvas>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>4,658</td>
                                                <td>21,584</td>
                                                <td>$9,753</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <canvas id="lineChartSm2" height="30" width="120"
                                                                style="display: block;"></canvas>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Organic Search</td>
                                                <td>1,698</td>
                                                <td>7,956%</td>
                                                <td>1,159</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <canvas id="lineChartSm3" height="30" width="120"
                                                                style="display: block;"></canvas>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Referral</td>
                                                <td>2,856</td>
                                                <td>8,256</td>
                                                <td>1,456</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <canvas id="lineChartSm4" height="30" width="120"
                                                                style="display: block;"></canvas>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Social Media</td>
                                                <td>9,456</td>
                                                <td>36,478</td>
                                                <td>13,852</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <canvas id="lineChartSm5" height="30" width="120"
                                                                style="display: block;"></canvas>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="s_revenue-year" role="tabpanel"
                                     aria-labelledby="s_revenue-year-tab">
                                    <div class="table-responsive table-revenue">
                                        <table class="table table--default">
                                            <thead>
                                            <tr>
                                                <th>Name of Source</th>
                                                <th>Visitors</th>
                                                <th>Page View</th>
                                                <th>Revenue</th>
                                                <th>Trend</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Direct</td>
                                                <td>3,256</td>
                                                <td>12,156</td>
                                                <td>$2,225</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <canvas id="lineChartSm1" height="30" width="120"
                                                                style="display: block;"></canvas>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>4,658</td>
                                                <td>21,584</td>
                                                <td>$9,753</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <canvas id="lineChartSm2" height="30" width="120"
                                                                style="display: block;"></canvas>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Organic Search</td>
                                                <td>1,698</td>
                                                <td>7,956%</td>
                                                <td>1,159</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <canvas id="lineChartSm3" height="30" width="120"
                                                                style="display: block;"></canvas>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Referral</td>
                                                <td>2,856</td>
                                                <td>8,256</td>
                                                <td>1,456</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <canvas id="lineChartSm4" height="30" width="120"
                                                                style="display: block;"></canvas>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Social Media</td>
                                                <td>9,456</td>
                                                <td>36,478</td>
                                                <td>13,852</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <canvas id="lineChartSm5" height="30" width="120"
                                                                style="display: block;"></canvas>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </transition>
        <transition name="fade">
            <div class="row mb-30" v-show="showTrafficChart">
                <div class="col-12 ">
                    <div class="card broder-0">
                        <div class="card-header">
                            <h6>Traffic Performence<span>Nov 23, 2019 - Nov 29, 2019</span></h6>
                            <div class="card-extra">
                                <ul class="card-tab-links mr-3 nav-tabs nav" role="tablist">
                                    <li>
                                        <a href="#incExp-week" data-toggle="tab" id="incExp-week-tab" role="tab"
                                           aria-selected="true">Week</a>
                                    </li>
                                    <li>
                                        <a href="#incExp-month" data-toggle="tab" id="incExp-month-tab" role="tab"
                                           aria-selected="true">Month</a>
                                    </li>
                                    <li>
                                        <a href="#incExp-year" class="active" data-toggle="tab" id="incExp-year-tab"
                                           role="tab" aria-selected="true">Year</a>
                                    </li>
                                </ul>
                                <div class="dropdown dropleft">
                                    <a href="#" role="button" id="income" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                        <span data-feather="more-horizontal"></span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="income">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ends: .card-header -->
                        <div class="card-body pt-0 pb-0">
                            <div class="tab-content">
                                <div class="tab-pane fade" id="incExp-week" role="tabpanel"
                                     aria-labelledby="incExp-week-tab">
                                    <div class="inEx-wrap d-flex">
                                        <div class="inEx-box">
                                            <div class="inEx__single">
                                                <span class="inEx-subtitle">Total income</span>
                                                <div class="inEx__info d-flex align-items-end">
                                                    <h3 class="inEx__title">$4,820</h3>
                                                    <span class="inEx-tail color-light">

                                                            <span class="inEx__percentage color-success">
                                                                <span data-feather="arrow-up"></span>37%</span>
                                                            Since last month
                                                        </span>
                                                </div>
                                            </div>
                                            <!-- ends: .inEx__single -->
                                            <div class="inEx__single">
                                                <span class="inEx-subtitle">Total expenses</span>
                                                <div class="inEx__info d-flex align-items-end">
                                                    <h3 class="inEx__title">$4,820</h3>
                                                    <span class="inEx-tail color-light">
                                                            <span class="inEx__percentage color-danger">
                                                                <span data-feather="arrow-down"></span>25%</span>
                                                            Since last month
                                                        </span>
                                                </div>
                                            </div>
                                            <!-- ends: .inEx__single -->
                                            <div class="inEx__single">
                                                <span class="inEx-subtitle">Cost of goods sold</span>
                                                <div class="inEx__info d-flex align-items-end">
                                                    <h3 class="inEx__title">$2,143</h3>
                                                    <span class="inEx-tail color-light">
                                                            <span class="inEx__percentage color-success">
                                                                <span data-feather="arrow-up"></span>25%</span>
                                                            Since last month
                                                        </span>
                                                </div>
                                            </div>
                                            <!-- ends: .inEx__single -->
                                            <div class="inEx__single">
                                                <span class="inEx-subtitle">Net profit</span>
                                                <div class="inEx__info d-flex align-items-end">
                                                    <h3 class="inEx__title">$2,727</h3>
                                                    <span class="inEx-tail color-light">

                                                            <span class="inEx__percentage color-success">
                                                                <span data-feather="arrow-up"></span>17%</span>
                                                            Since last month
                                                        </span>
                                                </div>
                                            </div>
                                            <!-- ends: .inEx__single -->
                                        </div>
                                        <div class="inEx-chart">
                                            <div class="parentContainer">


                                                <div>
                                                    <canvas id="barChartInEx_W"></canvas>
                                                </div>


                                            </div>
                                            <ul class="legend-static">
                                                <li style="display: inline-flex; align-items: center;">
                                                    <span style="background-color: rgb(95, 99, 242);"></span>Total
                                                    Income
                                                </li>
                                                <li style="display: inline-flex; align-items: center;">
                                                    <span style="background-color: rgb(255, 105, 165);"></span>Cost of
                                                    goods
                                                    sold
                                                </li>
                                                <li style="display: inline-flex; align-items: center;">
                                                    <span style="background-color: rgb(250, 139, 12);"></span>Total
                                                    expenses
                                                </li>
                                                <li style="display: inline-flex; align-items: center;">
                                                    <span style="background-color: rgb(32, 201, 151);"></span>Net profit
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="incExp-month" role="tabpanel"
                                     aria-labelledby="incExp-month-tab">
                                    <div class="inEx-wrap d-flex">
                                        <div class="inEx-box">
                                            <div class="inEx__single">
                                                <span class="inEx-subtitle">Total income</span>
                                                <div class="inEx__info d-flex align-items-end">
                                                    <h3 class="inEx__title">$74,820</h3>
                                                    <span class="inEx-tail color-light">

                                                            <span class="inEx__percentage color-success">
                                                                <span data-feather="arrow-up"></span>37%</span>
                                                            Since last month
                                                        </span>
                                                </div>
                                            </div>
                                            <!-- ends: .inEx__single -->
                                            <div class="inEx__single">
                                                <span class="inEx-subtitle">Total expenses</span>
                                                <div class="inEx__info d-flex align-items-end">
                                                    <h3 class="inEx__title">$74,820</h3>
                                                    <span class="inEx-tail color-light">
                                                            <span class="inEx__percentage color-danger">
                                                                <span data-feather="arrow-down"></span>25%</span>
                                                            Since last month
                                                        </span>
                                                </div>
                                            </div>
                                            <!-- ends: .inEx__single -->
                                            <div class="inEx__single">
                                                <span class="inEx-subtitle">Cost of goods sold</span>
                                                <div class="inEx__info d-flex align-items-end">
                                                    <h3 class="inEx__title">$32,143</h3>
                                                    <span class="inEx-tail color-light">
                                                            <span class="inEx__percentage color-success">
                                                                <span data-feather="arrow-up"></span>25%</span>
                                                            Since last month
                                                        </span>
                                                </div>
                                            </div>
                                            <!-- ends: .inEx__single -->
                                            <div class="inEx__single">
                                                <span class="inEx-subtitle">Net profit</span>
                                                <div class="inEx__info d-flex align-items-end">
                                                    <h3 class="inEx__title">$52,727</h3>
                                                    <span class="inEx-tail color-light">

                                                            <span class="inEx__percentage color-success">
                                                                <span data-feather="arrow-up"></span>17%</span>
                                                            Since last month
                                                        </span>
                                                </div>
                                            </div>
                                            <!-- ends: .inEx__single -->
                                        </div>
                                        <div class="inEx-chart">
                                            <div class="parentContainer">


                                                <div>
                                                    <canvas id="barChartInEx_M"></canvas>
                                                </div>


                                            </div>
                                            <ul class="legend-static">
                                                <li style="display: inline-flex; align-items: center;">
                                                    <span style="background-color: rgb(95, 99, 242);"></span>Total
                                                    Income
                                                </li>
                                                <li style="display: inline-flex; align-items: center;">
                                                    <span style="background-color: rgb(255, 105, 165);"></span>Cost of
                                                    goods
                                                    sold
                                                </li>
                                                <li style="display: inline-flex; align-items: center;">
                                                    <span style="background-color: rgb(250, 139, 12);"></span>Total
                                                    expenses
                                                </li>
                                                <li style="display: inline-flex; align-items: center;">
                                                    <span style="background-color: rgb(32, 201, 151);"></span>Net profit
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade active show" id="incExp-year" role="tabpanel"
                                     aria-labelledby="incExp-year-tab">
                                    <div class="inEx-wrap d-flex">
                                        <div class="inEx-box">
                                            <div class="inEx__single">
                                                <span class="inEx-subtitle">Total income</span>
                                                <div class="inEx__info d-flex align-items-end">
                                                    <h3 class="inEx__title">$274,820</h3>
                                                    <span class="inEx-tail color-light">

                                                            <span class="inEx__percentage color-success">
                                                                <span data-feather="arrow-up"></span>37%</span>
                                                            Since last month
                                                        </span>
                                                </div>
                                            </div>
                                            <!-- ends: .inEx__single -->
                                            <div class="inEx__single">
                                                <span class="inEx-subtitle">Total expenses</span>
                                                <div class="inEx__info d-flex align-items-end">
                                                    <h3 class="inEx__title">$274,820</h3>
                                                    <span class="inEx-tail color-light">
                                                            <span class="inEx__percentage color-danger">
                                                                <span data-feather="arrow-down"></span>25%</span>
                                                            Since last month
                                                        </span>
                                                </div>
                                            </div>
                                            <!-- ends: .inEx__single -->
                                            <div class="inEx__single">
                                                <span class="inEx-subtitle">Cost of goods sold</span>
                                                <div class="inEx__info d-flex align-items-end">
                                                    <h3 class="inEx__title">$532,143</h3>
                                                    <span class="inEx-tail color-light">
                                                            <span class="inEx__percentage color-success">
                                                                <span data-feather="arrow-up"></span>25%</span>
                                                            Since last month
                                                        </span>
                                                </div>
                                            </div>
                                            <!-- ends: .inEx__single -->
                                            <div class="inEx__single">
                                                <span class="inEx-subtitle">Net profit</span>
                                                <div class="inEx__info d-flex align-items-end">
                                                    <h3 class="inEx__title">$252,727</h3>
                                                    <span class="inEx-tail color-light">

                                                            <span class="inEx__percentage color-success">
                                                                <span data-feather="arrow-up"></span>17%</span>
                                                            Since last month
                                                        </span>
                                                </div>
                                            </div>
                                            <!-- ends: .inEx__single -->
                                        </div>
                                        <div class="inEx-chart">
                                            <div class="parentContainer">


                                                <div>
                                                    <canvas id="barChartInEx"></canvas>
                                                </div>


                                            </div>
                                            <ul class="legend-static">
                                                <li style="display: inline-flex; align-items: center;">
                                                    <span style="background-color: rgb(95, 99, 242);"></span>Total
                                                    Income
                                                </li>
                                                <li style="display: inline-flex; align-items: center;">
                                                    <span style="background-color: rgb(255, 105, 165);"></span>Cost of
                                                    goods
                                                    sold
                                                </li>
                                                <li style="display: inline-flex; align-items: center;">
                                                    <span style="background-color: rgb(250, 139, 12);"></span>Total
                                                    expenses
                                                </li>
                                                <li style="display: inline-flex; align-items: center;">
                                                    <span style="background-color: rgb(32, 201, 151);"></span>Net profit
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ends: .card-body -->
                    </div>

                </div>
            </div>
        </transition>
        <div class="row">
            <div class="col-lg-6 col-xxl m-bottom-30">

                <div class="card border-0">
                    <div class="card-header">
                        <h6>Sessions by Locations</h6>
                        <div class="card-extra">
                            <ul class="card-tab-links mr-3 nav-tabs nav">
                                <li>
                                    <a href="#se_region-today" class="active" data-toggle="tab" id="se_region-today-tab"
                                       role="tab" area-controls="se_region-table" aria-selected="true">Today</a>
                                </li>
                                <li>
                                    <a href="#se_region-week" data-toggle="tab" id="se_region-week-tab" role="tab"
                                       area-controls="se_region-table" aria-selected="false">Week</a>
                                </li>
                                <li>
                                    <a href="#se_region-month" data-toggle="tab" id="se_region-month-tab" role="tab"
                                       area-controls="se_region-table" aria-selected="false">Month</a>
                                </li>
                                <li>
                                    <a href="#se_region-year" data-toggle="tab" id="se_region-year-tab" role="tab"
                                       area-controls="se_region-table" aria-selected="false">Year</a>
                                </li>
                            </ul>
                            <div class="dropdown dropleft">
                                <a href="#" role="button" id="else" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <span data-feather="more-horizontal"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="else">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="se_region-today" role="tabpanel"
                                 aria-labelledby="se_region-today-tab">
                                <div class="row">
                                    <div class="col-md-5">

                                        <div class="table-responsive table-top-regions">
                                            <table class="table table--default table-borderless">
                                                <thead>
                                                <tr>
                                                    <th>Top Regions</th>
                                                    <th>Sessions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>United States</td>
                                                    <td>26,457</td>
                                                </tr>
                                                <tr>
                                                    <td>Australia</td>
                                                    <td>4,658</td>
                                                </tr>
                                                <tr>
                                                    <td>Canada</td>
                                                    <td>1,698</td>
                                                </tr>
                                                <tr>
                                                    <td>Japan</td>
                                                    <td>2,856</td>
                                                </tr>
                                                <tr>
                                                    <td>India</td>
                                                    <td>5,456</td>
                                                </tr>
                                                <tr>
                                                    <td>Bangladesh</td>
                                                    <td>5,796</td>
                                                </tr>
                                                <tr>
                                                    <td>Brazil</td>
                                                    <td>6,458</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="col-md-7 d-flex align-items-center justify-content-center">
                                        <div class="regions-svg">
                                            <div id="show_map"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="se_region-week" role="tabpanel"
                                 aria-labelledby="se_region-week-tab">
                                <div class="row">
                                    <div class="col-md-5">

                                        <div class="table-responsive table-top-regions">
                                            <table class="table table--default table-borderless">
                                                <thead>
                                                <tr>
                                                    <th>Top Regions</th>
                                                    <th>Sessions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>United States</td>
                                                    <td>26,457</td>
                                                </tr>
                                                <tr>
                                                    <td>Australia</td>
                                                    <td>4,658</td>
                                                </tr>
                                                <tr>
                                                    <td>Canada</td>
                                                    <td>1,698</td>
                                                </tr>
                                                <tr>
                                                    <td>Japan</td>
                                                    <td>2,856</td>
                                                </tr>
                                                <tr>
                                                    <td>India</td>
                                                    <td>5,456</td>
                                                </tr>
                                                <tr>
                                                    <td>Bangladesh</td>
                                                    <td>5,796</td>
                                                </tr>
                                                <tr>
                                                    <td>Brazil</td>
                                                    <td>6,458</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="col-md-7 d-flex align-items-center justify-content-center">
                                        <div class="regions-svg">
                                            <div id="s_region-map_W"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="se_region-month" role="tabpanel"
                                 aria-labelledby="se_region-month-tab">
                                <div class="row">
                                    <div class="col-md-5">

                                        <div class="table-responsive table-top-regions">
                                            <table class="table table--default table-borderless">
                                                <thead>
                                                <tr>
                                                    <th>Top Regions</th>
                                                    <th>Sessions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>United States</td>
                                                    <td>26,457</td>
                                                </tr>
                                                <tr>
                                                    <td>Australia</td>
                                                    <td>4,658</td>
                                                </tr>
                                                <tr>
                                                    <td>Canada</td>
                                                    <td>1,698</td>
                                                </tr>
                                                <tr>
                                                    <td>Japan</td>
                                                    <td>2,856</td>
                                                </tr>
                                                <tr>
                                                    <td>India</td>
                                                    <td>5,456</td>
                                                </tr>
                                                <tr>
                                                    <td>Bangladesh</td>
                                                    <td>5,796</td>
                                                </tr>
                                                <tr>
                                                    <td>Brazil</td>
                                                    <td>6,458</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="col-md-7 d-flex align-items-center justify-content-center">
                                        <div class="regions-svg">
                                            <div id="s_region-map_M"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="se_region-year" role="tabpanel"
                                 aria-labelledby="se_region-year-tab">
                                <div class="row">
                                    <div class="col-md-5">

                                        <div class="table-responsive table-top-regions">
                                            <table class="table table--default table-borderless">
                                                <thead>
                                                <tr>
                                                    <th>Top Regions</th>
                                                    <th>Sessions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>United States</td>
                                                    <td>26,457</td>
                                                </tr>
                                                <tr>
                                                    <td>Australia</td>
                                                    <td>4,658</td>
                                                </tr>
                                                <tr>
                                                    <td>Canada</td>
                                                    <td>1,698</td>
                                                </tr>
                                                <tr>
                                                    <td>Japan</td>
                                                    <td>2,856</td>
                                                </tr>
                                                <tr>
                                                    <td>India</td>
                                                    <td>5,456</td>
                                                </tr>
                                                <tr>
                                                    <td>Bangladesh</td>
                                                    <td>5,796</td>
                                                </tr>
                                                <tr>
                                                    <td>Brazil</td>
                                                    <td>6,458</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="col-md-7 d-flex align-items-center justify-content-center">
                                        <div class="regions-svg">
                                            <div id="s_region-map_Y"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="device-chart-box">
                            <div class="card broder-0">
                                <div class="card-header">
                                    <h6>Sessions by Device</h6>
                                    <div class="card-extra">
                                        <ul class="card-tab-links nav-tabs nav">
                                            <li>
                                                <a href="#se_device-today" data-toggle="tab" id="se_device-today-tab"
                                                   role="tab" area-controls="se_device-" aria-selected="false">Today</a>
                                            </li>
                                            <li>
                                                <a href="#se_device-week" data-toggle="tab" id="se_device-week-tab"
                                                   role="tab" area-controls="se_device-" aria-selected="false">Week</a>
                                            </li>
                                            <li>
                                                <a class="active" href="#se_device-month" data-toggle="tab"
                                                   id="se_device-month-tab" role="tab" area-controls="se_device-"
                                                   aria-selected="true">Month</a>
                                            </li>
                                            <li>
                                                <a href="#se_device-year" data-toggle="tab" id="se_device-year-tab"
                                                   role="tab" area-controls="se_device-" aria-selected="false">Year</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- ends: .card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade" id="se_device-today" role="tabpanel"
                                             aria-labelledby="se_device-today-tab">
                                            <div class="device-pieChart-wrap position-relative">
                                                <div class="pie-chart-legend">
                                                    <p>
                                                        <span>173</span>Total visitors
                                                    </p>
                                                </div>


                                                <div>
                                                    <canvas id="chartDoughnut2T"></canvas>
                                                </div>


                                            </div>
                                            <div class="session-wrap">
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-success"></span>
                                                        Desktop
                                                    </div>
                                                    <strong>4,483</strong>
                                                    <sub>45%</sub>
                                                </div>
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-info"></span>
                                                        Mobile
                                                    </div>
                                                    <strong>5870</strong>
                                                    <sub>30%</sub>
                                                </div>
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-warning"></span>
                                                        Tablets
                                                    </div>
                                                    <strong>2,420</strong>
                                                    <sub>25%</sub>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade active show" id="se_device-month" role="tabpanel"
                                             aria-labelledby="se_device-month-tab">
                                            <div class="device-pieChart-wrap position-relative">
                                                <div class="pie-chart-legend">
                                                    <p>
                                                        <span>773</span>Total visitors
                                                    </p>
                                                </div>


                                                <div>
                                                    <canvas id="chartDoughnutOS"></canvas>
                                                </div>


                                            </div>
                                            <div class="session-wrap">
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-success"></span>
                                                        Desktop
                                                    </div>
                                                    <strong>4,483</strong>
                                                    <sub>45%</sub>
                                                </div>
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-info"></span>
                                                        Mobile
                                                    </div>
                                                    <strong>5870</strong>
                                                    <sub>30%</sub>
                                                </div>
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-warning"></span>
                                                        Tablets
                                                    </div>
                                                    <strong>2,420</strong>
                                                    <sub>25%</sub>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="se_device-week" role="tabpanel"
                                             aria-labelledby="se_device-week-tab">
                                            <div class="device-pieChart-wrap position-relative">
                                                <div class="pie-chart-legend">
                                                    <p>
                                                        <span>8773</span>Total visitors
                                                    </p>
                                                </div>


                                                <div>
                                                    <canvas id="chartDoughnut2W"></canvas>
                                                </div>


                                            </div>
                                            <div class="session-wrap">
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-success"></span>
                                                        Desktop
                                                    </div>
                                                    <strong>4,483</strong>
                                                    <sub>45%</sub>
                                                </div>
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-info"></span>
                                                        Mobile
                                                    </div>
                                                    <strong>5870</strong>
                                                    <sub>30%</sub>
                                                </div>
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-warning"></span>
                                                        Tablets
                                                    </div>
                                                    <strong>2,420</strong>
                                                    <sub>25%</sub>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="se_device-year" role="tabpanel"
                                             aria-labelledby="se_device-year-tab">
                                            <div class="device-pieChart-wrap position-relative">
                                                <div class="pie-chart-legend">
                                                    <p>
                                                        <span>38773</span>Total visitors
                                                    </p>
                                                </div>


                                                <div>
                                                    <canvas id="chartDoughnut2Y"></canvas>
                                                </div>


                                            </div>
                                            <div class="session-wrap">
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-success"></span>
                                                        Desktop
                                                    </div>
                                                    <strong>4,483</strong>
                                                    <sub>45%</sub>
                                                </div>
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-info"></span>
                                                        Mobile
                                                    </div>
                                                    <strong>5870</strong>
                                                    <sub>30%</sub>
                                                </div>
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-warning"></span>
                                                        Tablets
                                                    </div>
                                                    <strong>2,420</strong>
                                                    <sub>25%</sub>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ends: .session-wrap -->
                                </div>
                                <!-- ends: .card-body -->
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="device-chart-box">
                            <div class="card broder-0">
                                <div class="card-header">
                                    <h6>Sessions by OS</h6>
                                    <div class="card-extra">
                                        <ul class="card-tab-links nav-tabs nav">
                                            <li>
                                                <a href="#se_device-today" data-toggle="tab" id="se_device-today-tab"
                                                   role="tab" area-controls="se_device-" aria-selected="false">Today</a>
                                            </li>
                                            <li>
                                                <a href="#se_device-week" data-toggle="tab" id="se_device-week-tab"
                                                   role="tab" area-controls="se_device-" aria-selected="false">Week</a>
                                            </li>
                                            <li>
                                                <a class="active" href="#se_device-month" data-toggle="tab"
                                                   id="se_device-month-tab" role="tab" area-controls="se_device-"
                                                   aria-selected="true">Month</a>
                                            </li>
                                            <li>
                                                <a href="#se_device-year" data-toggle="tab" id="se_device-year-tab"
                                                   role="tab" area-controls="se_device-" aria-selected="false">Year</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- ends: .card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade" id="se_device-today" role="tabpanel"
                                             aria-labelledby="se_device-today-tab">
                                            <div class="device-pieChart-wrap position-relative">
                                                <div class="pie-chart-legend">
                                                    <p>
                                                        <span>173</span>Total visitors
                                                    </p>
                                                </div>


                                                <div>
                                                    <canvas id="chartDoughnut2T"></canvas>
                                                </div>


                                            </div>
                                            <div class="session-wrap">
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-success"></span>
                                                        Windows
                                                    </div>
                                                    <strong>4,483</strong>
                                                    <sub>45%</sub>
                                                </div>
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-info"></span>
                                                        MacOS
                                                    </div>
                                                    <strong>5870</strong>
                                                    <sub>30%</sub>
                                                </div>
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-warning"></span>
                                                        Android
                                                    </div>
                                                    <strong>2,420</strong>
                                                    <sub>25%</sub>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade active show" id="se_device-month" role="tabpanel"
                                             aria-labelledby="se_device-month-tab">
                                            <div class="device-pieChart-wrap position-relative">
                                                <div class="pie-chart-legend">
                                                    <p>
                                                        <span>773</span>Total visitors
                                                    </p>
                                                </div>


                                                <div>
                                                    <canvas id="chartDoughnutBrowser"></canvas>
                                                </div>


                                            </div>
                                            <div class="session-wrap">
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-success"></span>
                                                        Desktop
                                                    </div>
                                                    <strong>4,483</strong>
                                                    <sub>45%</sub>
                                                </div>
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-info"></span>
                                                        Mobile
                                                    </div>
                                                    <strong>5870</strong>
                                                    <sub>30%</sub>
                                                </div>
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-warning"></span>
                                                        Tablets
                                                    </div>
                                                    <strong>2,420</strong>
                                                    <sub>25%</sub>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="se_device-week" role="tabpanel"
                                             aria-labelledby="se_device-week-tab">
                                            <div class="device-pieChart-wrap position-relative">
                                                <div class="pie-chart-legend">
                                                    <p>
                                                        <span>8773</span>Total visitors
                                                    </p>
                                                </div>


                                                <div>
                                                    <canvas id="chartDoughnut2W"></canvas>
                                                </div>


                                            </div>
                                            <div class="session-wrap">
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-success"></span>
                                                        Desktop
                                                    </div>
                                                    <strong>4,483</strong>
                                                    <sub>45%</sub>
                                                </div>
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-info"></span>
                                                        Mobile
                                                    </div>
                                                    <strong>5870</strong>
                                                    <sub>30%</sub>
                                                </div>
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-warning"></span>
                                                        Tablets
                                                    </div>
                                                    <strong>2,420</strong>
                                                    <sub>25%</sub>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="se_device-year" role="tabpanel"
                                             aria-labelledby="se_device-year-tab">
                                            <div class="device-pieChart-wrap position-relative">
                                                <div class="pie-chart-legend">
                                                    <p>
                                                        <span>38773</span>Total visitors
                                                    </p>
                                                </div>


                                                <div>
                                                    <canvas id="chartDoughnut2Y"></canvas>
                                                </div>


                                            </div>
                                            <div class="session-wrap">
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-success"></span>
                                                        Desktop
                                                    </div>
                                                    <strong>4,483</strong>
                                                    <sub>45%</sub>
                                                </div>
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-info"></span>
                                                        Mobile
                                                    </div>
                                                    <strong>5870</strong>
                                                    <sub>30%</sub>
                                                </div>
                                                <div class="session-single">
                                                    <div class="chart-label">
                                                        <span class="label-dot dot-warning"></span>
                                                        Tablets
                                                    </div>
                                                    <strong>2,420</strong>
                                                    <sub>25%</sub>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ends: .session-wrap -->
                                </div>
                                <!-- ends: .card-body -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  mt-3">
            <div class="col-lg-8 col-xxl m-bottom-30 mt-3">

                <div class="card border-0">
                    <div class="card-header">
                        <h6>Traffic Channels</h6>
                        <div class="card-extra">
                            <ul class="card-tab-links mr-3 nav-tabs nav">
                                <li>
                                    <a class="active" href="#t_channel-today" data-toggle="tab"
                                       id="t_channel-today-tab" role="tab" area-controls="t_channel-table"
                                       aria-selected="true">Today</a>
                                </li>
                                <li>
                                    <a href="#t_channel-week" data-toggle="tab" id="t_channel-week-tab"
                                       role="tab" area-controls="t_channel-table"
                                       aria-selected="false">Week</a>
                                </li>
                                <li>
                                    <a href="#t_channel-month" data-toggle="tab" id="t_channel-month-tab"
                                       role="tab" area-controls="t_channel-table"
                                       aria-selected="fasle">Month</a>
                                </li>
                                <li>
                                    <a href="#t_channel-year" data-toggle="tab" id="t_channel-year-tab"
                                       role="tab" area-controls="t_channel-table"
                                       aria-selected="false">Year</a>
                                </li>
                            </ul>
                            <div class="dropdown dropleft">
                                <a href="#" role="button" id="traffic" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <span data-feather="more-horizontal"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="traffic">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="t_channel-today" role="tabpanel"
                                 aria-labelledby="t_channel-today-tab">
                                <div class="table-responsive">
                                    <table class="table table--default traffic-table">
                                        <thead>
                                        <tr>
                                            <th>Channel</th>
                                            <th>Sessions</th>
                                            <th>Goal Conv. Rate</th>
                                            <th>Goals Completions</th>
                                            <th style="max-width: 150px">Percentage of Traffic (%)</th>
                                            <th>Value</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Direct</td>
                                            <td>3,256</td>
                                            <td>3.5%</td>
                                            <td>225</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primay" role="progressbar"
                                                         style="width: 65.75%" aria-valuenow="65.75"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>65.75%</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>4,658</td>
                                            <td>1.9%</td>
                                            <td>753</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-secondary"
                                                         role="progressbar" style="width: 85.14%"
                                                         aria-valuenow="85.14" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>85.14%</td>
                                        </tr>
                                        <tr>
                                            <td>Organic Search</td>
                                            <td>1,698</td>
                                            <td>7.5%</td>
                                            <td>159</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                         style="width: 95.36%" aria-valuenow="95.36"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>95.36%</td>
                                        </tr>
                                        <tr>
                                            <td>Referral</td>
                                            <td>2,856</td>
                                            <td>4.6%</td>
                                            <td>456</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                         style="width: 45.25%" aria-valuenow="45.25"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>45.25%</td>
                                        </tr>
                                        <tr>
                                            <td>Social Media</td>
                                            <td>9,456</td>
                                            <td>3.2%</td>
                                            <td>852</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                         style="width: 39.94%" aria-valuenow="39.94"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>39.94%</td>
                                        </tr>
                                        <tr>
                                            <td>Other</td>
                                            <td>8,247</td>
                                            <td>1.2%</td>
                                            <td>321</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                         style="width: 60.58%" aria-valuenow="60.58"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>60.58%</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="t_channel-week" role="tabpanel"
                                 aria-labelledby="t_channel-week-tab">
                                <div class="table-responsive">
                                    <table class="table table--default traffic-table">
                                        <thead>
                                        <tr>
                                            <th>Channel</th>
                                            <th>Sessions</th>
                                            <th>Goal Conv. Rate</th>
                                            <th>Goals Completions</th>
                                            <th style="max-width: 150px">Percentage of Traffic (%)</th>
                                            <th>Value</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Direct</td>
                                            <td>5,256</td>
                                            <td>7.5%</td>
                                            <td>240</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primay" role="progressbar"
                                                         style="width: 65.75%" aria-valuenow="65.75"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>66.75%</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>7,658</td>
                                            <td>8.9%</td>
                                            <td>453</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-secondary"
                                                         role="progressbar" style="width: 85.14%"
                                                         aria-valuenow="85.14" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>40.14%</td>
                                        </tr>
                                        <tr>
                                            <td>Organic Search</td>
                                            <td>1,398</td>
                                            <td>5.5%</td>
                                            <td>259</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                         style="width: 95.36%" aria-valuenow="95.36"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>55.36%</td>
                                        </tr>
                                        <tr>
                                            <td>Referral</td>
                                            <td>2,556</td>
                                            <td>6.6%</td>
                                            <td>756</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                         style="width: 45.25%" aria-valuenow="45.25"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>40.25%</td>
                                        </tr>
                                        <tr>
                                            <td>Social Media</td>
                                            <td>8,456</td>
                                            <td>3.6%</td>
                                            <td>452</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                         style="width: 39.94%" aria-valuenow="39.94"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>30.94%</td>
                                        </tr>
                                        <tr>
                                            <td>Other</td>
                                            <td>6,247</td>
                                            <td>1.8%</td>
                                            <td>321</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                         style="width: 60.58%" aria-valuenow="60.58"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>60.58%</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="t_channel-month" role="tabpanel"
                                 aria-labelledby="t_channel-month-tab">
                                <div class="table-responsive">
                                    <table class="table table--default traffic-table">
                                        <thead>
                                        <tr>
                                            <th>Channel</th>
                                            <th>Sessions</th>
                                            <th>Goal Conv. Rate</th>
                                            <th>Goals Completions</th>
                                            <th style="max-width: 150px">Percentage of Traffic (%)</th>
                                            <th>Value</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Direct</td>
                                            <td>6,256</td>
                                            <td>3.5%</td>
                                            <td>325</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primay" role="progressbar"
                                                         style="width: 65.75%" aria-valuenow="65.75"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>65.75%</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>4,658</td>
                                            <td>1.9%</td>
                                            <td>753</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-secondary"
                                                         role="progressbar" style="width: 85.14%"
                                                         aria-valuenow="85.14" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>85.14%</td>
                                        </tr>
                                        <tr>
                                            <td>Organic Search</td>
                                            <td>1,698</td>
                                            <td>7.5%</td>
                                            <td>159</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                         style="width: 95.36%" aria-valuenow="95.36"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>95.36%</td>
                                        </tr>
                                        <tr>
                                            <td>Referral</td>
                                            <td>2,856</td>
                                            <td>4.6%</td>
                                            <td>456</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                         style="width: 45.25%" aria-valuenow="45.25"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>45.25%</td>
                                        </tr>
                                        <tr>
                                            <td>Social Media</td>
                                            <td>9,456</td>
                                            <td>3.2%</td>
                                            <td>852</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                         style="width: 39.94%" aria-valuenow="39.94"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>39.94%</td>
                                        </tr>
                                        <tr>
                                            <td>Other</td>
                                            <td>8,247</td>
                                            <td>1.2%</td>
                                            <td>321</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                         style="width: 60.58%" aria-valuenow="60.58"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>60.58%</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="t_channel-year" role="tabpanel"
                                 aria-labelledby="t_channel-year-tab">
                                <div class="table-responsive">
                                    <table class="table table--default traffic-table">
                                        <thead>
                                        <tr>
                                            <th>Channel</th>
                                            <th>Sessions</th>
                                            <th>Goal Conv. Rate</th>
                                            <th>Goals Completions</th>
                                            <th style="max-width: 150px">Percentage of Traffic (%)</th>
                                            <th>Value</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Direct</td>
                                            <td>7,256</td>
                                            <td>4.5%</td>
                                            <td>265</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primay" role="progressbar"
                                                         style="width: 65.75%" aria-valuenow="65.75"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>65.75%</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>6,658</td>
                                            <td>4.9%</td>
                                            <td>453</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-secondary"
                                                         role="progressbar" style="width: 85.14%"
                                                         aria-valuenow="85.14" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>45.14%</td>
                                        </tr>
                                        <tr>
                                            <td>Organic Search</td>
                                            <td>4,698</td>
                                            <td>6.5%</td>
                                            <td>359</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                         style="width: 95.36%" aria-valuenow="95.36"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>95.36%</td>
                                        </tr>
                                        <tr>
                                            <td>Referral</td>
                                            <td>6,856</td>
                                            <td>4.6%</td>
                                            <td>156</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                         style="width: 45.25%" aria-valuenow="45.25"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>45.25%</td>
                                        </tr>
                                        <tr>
                                            <td>Social Media</td>
                                            <td>9,456</td>
                                            <td>3.2%</td>
                                            <td>752</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                         style="width: 39.94%" aria-valuenow="39.94"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>39.94%</td>
                                        </tr>
                                        <tr>
                                            <td>Other</td>
                                            <td>1,247</td>
                                            <td>5.2%</td>
                                            <td>421</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                         style="width: 60.58%" aria-valuenow="60.58"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>60.58%</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-4 col-xxl-5 col-lg-6 col-sm-12 m-bottom-30 mt-3">
                <div class="device-chart-box">
                    <div class="card broder-0">
                        <div class="card-header">
                            <h6>Sessions by Browser</h6>
                            <div class="card-extra">
                                <ul class="card-tab-links nav-tabs nav">
                                    <li>
                                        <a href="#se_device-today" data-toggle="tab" id="se_device-today-tab"
                                           role="tab" area-controls="se_device-"
                                           aria-selected="false">Today</a>
                                    </li>
                                    <li>
                                        <a href="#se_device-week" data-toggle="tab" id="se_device-week-tab"
                                           role="tab" area-controls="se_device-" aria-selected="false">Week</a>
                                    </li>
                                    <li>
                                        <a class="active" href="#se_device-month" data-toggle="tab"
                                           id="se_device-month-tab" role="tab" area-controls="se_device-"
                                           aria-selected="true">Month</a>
                                    </li>
                                    <li>
                                        <a href="#se_device-year" data-toggle="tab" id="se_device-year-tab"
                                           role="tab" area-controls="se_device-" aria-selected="false">Year</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- ends: .card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade" id="se_device-today" role="tabpanel"
                                     aria-labelledby="se_device-today-tab">
                                    <div class="device-pieChart-wrap position-relative">
                                        <div class="pie-chart-legend">
                                            <p>
                                                <span>173</span>Total visitors
                                            </p>
                                        </div>


                                        <div>
                                            <canvas id="chartDoughnut2T"></canvas>
                                        </div>


                                    </div>
                                    <div class="session-wrap">
                                        <div class="session-single">
                                            <div class="chart-label">
                                                <span class="label-dot dot-success"></span>
                                                Desktop
                                            </div>
                                            <strong>4,483</strong>
                                            <sub>45%</sub>
                                        </div>
                                        <div class="session-single">
                                            <div class="chart-label">
                                                <span class="label-dot dot-info"></span>
                                                Mobile
                                            </div>
                                            <strong>5870</strong>
                                            <sub>30%</sub>
                                        </div>
                                        <div class="session-single">
                                            <div class="chart-label">
                                                <span class="label-dot dot-warning"></span>
                                                Tablets
                                            </div>
                                            <strong>2,420</strong>
                                            <sub>25%</sub>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade active show" id="se_device-month" role="tabpanel"
                                     aria-labelledby="se_device-month-tab">
                                    <div class="device-pieChart-wrap position-relative">
                                        <div class="pie-chart-legend">
                                            <p>
                                                <span>773</span>Total visitors
                                            </p>
                                        </div>


                                        <div>
                                            <canvas id="chartDoughnutDevice"></canvas>
                                        </div>


                                    </div>
                                    <div class="session-wrap">
                                        <div class="session-single">
                                            <div class="chart-label">
                                                <span class="label-dot dot-success"></span>
                                                Desktop
                                            </div>
                                            <strong>4,483</strong>
                                            <sub>45%</sub>
                                        </div>
                                        <div class="session-single">
                                            <div class="chart-label">
                                                <span class="label-dot dot-info"></span>
                                                Mobile
                                            </div>
                                            <strong>5870</strong>
                                            <sub>30%</sub>
                                        </div>
                                        <div class="session-single">
                                            <div class="chart-label">
                                                <span class="label-dot dot-warning"></span>
                                                Tablets
                                            </div>
                                            <strong>2,420</strong>
                                            <sub>25%</sub>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="se_device-week" role="tabpanel"
                                     aria-labelledby="se_device-week-tab">
                                    <div class="device-pieChart-wrap position-relative">
                                        <div class="pie-chart-legend">
                                            <p>
                                                <span>8773</span>Total visitors
                                            </p>
                                        </div>


                                        <div>
                                            <canvas id="chartDoughnut2W"></canvas>
                                        </div>


                                    </div>
                                    <div class="session-wrap">
                                        <div class="session-single">
                                            <div class="chart-label">
                                                <span class="label-dot dot-success"></span>
                                                Desktop
                                            </div>
                                            <strong>4,483</strong>
                                            <sub>45%</sub>
                                        </div>
                                        <div class="session-single">
                                            <div class="chart-label">
                                                <span class="label-dot dot-info"></span>
                                                Mobile
                                            </div>
                                            <strong>5870</strong>
                                            <sub>30%</sub>
                                        </div>
                                        <div class="session-single">
                                            <div class="chart-label">
                                                <span class="label-dot dot-warning"></span>
                                                Tablets
                                            </div>
                                            <strong>2,420</strong>
                                            <sub>25%</sub>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="se_device-year" role="tabpanel"
                                     aria-labelledby="se_device-year-tab">
                                    <div class="device-pieChart-wrap position-relative">
                                        <div class="pie-chart-legend">
                                            <p>
                                                <span>38773</span>Total visitors
                                            </p>
                                        </div>


                                        <div>
                                            <canvas id="chartDoughnut2Y"></canvas>
                                        </div>


                                    </div>
                                    <div class="session-wrap">
                                        <div class="session-single">
                                            <div class="chart-label">
                                                <span class="label-dot dot-success"></span>
                                                Desktop
                                            </div>
                                            <strong>4,483</strong>
                                            <sub>45%</sub>
                                        </div>
                                        <div class="session-single">
                                            <div class="chart-label">
                                                <span class="label-dot dot-info"></span>
                                                Mobile
                                            </div>
                                            <strong>5870</strong>
                                            <sub>30%</sub>
                                        </div>
                                        <div class="session-single">
                                            <div class="chart-label">
                                                <span class="label-dot dot-warning"></span>
                                                Tablets
                                            </div>
                                            <strong>2,420</strong>
                                            <sub>25%</sub>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ends: .session-wrap -->
                        </div>
                        <!-- ends: .card-body -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CampaignStats",
    data() {
        return {
            showTrafficChart: false
        }
    },
    mounted() {
        setTimeout(function (evt) {
            this.jqueryFunction();
            this.initMap();
        }.bind(this), 500);

    },
    methods: {
        jqueryFunction: function () {
            initjQueryCharts();
        },
        initMap() {
            const showMap = $("#show_map");
            $(showMap).vectorMap({
                map: "world_mill_en",
                backgroundColor: "transparent",
                normalizeFunction: "polynomial",
                hoverOpacity: 0.8,
                regionStyle: {
                    initial: {fill: "#E3E6EF"},
                    hover: {
                        fill: "#5F63F2",
                        "fill-opacity": 1,
                    },
                },
                markerStyle: {
                    initial: {
                        fill: "#5F63F215",
                        stroke: "#5F63F2",
                        "stroke-width": 4,
                    },
                },
                markers: [
                    {latLng: [-4.61, 55.45], name: "Seychelles"},
                    {latLng: [42.5, 1.51], name: "Andorra"},
                    {latLng: [14.01, -60.98], name: "Saint Lucia"},
                    {latLng: [1.3, 103.8], name: "Singapore"},
                    {latLng: [0.33, 6.73], name: "SÃƒÂ£o TomÃƒÂ© and PrÃƒÂ­ncipe"},
                ],
                series: {
                    regions: [
                        {
                            scale: ["#C8EEFF", "#0071A4"],
                        },
                    ],
                },
            });

        },

    },
}
</script>

<style scoped>

</style>
