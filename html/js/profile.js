jQuery(document).ready(function() {
  $(".delete").click(function(){
    item = $(this).attr("name");
    $.get('/welcome/deleteItem', {query: item}, function(answer){});
  });
});