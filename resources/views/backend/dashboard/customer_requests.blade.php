@extends('backend.layouts.app')

@section('content')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?php echo url("/"); ?>">Home</a>
        </li>



        <li class="active"><?php echo $title; ?></li>
    </ul><!-- /.breadcrumb -->


</div>


<div class="page-header">
    <h1><?php echo $title; ?> </h1>
</div>

@if(Session::has('flash_message'))
<div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
@endif

<div class="panel-body">
    <div class="table-responsive">
        <table class="table  table-bordered table-hover">
            <thead>
                <tr>

                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Property</th>
                </tr>
            </thead>
            <tbody>

                @foreach($customer_requets as $row)
                <tr id="">

                    <td>{{$row->name}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->phone}}</td>
                    <td>{{$row->message}}</td>
                    <?php if ($row->property_id != 0) { ?>
                        <td> <?php $property = get_property($row->property_id); ?> 
                            <a target="_blank" href="<?php echo url("admin/listing/edit/" . $row->property_id); ?>"> <?php echo $property->title; ?> </a>
                        </td>
                    <?php } ?>

                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
    <!-- /.table-responsive -->
</div>




@endsection
