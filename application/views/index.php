<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<br><br><br>

<div id="blocks">
  <div class="block-row">
    <?php
      for ($i = 0; $i < 7; $i++) {
        echo ("<div class=\"block check" . (($i % 2) + 1) . "\" id=\"grid" . ($i+1) . "\">");   
        echo "<div class='block-inner'><table style=\"height: 100%; width: 100%;\">";
        echo "<tbody><tr><td><div class=\"block-icon quote\"></div><p>". $friendName . "'s Wish: </p>";
        echo ("<h4>" . ($wishList[$i]['item_description']) . "</h4></td></tr></tbody></table></div></div>");
      }
    ?>
  </div>
  <div class="block-row">
    <?php
      for ($i = 0; $i < 7; $i++) {
      echo ("<div class=\"block check" . ((($i+1) % 2) + 1) . "\" id=\"grid" . ($i+8) . "\">");   
      echo "<div class='block-inner'><table style=\"height: 100%; width: 100%;\">";
      echo "<tbody><tr><td><div class=\"block-icon quote\"></div>";            
      echo ("<p>" . $questions[$i]['question_text'] . ": </p>");
      echo ("<h4>" . ($answers[$i]['answer_text']) . "</h4></td></tr></tbody></table></div></div>");
      }
    ?>
  </div>
  
</div>
<div id="sweetrow">
<br>  <div class="h1" style="margin-left:70px; text-align:center;"> Guru Picks for amazon stickers</div>
  <div style="margin-left:40px"><br>
    <div class="col-md-1 row" style="height:168px" ><img src='/html/images/leftArrow.png' width='60' style="margin-top: 54px"></div>
    <div class="col-md-10">
      <?php
          $item = $wishListRecs[0];

          for ($i = 0; $i < 6; $i++) {
            echo "<div class='col-md-2'> <a class='thumbnail' href=\"" . $item[$i]['pageUrl'] . "\" target=\"_blank\">";
            echo "<img src=\"" . $item[$i]['imgUrl'] ."\"></a>";
            echo "<div class='pdtPrice'>" . $item[$i]['price'] . "</div>";
            echo "<div class='pdtTitle'>" . $item[$i]['title'] . "</div></div>";
          }
      ?>
    </div>
    <div class="col-md-1 row" style="height:168px" ><img src='/html/images/rightArrow.png' width='60' style="margin-top: 34px"></div>
  </div>
</div>
