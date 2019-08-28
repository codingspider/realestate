@extends('backend.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="panel-body">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $data['total_agents']; ?></div>
                            <div> Total Agents </div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo url("agents"); ?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $data['total_properties']; ?></div>
                            <div>Total Properties !</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo url("properties"); ?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-dollar fa-5x"></i>
                        </div>
						<?php $amount = 0; foreach($data['payments'] as $pay) { $amount = $amount + $pay->amount;  } ?>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $amount/100; ?></div>
                            <div>Payment</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo url("/payments"); ?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-support fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $data['total_customer_requets']; ?></div>
                            <div>Support Request!</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo url("customer-request"); ?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row"> 
        <div class="col-md-6">
            <div class="page-header">
                <h4> Last Registered Agents </h4>
            </div>                
            <div class="table-responsive">
                <table class="table  table-bordered table-hover">
                    <thead>
                        <tr>

                            <th>Name</th>
                            <th>Option</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['agents'] as $row)
                        <tr id="">

                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->phone}}</td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-6"> 
            <div class="page-header">
                <h4> Customers Request </h4>
            </div>
            <div class="table-responsive">
                <table class="table  table-bordered table-hover">
                    <thead>
                        <tr>

                            <th>Name</th>
                            <th>Option</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($data['customer_requets'] as $row)
                        <tr id="">

                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->phone}}</td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
