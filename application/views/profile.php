
 <link rel="stylesheet" type="text/css" href="/html/css/profile.css" />
 <br><br><br><br><br><br>

<div>
	<div class="wishlistposition">
	<img src="/html/images/My_Wishlist.png">
		
	<fieldset>
	    <div class="form-group">
	        <input autofocus name="newgiftitem" placeholder="Wish" type="text"/>
	        <input class="btn btn-success" onclick = "ShowNewGift();" type = "button" value = "Add My Wish"></input>
	    </div>
	</fieldset>
		
	<div id = "wishlist-header"> </div>
	<ul id = "wishlist"> 
		   <div id = "message"> </div>	    
		   <div id = "newgift"> </div>	    
		   <?php
	       foreach ($wishlist_items as $item)
	       {?>
	           <li class = "giftitem" >
	           		<?php echo $item->item_description; ?>
	           		<a class = "externallink delete" style = "color: red;" name = "<?php echo $item->item_description ?>" href="#"> Delete </a>
	           </li>
	        <?php } // end for ?>
	</ul>
	<div id = "wishlist-footer"> </div>
	</div>
</div>

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
<script>
	function ShowNewGift(){	
		    $.ajax({
		        url: "../ajax/addgift.php",
		        type: "POST",
		        dataType: 'html',
		        data: $("#myform").serialize(),
		        before: $("#message").append("<li class = 'giftitem'> <img src='../public/img/loading.gif'> loading </li>"),
		     	success: function(j)
				{
					  console.log(j);
					  // if field is not empty or repeated insert giftitem into DOM
					  if (j != "false"){
					  	$("#newgift").prepend("<li class = 'giftitem'>"  + $("input[name=newgiftitem]").val() + "<a class = 'externallink delete' style = 'color: red;' href='#' name = '" + $("input[name=newgiftitem]").val()+ "'> Delete </a> </li>");
					  };
				},
				complete: function(){
					  // delete loading messsage
					  $("#message").html("");
					  // reset text field value
					  $("input[name=newgiftitem]").val('');
					  // automatically focus back to the field
					  $("input[name=newgiftitem]").focus();
				}
		    }); 
	}

	$(document).on('click', '.delete', function(){
	    $.ajax({
	        url: "../ajax/deletegift.php",
	        type: "POST",
	        data: {deletegiftitem: $(this).attr("name")},
	        dataType: 'html',
	        complete: function(j)
			{
				  console.log(j);
			}
	   	}); 
	   	$(this).parent().remove();
	});

	$("input[name=newgiftitem]").keypress(function(event){
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			ShowNewGift();	
			}
	});

</script>




