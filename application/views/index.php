<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<br><br><br>

<div id="blocks">
  <?php
      // wishlist grids
      $gridHtml = array();
      $j = 0;
      for ($i = 0; $i < 7; $i+=2) {   
        $gridHtml[$i] = "<div class=\"block check1\" id=\"grid".($i+1)."\">";   
        $gridHtml[$i] .= "<div class='block-inner'><table style=\"height: 100%; width: 100%;\">";
        $gridHtml[$i] .= "<tbody><tr><td><div class=\"block-icon quote\"></div><p>". $friendName . "'s Wish Item: </p>";
        $gridHtml[$i] .= "<h4>" . $wishList[$j]['item_description']. "</h4></td></tr></tbody></table></div></div>";
        $j++;
      }
      for ($i = 7; $i < 14; $i+=2){
         $imageUrl = "/html/images/cover3.jpg";
         $gridHtml[$i] = "<div class=\"block check2\" style=\"background: url(".$imageUrl.") no-repeat center; background-size: cover;\"></div>";
      }
      $j = 0;
      for ($i = 8; $i < 14; $i+=2) {
        $gridHtml[$i] = "<div class=\"block check1\" id=\"grid". ($i+1) ."\">";   
        $gridHtml[$i] .= "<div class='block-inner'><table style=\"height: 100%; width: 100%;\">";
        $gridHtml[$i] .= "<tbody><tr><td><div class=\"block-icon quote\"></div>";            
        $gridHtml[$i] .= "<p>". $questions[$j]['question_text'] . ": </p>";
        $gridHtml[$i] .= "<h4>". $answers[$j]['answer_text'] . "</h4></td></tr></tbody></table></div></div>";
        $j++;
      }
      for ($i = 1; $i < 7; $i+=2){
         $imageUrl = "/html/images/cover3.jpg";
         $gridHtml[$i] = "<div class=\"block check2\" style=\"background: url(".$imageUrl.") no-repeat center; background-size: cover;\"></div>";
      }

      //print_r($gridHtml);
  ?>
  <div class="block-row">
      <?php
        for ($i = 0; $i<7; $i++){
          echo $gridHtml[$i];
        }
      ?>
  </div>

  <div class="block-row">
    <?php
      // print HTML of all grids
      for ($i = 7; $i<14; $i++){
        echo $gridHtml[$i];
      }
    ?>
  </div>

</div>
<div id="gurupicks">
<div class="h1" style="margin-left:70px; text-align:center;"> Guru Picks for macbook stickers </div>
  <div style="margin-left:40px"><br>
    <div class="col-md-1 row" style="height:168px" ><img src='/html/images/leftArrow2.png' width='60' style="margin-top: 35px"></div>
    <div class="col-md-10">
      <?php
          if (isset($wishListRecs[0])) {
            $item = $wishListRecs[0];
            for ($i = 0; $i < 6; $i++) {
              echo "<div class='col-md-2'> <a class='thumbnail' href=\"" . $item[$i]['pageUrl'] . "\" target=\"_blank\">";
              echo "<img src=\"" . $item[$i]['imgUrl'] ."\"></a>";
              echo "<div class='pdtPrice'>" . $item[$i]['price'] . "</div>";
              echo "<div class='pdtTitle'>" . $item[$i]['title'] . "</div></div>";
            }
          }
      ?>
    </div>
    <div class="col-md-1 row" style="height:168px" ><img src='/html/images/rightArrow2.png' width='60' style="margin-top: 35px"></div>
  </div>
</div>
