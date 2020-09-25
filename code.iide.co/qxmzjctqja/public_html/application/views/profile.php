<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>IIDE - School Of Code</title>
  <meta name="description" content="IIDE School Of Code">
  <meta name="author" content="SitePoint">

<base href = "<?php echo base_url() . '../public_html/' ?>" />
  <!-- UIkit CSS -->
<link rel="stylesheet" href="css/uikit.min.css" />

<!-- UIkit JS -->
<script src="js/uikit.min.js"></script>
<script src="js/uikit-icons.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">
<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.js"></script>

<link rel = "stylesheet" href = "css/student.css" />

<!-- FONT AWESOME -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body>
<div class="uk-container">
<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
  <nav class="uk-navbar-container uk-margin" uk-navbar="mode: click">

    <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo" href="#"><img src = "img/logo.png" height = "70px" width = "80px" /></a>


    </div>
    <div class="uk-navbar-right">

      <ul class="uk-navbar-nav">

          <li>
              <a href="#" class = "active" style = "color:#26ADE2 !important;">Courses</a>
          </li>
          <li><a href="#">Settings</a></li>
      </ul>
      <div class="uk-navbar-item">
        <div class="uk-margin" style = "margin-top:20px;">
    <form class="uk-search uk-search-default">
        <span uk-search-icon></span>
        <input class="uk-search-input" type="search" placeholder="Search...">
    </form>
</div>
      </div>
        <ul class="uk-navbar-nav">
          <li><a style = "color:#26ADE2 !important;"><?php echo $xp; ?> XP</a></li>
            <li>

                <a href="#">Logout</a>

            </li>
        </ul>
    </div>
</nav>
</div>
<center>
<form class="uk-form-horizontal uk-margin-large">
    <fieldset class="uk-fieldset">

        <legend class="uk-legend">Change Password</legend>

        <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Text</label>
        <div class="uk-form-controls">
            <input class="uk-input" id="form-horizontal-text" type="text" placeholder="Some text...">
        </div>
    </div>



    </fieldset>
</form>
</center>

<script type = "text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type = "text/javascript" src = "js/frontend.js"></script>
</body>
</html>
