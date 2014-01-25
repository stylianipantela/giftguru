jQuery(document).ready(function() {
  $(".friend").click(function(){
    userId = $(this).attr("name");
    $.get('/welcome/deleteItem', {query: item}, function(answer){

    });
  });
    // $(this).parent().remove();
});