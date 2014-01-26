<link rel="stylesheet" type="text/css" href="/html/css/profile.css" />
<script src="/html/js/profile.js"></script> 

<br><br>

<div id="blocks">
<?php 
	$addHtml="<div class=\"block check1\" id=\"grid1\">";
	$addHtml.="<div class=\"block-inner\">";
	$addHtml.="<table style=\"height: 100%; width: 100%;\">";
	$addHtml.="<tbody><tr><td>";
	$addHtml.="<p>My Wish Item: </p>";
	$addHtml.="<fieldset>";
	$addHtml.="<div class=\"form-group\">";
	$addHtml.="<input autofocus id=\"insert_input\" name=\"newgiftitem\" placeholder=\"Wish\" type=\"text\"/>";
	$addHtml.="</br></br><input class=\"btn btn-success insert\" type = \"button\" name='wish' value=\"Add My Wish\"></input>";
	$addHtml.=" </div></fieldset></td></tr></tbody></table></div></div>";

    $picHtml="<div class=\"block check2\" style=\"background: url(/html/images/cover3.jpg) no-repeat center; background-size: cover;\"></div>";

    echo("<div class=\"block-row\">");
    for($i=0; $i<3; $i++){	
    	echo($addHtml);
    	echo($picHtml);
    }
    echo($addHtml);
    echo("</div>");
?>

<?php
	$qnHtmlhead="<div class=\"block check1\" id=\"grid1\">";
	$qnHtmlhead.="<div class=\"block-inner\">";
	$qnHtmlhead.="<table style=\"height: 100%; width: 100%;\">";
	$qnHtmlhead.="<tbody><tr><td><p>";

	$qnHtmlfoot="</p><fieldset>";
	$qnHtmlfoot.="<div class=\"form-group\">";
	$qnHtmlfoot.="<input autofocus id=\"insert_input\" placeholder=\"Top Secret\" type=\"text\"/>";
	$qnHtmlfoot.="</br></br><input class=\"btn btn-success insert\" type = \"button\" name='qn' value=\"Tell Guru!\"></input>";
	$qnHtmlfoot.=" </div></fieldset></td></tr></tbody></table></div></div>";

	echo("<div class=\"block-row\">");
    echo($picHtml); $j=0;
    for($i=0; $i<3; $i++){	
    	echo($qnHtmlhead);
    	echo($questions[$j]['question_text']); $j++;
    	echo($qnHtmlfoot);
    	echo($picHtml);
    }
    echo("</div>");

    echo("<div class=\"block-row\">");
    for($i=0; $i<3; $i++){	
    	echo($qnHtmlhead);
    	echo($questions[$j]['question_text']); $j++;
    	echo($qnHtmlfoot);
    	echo($picHtml);
    }
    echo($qnHtmlhead);
    echo($questions[$j]['question_text']); $j++;
   	echo($qnHtmlfoot);
    echo("</div>");
