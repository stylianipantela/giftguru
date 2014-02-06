<br><br><br><br>

<h1 align="center">Guru's Picks for <?= $friendName?></h1><br>

<div class="container">
      <?php
        $counter = 0;
        foreach ($prods as &$prod) {
          if ($counter % 3 == 0)
            echo "<div class=\"row\">";
          $imgUrl = $prod['imgUrl'];
          $pageUrl = $prod['pageUrl'];
          echo "<div class=\"col-md-4 col-xs-6\">";
          echo " <div class=\"thumbnail\" align=\"center\"><br>";
          echo "<h4>" . $prod['title'] . "</h4>";
          echo "<p><a href=\"". $pageUrl . "\" target=\"_blank\"><img src=\"". $imgUrl ."\" width=\"80%\" height=\"80%\" alt=\"\"></a></p>";
          echo "<p>" . $prod['price'] . "</p>";
          echo "<p><a href=\"". $pageUrl . " \" class=\"btn btn-success\" data-toggle=\"tooltip\" title=\"Email\"><span class=\"glyphicon glyphicon-envelope\"></span></a> ";
          echo "<a href=\"". $pageUrl . " \" class=\"btn btn-info\" data-toggle=\"tooltip\" title=\"More Info\"><span class=\"glyphicon glyphicon-info-sign\"></span></a> ";
          echo "<a href=\"". $pageUrl . " \" class=\"btn btn-danger\" data-toggle=\"tooltip\" title=\"Like\"><span class=\"glyphicon glyphicon-heart\"></span></a> ";  
          echo "<a href=\"". $pageUrl . " \" class=\"btn btn-warning\" data-toggle=\"tooltip\" title=\"Star\"><span class=\"glyphicon glyphicon-star\"></span></a></p>";  
          echo "</div>";
          echo "</div>";  
          if ($counter % 3 == 2)
            echo "</div>";
          $counter++;
        }        
      ?>
</div>

