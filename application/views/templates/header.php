<!DOCTYPE html>
<html>
  <head>
	<title><?php echo htmlspecialchars($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="gift, recommend, guru" />
	  <meta name="description" content="Gift giving website" />

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="/html/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/html/css/bootstrap-theme.css" />
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="/html/js/bootstrap.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Ajax script -->
    <script src="/html/js/amazon.js" type="text/javascript"></script>
    <script src="/html/js/FBlogin.js" type="text/javascript"></script> 
  </head>
  <body>
        <!-- navigation bar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">GiftGuru</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/welcome">Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Profile <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
            <li><a href="/welcome/about">About</a></li>
            <li><a href="/welcome/amazon">Amazon</a></li>
            <li><a href="/welcome/contact">Contact Us</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <link rel="stylesheet" type="text/css" href="/html/css/search.css" />


    <div class="container theme-showcase mainContainer">