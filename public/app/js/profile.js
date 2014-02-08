jQuery(document).ready(function() {
  $(".insert").click(function() {
    item = $(this).prev().prev().prev().val();
    item = "<h3>" + item + "</h3>" + "<br><a href=\"#\" class=\"btn btn-warning delete\">Remove</a>";
    $(this).parent().html(item);
	});

  $(".delete").click(function(){
    item = "<input autofocus placeholder=\"Top Secret\" type=\"text\"/><br><br><a href=\"#\" class=\"btn btn-success insert\">Enter</a>";
    $(this).parent().html(item);
  });

});