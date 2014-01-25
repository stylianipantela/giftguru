
function showResult(category){
  $.get('/welcome/amazon2', {query: category}, function(answer){
      var answerDecoded = jQuery.parseJSON(answer);
      var items = "<div id='" + category.replace(/\s/g, '') + "row' class='row'> <div class='h2'>" + category + "</div></br>";
      for (var i = 0; i < answerDecoded.length; i++) {
          items += "<a href=\"" + answerDecoded[i].pageUrl 
          + "\" target=\"_blank\" class=\"thumbnail col-md-3\"><img src=\"" 
          + answerDecoded[i].imgUrl + "\"><div class='pdtTitle'>" 
          + answerDecoded[i].title + "</div><div class='pdtPrice'>" 
          + answerDecoded[i].price + "</div> </a>";
      }
      items += "</div><br>";
      $( "#displayArea" ).prepend(items);
  });
}


function deleteResult(category){
  $("#"+category.replace(/\s/g, '')+"row").remove();
}


jQuery(document).ready(function(){
        

});


// on('click', '.tag', function(){  
//   if ($(this).attr("id").hasClass("btn")) { 
//     alert("Hello");
//     // $(this).attr("id").removeClass("btnClicked");
//   } 
//   // else { 
//   //   $(this).attr("id").addClass('active btnClicked'); 
//   // }
//   // showResult($(this).attr("id"));
// });