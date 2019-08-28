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
		<?php $setting = get_setting(); ?>
        <script>
            var recaptcha;

            var myCallBack = function () {
                //Render the recaptcha1 on the element with ID "recaptcha1"
                recaptcha = grecaptcha.render('recaptcha', {
                    'sitekey': '<?php echo $setting->captcha_public; ?>', //Replace this with your Site key
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
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}
                                <fieldset>

                                    @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input class="form-control" id="email"  placeholder="E-mail" value="{{ old('email') }}" name="email" type="email" autofocus>
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>
									<?php if($setting->captcha == 0) {  ?>
                                    <div class="form-group">
                                        <div id="recaptcha"></div>
                                    </div>
									<?php } ?>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i> Login
                                    </button>
									<br>
									<?php if($setting->registration == 0) {  ?>
									<br>
									
									<a href="redirect"><img src="<?php echo url("assets/frontend/images/facebook-login.png"); ?>"> </a>OR<a class="btn btn-link center" href="{{ url('/register') }}">Register Now</a>
									<br>
									<?php } ?>

                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                                    
                                </fieldset>
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

