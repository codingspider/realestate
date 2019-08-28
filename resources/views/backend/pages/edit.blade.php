@extends('backend.layouts.app')

@section('content')

<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?php echo url("pages"); ?>">Home</a>
        </li>



        <li class="active"><?php echo $title; ?></li>
    </ul><!-- /.breadcrumb -->


</div>


<div class="page-header">
    <h1><?php echo $title; ?> </h1>
</div>



<div class="panel-body">
    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="POST" action="<?php echo url("admin/pages/save"); ?>" enctype="multipart/form-data">

                {!! csrf_field() !!} 
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Title</label>
                        <input placeholder="Title" type="text" required name="title" value="{{$page->title}}" class="form-control">
						<input type="hidden" value="<?php echo $page->id; ?>" name="id" >
						
                    </div>
                </div>

                
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="body" class="form-control" rows="10"><?php echo $page->body; ?></textarea>
                    </div>
                </div>
				
				<div class="col-sm-12">

                    <div class="form-group">
                        <label>Main Image</label>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="file" name="mainfile" accept=".png, .jpg, .jpeg"  >
								<?php // if(file_exists(url("assets/images/uploads/1/" . $page->image))) { ?>
                                <img src="<?php echo url("assets/images/uploads/1/" . $page->image); ?>" width="100px"> 
								<?php // } ?>
                            </div>

                        </div>
                    </div>
                </div>
              
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-primary pull-right">
                    </div>
                </div>



            </form>
        </div>

    </div>
    <!-- /.row (nested) -->
</div>


@endsection
