<!--<h3 class = "text-center"><u>COURSES</u></h3>-->
<?php
$t = 0;
$x = 0;
$co = [0,1,2,3];
$color = ['orange', 'blue', 'yellow', 'purple']
 ?>
<div class="uk-child-width-1-3@m" uk-grid id = "courses">
  <?php foreach($co as $c): ?>
    <div>
        <div class="uk-card uk-card-default <?php echo $color[$c] ?> uk-card-hover" uk-toggle="target: #modal-example" data-id = "<?php echo $c + 1; ?>">
            <div class="uk-card-media-top text-center">

            </div>
            <div class="uk-card-body">
                <h3 class="uk-card-title text-center"><i class = "<?php echo $courses[$x + 1]; ?>"></i> <?php echo $courses[$x]; ?></h3>

            </div>
            <div class="uk-card-footer">
              <div class="uk-child-width-1-2@m" uk-grid>
                <div class = "uk-text-primary" style = "margin-top:-8px;">
                  <?php if(isset($count[$t]) && count($count) > 0): ?>
                  <?php echo $count[$t]->count . ' / ' . $total[$t]->total; ?>
                <?php else: ?>
                  0
                <?php endif; ?>
                </div>
                <div>
                  <?php if(isset($count[$t]) && count($count) > 0): ?>
                  <progress class="uk-progress" value="<?php echo ($count[$t]->count/$total[$t]->total) * 100 ?>" max="100"><?php echo ($count[$t]->count/$total[$t]->total) / 100 ?></progress>
                <?php else: ?>
                <progress class="uk-progress" value="0" max="100">0</progress>

              <?php endif; ?>
                </div>
              </div>
            </div>
        </div>
    </div>
    <?php
    $t = $t+1;
    $x = $x+2;
     ?>
<?php endforeach; ?>
</div>
<!-- This is the modal -->
<div id="modal-example" uk-modal >
    <div class="uk-modal-dialog uk-modal-body" >
        <h2 class="uk-modal-title">Exercises</h2>
        <ul class="uk-list uk-list-bullet" id = "exercises" style = "height: 400px; overflow-y: scroll;">

        </ul>
    </div>
</div>
</div>
<script>
$(document).ready(function(){
  $('.uk-card').on("click", function(){

    $('#exercises').html('');
    var id = $(this).attr("data-id");
    $.post("https://code.iide.co/index.php/Exercise/list/" + id, {}, function(data){
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

</script>
