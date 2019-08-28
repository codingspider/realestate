<?php $setting = get_setting(); ?>
<head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<title><?php echo $setting->title; ?> </title>
        <meta name="keywords" content="easyestate, real estate, rent, sale, houses, flats, villas" />
        <meta name="description" content="Easy Esrate Real estate protal">
        <meta name="author" content="arfan67@gmail.com">   
        
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width,  minimum-scale=1,  maximum-scale=1">
        <!-- Your styles -->
        <link href="{{url('assets/frontend/css/style.css')}}" rel="stylesheet" media="screen">  
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

        <!-- Skins Theme -->
		<?php $themecolor = "red"; 
			$theme_color =  $setting->theme_color;
			if(!empty($theme_color)) { 
				$themecolor = $theme_color;
			}
		?>
        <link href="<?php echo url("assets/frontend/css/skins/$themecolor/$themecolor.css"); ?>" rel="stylesheet" media="screen" class="skin">

        <!-- Favicons -->
        <link rel="shortcut icon" href="{{url('assets/frontend/img/icons/favicon.html')}}">
        <link rel="apple-touch-icon" href="{{url('assets/frontend/img/icons/apple-touch-icon.html')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{url('assets/frontend/img/icons/apple-touch-icon-72x72.html')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{url('assets/frontend/img/icons/apple-touch-icon-114x114.html')}}">  

    
        <!-- Skins Changer-->
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
		 <script src="{{url('assets/frontend/js/jquery.min.js')}}"></script> 
    </head>