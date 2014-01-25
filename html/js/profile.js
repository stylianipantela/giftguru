
$(document).on('click', '.delete', function(){
    $item = $(this).attr("name");
    $.get('/index.php/welcome/deleteItem', {query: $item}, function(){
      console.log($item);
    })
});

/*
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


  $("input[name=newgiftitem]").keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
      ShowNewGift();  
      }
  });*/