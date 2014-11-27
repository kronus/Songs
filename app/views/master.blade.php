<!doctype html>
<html lang="en">
<head>
    <!-- [if IE 6]>
    <script type="text/javascript">
    alert("The menus on the site will not function in IE prior to IE9, along with other functionalities. Please update to at least IE9");
    </script>
    <![endif]-->
    <!--[if IE 7]>
    <script type="text/javascript">
    alert("The menus on the site will not function in IE prior to IE9, along with other functionalities. Please update to at least IE9");
    </script>
    <![endif]-->
    <!--[if IE 8]>
    <script type="text/javascript">
    alert("The menus on the site will not function in IE prior to IE9, along with other functionalities. Please update to at least IE9");
    </script>
    <![endif]-->
    <!-- CSS Styles -->
	<meta charset="UTF-8">
	<title>Laravel and Angular Song System</title>

    <!-- CSS Styles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="http://www.kronusproductions.com/assets/images/favicon.png" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />

   <!-- Vendor related JS files -->
    <script src="js/vendor/jquery-1.9.1.min.js"></script>
    <script src="js/vendor/underscore.min.js"></script>
    <script src="js/vendor/angular.min.js"></script>
    <script src="js/vendor/angular-sanitize.min.js"></script>
    <script src="js/vendor/angular-resource.js"></script>

	<!-- ANGULAR -->
	<!-- all angular resources will be loaded from the /public folder -->
    <script src="js/controllers/mainCtrl.js"></script> <!-- load our controller -->
    <script src="js/services/songService.js"></script> <!-- load our service -->
    <script src="js/app.js"></script> <!-- load our application -->

    <!-- Directives for the application -->
    <script src="js/directives/songDrctvs.js"></script>

    <!-- add csrf token -->
    <script>
        angular.module("songApp").constant("CSRF_TOKEN", '<?php echo csrf_token(); ?>');
    </script>

</head>
<!-- declare our angular app and controller -->
<body class="container">

	@yield('content')
</body>
</html>