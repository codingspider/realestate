@extends('backend.layouts.app')

@section('content')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?php echo url("/"); ?>">Home</a>
        </li>
        <li class="active">
            Profile
        </li>
    </ul><!-- /.breadcrumb -->


</div>




<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->


        @if(Session::has('flash_message'))
        <div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
        @endif

        <div class="page-header">
            <h1>Profile</h1>
        </div>

        <div class="row">
            <div class="col-md-3 center">
                <!-- #section:pages/profile.picture -->
                <?php
                $external_link = asset("assets/images/profile/" . $user->id . ".jpg");
                ;
                if (@getimagesize($external_link)) {
                    $photo = asset("assets/images/profile/" . $user->id . ".jpg");
                } else {
                    $photo = url("assets/avatars/profile-pic.jpg");
                }
                ?>
                <span class="profile-picture">
                    <img id="avatar" class="editable img-responsive" alt="<?php echo $user->name; ?>" src="<?php echo $photo; ?>" />
                </span>

                <!-- /section:pages/profile.picture -->
                <div class="space-4"></div>


                </form>
            </div>
            <div class="col-md-9">
                <div class="profile-user-info profile-user-info-striped">

                    <div class="profile-info-row">
                        <div class="profile-info-name">Name</div>
                        <div class="profile-info-value">
<?php echo $user->name; ?>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name">Email</div>
                        <div class="profile-info-value">
<?php echo $user->email; ?>&nbsp;&nbsp; <i class="fa fa-check-circle green bigger-120"></i> 
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name">Phone</div>
                        <div class="profile-info-value">
<?php echo $user->phone; ?>&nbsp;&nbsp; </i> 
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name">Facebook</div>
                        <div class="profile-info-value">
<?php echo $user->facebook; ?>&nbsp;&nbsp; </i> 
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name">Twitter</div>
                        <div class="profile-info-value">
<?php echo $user->twitter; ?>&nbsp;&nbsp; </i> 
                        </div>
                    </div>






                </div>
            </div>
        </div>
        <div class="form-actions text-right">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#editProfileModal"><i class="fa fa-pencil"></i> Edit Profile</button>&nbsp; &nbsp;
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#changePasswordModal"><i class="fa fa-lock"></i> Change Password</button>
        </div>
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->


<!-- Change Passworn Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Change Password</h4>
            </div>
            <form action="<?php echo url("agents/password_reset"); ?>" method="post" >
                {!! csrf_field() !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Old Password</label>
                                <input name="old_password" required type="password" id="old_password" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>New Password</label>
                                <input name="password" required id="password"  type="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Confirm New Password</label>
                                <input name="confirm_password" required id="confirm_password" type="password" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div style="color:red" id="password_msg"> </div>
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="submit" id="password_submit" class="qrCodePopover btn btn-primary"><i class="fa fa-check"></i> Save Password</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("body").on("keyup", "#password , #confirm_password", function () {
        var password = $("#password").val();
        console.log(password.length);
        var confirm_password = $("#confirm_password").val();
        if (password.length < 6) {
            $("#password_msg").html("Password length at least 6 character long");
            $('#password_submit').attr('disabled', 'disabled');
        } else if (password != confirm_password) {
            if (confirm_password != '') {
                $("#password_msg").html("Password and Confirm Password does not match");
            } else {
                $("#password_msg").html("");
            }
            $('#password_submit').attr('disabled', 'disabled');
        } else {
            $("#password_msg").html("");
            $('#password_submit').removeAttr('disabled', 'disabled');
        }


    });
</script>


<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
            </div>
            <form action="<?php echo url("agents/update_profile"); ?>" method="post" enctype="multipart/form-data" >
                {!! csrf_field() !!}
                <div class="modal-body">
                    <div class="row">


                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="<?php echo $user->name; ?>"  class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="<?php echo $user->email; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="text" name="facebook" value="<?php echo $user->facebook; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Twitter</label>
                                <input type="text" name="twitter" value="<?php echo $user->twitter; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phone" value="<?php echo $user->phone; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file" name="photo" class="form-control">
                            </div>
                        </div>
						<?php if(Auth::user()->AccessLevel != 0) {  ?>
						<div class="col-sm-12">
						<div class="form-group">
								<label class="radio-inline">
								  <input type="radio" <?php if($user->AccessLevel == 1) echo "checked"; ?> value="1" name="type">Agent
									</label>
									<label class="radio-inline">
									  <input type="radio" value="2" <?php if($user->AccessLevel == 2) echo "checked"; ?> name="type">Individual Seller
									</label>          
                                </div>
                                </div>
						<?php } ?>


                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
                    &nbsp;&nbsp;
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save Changes</button>
                </div>
        </div>
    </div>
</div>

@endsection
