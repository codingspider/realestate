@extends('backend.layouts.app')

@section('content')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
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
                    <th>Property Title</th>
                    <th>Amount</th>
                    <th>Paid By</th>
                    <th>Featured Now</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php $i= 1; foreach ($payments as $row) { ?>
                    <tr>
                        <td><?php echo $row->title; ?> </td>
						<td><?php echo $row->amount/100; ?> </td> 
						<td> <?php echo get_agent($row->agent_id); ?> </td>
						<td> <input class="featured" data-id="<?php echo $row->property_id; ?>"  type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-size="small" data-offstyle="danger"> </td>
						
					  
                    </tr>
<?php } ?>

            </tbody>
        </table>
        {!! $payments->render() !!}
    </div>
    <!-- /.table-responsive -->
</div>

<script>
$("body").on("change", ".featured", function () {

    var property_id = $(this).attr("data-id");

    var form_data = {
        property_id: property_id
    };
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '<?php echo url("admin/property/addTofeatured"); ?>',
        data: form_data,
        success: function (msg) {

        }
    });

});

</script>
<?php

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
?>

@endsection
