jQuery(document).ready(function() {
  $(".delete").click(function(){
    item = $(this).attr("name");
    $.get('index.php/welcome/deleteItem', {query: item}, function(answer){});
  });
  $(this).parent().remove();
});