
function showResult(category){
  $.get('/index.php/welcome/amazon2', {query: category}, function(answer){
      var answerDecoded = jQuery.parseJSON(answer);
      var items = returnHtmlRow(category,answerDecoded);
      $( "#displayArea" ).prepend(items);
  });
}

function returnHtmlRow(category,answerDecoded){
    var items = "<div id='"+category.replace(/\s/g, '')+"row' class='row'><div class='h2' style='margin-left:70px'>"
     + category.replace(/\s/g, '')+ "</div><div><div class='col-md-1 row' style='height:168px' ><img class='leftArrow' src='/html/images/leftArrow.png' width='60' style='margin-top: 54px;cursor:pointer'></div><div class='container col-md-10' style='width:800px; padding-left:10px;'>";

    for (var i = 0; i < 6; i++) {
        items += "<div class='col-md-2'> <a class='thumbnail' href=\"" + answerDecoded[i].pageUrl+"\" target=\"_blank\">"
         + "<img src=\"" + answerDecoded[i].imgUrl +"\"></a>"
        +"<div class='pdtPrice'>"+ answerDecoded[i].price + "</div>"
        +"<div class='pdtTitle'>" + answerDecoded[i].title + "</div></div>";
    }
    items += "</div><div class='col-md-1 row' style='height:168px' ><img class='rightArrow' src='/html/images/rightArrow.png' width='60' style='margin-top: 54px;cursor:pointer;'></div></div></div></br>";
    return items;
}

function deleteResult(category){
  $("#"+category.replace(/\s/g, '')+"row").remove();
}

jQuery(document).ready(function() {
  $(".wishlistgrid").click(function(){
    if ($(this).hasClass("blockClicked")) { 
      // $(this).removeClass("blockClicked");
      // deleteResult($(this).attr("id"));
    } 
    else { 
      $(this).addClass('blockClicked'); 
      showResult($(this).attr("id"));
    }
  });
});

$(document).on('click', '.rightArrow', function(){
      console.log('clicked');
    $(this).parent().prev().hide("slide", { direction: "left" }, 1000);
  });

function displayResults(answerDecoded) {
  var items = "";
  for (var i = 0; i < 6; i++) {
    items += "<div class='col-md-2'> <a class='thumbnail' href=\"" + answerDecoded[i].pageUrl+"\" target=\"_blank\">"
     + "<img src=\"" + answerDecoded[i].imgUrl +"\"></a>"
    +"<div class='pdtPrice'>"+ answerDecoded[i].price + "</div>"
    +"<div class='pdtTitle'>" + answerDecoded[i].title + "</div></div>";
  }
  return items;
}


jQuery(document).ready(function() {
  $(".block").click(function(){
    var keyword = $("h4", $(this)).text();    
    $.get('/welcome/amazon2', {query: keyword}, function(answer){
      var answerDecoded = jQuery.parseJSON(answer);
      var items = displayResults(answerDecoded);
      $("#amazonProducts").html(items);
      $("#amazonKeyword").html("Guru's Picks for " + keyword);
    });
  });
});














