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

                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Type</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($agents as $row) {
                    $photo = url("assets/images/profile/" . $row->id . ".jpg");
                    if (!@getimagesize($photo)) {
                        $photo = url("assets/avatars/profile-pic.jpg");
                    }
                    ?>
                    <tr id="{{$row->id}}">
                        <td><img class="img-responsive" width="60px" src="<?php echo $photo; ?>" alt="" /></td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->phone}}</td>

                        <td>@if($row->AccessLevel == 0) 
                            <a href="#" class="btn btn-success btn-sm"> Admin </a>
                        
						@elseif($row->AccessLevel == 1) 
							<a href="#" class="btn btn-warning btn-sm"> Agent </a>
                        @elseif($row->AccessLevel == 2) 
                            <a href="#" class="btn btn-info btn-sm"> Individual Seller </a>
                        
                        @elseif($row->AccessLevel == 3) 
                            <a href="#" class="btn btn-success btn-sm"> Buyer </a>
                        
                        @elseif($row->AccessLevel == 4) 
                            <a href="#" class="btn btn-primary btn-sm"> Developer </a>
                        @else 
                        <a href="#" class="btn btn-warning btn-sm"> Land Owner </a>
                        @endif
						</td>

                        <td> 
							<?php if($row->AccessLevel != 0) {  ?>
                            <a data-id="{{$row->id}}" class="edit" href="javascript:void(0)" data-toggle="modal" data-target="#myModal"> <i class="fa fa-edit"> </i> </a>
                            <a data-id="{{$row->id}}" class="delete" href="javascript:void(0)" > <i class="fa fa-trash-o "> </i> </a> 
							<?php } ?>
                        </td>
                        
                    </tr>
<?php } ?>

            </tbody>
        </table>
		{!! $agents->links() !!}
    </div>
    <!-- /.table-responsive -->
</div>




<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add New</h4>
            </div>
            <form role="form" action="<?php echo url("admin/agents/save"); ?>" method="post">
                <div class="modal-body">
                    {!! csrf_field() !!} 

                    <div class="form-group">
                        <label> Name</label>
                        <input class="form-control" type="text" id="name" name="name">
                        <input class="form-control" type="hidden" id="id" name="id">
                    </div>

                    <div class="form-group">
                        <label> Email</label>
                        <input class="form-control" id="email" type="email" name="email">
                    </div>

                    <div class="form-group">
                        <label> Password</label>
                        <input class="form-control" id="password" type="password" name="password">
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone" id="phone" value="" class="form-control">
                    </div>


                    <div class="form-group">
                        <label>Facebook</label>
                        <input type="text" name="facebook" id="facebook" value="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Twitter</label>
                        <input type="text" name="twitter" id="twitter" value="" class="form-control">
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
        $("#email").val("");
        $("#id").val("");
        $("#facebook").val();
        $("#twitter").val();
        $("#phone").val();
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
            url: '<?php echo url("admin/agents/delete"); ?>',
            data: form_data,
            success: function (msg) {
                $("#" + id).hide(1);
            }
        });
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
            url: '<?php echo url("admin/agents/get"); ?>',
            data: form_data,
            success: function (msg) {
                var obj = $.parseJSON(msg);
                $("#name").val(obj['name']);
                $("#email").val(obj['email']);
                $("#id").val(obj['id']);
                $("#facebook").val(obj['facebook']);
                $("#twitter").val(obj['twitter']);
                $("#phone").val(obj['phone']);
            }
        });

    });
</script>



@endsection
