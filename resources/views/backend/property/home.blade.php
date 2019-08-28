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
    <h1><?php echo $title; ?> <a class="btn btn-primary pull-right" href="<?php echo url("admin/property/add"); ?>"  style="margin-bottom:5px"><i class="fa fa-plus"> </i> Add</a></h1>
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
                    <th>Photo</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Category</th>
                   
					<?php if(Auth::user()->AccessLevel == 0) {  ?>
					<th>Agent</th>
                    <th>Featured</th>
					<?php } else {  ?>
					<th>Featured</th>
					<?php } ?>
                    <th>Archive</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($properties as $row) { ?>
                    <tr>
                        <td><img class="img-responsive" width="100px" src="<?php echo url("/assets/images/uploads/" . $row->user_id . "/" . $row->image_name); ?>" alt="" /></td>
                        <td><?php echo $row->title; ?> <br>

                            <?php echo $row->city; ?>, <?php echo $row->state; ?>, <?php echo $row->zip; ?>
                        </td>
                        <td><?php echo $row->price; ?> <small> <?php if ($row->type == "SALE") { ?> For Sale  <?php } else {
                            ?> For Rent <?php }
                            ?>  </small> </td>
                        <td>
                            Bathrooms : <?php echo $row->bath; ?> <br>
                            Bedrooms : <?php echo $row->beds; ?> <br>
                            Year : <?php echo $row->year; ?> <br>

                        </td>
                        <td> {{get_catogory($row->category_id)}} </td>
                       
						<?php if(Auth::user()->AccessLevel == 0) {  ?>
							<td> {{get_agent($row->agent_id)}} </td>
							<td> <input class="featured" data-id="<?php echo $row->id; ?>"  type="checkbox" <?php if ($row->featured == 1) {
                                echo "checked";
                            }
                            ?> data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-size="small" data-offstyle="danger"> </td>
						<?php } else {  ?>
							<td>
							<?php  if ($row->featured == 1) { ?>
								<a href="<?php echo url("admin/property/featured/" . $row->id); ?>" class="btn-sm btn btn-success"> Featured </a>
							<?php } else {  ?>
								<a href="<?php echo url("admin/listing/featured/" . $row->id); ?>" class="btn-sm btn btn-warning"> Featured Now </a>
							<?php } ?>
							</td>
						<?php } ?>
					   <td> <input class="archived"  data-id="<?php echo $row->id; ?>"  type="checkbox" <?php if ($row->is_delete == 1) {
                                echo "checked";
                            }
                            ?> data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-size="small" data-offstyle="danger"> </td>
                        <td> 
                            <a data-id="1" href="<?php echo url("admin/listing/edit/" . $row->id); ?>" > <i class="fa fa-edit"> </i> </a>
                            <a target="_blank" href="<?php echo url("property/". $row->id . "/" . clean($row->title)) ?>" > <i class="fa fa-eye "> </i> </a> 
                            <a href="<?php echo url("admin/listing/delete/" . $row->id); ?>" > <i class="fa fa-trash-o "> </i> </a>  
                        </td>
                    </tr>
<?php } ?>

            </tbody>
        </table>
        {!! $properties->render() !!}
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

$("body").on("change", ".archived", function () {
    var property_id = $(this).attr("data-id");

    var form_data = {
        property_id: property_id
    };
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '<?php echo url("admin/property/addToArchive"); ?>',
        data: form_data,
        success: function (msg) {
            //$(this).attr('data-value', value_new)
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
