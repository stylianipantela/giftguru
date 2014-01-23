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
          <a class="navbar-brand" href="#">Munerum</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
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
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <link rel="stylesheet" type="text/css" href="{% static 'welcome/css/search.css' %}" />


    <div class="container theme-showcase mainContainer">
        <br><br><br>
        <h1>Search with Munerum!</h1>
         <div class="personalityButtons" align="center">
                <label class="tag" id="geeky">geeky</label>
                <label class="tag" id="bookish">bookish</label>
                <label class="tag" id="drinks">drinks</label>
                <label class="tag" id="gourmet food">gourmet food</label>
                <label class="tag" id="fashionable">fashionable</label>
        </div>
        <br><br><br>
        <h1>Search with Munerum!</h1>
         <div class="personalityButtons" align="center">
                <label class="tag" id="geeky">geeky</label>
                <label class="tag" id="bookish">bookish</label>
                <label class="tag" id="drinks">drinks</label>
                <label class="tag" id="gourmet food">gourmet food</label>
                <label class="tag" id="fashionable">fashionable</label>
        </div>
        <br>
        <div class="container-fluid">
            <form class="form-signin span3" id="user_form" method="post" action="search">
                <!-- Display the search form elements here -->
                <input type="text" size="50" name="query" value="" id="query" />
                <input class="btn btn-primary" type="submit" name="submit" value="Search" />
                <br/>
            </form>

            <div class="recContainer" id = "displayArea">
             
            </div>
        </div>
    </div>

    <div id="items">
    </div>


