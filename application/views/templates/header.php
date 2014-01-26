<!DOCTYPE html>
<html>
  <head>
	<title><?php echo htmlspecialchars($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="gift, recommend, guru" />
	  <meta name="description" content="Gift giving website" />
    <link rel="stylesheet" type="text/css" href="/html/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/html/css/search.css" />
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="/html/js/bootstrap.js"></script>
    <script src="/html/js/header.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Ajax script -->
    <script src="/html/js/amazon.js" type="text/javascript"></script>
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/welcome">GiftGuru</a>
      </div>
      <div class="navbar-collapse collapse navbar-inverse-collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Find a gift for <?php echo $friendName?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <?php 
                  foreach ($friendList as $friend){ 
                      echo "<li><a name='".$friend['id']."' href='/welcome/index/" . $friend['id'] . "'>".$friend['name']."</a></li>";
                  }
                ?>
              </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-left">
          <input type="text" class="form-control col-lg-8" placeholder="Search">
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/welcome/about">About</a></li>
          <li><a href="/welcome/myprofile">My Profile</a></li>
        </ul>
      </div><!-- /.nav-collapse -->
    </div>
      </div>
    </div>
