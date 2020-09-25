$(document).ready(function(){
  $('.uk-card').on("click", function(){

    $('#exercises').html('');
    var id = $(this).attr("data-id");
    $.post("http://code.iide.co/index.php/Exercise/list/" + id, {}, function(data){
      var exercises = JSON.parse(data);
      $.each(exercises, function(id, val){
        //alert(val.title);
        if(val.count > 0){
          $("#exercises").append("<li><a href = 'http://code.iide.co/index.php/Exercise/index/" + val.id +"' class = 'done' style = 'color:green'>" + val.title + "</a></li>");
        }else{
          $("#exercises").append("<li><a href = 'http://code.iide.co/index.php/Exercise/index/" + val.id +"'>" + val.title + "</a></li>");
        }



      });

    });
  });


});
