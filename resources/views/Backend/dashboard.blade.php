@extends('Backend.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">CRM</a></li>
                                <li class="breadcrumb-item active">CRM</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Campaign Sent</h5>
                                    <h3 class="my-2 py-1">9,184</h3>
                                    <p class="mb-0 text-muted">
                                        <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 3.27%</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <div id="campaign-sent-chart" data-colors="#727cf5"></div>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5 class="text-muted fw-normal mt-0 text-truncate" title="New Leads">New Leads</h5>
                                    <h3 class="my-2 py-1">3,254</h3>
                                    <p class="mb-0 text-muted">
                                        <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 5.38%</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <div id="new-leads-chart" data-colors="#0acf97"></div>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5 class="text-muted fw-normal mt-0 text-truncate" title="Deals">Deals</h5>
                                    <h3 class="my-2 py-1">861</h3>
                                    <p class="mb-0 text-muted">
                                        <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <div id="deals-chart" data-colors="#727cf5"></div>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5 class="text-muted fw-normal mt-0 text-truncate" title="Booked Revenue">Booked Revenue</h5>
                                    <h3 class="my-2 py-1">$253k</h3>
                                    <p class="mb-0 text-muted">
                                        <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 11.7%</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <div id="booked-revenue-chart" data-colors="#0acf97"></div>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                
                <!-- end col-->

                
                <!-- end col-->
            </div>
            <!-- end row-->


            <div class="row">
                
                <!-- end col-->

                
                <!-- end col -->

                
                <!-- end col -->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
   
    
    <!-- end Footer -->

</div>
@endsection