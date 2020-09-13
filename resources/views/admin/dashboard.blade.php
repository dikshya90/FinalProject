@extends('layouts.admin')

@section('title', 'Art Gallery Admin Home')

@section('content')

    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ul class="breadcrumb">
            <li><a href="{{url('/admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ul>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$total_customer}}</h3>
                        <p>Customer Registrations</p>
                    </div>
                    <div class="icon">
                        {{-- <i class="ion ion-bag"></i> --}}
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$user}}</h3>
                        <p>Total Users</p>
                    </div>
                    <div class="icon">
                        {{-- <ion-icon name="people-circle-outline"></ion-icon> --}}
                        {{-- <ion-icon name="people"></ion-icon> --}}
                        <i class="ion ion-person-stalker"></i>
                    </div>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$total_order}}</h3>
                        <p>Total Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-arrow-graph-up-right"></i>
                    </div>
                </div>
            </div><!-- ./col -->

        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$cart}}</h3>
                        <p>Total Carts</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$pending_order}}</h3>
                        <p>Pending Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div><!-- ./col -->

            <div class="col-lg-4 col-xs-6" >
                <!-- small box -->
                <div class="small-box bg-info" style="height: 20%;">
                    <div class="inner">
                        <h3>{{$shipped_order}}</h3>
                        <p>Shipped Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div><!-- ./col -->
        </div>

            <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="nav-tabs-custom">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right">
                        <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                        <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                        <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                    </ul>
                    <div class="tab-content no-padding">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                    </div>
                </div><!-- /.nav-tabs-custom -->


            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">

                <!-- solid sales graph -->
                <div class="box box-solid bg-olive-active">
                    <div class="box-header">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Sales Graph</h3>
                        <div class="box-tools pull-right">
                            <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body border-radius-none">
                        <div class="chart" id="line-chart" style="height: 250px;"></div>
                    </div><!-- /.box-body -->
                    <div class="box-footer no-border">
                        <div class="row">
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
                                <div class="knob-label">Mail-Orders</div>
                            </div><!-- ./col -->
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
                                <div class="knob-label">Online</div>
                            </div><!-- ./col -->
                            <div class="col-xs-4 text-center">
                                <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
                                <div class="knob-label">In-Store</div>
                            </div><!-- ./col -->
                        </div><!-- /.row -->
                    </div><!-- /.box-footer -->
                </div><!-- /.box -->

            </section><!-- right col -->
        </div><!-- /.row (main row) -->

    </section><!-- /.content -->

@endsection
