<?php $setting = get_setting(); ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="easyestate">
    <meta name="author" content="arfan67@gmail.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title><?php echo $setting->title; ?> Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo url("assets/css/metisMenu.min.css"); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo url("assets/css/sb-admin-2.css"); ?>" rel="stylesheet">
    <link href="<?php echo url("assets/css/timeline.css"); ?>" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo url("assets/css/font-awesome.min.css"); ?>" rel="stylesheet">
    

    <!-- jQuery -->
    <script src="<?php echo url("assets/js/jquery.min.js"); ?>"></script>

</head>
