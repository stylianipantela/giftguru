<br><br><br><br>

<h1 align="center">Guru's Picks for <?= $friendName?></h1><br>

<div class="container">
      <?php
        for ($j = 0; $j < 7; $j++) {
          $prod = $prods[$j];
          echo "<div class=\"row\">";
          for ($i = 0; $i<3; $i++){
            $imgUrl = $prod[$i]['imgUrl'];
            $pageUrl = $prod[$i]['pageUrl'];
            echo "<div class=\"col-md-4 col-xs-6\">";
            echo " <div class=\"thumbnail\" align=\"center\"><br>";
            echo "<h4>" . $prod[$i]['title'] . "</h4>";
            echo "<p><a href=\"". $pageUrl . "\" target=\"_blank\"><img src=\"". $imgUrl ."\" width=\"80%\" height=\"80%\" alt=\"\"></a></p>";
            echo "<p>" . $prod[$i]['price'] . "</p>";
            echo "<p><a href=\"". $pageUrl . " \" class=\"btn btn-success\" data-toggle=\"tooltip\" title=\"Email\"><span class=\"glyphicon glyphicon-envelope\"></span></a> ";
            echo "<a href=\"". $pageUrl . " \" class=\"btn btn-info\" data-toggle=\"tooltip\" title=\"More Info\"><span class=\"glyphicon glyphicon-info-sign\"></span></a> ";
            echo "<a href=\"". $pageUrl . " \" class=\"btn btn-danger\" data-toggle=\"tooltip\" title=\"Like\"><span class=\"glyphicon glyphicon-heart\"></span></a> ";  
            echo "<a href=\"". $pageUrl . " \" class=\"btn btn-warning\" data-toggle=\"tooltip\" title=\"Star\"><span class=\"glyphicon glyphicon-star\"></span></a></p>";  
            echo "</div>";
            echo "</div>";
          }  
          echo "</div>";
        }
        
      ?>
</div>

