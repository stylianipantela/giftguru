jQuery(document).ready(function() {
  $(".delete").click(function(){
    item = $(this).attr("name");
    $.get('/welcome/deleteItem', {query: item}, function(answer){

    });
  });
    // $(this).parent().remove();
});

jQuery(document).ready(function() {
  $("#insert").click(
	function insertToWishList () {
	    item = $("#insert_input").val();
	    $.get('/welcome/insertItem', {query: item}, function(answer){

	    });
	});
});