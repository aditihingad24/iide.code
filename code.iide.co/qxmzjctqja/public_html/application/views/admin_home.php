

        <div class="content mt-3">

            <!--<div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Welcome</span> Admin!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>-->


           <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">

                        <h4 class="mb-0">
                            <span class="count"><?php echo $no_of_students; ?></span>
                        </h4>
                        <p class="text-light">Students</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>

                    </div>

                </div>
            </div>
            <!--/.col-->


            <?php foreach($classes as $c): ?>
            <a href = "<?php echo base_url() . 'Batch/index/' . $c->id; ?>">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="stat-widget-one">
                      <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                        <div class="stat-content dib">
                          <div class="stat-text"><?php echo $c->name; ?></div>
                            <div class="stat-digit"><?php echo $c->cnt; ?></div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
          </a>
          <?php endforeach;  ?>


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    
