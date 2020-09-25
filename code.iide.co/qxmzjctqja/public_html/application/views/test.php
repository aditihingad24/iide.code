<!doctype html>
<html>

<head>
    <title>IIDE</title>
    <base href="<?php echo base_url() . '../public_html/' ?>" />
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.39.2/codemirror.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.39.2/codemirror.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.39.2/mode/xml/xml.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/carlo/jquery-base64/master/jquery.base64.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/uikit.min.css" />
    <style>
    body{

    }
      #result{
        width: 100%;
        height: 520px;
        border: 1px solid #eee;
        padding:5px 5px 5px 5px;
      }
      #editor{
        width: 100%;
        height: 500px !important;
        border:1px solid #222;
      }
      .CodeMirror {
        border: 1px solid #eee;

      }

      #guide{
        font: Lato;
        height: 520px;
        overflow-y: scroll;
        border: 1px solid #eee;
        padding: 5px 5px;
      }
      .nopadding {
   padding: 0 !important;
   margin: 0 !important;
}
#foot {
  position: absolute;
  bottom: 0px;
  height:50px;
  background-color:#16141F !important;
  margin-right: auto;
  margin-left: auto;
  left: 0px;
  right: 0px;
}
    </style>
    <!-- UIkit JS -->
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">
    <script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.js"></script>

    <link rel="stylesheet" href="css/student.css" />

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>
  <nav class="uk-navbar-container" uk-navbar style = "background-color:#16141F !important;">

    <div class="uk-navbar-left">

        <ul class="uk-navbar-nav">
          <a class="uk-navbar-item uk-logo" href="#"><img src = "img/logo.png" height = "70px" width = "80px" /></a>



        </ul>

    </div>
    <a href="" class="uk-navbar-item uk-logo"></a>
    <div class="uk-navbar-right">

        <ul class="uk-navbar-nav">
            <li><a href="#" style = "color: #40BCBF !important;">7 XP</a></li>
            <li>
                <a href="#" style = "color: #9BAAB6 !important;">Courses</a>
            </li>
            <li><a href="#" style = "color: #9BAAB6 !important;">Logout</a></li>
        </ul>

    </div>

</nav>
<div class = "container-fluid" style=  "margin-top:7px;">
  <section class = "row no-padding">
    <div class = "col-md-4 nopadding">
      <section id = "guide">
        <center><h3><?php echo $exercise->title; ?></h3></center>
        <p><?php echo $exercise->description; ?></p>

        <?php
        function html_tidy( $input_html, $indent = "true", $no_body_tags = "true", $fix = "true" ) {
         ob_start();
         $tidy = new tidy;
         $config = array( 'indent' => $indent, 'output-xhtml' => false, 'wrap' => 200, 'clean' => $fix, 'show-body-only' => true );
         $tidy->parseString( $input_html, $config, 'utf8' );
         $tidy->cleanRepair(  );
         $input = $tidy;
         return $input;
        }

        $tidy = html_tidy($exercise->code);
        ?>
      </section>
    </div>
    <div class = "col-md-4 nopadding">
      <textarea style = "height:550px !important;" id="editor"><?php echo $tidy ?></textarea>
      <section style = "width: 100%;border-bottom:1px solid #eee;">
        <button type="button" class="btn btn-primary" style = "margin-top:3px;margin-bottom:3px;margin-left:6px;border-radius:0px;">Run</button>
        <button type="button" class="btn btn-success" style = "margin-top:3px;margin-bottom:3px;margin-left:3px;border-radius:0px;">Submit</button>

      </section>
    </div>
    <div class = "col-md-4 nopadding">

      <iframe id="result">
        <?php
        echo htmlspecialchars_decode($exercise->code);
        ?>
      </iframe>
    </div>
  </section>

<section class = "row" id = "foot">
  <div class = "col-md-4" style = "padding-top:12px;">
    <div class="uk-offcanvas-content">

      <!-- The whole page content goes here -->

      <a type="button" id = "sandwich" data-id = "<?php echo $id; ?>" uk-toggle="target: #offcanvas-usage" style = "color:#9BAAB6"><i class = "fa fa-bars"> </i> COURSE OUTLINE</button>

      <!--<a href="#offcanvas-usage" uk-toggle>Open</a>-->

      <div id="offcanvas-usage" uk-offcanvas>
          <div class="uk-offcanvas-bar">

              <button class="uk-offcanvas-close" type="button" uk-close></button>

              <h3><i class = "fab fa-html5"></i> HTML 5<br><small style = "font-size:13px;">EXERCISES</small></h3>

              <hr>
              <p id = "exercises">

              </p>

          </div>
      </div>

  </div>
  </div>
  <div class = "col-md-4" style = "padding-top:10px;width:100%;">
    <a href="#" id = "back" style = "color:#9BAAB6">Back</a>

    <a href="#" id = "next" style = "color:#40BCBF;float:right;">Next</a>
  </div>
  <div class = "col-md-4"></div>
