

        <div class="content mt-3">

            <!--<div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Welcome</span> Admin!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>-->
            <div class="col-lg-4 col-md-6">
                        <section class="card">
                            <div class="twt-feed blue-bg">


                                <div class="media">
                                  <center>
                                    <div class="media-body">

                                        <h2 class="text-white display-6"><?php echo $name; ?></h2><br>
                                        <p style = "float:left;margin-left:3px;" class="text-light"><?php echo $class_name; ?></p>
                                    </div>
                                  </center>
                                </div>



                            </div>
                            <div class="weather-category twt-category">
                                <ul>
                                    <li class="active">
                                        <h5><?php echo $total->total; ?></h5>
                                        XP
                                    </li>
                                    <li>
                                        <h5><?php echo $acc . '%'; ?></h5>
                                        ACCURACY
                                    </li>
                                    <!--<li style = "border-right:none;">
                                        <h5><?php echo $avg; ?>sec</h5>
                                        AVG TIME
                                    </li>-->
                                </ul>
                            </div>


                        </section>
                    </div>
            <div class = "col-md-8 col-lg-8 col-sm-12">
              <h3>Exercises</h3>
              <hr>
              <div class="card col-lg-3 col-md-6 no-padding bg-flat-color-1">
                <div class="card-body">
                  <div class="h1 text-muted text-right mb-4">
                    <i class="fa fa-html5 text-light"></i>
                  </div>

                  <div class="h4 mb-0 text-light">
                    <span class="counts"><?php echo $course_wise[0]->count; ?>/<?php echo $c_total[0]->total; ?></span>
                  </div>
                  <small class="text-uppercase font-weight-bold text-light">HTML5</small>
                  <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: <?php echo ($course_wise[0]->count / ($course_wise[0]->count + $c_total[0]->total)) * 100; ?>%; height: 5px;"></div>
                </div>
              </div>


              <div class="card col-lg-3 col-md-6 no-padding bg-flat-color-2">
                <div class="card-body">
                  <div class="h1 text-muted text-right mb-4">
                    <i class="fa fa-css3 text-light"></i>
                  </div>

                  <div class="h4 mb-0 text-light">
                    <span class="counts"><?php echo $course_wise[1]->count; ?>/<?php echo $c_total[1]->total; ?></span>
                  </div>
                  <small class="text-uppercase font-weight-bold text-light">CSS3</small>
                  <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: <?php echo ($course_wise[1]->count / ($course_wise[1]->count + $c_total[1]->total)) * 100; ?>%; height: 5px;"></div>
                </div>
              </div>

              <div class="card col-lg-3 col-md-6 no-padding bg-flat-color-3">
                <div class="card-body">
                  <div class="h1 text-muted text-right mb-4">
                    <i class="fa fa-sass text-light"></i>
                  </div>

                  <div class="h4 mb-0 text-light">
                    <span class="counts"><?php echo $course_wise[2]->count; ?>/<?php echo $c_total[2]->total; ?></span>
                  </div>
                  <small class="text-uppercase font-weight-bold text-light">SASS</small>
                  <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: <?php echo ($course_wise[3]->count / ($course_wise[2]->count + $c_total[2]->total)) * 100; ?>%; height: 5px;"></div>
                </div>
              </div>

              <div class="card col-lg-3 col-md-6 no-padding bg-flat-color-4">
                <div class="card-body">
                  <div class="h1 text-muted text-right mb-4">
                    <i class="fa fa-sass text-light"></i>
                  </div>

                  <div class="h4 mb-0 text-light">
                    <span class="counts"><?php echo $course_wise[3]->count; ?>/<?php echo $c_total[3]->total; ?></span>
                  </div>
                  <small class="text-uppercase font-weight-bold text-light">DESIGN</small>
                  <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: <?php echo ($course_wise[3]->count / ($course_wise[3]->count + $c_total[3]->total)) * 100; ?>%; height: 5px;"></div>
                </div>
              </div>

              <div class="card col-lg-3 col-md-6 no-padding bg-flat-color-5">
                <div class="card-body">
                  <div class="h1 text-muted text-right mb-4">
                    <i class="fa fa-sass text-light"></i>
                  </div>

                  <div class="h4 mb-0 text-light">
                    <span class="counts"><?php echo $course_wise[4]->count; ?>/<?php echo $c_total[4]->total; ?></span>
                  </div>
                  <small class="text-uppercase font-weight-bold text-light">BOOTSTRAP</small>
                  <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: <?php echo ($course_wise[4]->count / ($course_wise[4]->count + $c_total[4]->total)) * 100; ?>%; height: 5px;"></div>
                </div>
              </div>

              <div class="card col-lg-3 col-md-6 no-padding" style = "background-color:#935BA6;">
                <div class="card-body">
                  <div class="h1 text-muted text-right mb-4">
                    <i class="fa fa-js text-light"></i>
                  </div>

                  <div class="h4 mb-0 text-light">
                    <span class="counts"><?php echo $course_wise[5]->count; ?>/<?php echo $c_total[5]->total; ?></span>
                  </div>
                  <small class="text-uppercase font-weight-bold text-light">JAVASCRIPT</small>
                  <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: <?php echo ($course_wise[5]->count / ($course_wise[5]->count + $c_total[5]->total)) * 100; ?>%; height: 5px;"></div>
                </div>
              </div>

              <div class="card col-lg-3 col-md-6 no-padding" style = "background-color:#D885B7;">
                <div class="card-body">
                  <div class="h1 text-muted text-right mb-4">
                    <i class="fa fa-js text-light"></i>
                  </div>

                  <div class="h4 mb-0 text-light">
                    <span class="counts"><?php echo $course_wise[6]->count; ?>/<?php echo $c_total[6]->total; ?></span>
                  </div>
                  <small class="text-uppercase font-weight-bold text-light">JQUERY</small>
                  <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: <?php echo ($course_wise[6]->count / ($course_wise[6]->count + $c_total[6]->total)) * 100; ?>%; height: 5px;"></div>
                </div>
              </div>

            </div>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
