@extends('backend.layouts.app')

@section('content')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="dashboard">Home</a>
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

<!-- /.panel-heading -->
<div class="panel-body">
    <div class="table-responsive">
        <table class="table  table-bordered table-hover">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php $i= 1; foreach ($newsletters as $row) { ?>
                    <tr>
                        <td><?php echo $i; ?> </td>
                        <td><?php echo $row->email; ?></td> 
                    </tr>
				<?php $i++; } ?>

            </tbody>
        </table>
        {!! $newsletters->links() !!}
    </div>
    <!-- /.table-responsive -->
</div>

@endsection
