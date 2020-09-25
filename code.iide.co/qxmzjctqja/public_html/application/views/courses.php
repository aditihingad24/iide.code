<!doctype html>
<html>
    <head>


        <title>IIDE</title>
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
        <meta charset="utf-8">
        <base href = "<?php echo base_url() . '../public_html/' ?>" />
        <!-- Sets initial viewport load and disables zooming  -->
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
        <!-- SmartAddon.com Verification -->

        <!-- site css -->
        <link rel="stylesheet" href="css/site.min.css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="js/site.min.js"></script>

    </head>
    <body>
      <?php foreach($courses as $c): ?>
        <a href = "<?php echo base_url() . 'Exercise/list/' . $c->id ?>"><?php echo $c->name; ?></a><br>
      <?php endforeach; ?>
    </body>

</html>
