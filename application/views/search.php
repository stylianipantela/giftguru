     <br><br><br>
     <h1>Search with Munerum!</h1>

    <pre>
        <?php echo print_r($user_profile, TRUE) ?>
        <?php echo $user ?>
    </pre>
    <?php if (@$user_profile): ?>
        <pre>
            <?php echo print_r($user_profile, TRUE) ?>
        </pre>
        <a href="<?= $logout_url ?>">Logout</a>
    <?php else: ?>
        <h2>Welcome, please login below</h2>
        <a href="<?= $login_url ?>"><img src="/html/images/facebook_login_button.png" alt="Facebook Login"></a>
    <?php endif; ?>

     <div class="personalityButtons" align="center">
             <label class="tag" id="academic">Practical Academic</label>
             <label class="tag" id="college">College Useful</label>
             <label class="tag" id="humor">Tongue n Cheek Humor</label>
             <label class="tag" id="sweet">Sweet heart</label>
             <label class="tag" id="sexy">Lustrous</label>
     </div>
     <br><br>
     <div class="personalityButtons" align="center">
             <label class="tag type1" id="electronics">Electronic Accessories</label>
             <label class="tag type1" id="clothes">Clothing</label>
             <label class="tag type1" id="food">Food</label>
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


