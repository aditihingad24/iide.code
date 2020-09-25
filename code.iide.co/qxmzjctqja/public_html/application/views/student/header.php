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
<script type = "text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type = "text/javascript" src = "js/frontend.js"></script>
<!-- FONT AWESOME -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<style>
  #result{
    width: 100%;
    height: 550px;
    border: 1px solid #eee;
    padding:5px 5px 5px 5px;
  }
  #editor{
    width: 100%;
    height: 550px !important;
    border:1px solid #222;
  }
  .CodeMirror {
    border: 1px solid #eee;

  }

  #guide{
    font: Lato;
    height: 550px;
    overflow-y: scroll;
    border: 1px solid #eee;
    padding: 5px 5px;
  }
</style>
</head>

<body>


  <nav class="uk-navbar-container" uk-navbar style = "background-color:#16141F !important;">

    <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo" href="#"><img src = "img/logo.png" height = "70px" width = "80px" /></a>


    </div>
    <div class="uk-navbar-right">

      <ul class="uk-navbar-nav">
        <ul class="uk-navbar-nav">
          <li><a style = "color:#26ADE2 !important;"><?php echo $xp->xp; ?> XP</a></li>
          <li>
              <a href="<?php echo base_url() . 'Exercise/curriculum' ?>" style = "color: #9BAAB6 !important;">Courses</a>
          </li>
          <li><a href="<?php echo base_url() . 'User/logout' ?>" style = "color: #9BAAB6 !important;">Logout</a></li>

        </ul>

      </ul>
      <div class="uk-navbar-item">
        <div class="uk-margin" style = "margin-top:20px;">
    <!--<form class="uk-search uk-search-default">
        <span uk-search-icon></span>
        <input class="uk-search-input" type="search" placeholder="Search...">
    </form>-->
</div>
      </div>

    </div>
</nav><br>
<div class = "uk-container">