?>
<!--
<div class="answersposition">
	<h1 class = "questions" > My Questionnaire
	<a class = "btn btn-default" href = "../public/questionnaire.php" style = "padding-left: 0px;">Edit</a></h1>
 	<p class = "questions" style = "font-size:20px;"> <strong> Short Answers </strong></p>
	<p class = "questions"> What is your favorite activity to do for fun? </p>
 	<?php if (count($answers) != 0){ ?>
 		<p class = "questions"> <strong><?php echo ($answers[0]["userinput1"]) ?></strong></p>
	<?php } ?>
 		<p class = "questions">  What are some of your favorite restaurants? </p>	
	<?php if (count($answers) != 0){ ?>
		<p class = "questions"> <strong><?php echo ($answers[0]["userinput2"]) ?></strong> </p>
	<?php } ?>
 		<p class = "questions"> If you had an hour of absolutely free time, how would you spend it? </p>
	<?php if (count($answers) != 0){ ?>
		<p class = "questions"> <strong><?php echo ($answers[0]["userinput3"]) ?></strong> </p>
	<?php } ?>
 		<p class = "questions">  If you and your friends had 5 hours of free time, what would you want to do?</p>	
	<?php if (count($answers) != 0){ ?>
		<p class = "questions">  <strong><?php echo ($answers[0]["userinput4"]) ?></strong> </p> </br>
	<?php } ?>
	<p class = "questions" style = "font-size:20px;"> <strong> Quick Picks </strong></p>
	<div class = "marginspace">
		<?php if (count($answers) == 0){ ?>
			<label class = "doublechoice"> Joke </label>
	 		<label class = "doublechoice"> Serious </label>
	 		<label class = "doublechoice"> Joke </label>
	 		<label class = "doublechoice"> Serious </label>
	 		<label class = "doublechoice"> Clothing </label>
	 		<label class = "doublechoice"> Electronics </label>
	 		<label class = "doublechoice"> Horror </label>
	 		<label class = "doublechoice"> ChickFlick </label>
		<?php }
			else{
			if (($answers[0]["userinput5"]) == 1)
			{ ?>
	 		<label class = "doublechoice1"> Sweet </label>
	 		<label class = "doublechoice"> Spicy </label>
	 		<?php }
	 		if (($answers[0]["userinput5"]) == 2)
	 		{ ?>
	 			<label class = "doublechoice"> Sweet </label>
	 			<label class = "doublechoice2"> Spicy </label>
	 		<?php }
	 		if (($answers[0]["userinput5"]) == 3)
	 		{ ?>
	 			<label class = "doublechoice1"> Sweet </label>
	 			<label class = "doublechoice2"> Spicy </label>
	 		<?php }
	 		if (($answers[0]["userinput5"]) == 0)
	 		{ ?>
	 			<label class = "doublechoice"> Sweet </label>
	 			<label class = "doublechoice"> Spicy </label>
	 		<?php } 
	 		if (($answers[0]["userinput6"]) == 1)
			{ ?>
	 		<label class = "doublechoice1"> Joke </label>
	 		<label class = "doublechoice"> Serious </label>
	 		<?php }
	 		if (($answers[0]["userinput6"]) == 2)
	 		{ ?>
	 			<label class = "doublechoice"> Joke </label>
	 			<label class = "doublechoice2"> Serious </label>
	 		<?php }
	 		if (($answers[0]["userinput6"]) == 3)
	 		{ ?>
	 			<label class = "doublechoice1"> Joke </label>
	 			<label class = "doublechoice2"> Serious </label>
	 		<?php }
	 		if (($answers[0]["userinput6"]) == 0)
	 		{ ?>
	 			<label class = "doublechoice"> Joke </label>
	 			<label class = "doublechoice"> Serious </label>
	 		<?php }
 			if (($answers[0]["userinput7"]) == 1)
			{ ?>
	 		<label class = "doublechoice1"> Clothing </label>
	 		<label class = "doublechoice"> Electronics </label>
	 		<?php }
	 		if (($answers[0]["userinput7"]) == 2)
	 		{ ?>
	 			<label class = "doublechoice"> Clothing </label>
	 			<label class = "doublechoice2"> Electronics </label>
	 		<?php }
	 		if (($answers[0]["userinput7"]) == 3)
	 		{ ?>
	 			<label class = "doublechoice1"> Clothing </label>
	 			<label class = "doublechoice2"> Electronics </label>
	 		<?php }
	 		if (($answers[0]["userinput7"]) == 0)
	 		{ ?>
	 			<label class = "doublechoice"> Clothing </label>
	 			<label class = "doublechoice"> Electronics </label>
	 		<?php } 
	 		if (($answers[0]["userinput8"]) == 1)
			{ ?>
	 		<label class = "doublechoice1"> Horror </label>
	 		<label class = "doublechoice"> ChickFlick </label>
	 		<?php }		
	 		if (($answers[0]["userinput8"]) == 2)
	 		{ ?>
	 			<label class = "doublechoice"> Horror </label>
	 			<label class = "doublechoice2"> ChickFlick </label>
	 		<?php }
	 		if (($answers[0]["userinput8"]) == 3)
	 		{ ?>
	 			<label class = "doublechoice1"> Horror </label>
	 			<label class = "doublechoice2"> ChickFlick </label>
	 		<?php }
	 		if (($answers[0]["userinput8"]) == 0)
	 		{ ?>
	 			<label class = "doublechoice"> Horror </label>
	 			<label class = "doublechoice"> ChickFlick </label>
	 		<?php }
	 		} ?>
	 		</br> </br> </br>

	 		<?php if (count($answers) == 0){ ?>
	 			<p class = "questions" style = "font-size:20px;">  Your questionnaire seems empty -- fill it out now to maximize your munerum experience! ;) 
				<a class = "btn btn-success" href = "../public/questionnaire.php" style = "padding-left: 0px;">Fill Out Now</a> </p>
			<?php } ?>
	 </div>
</div>
-->





