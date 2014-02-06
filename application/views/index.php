<br><br><br><br>

<h1 align="center">Guru's Picks for <?= $friendName?></h1><br>

<div class="container">
      <?php
        $counter = 0;
        echo "<div class=\"row\">";
        $str = array ("", "", "");
        foreach ($prods as &$prod) {
          $i = $counter % 3;
          $imgUrl = $prod['imgUrl'];
          $pageUrl = $prod['pageUrl'];
          $str[$i] .= " <div class=\"thumbnail\" align=\"center\"><br>";
          $str[$i] .= "<h4>" . $prod['title'] . "</h4>";
          $str[$i] .= "<p><a href=\"". $pageUrl . "\" target=\"_blank\"><img src=\"". $imgUrl ."\" width=\"80%\" height=\"80%\" alt=\"\"></a></p>";
          $str[$i] .= "<p>" . $prod['price'] . "</p>";
          $str[$i] .= "<p><a href=\"". $pageUrl . " \" class=\"btn btn-success\" data-toggle=\"tooltip\" title=\"Email\"><span class=\"glyphicon glyphicon-envelope\"></span></a> ";
          $str[$i] .= "<a href=\"". $pageUrl . " \" class=\"btn btn-info\" data-toggle=\"tooltip\" title=\"More Info\"><span class=\"glyphicon glyphicon-info-sign\"></span></a> ";
          $str[$i] .= "<a href=\"". $pageUrl . " \" class=\"btn btn-danger\" data-toggle=\"tooltip\" title=\"Like\"><span class=\"glyphicon glyphicon-heart\"></span></a> ";  
          $str[$i] .= "<a href=\"". $pageUrl . " \" class=\"btn btn-warning\" data-toggle=\"tooltip\" title=\"Star\"><span class=\"glyphicon glyphicon-star\"></span></a></p>";  
          $str[$i] .= "</div>";
          $counter++;
        }  
        echo "<div class=\"col-md-4 col-xs-6\">";
        echo $str[0];
        echo "</div>"; 
        echo "<div class=\"col-md-4 col-xs-6\">";
        echo $str[1];
        echo "</div>"; 
        echo "<div class=\"col-md-4 col-xs-6\">";
        echo $str[2];
        echo "</div>"; 
        echo "</div>";      
      ?>
</div>

