function showResult(category){
  $.get('../welcome/search2', {query: category}, function(answer){
      var answerDecoded = jQuery.parseJSON(answer);
      var items = "<div id='" + category.replace(/\s/g, '') + "row' class='row'> <div class='h2'>" + category + "</div></br>";
      for (var i = 0; i < answerDecoded.length; i++) {
          items += "<a href=\"" + answerDecoded[i].pageUrl 
          + "\" target=\"_blank\" class=\"thumbnail col-md-3\"><img src=\"" 
          + answerDecoded[i].imgUrl + "\"><div class='pdtTitle'>" 
          + answerDecoded[i].title + "</div><div class='pdtPrice'>" 
          + answerDecoded[i].price + "</div> </a>";
      }
      items += "</div>";
      $( "#displayArea" ).prepend(items);
  });
}

function deleteResult(category){
  $("#"+category.replace(/\s/g, '')+"row").remove();
}

jQuery(document).on('click', '.tag', function(){
    var color = $(this).css('background-color');
    if (color == 'rgba(0, 0, 0, 0)'){
      $(this).css('color', 'rgba(0, 61, 255, 0.84)');
        // $(this).css('font-weight','900');
        $(this).css('background-color', 'rgba(82, 0, 255, 0.27)');
        showResult($(this).attr("id"));
    }
    else{
        $(this).css('color', 'black');
        $(this).css('font-weight','normal');
        $(this).css('background-color', 'transparent');
        deleteResult($(this).attr("id"));
        console.log($(this).attr("id"));
    }       
  });