</section>

</div>
</body>
<script>
    var editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
        lineNumbers: true,
        mode: "xml",
        lineWrapping: true
    });
    editor.setOption("theme", 'lesser-dark');
    editor.setSize(null, 476);

    function submit_html() {

        editor.save();
        var x = "<script src = 'https://cdnjs.cloudflare.com/ajax/libs/chai/4.1.2/chai.min.js'></scr" + "ipt>" + "<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'>" + "</SCR" + "IPT>" + "<link rel = 'stylesheet' type = 'text/css' href = 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'><link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'><style>.right{float:right;} body{font-family:Lato;}</style>";

        var code = document.getElementById("editor").value;

        var data_url = "data:text/html;charset=utf-8;base64," + $.base64.encode(x + code);
        document.getElementById("result").src = data_url;
        //var p = ""

        //$.get(data_url, {}, function(data){
        //alert(assert.isTrue((/hello(\\s)+world/gi).test($('h1').text()), 'Your <code>h1</code> element should have the text \"Hello World\".'));
        //});

    }
    $(document).ready(function() {
        submit_html();
    });

    $('#back').click(function(){
      var ex_id = <?php echo $ex_id; ?>;
      if(ex_id != 1){
        $(this).attr('href', '<?php echo base_url() . 'User/design_test/' ?>' + (ex_id - 1))
      }
    });

    $('#next').click(function(){
      var ex_id = <?php echo $ex_id; ?>;

        $(this).attr('href', '<?php echo base_url() . 'User/design_test/' ?>' + (ex_id + 1))

    });

    $(document).ready(function(){
      var ex_id = <?php echo $ex_id; ?>;

      if(ex_id == 1){
        $('#back').removeAttr('href');
      }
      if(ex_id > 400){
        $('#next').attr('disable', 'true')
      }


      $('#exercises').html('');
      var id = $('#sandwich').attr("data-id");
      $.post("http://localhost/iide/index.php/Exercise/list/" + id, {}, function(data){
        var exercises = JSON.parse(data);
        $.each(exercises, function(id, val){
          //alert(val.title);

          if(val.count > 0){
            if(val.id == ex_id){
              $("#exercises").append("<a class = 'active' href = 'http://localhost/iide/index.php/Exercise/index/" + val.id +"'  style = 'color:grey'>" + val.title + "</a><br>");
            }else{
              $("#exercises").append("<a href = 'http://localhost/iide/index.php/Exercise/index/" + val.id +"'  style = 'color:grey'>" + val.title + "</a><br>");

            }
          }else{
            if(val.id == ex_id){
            $("#exercises").append("<a class = 'active' href = 'http://localhost/iide/index.php/Exercise/index/" + val.id +"'>" + val.title + "</a><br>");
          }else{
            $("#exercises").append("<a class = 'list' href = 'http://localhost/iide/index.php/Exercise/index/" + val.id +"'>" + val.title + "</a><br>");

          }
          }




        });

      });


    });

    $(document).bind('keypress', function(event) {
        if (event.ctrlKey && event.which === 13) {
            submit_html();
        }
    });


    $('#submit').click(function() {
        var id = $(this).attr('data-id');
        var html = document.getElementById("editor").value;
        var exercise = $(this).attr('data-exercise');
        var student = $(this).attr('data-student');
        //alert(exercise + ' ' + student)
        submit_html();
        $.post('http://localhost:8081/', {
            'html': html,
            'id': id
        }, function(data1) {

            if (data1 == "ok") {
                var correct = 1;
                $.get("http://localhost/iide/index.php/Exercise/submit/" + exercise + "/" + student + "/" + correct, function(data) {
                    $('#my-id p').html('Congrats');
                });

            } else {
                var correct = 0;

                $.post("http://localhost/iide/index.php/Exercise/submit/" + exercise + "/" + student + "/" + correct, function(data) {

                    $('#my-id p').html(data1);
                });
            }
        });
    });
</script>

</html>
