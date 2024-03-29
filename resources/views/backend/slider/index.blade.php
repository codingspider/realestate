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
    <h1><?php echo $title; ?> <a class="add_new btn btn-primary pull-right" href="javascript:void(0)" data-toggle="modal" data-target="#myModal" style="margin-bottom:5px"><i class="fa fa-plus"> </i> Add</a></h1>
</div>

@if(Session::has('flash_message'))
<div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
@endif

<div class="panel-body">
    <div class="table-responsive">
        <table class="table  table-bordered table-hover">
            <thead>
                <tr>

                    <th>Image</th>
                    <th>Title</th>
                    <th>Link</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sliders as $row) { ?>
                    <tr id="{{$row->id}}">

                        <td> <img width="150px" src="{{url('assets/images/slider/' . $row->image)}}"> </td>
                        <td>{{$row->title}}</td>
                        <td><?php $property = get_property($row->product_id);?> <a target="_blank" href="{{url('property/' . $property->id . '/' . clean($property->title) )}}"> {{$property->title}} </a></td>
                        <td> 
                            <a data-id="{{$row->id}}" class="edit" href="javascript:void(0)" data-toggle="modal" data-target="#myModal"> <i class="fa fa-edit"> </i> </a>
                            <a data-id="{{$row->id}}" class="delete" href="javascript:void(0)" > <i class="fa fa-trash-o "> </i> </a> 
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
    <!-- /.table-responsive -->
</div>

<?php

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
?>




<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add New</h4>
            </div>
            <form role="form" action="<?php echo url("admin/slider/save"); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    {!! csrf_field() !!} 

                    <div class="form-group">
                        <label> Name</label>
                        <input class="form-control" type="text" id="title" name="title">
                        <input class="form-control" type="hidden" id="id" name="id">
                    </div>
					
					 <div class="form-group">
                        <label> Property </label>
						<select name="product_id" id="product_id" class="form-control"> 
							<option value=""> Select Property </option>
							<?php foreach($properties as $property) { ?>
								<option value="<?php echo $property->id; ?>"> <?php echo $property->title; ?> </option>
							<?php } ?>
						</select>
                    </div>
					
					<div class="form-group">
                        <label> Image </label>
						<input type="file" name="file" />
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
    $("body").on("click", ".add_new", function () {
        $("#name").val("");
        $("#name").val("");
        $("#id").val("");
    });
    $("body").on("click", ".edit", function () {
        var id = $(this).attr("data-id");
        var form_data = {
            id: id
        };
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?php echo url("admin/slider/get"); ?>',
            data: form_data,
            success: function (msg) {
                var obj = $.parseJSON(msg);
                $("#title").val(obj['title']);
                $("#product_id").val(obj['product_id']);
                $("#id").val(obj['id']);
            }
        });

    });


    $("body").on("click", ".delete", function () {
        var id = $(this).attr("data-id");
        var form_data = {
            id: id
        };
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?php echo url("admin/slider/delete"); ?>',
            data: form_data,
            success: function (msg) {
                $("#" + id).hide(1);
            }
        });
    });

</script>



@endsection
