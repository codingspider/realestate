@extends('backend.layouts.app')

@section('content')
<link href="<?php echo url("assets/css/jquery.filer.css"); ?>" type="text/css" rel="stylesheet" />
<link href="<?php echo url("assets/css/themes/jquery.filer-dragdropbox-theme.css"); ?>" type="text/css" rel="stylesheet" />
<script src="<?php echo url("assets/js/jquery.filer.min.js"); ?>"></script>
<script src="<?php echo url("assets/js/upload.js"); ?>"></script>
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



<div class="panel-body">
    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="POST" action="<?php echo url("property/save"); ?>" enctype="multipart/form-data">

                {!! csrf_field() !!} 
                
                <div class="col-sm-12">

                    <div class="form-group">
                        <label>Drag or Click to Upload</label>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="file" name="file[]" accept=".png, .jpg, .jpeg"  id="filer_input2" multiple="multiple">
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
		
		

                   <ul class="jFiler-items-list jFiler-items-grid">
				   <?php foreach($images as $row) { ?>
					<li class="jFiler-item">
                        <div class="jFiler-item-container">
                            <div class="jFiler-item-inner">
                                <div class="jFiler-item-thumb">
                                    <div class="jFiler-item-status"></div>
                                    
                                     <img src="<?php echo url(str_replace("thumbnails/" , "" , $row)); ?>">
                                </div>
								
								<div class="jFiler-item-assets jFiler-row">
                                  
                                    <ul class="list-inline pull-right">
                                        <li>
											<a href="javascript:void(0)"  data-name="<?php echo str_replace("assets/gallery/thumbnails/" , "" , $row); ?>" class="delete icon-jfi-trash jFiler-item-trash-action">
											<i class="fa fa-times"> </i>
											</a>
										</li>
                                    </ul>
                                </div>
                               
                            </div>
                        </div>
                    </li>
					
				   <?php } ?>
				   </ul>
                    

    </div>
    <!-- /.row (nested) -->
</div>
<!-- /.panel-body -->

<script type="text/javascript">
	$("body").on("click", ".delete", function () {
        var id = $(this).attr("data-name");
        var form_data = {
            file: id
        };
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?php echo url("admin/gallery/removefile"); ?>',
            data: form_data,
            success: function (msg) {
                location.reload();
            }
        });
    });

</script>

@endsection
