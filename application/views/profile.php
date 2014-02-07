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
        <a class="navbar-brand" href="/welcome/about">GiftGuru</a>
      </div>
      <div class="navbar-collapse collapse navbar-inverse-collapse">
        <ul class="nav navbar-nav">
          <li><a href="/welcome/about">About</a></li>
          <li><a href="/welcome/myprofile" style="color: white">My Profile</a></li>
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


<link rel="stylesheet" type="text/css" href="/html/css/profile.css" />
<script src="/html/js/profile.js"></script> 

<br><br><br><br>



<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="thumbnail" align="center">
                <h4>Favorite Food</h4>
                <p><input autofocus placeholder="Top Secret" type="text"/><br><br><a href="#" class="btn btn-success insert">Enter</a></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail" align="center">
                <h4>Dream Destination</h4>
                <p><input autofocus placeholder="Top Secret" type="text"/><br><br><a id="bla" href="#" class="btn btn-success insert" data-toggle="tooltip">Enter</a></p>

            </div>
        </div><div class="col-md-4">
            <div class="thumbnail" align="center">
                <h4>Idol</h4>
                <p><input autofocus placeholder="Top Secret" type="text"/><br><br><a id="bla" href="#" class="btn btn-success insert" data-toggle="tooltip">Enter</a></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="thumbnail" align="center">
                <h4>Favorite Song</h4>
                <p><input autofocus placeholder="Top Secret" type="text"/><br><br><a id="bla" href="#" class="btn btn-success insert" data-toggle="tooltip">Enter</a></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail" align="center">
                <h4>Secret Desire</h4>
                <p><input autofocus placeholder="Top Secret" type="text"/><br><br><a id="bla" href="#" class="btn btn-success insert" data-toggle="tooltip">Enter</a></p>
            </div>
        </div><div class="col-md-4">
            <div class="thumbnail" align="center">
                <h4>Movie</h4>
                <p><input autofocus placeholder="Top Secret" type="text"/><br><br><a id="bla" href="#" class="btn btn-success insert" data-toggle="tooltip">Enter</a></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="thumbnail" align="center">
                <h4>Band</h4>
                <p><input autofocus placeholder="Top Secret" type="text"/><br><br><a id="bla" href="#" class="btn btn-success insert" data-toggle="tooltip">Enter</a></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail" align="center">
                <h4>Snack</h4>
                <p><input autofocus placeholder="Top Secret" type="text"/><br><br><a id="bla" href="#" class="btn btn-success insert" data-toggle="tooltip">Enter</a></p>
            </div>
        </div><div class="col-md-4">
            <div class="thumbnail" align="center">
                <h4>Restaurant</h4>
                <p><input autofocus placeholder="Top Secret" type="text"/><br><br><a id="bla" href="#" class="btn btn-success insert" data-toggle="tooltip">Enter</a></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="thumbnail" align="center">
                <h4>European City</h4>
                <p><input autofocus placeholder="Top Secret" type="text"/><br><br><a id="bla" href="#" class="btn btn-success insert" data-toggle="tooltip">Enter</a></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail" align="center">
                <h4>Ethnic Cuisine</h4>
                <p><input autofocus placeholder="Top Secret" type="text"/><br><br><a id="bla" href="#" class="btn btn-success insert" data-toggle="tooltip">Enter</a></p>
            </div>
        </div><div class="col-md-4">
            <div class="thumbnail" align="center">
                <h4>Hobby</h4>
                <p><input autofocus placeholder="Top Secret" type="text"/><br><br><a id="bla" href="#" class="btn btn-success insert" data-toggle="tooltip">Enter</a></p>
            </div>
        </div>
    </div>
</div>