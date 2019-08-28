<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="arfan67@gmail.com">

        <title>Easy Estate Admin</title>

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
                            <h3 class="panel-title">Password Reset</h3>
                        </div>
                        <div class="panel-body">
                            @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            @endif
							
							@if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                            <form  role="form" method="POST" action="{{ url('/password/email') }}">
                                {{ csrf_field() }}
                                <fieldset>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input class="form-control" id="email"  placeholder="E-mail" value="{{ old('email') }}" name="email" type="email" autofocus>

                                    </div>
                                    <div class="form-group">
                                        <div id="recaptcha"></div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                                            </button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>

                    </div>
                    <span class="pull-left"> Back to <a href="<?php echo url("/login"); ?>"> Login </a> </span>
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

