<!DOCTYPE html>
<html>
  <head>
	<title><?php echo htmlspecialchars($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="gift, recommend, guru" />
	  <meta name="description" content="Gift giving website" />
    <link rel="stylesheet" type="text/css" href="/html/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/html/css/search.css" />
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="/html/js/bootstrap.js"></script>
    <script src="/html/js/amazon.js"></script>

  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/welcome/">GiftGuru</a>
      </div>
      <div class="navbar-collapse collapse navbar-inverse-collapse">
        <ul class="nav navbar-nav">
          <li><a href="/welcome/about">About</a></li>
          <li><a href="/welcome/myprofile">My Profile</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Find a gift for <?php echo $friendName?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <?php 
                  foreach ($friendList as $friend){ echo "<li><a name='".$friend['id']."' href='/welcome/index/" . $friend['id'] . "'>".$friend['name']."</a></li>";}
                ?>
              </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        </ul>
      </div>
    </div>
      </div>
    </div>
