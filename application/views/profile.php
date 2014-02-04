<link rel="stylesheet" type="text/css" href="/html/css/profile.css" />
<script src="/html/js/profile.js"></script> 

<br><br>
<div class="container">
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
</div>
</div>