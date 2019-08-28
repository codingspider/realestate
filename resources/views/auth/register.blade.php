<?php $setting = get_setting(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="arfan67@gmail.com">

        <title><?php echo $setting->title; ?> Admin</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo url("assets/css/metisMenu.min.css"); ?>" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo url("assets/css/sb-admin-2.css"); ?>" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?php echo url("assets/css/font-awesome.min.css"); ?>" rel="stylesheet">
        <script src="https://www.google.com/recaptcha/api.js?onload=myCallBack&render=explicit" async defer></script>
        <script>
            var recaptcha;

            var myCallBack = function () {
                //Render the recaptcha1 on the element with ID "recaptcha1"
                recaptcha = grecaptcha.render('recaptcha', {
                    'sitekey': '6LfeqCkTAAAAAGMoJQLdmkjNBtCJcBQVi7SjFpRj', //Replace this with your Site key
                    'theme': 'light'
                });


            };
        </script>

    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Agent Registration</h3>
                        </div>
                        <div class="panel-body">
                            <form  role="form" method="POST" action="{{ url('/register') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input id="name" type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input id="email" type="email" class="form-control" placeholder="E-Mail Address" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input id="password" type="password" placeholder="Password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif

                                </div>
								
								<div class="form-group">
								<label class="radio-inline">
								  <input type="radio"  value="1" name="type">Agent
									</label>
									<label class="radio-inline">
									  <input type="radio" checked value="2" name="type">Individual Seller
									</label>          
                                </div>
								
                                <div class="form-group">
                                    <div id="recaptcha"></div>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Register
                                </button>

                                <a class="btn btn-link" href="{{ url('/login') }}">Sign In?</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?php echo url("assets/js/jquery.min.js"); ?>"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo url("assets/js/bootstrap.min.js"); ?>"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo url("assets/js/metisMenu.min.js"); ?>"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo url("assets/js/sb-admin-2.js"); ?>"></script>

    </body>

</html>

