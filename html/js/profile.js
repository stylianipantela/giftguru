jQuery(document).ready(function() {
  $(".delete").click(function(){
    var item = $(this).attr("name");
    $.get('/index.php/welcome/deleteItem', {query: item}, function(answer){});
  });
    // $(this).parent().remove();

  $(".insert").click(function() {
      //item = $(".insert_input", $(this)).val();  
      //console.log($("#insert_input").val());
	    //item = $("#insert_input").val();
      item = $(this).prev().prev().prev().val();
      $(this).parent().parent().append("<h4>"+item+"</h4>");
      $(this).parent().remove();
      if ($(this).attr("name")=="wish")
	       $.get('/index.php/welcome/insertItem', {query: item}, function(answer){});
      else{
         // $question_id = 1;
         // $.get('/index.php/welcome/insertAnswer', {query: item, query2: question_id}, function(answer){});
      }
	});
});