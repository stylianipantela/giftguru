<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<br><br><br>

<div id="blocks">
	<div class="block-row">
		<?php
			for ($i = 0; $i < 7; $i++) {
			    echo ("<div class=\"block check" . (($i % 2) + 1) . "\" id=\"grid" . ($i+1) . "\">");		
			    echo "<div class='block-inner'><table style=\"height: 100%; width: 100%;\">";
	            echo "<tbody><tr><td>";
	            echo ("<div class=\"block-icon quote\"></div>");
	            echo ("<p>" . ($wishList[$i]['item_description']) . "</p></td></tr></tbody></table></div></div>");
			}
		?>
	</div>
	<div class="block-row">
		<?php
			for ($i = 0; $i < 7; $i++) {
			    echo ("<div class=\"block check" . ((($i+1) % 2) + 1) . "\" id=\"grid" . ($i+8) . "\">");		
			    echo "<div class='block-inner'><table style=\"height: 100%; width: 100%;\">";
	            echo "<tbody><tr><td>";
	            echo ("<div class=\"block-icon quote\"></div>");
	            echo ("<p>" . ($answers[$i]['answer_text']) . "</p></td></tr></tbody></table></div></div>");
			}
		?>
	</div>
	<!-- <div class="block-row">
		<div class="block check2" id="grid8">
			<div class='block-inner'>
			<table style="height: 100%; width: 100%;">
                  <tbody><tr>
                      <td >
                          <div class="block-icon quote"></div>
                          <p>Demanding, but definitely doable. Social, but educational. A focused topic, but broadly applicable skills. CS50 is the quintessential Harvard course."</p>
                      </td>
                  </tr>
            </tbody></table>
        	</div>
		</div>
		<div class="block check1" id="grid9">
			<div class="block-inner">
				<table style="height: 100%; width: 100%;">
	                  <tbody><tr>
	                      <td >
	                          <div class="block-icon quote"></div>
	                          <p>Demanding, but definitely doable. Social, but educational. A focused topic, but broadly applicable skills. CS50 is the quintessential Harvard course."</p>
	                      </td>
	                  </tr>
	            </tbody></table>
        	</div>
		</div>
		<div class="block check2" id="grid10">
			<table style="height: 100%; width: 100%;">
                  <tbody><tr>
                      <td >
                          <div class="block-icon quote"></div>
                          <p>Demanding, but definitely doable. Social, but educational. A focused topic, but broadly applicable skills. CS50 is the quintessential Harvard course."</p>
                      </td>
                  </tr>
            </tbody></table>
		</div>
		<div class="block check1" id="grid11">
		</div>
		<div class="block check2" id="grid12">
		</div>
		<div class="block check1" id="grid13">
		</div>
		<div class="block check2" id="grid14">
		</div>
	</div> -->
</div>

<!--
	<div>
	    <label class="myBtn btn btn-lg btn-default" id="stationery" style="background:rgb(88, 114, 255)">Stationery</label>
	    <label class="myBtn btn btn-lg btn-default" style="background:rgb(189, 64, 232)" id="college">College</label>
	    <label class="myBtn btn btn-lg btn-default" style="background:rgb(255, 70, 71)" id="humor">Humor</label>
	    <label class="myBtn btn btn-lg btn-default" style="background:rgb(255, 186, 52)" id="sweet">Sweet</label>
	    <label class="myBtn btn btn-lg btn-default" style="background:rgb(255, 233, 159)" id="sweet">Sweet</label>
	    <label class="myBtn btn btn-lg btn-default" style="background:rgb(88, 114, 255)" id="sweet">Sweet</label><br>
		<label class="myBtn btn btn-lg btn-default" style="background:rgb(88, 114, 255)" id="lustrous">Lustrous</label>
		<label class="myBtn btn btn-lg btn-default" style="background:rgb(88, 114, 255)" id="electronics">Electronics</label>
		<label class="myBtn btn btn-lg btn-default" style="background:rgb(88, 114, 255)" id="fashion">Fashion</label>
		<label class="myBtn btn btn-lg btn-default" style="background:rgb(88, 114, 255)" id="food">Food</label>
		<label class="myBtn btn btn-lg btn-default" style="background:rgb(88, 114, 255)" id="sweet">Sweet</label>
		<label class="myBtn btn btn-lg btn-default" style="background:rgb(88, 114, 255)" id="sweet">Sweet</label>
	</div>
-->

<div id="sweetrow">
<br>  <div class="h2" style="margin-left:70px; text-align:center;"> Guru Picks </div>
  <div style="margin-left:40px"><br>
    <div class="col-md-1 row" style="height:168px" ><img src='/html/images/leftArrow.png' width='60' style="margin-top: 54px"></div>
    <div class="col-md-10">
      <div class="thumbnail col-md-2"></div>
      <div class="thumbnail col-md-2"></div>
      <div class="thumbnail col-md-2"></div>
      <div class="thumbnail col-md-2"></div>
      <div class="thumbnail col-md-2"></div>
      <div class="thumbnail col-md-2"></div>
    </div>
    <div class="col-md-1 row" style="height:168px" ><img src='/html/images/rightArrow.png' width='60' style="margin-top: 54px"></div>
  </div>
</div>

